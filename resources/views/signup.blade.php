<x-layouts.app>
    <x-slot name="title">
        Sign Up
    </x-slot>

    <x-slot name="content">
        <x-alert />
        <div class="w-4/5 md:w-1/2 my-10 mx-auto py-4 md:py-6 px-4 md:px-8 bg-background rounded-md shadow-sm">
            <div class="xl:h-[70%] flex flex-col xl:flex-row items-center xl:space-x-12">
                <div class="w-full h-full xl:basis-1/3 flex items-center bg-accent rounded-md">
                    <img class="mx-auto w-40 sm:w-52 max-h-40 sm:max-h-52" src="{{ asset('images/marshmallow 1.png') }}" alt="Logo">
                </div>
                <div class="py-2 w-full xl:basis-2/3 space-y-4">
                    <h1 class="my-2 text-text text-2xl sm:text-3xl poppins-bold">Sign Up</h1>
                    <form action="{{ route('user.store') }}" method="POST" class="space-y-2 md:space-y-2">
                        @csrf
                        <div class="flex flex-col gap-1">
                            <label for="name" class="open-sans-medium text-text text-sm">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="py-2 px-2 bg-background text-text open-sans-medium text-sm rounded-md border-text focus:border-accent focus:ring-1 focus:ring-accent">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="email" class="open-sans-medium text-text text-sm">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="py-2 px-2 bg-background text-text open-sans-medium text-sm rounded-md border-text focus:border-accent focus:ring-1 focus:ring-accent">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="password" class="open-sans-medium text-text text-sm">Password</label>
                            <input type="password" name="password" id="password" class="py-2 px-2 bg-background text-text open-sans-medium text-sm rounded-md border-text focus:border-accent focus:ring-1 focus:ring-accent">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="password_confirmation" class="open-sans-medium text-text text-sm">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="py-2 px-2 bg-background text-text open-sans-medium text-sm rounded-md border-text focus:border-accent focus:ring-1 focus:ring-accent">
                        </div>
                        <div>
                            <button type="submit" class=" mt-2 py-2 px-4 bg-accent poppins-medium text-sm rounded-md shadow">Sign Up</button>
                            <a href="{{ route('user.login') }}" class="block sm:inline mt-4 sm:mt-0 sm:ml-8 text-center sm:text-start open-sans-medium text-xs text-primary hover:underline underline-offset-2">Already have an account?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-layouts.app>
