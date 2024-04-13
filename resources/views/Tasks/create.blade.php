<x-layouts.app>
    <x-slot name="title">
        Create Dooty Task
    </x-slot>

    <x-slot name="content">
        <x-alert />

        <div class="w-4/5 md:w-1/2 my-10 mx-auto py-4 md:py-6 px-4 md:px-8 bg-background rounded-md shadow-sm">
            <div class="xl:h-[60%] flex flex-col xl:flex-row items-center xl:space-x-12">
                <div class="w-full h-full xl:basis-1/3 flex items-center bg-accent rounded-md">
                    <img class="mx-auto w-40 sm:w-52 max-h-40 sm:max-h-52" src="{{ asset('images/marshmallow 5.png') }}" alt="Logo">
                </div>
                <div class="py-2 w-full xl:basis-2/3 space-y-4">
                    <h1 class="my-2 text-text text-2xl sm:text-3xl poppins-bold">Add Task</h1>
                    @php
                        $userId = Auth::id();
                    @endphp
                    <form action="{{ route('task.store', ['userId' => $userId, 'spaceId' => $spaceId]) }}" method="POST" class="space-y-2 md:space-y-2">
                        @csrf
                        <div class="flex flex-col gap-1">
                            <label for="title" class="open-sans-medium text-text text-sm">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="py-2 px-2 bg-background text-text open-sans-medium text-sm rounded-md border-text focus:border-accent focus:ring-1 focus:ring-accent">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="description" class="open-sans-medium text-text text-sm">Description</label>
                            <textarea name="description" id="description" class="py-2 px-2 resize-none bg-background text-text open-sans-medium text-sm rounded-md border-text focus:border-accent focus:ring-1 focus:ring-accent">{{ old('description') }}</textarea>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="due_date" class="open-sans-medium text-text text-sm">Due Date</label>
                            <input type="date" name="due_date" id="due_date" class="py-2 px-2 bg-background text-text open-sans-medium text-sm rounded-md border-text focus:border-accent focus:ring-1 focus:ring-accent">
                        </div>
                        <div>
                            <button type="submit" class=" mt-2 py-2 px-4 bg-accent poppins-medium text-sm rounded-md shadow">Add</button>
                            <a href="{{ route('task.index', ['userId' => $userId, 'spaceId' => $spaceId]) }}" class="block sm:inline mt-4 sm:mt-0 sm:ml-8 text-center sm:text-start open-sans-medium text-xs text-primary hover:underline underline-offset-2">Return to dashboard</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-layouts.app>
