# CarBook

CarBook is a Laravel-based car leasing management system. It allows users to book cars, and provides features for managing cars, user administration, and handling bookings.

## Features

- User registration and authentication
- Car management (CRUD operations for cars, brands, and models)
- Booking system with availability checks and status updates (confirmed, canceled, completed)
- Paystack integration for payment processing
- Admin dashboard for managing bookings, cars, users, and more

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/dsoft02/CarBook.git
   ```

2. Navigate to the project directory:
   ```bash
   cd CarBook
   ```

3. Install dependencies:
   ```bash
   composer install
   npm install
   npm run dev
   ```

4. Configure the environment:
   - Copy `.env.example` to `.env` and update the database, mail, and Paystack configurations.

5. Generate the application key:
   ```bash
   php artisan key:generate
   ```

6. Run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```

7. Start the development server:
   ```bash
   php artisan serve
   ```

## Usage

- Access the application at `http://localhost:8000`.
- Log in as an admin to access the dashboard and manage bookings, cars, and users.

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request.

## License

This project is open-source and available under the [MIT License](LICENSE).
