@php
    use Illuminate\Support\Facades\Auth;
    $userId = Auth::id();
    use Carbon\Carbon;
@endphp


<x-layouts.app>
    <x-slot name="title">
        Edit Dooty Task
    </x-slot>

    <x-slot name="content">
        <x-alert />

        <x-container>
            <x-form-container>
                <x-slot name="image">
                    <img class="mx-auto w-40 sm:w-52 max-h-40 sm:max-h-52" src="{{ asset('images/marshmallow 6.png') }}" alt="Logo">
                </x-slot>
                <x-slot name="title">
                    Edit Task
                </x-slot>
                <x-slot name="form">
                    <form action="{{ route('task.update', ['userId' => $userId, 'spaceId' => $spaceId, 'taskId' => $task->id]) }}" method="POST" class="space-y-2 md:space-y-2">
                        @csrf
                        @method('PUT')
                        <x-input label="Title" name="title" type="text" value="{{ $task->title }}" />
                        <x-input label="Description" name="description" type="textarea" value="{{ $task->description }}" />
                        <x-input label="Due Date" name="due_date" type="date" value="{{ Carbon::parse($task->due_date)->format('Y-m-d') }}"/>
                        <div>
                            <button type="submit" class=" mt-2 py-2 px-4 bg-accent poppins-medium text-sm rounded-md shadow">Update</button>
                            <a href="{{ route('task.index', ['userId' => $userId, 'spaceId' => $spaceId]) }}" class="block sm:inline mt-4 sm:mt-0 sm:ml-8 text-center sm:text-start open-sans-medium text-xs text-primary hover:underline underline-offset-2">Return to dashboard</a>
                        </div>
                    </form>
                </x-slot>
            </x-form-container>
        </x-container>
    </x-slot>
</x-layouts.app>
