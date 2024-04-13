<div class="hs-tooltip inline-block [--placement:bottom]">
    {{ $slot }}
    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-background text-xs open-sans-regular-medium text-primary rounded-md border border-primary shadow-sm" role="tooltip">
        {{ $message }}
    </span>
</div>
