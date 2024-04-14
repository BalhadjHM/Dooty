<div class="flex flex-col gap-1">
    <label for="{{ $name }}" class="open-sans-medium text-text text-sm">{{ $label }}</label>
    @if ($type === 'textarea')
        <textarea name="{{ $name }}" id="{{ $name }}" class="py-2 px-2 resize-none bg-background text-text open-sans-medium text-sm rounded-md border-text focus:border-accent focus:ring-1 focus:ring-accent">{{ $value ?? old($name) }}</textarea>
    @else
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value ?? old($name) }}" class="py-2 px-2 bg-background text-text open-sans-medium text-sm rounded-md border-text focus:border-accent focus:ring-1 focus:ring-accent">
    @endif
    {{ $slot }}
</div>
