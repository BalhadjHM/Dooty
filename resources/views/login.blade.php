<x-layouts.app>
    <x-slot name="title">
        Dooty Access | Login
    </x-slot>

    <x-slot name="content">
        <!-- Alert message -->
        <x-alert />

        <!-- success message -->
        <x-success />

        <x-container>
            <x-form-container>
                <x-slot name="image">
                    <img class="mx-auto w-40 sm:w-52 max-h-40 sm:max-h-52" src="{{ asset('images/marshmallow 2.png') }}" alt="Logo">
                </x-slot>
                <x-slot name="title">
                    Login
                </x-slot>
                <x-slot name="form">
                    <form action="{{ route('user.authenticate') }}" method="POST" class="space-y-2 md:space-y-2">
                        @csrf
                        <x-input label="Email" name="email" type="email" />
                        <x-input label="Password" name="password" type="password" />
                        <div>
                            <button type="submit" class=" mt-2 py-2 px-4 bg-accent poppins-medium text-sm rounded-md shadow">Login</button>
                            <a href="{{ route('user.signup') }}" class="block sm:inline mt-4 sm:mt-0 sm:ml-8 text-center sm:text-start open-sans-medium text-xs text-primary hover:underline underline-offset-2">Don't have an account? Register here</a>
                        </div>
                    </form>
                </x-slot>
            </x-form-container>
        </x-container>
    </x-slot>
</x-layouts.app>
