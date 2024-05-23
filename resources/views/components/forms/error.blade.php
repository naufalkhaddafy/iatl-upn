@props(['messages'])

@if ($messages)
    <span {{ $attributes->merge(['class' => 'text-danger p-2']) }}>
        @foreach ((array) $messages as $message)
            {{ $message }}
        @endforeach
    </span>
@endif
