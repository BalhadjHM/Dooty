<x-layouts.app>
    <x-slot name="title">
        Dooty Hub
    </x-slot>

    <x-slot name="content">
        <!-- Header -->
        <div class="w-4/5 md:w-1/2 my-10 mx-auto py-4 md:py-6 px-4 md:px-8 bg-background rounded-md shadow-sm">
            <h1 class="my-4 text-text text-3xl md:text-4xl poppins-bold">Dooty List</h1>
            <div class="flex flex-col lg:flex-row items-center gap-2 lg:gap-x-12">
                <p class="py-3 text-text open-sans-medium text-justify">
                    You can create a <span class="poppins-semibold text-primary">space</span> to manage your <span class="poppins-semibold text-primary">tasks</span> and share it with your <span class="poppins-semibold text-primary">friends</span>.<br>
                    You can create <span class="poppins-semibold text-primary">tasks</span>, edit them, delete them, and mark them as completed.<br>
                    Each <span class="poppins-semibold text-primary">space</span> has its own <span class="poppins-semibold text-primary">tasks</span> and <span class="poppins-semibold text-primary">members</span>.
                </p>
                <img class="w-40 sm:w-52 max-h-40 sm:max-h-52 scale-x-[-1]" src="{{ asset('images/marshmellow.png') }}" alt="Logo">
            </div>
            <div>
                <a href="{{ route('user.signup') }}" class="mt-4 py-2 px-4 inline-block bg-accent poppins-medium text-sm rounded-md shadow">Get Started</a>
            </div>
        </div>
    </x-slot>
</x-layouts.app>
