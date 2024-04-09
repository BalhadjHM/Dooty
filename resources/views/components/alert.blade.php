@if ($errors->any())
    <div class="w-4/5 md:w-1/2 my-10 mx-auto py-4 md:py-6 px-4 md:px-8 rounded-md bg-red-300 border border-red-600 text-sm text-red-800">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="flex-shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="m15 9-6 6"></path>
                    <path d="m9 9 6 6"></path>
                </svg>
            </div>
            <div class="ms-4">
                <h3 class="text-sm open-sans-semibold-semibold">
                    A problem has been occurred while submitting your data.
                </h3>
                <div class="mt-2 text-sm text-red-700">
                    <ul class="list-disc space-y-1 ps-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
