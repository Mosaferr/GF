@props(['status'])

@if ($status)
    {{-- <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}> --}}
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 yellow-text']) }}>
        {{ $status }}
    </div>
@endif
