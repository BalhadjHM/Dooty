@php
    use Illuminate\Support\Facades\Auth;
    $userId = Auth::id();
@endphp


<x-layouts.app>
    <x-slot name="title">
        Create Dooty Task
    </x-slot>

    <x-slot name="content">
        <x-alert />

        <x-container>
            <x-form-container>
                <x-slot name="image">
                    <img class="mx-auto w-40 sm:w-52 max-h-40 sm:max-h-52" src="{{ asset('images/marshmallow 5.png') }}" alt="Logo">
                </x-slot>
                <x-slot name="title">
                    Add Task
                </x-slot>
                <x-slot name="form">
                    <form action="{{ route('task.store', ['userId' => $userId, 'spaceId' => $spaceId]) }}" method="POST" class="space-y-2 md:space-y-2">
                        @csrf
                        <x-input label="Title" name="title" type="text" />
                        <x-input label="Description" name="description" type="textarea" />
                        <x-input label="Due Date" name="due_date" type="date" />
                        <div>
                            <button type="submit" class=" mt-2 py-2 px-4 bg-accent poppins-medium text-sm rounded-md shadow">Add</button>
                            <a href="{{ route('task.index', ['userId' => $userId, 'spaceId' => $spaceId]) }}" class="block sm:inline mt-4 sm:mt-0 sm:ml-8 text-center sm:text-start open-sans-medium text-xs text-primary hover:underline underline-offset-2">Return to dashboard</a>
                        </div>
                    </form>
                </x-slot>
            </x-form-container>
        </x-container>
    </x-slot>
</x-layouts.app>
