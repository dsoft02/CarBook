@props(['messages'])

@if ($messages && count($messages) > 0)
    <ul {{ $attributes->merge(['class' => 'mb-0']) }}>
        @foreach ((array) $messages as $message)
            <li class="text-danger">{{ $message }}</li>
        @endforeach
    </ul>
@endif
