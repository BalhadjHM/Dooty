@php
    use Illuminate\Support\Facades\Auth;
    $userId = Auth::id();
@endphp

@if($userId)
    <x-layouts.app>
        <x-slot name="title">
            Tasks
        </x-slot>

        <x-slot name="content">
            <!-- Success Message -->
            <x-success/>

            <div
                class="w-4/5 md:w-1/2 my-10 mx-auto py-4 md:py-6 px-4 md:px-8 flex flex-col items-center justify-center bg-background rounded-md shadow-sm">
                <!-- Search bar -->
                <x-search/>
                <!-- Create -->
                <a href="{{ route('space.create', ['userId' => $userId]) }}" class="py-2 px-4 bg-accent poppins-medium text-sm rounded-md shadow">Create a Task</a>
            </div>

            <!-- Tasks -->

        </x-slot>
    </x-layouts.app>
@else
    <!-- Redirect to log in-->
    {{ redirect()->route('user.login') }}
@endif
