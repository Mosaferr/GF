@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
    {{-- <ul {{ $attributes->merge(['class' => 'text-sm text-yellow-600 yellow-text space-y-1']) }}> --}}
            @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
