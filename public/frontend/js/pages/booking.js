// booking.js
document.addEventListener('DOMContentLoaded', function () {
    const pickupDateInput = document.getElementById('pickup_date');
    const returnDateInput = document.getElementById('return_date');
    const totalPriceElement = document.getElementById('total_price');

    function calculateTotalPrice() {
        const pickupDate = new Date(pickupDateInput.value);
        const returnDate = new Date(returnDateInput.value);

        if (pickupDate && returnDate && pickupDate < returnDate) {
            const timeDifference = returnDate - pickupDate;
            const days = timeDifference / (1000 * 3600 * 24);
            const totalPrice = days * dailyPrice;
            totalPriceElement.textContent = `₦${totalPrice.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')}`;
            return totalPrice;
        } else {
            totalPriceElement.textContent = '₦0';
            return 0;
        }
    }

    pickupDateInput.addEventListener('change', calculateTotalPrice);
    returnDateInput.addEventListener('change', calculateTotalPrice);

    document.getElementById('pay-now-btn').addEventListener('click', function () {
        const pickupDate = new Date(document.getElementById('pickup_date').value);
        const returnDate = new Date(document.getElementById('return_date').value);
        const totalPrice = calculateTotalPrice();

        if (totalPrice === 0) {
            flasher.warning("Please select valid pickup and return dates.");
            return;
        }

        document.getElementById('total_price_value').value = totalPrice;

        fetch(`/check-car-availability?car_id=${carId}&start_date=${pickupDate.toISOString().split('T')[0]}&end_date=${returnDate.toISOString().split('T')[0]}`)
        .then(response => response.json())
        .then(data => {
            if (!data.available) {
                flasher.error('The car is already on lease during the selected dates. Please choose different dates.');
                return;
            }

            payWithPaystack(totalPrice, pickupDate, returnDate, dailyPrice);
        });
    });

    function payWithPaystack(totalPrice, pickupDate, returnDate, dailyPrice) {
        const paystack = new PaystackPop();

        paystack.newTransaction({
            key: paystackPublicKey,
            email: userEmail,
            amount: totalPrice * 100,
            currency: 'NGN',
            reference: 'CARBOOK_' + Math.floor((Math.random() * 1000000000) + 1),
            metadata: {
                custom_fields: [
                    {
                        display_name: "Car ID",
                        variable_name: "car_id",
                        value: carId
                    },
                    {
                        display_name: "Car Name",
                        variable_name: "car_name",
                        value: carName
                    },
                    {
                        display_name: "Start Date",
                        variable_name: "start_date",
                        value: pickupDate.toISOString().split('T')[0]
                    },
                    {
                        display_name: "End Date",
                        variable_name: "end_date",
                        value: returnDate.toISOString().split('T')[0]
                    },
                    {
                        display_name: "Daily Price",
                        variable_name: "daily_price",
                        value: dailyPrice
                    }
                ],
                description: `Payment for leasing car: {{ $car->name }} for ${Math.ceil(totalPrice / dailyPrice)} days`
            },
            onSuccess: function(response) {
                // Payment was successful
                document.getElementById('trx').value = response.reference;
                document.getElementById('booking-form').submit();
            },
            onCancel: function() {
                // Payment was canceled
                flasher.error('Transaction was not completed, please try again.');
            },
            onError: function(error) {
                // Handle the error that occurred during payment
                flasher.error(`Error occurred: ${error.message}`);
            }
        });
    }
});
