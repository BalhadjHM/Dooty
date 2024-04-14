<div id="dropdown" class="hs-dropdown relative inline-flex">
    <button id="hs-dropdown-custom-icon-trigger" type="button" class="hs-dropdown-toggle flex justify-center items-center size-9 text-sm font-semibold rounded-lg border border-gray-200 bg-b text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
        <svg class="flex-none size-4 text-gray-600" xmlns="http://www.w3.org/2000/svg"
             width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="1"/>
            <circle cx="12" cy="5" r="1"/>
            <circle cx="12" cy="19" r="1"/>
        </svg>
    </button>
    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-36 bg-background shadow-md rounded-lg p-2 mt-2" aria-labelledby="hs-dropdown-custom-icon-trigger">
        {{ $slot }}
    </div>
</div>
