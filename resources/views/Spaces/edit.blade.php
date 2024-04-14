@php
    use Illuminate\Support\Facades\Auth;
    $userId = Auth::id();
@endphp


<x-layouts.app>
    <x-slot name="title">
        Edit Dooty Space
    </x-slot>

    <x-slot name="content">
        <x-alert />

        <x-container>
            <x-form-container>
                <x-slot name="image">
                    <img class="mx-auto w-40 sm:w-52 max-h-40 sm:max-h-52" src="{{ asset('images/marshmallow 4.png') }}" alt="Logo">
                </x-slot>
                <x-slot name="title">
                    Edit Space
                </x-slot>
                <x-slot name="form">
                    <form action="{{ route('space.update', ['userId' => $userId, 'spaceId' => $space->id]) }}" method="POST" class="space-y-2 md:space-y-2">
                        @csrf
                        @method('PUT')
                        <x-input label="Title" name="title" type="text" value="{{ $space->title }}"/>
                        <x-input label="Description" name="description" type="textarea" value="{{ $space->description }}"/>
                        <x-input label="Tags" name="tags" type="text">
                            <input type="hidden" name="tagsArray" id="tagsArray">
                            <div id="output" class="max-h-20 mt-1 flex justify-start items-center flex-wrap gap-0.5 overflow-y-scroll"></div>
                            <p class="mb-1 text-gray-500 text-xs open-sans-medium">Use spaces to separate between tags!</p>
                        </x-input>
                        <div>
                            <button type="submit" class=" mt-2 py-2 px-4 bg-accent poppins-medium text-sm rounded-md shadow">Submit</button>
                            <a href="{{ route('user.index', ['userId' => $userId]) }}" class="block sm:inline mt-4 sm:mt-0 sm:ml-8 text-center sm:text-start open-sans-medium text-xs text-primary hover:underline underline-offset-2">Return to dashboard</a>
                        </div>
                    </form>
                </x-slot>
            </x-form-container>
        </x-container>
    </x-slot>
</x-layouts.app>
