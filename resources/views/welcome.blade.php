<x-layouts.app>
    <x-slot name="title">
        Dooty
    </x-slot>

    <x-slot name="content">
        <!-- Header -->
        <div class="w-4/5 md:w-1/2 my-10 mx-auto py-4 md:py-6 px-4 md:px-8 bg-background rounded-md shadow-sm">
            <h1 class="my-4 text-text text-3xl md:text-4xl poppins-bold">Dooty List</h1>
            <div class="flex flex-col lg:flex-row items-center gap-2">
                <p class="py-3 text-text open-sans-medium text-justify">
                    You can create a <span class="poppins-semibold text-primary">space</span> to manage your <span class="poppins-semibold text-primary">tasks</span> and share it with your <span class="poppins-semibold text-primary">friends</span>.<br>
                    You can create <span class="poppins-semibold text-primary">tasks</span>, edit them, delete them, and mark them as completed.<br>
                    Each <span class="poppins-semibold text-primary">space</span> has its own <span class="poppins-semibold text-primary">tasks</span> and <span class="poppins-semibold text-primary">members</span>.
                </p>
                <img class="w-40 sm:w-52 max-h-40 sm:max-h-52 scale-x-[-1]" src="{{ asset('images/marshmellow.png') }}">
            </div>
            <div>
                <a href="#" class="mt-4 py-2 px-4 inline-block bg-accent poppins-medium text-sm rounded-md shadow">Create a space</a>
            </div>
        </div>

        <!-- Spaces -->
        <div class="w-4/5 md:w-1/2 my-10 mx-auto py-4 md:py-6 px-4 md:px-8 bg-background rounded-md shadow-sm">
            <div class="mb-4 py-2 flex justify-between items-center">
                <h2 class="text-text text-xl md:text-2xl poppins-bold text-center">Space</h2>
                <p class="open-sans-medium text-sm">10/30/2024</p>
            </div>
            <div class="space-y-4 md:space-y-6">
                <!-- tags -->
                <div class="flex justify-start items-center flex-wrap gap-1">
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Work</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Productivity</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Science</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Fiction</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Finance</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Books</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Business</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Entrepreneur</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Coding</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Fitness</a>
                </div>
                <div class="flex justify-between items-center">
                    <!-- members -->
                    <div class="flex -space-x-2">
                        <img class="inline-block size-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Image Description">
                        <img class="inline-block size-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1531927557220-a9e23c1e4794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Image Description">
                        <img class="inline-block size-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1541101767792-f9b2b1c4f127?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&&auto=format&fit=facearea&facepad=3&w=300&h=300&q=80" alt="Image Description">
                    </div>
                    <!-- CTA view -->
                    <div>
                        <a href="#" class="poppins-medium text-accent text-sm animate-pulse">View space ></a>
                    </div>
                </div>
            </div>
        </div><!-- Spaces -->
        <div class="w-4/5 md:w-1/2 my-10 mx-auto py-4 md:py-6 px-4 md:px-8 bg-background rounded-md shadow-sm">
            <div class="mb-4 py-2 flex justify-between items-center">
                <h2 class="text-text text-xl md:text-2xl poppins-bold text-center">Space</h2>
                <p class="open-sans-medium text-sm">10/30/2024</p>
            </div>
            <div class="space-y-4 md:space-y-6">
                <!-- tags -->
                <div class="flex justify-start items-center flex-wrap gap-1">
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Work</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Productivity</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Science</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Fiction</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Finance</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Books</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Business</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Entrepreneur</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Coding</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Fitness</a>
                </div>
                <div class="flex justify-between items-center">
                    <!-- members -->
                    <div class="flex -space-x-2">
                        <img class="inline-block size-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Image Description">
                        <img class="inline-block size-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1531927557220-a9e23c1e4794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Image Description">
                        <img class="inline-block size-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1541101767792-f9b2b1c4f127?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&&auto=format&fit=facearea&facepad=3&w=300&h=300&q=80" alt="Image Description">
                    </div>
                    <!-- CTA view -->
                    <div>
                        <a href="#" class="poppins-medium text-accent text-sm animate-pulse">View space ></a>
                    </div>
                </div>
            </div>
        </div><!-- Spaces -->
        <div class="w-4/5 md:w-1/2 my-10 mx-auto py-4 md:py-6 px-4 md:px-8 bg-background rounded-md shadow-sm">
            <div class="mb-4 py-2 flex justify-between items-center">
                <h2 class="text-text text-xl md:text-2xl poppins-bold text-center">Space</h2>
                <p class="open-sans-medium text-sm">10/30/2024</p>
            </div>
            <div class="space-y-4 md:space-y-6">
                <!-- tags -->
                <div class="flex justify-start items-center flex-wrap gap-1">
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Work</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Productivity</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Science</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Fiction</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Finance</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Books</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Business</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Entrepreneur</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Coding</a>
                    <a href="#" class="py-1 px-2 text-text open-sans-medium text-xs bg-secondary rounded-full">Fitness</a>
                </div>
                <div class="flex justify-between items-center">
                    <!-- members -->
                    <div class="flex -space-x-2">
                        <img class="inline-block size-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Image Description">
                        <img class="inline-block size-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1531927557220-a9e23c1e4794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Image Description">
                        <img class="inline-block size-8 rounded-full ring-2 ring-white" src="https://images.unsplash.com/photo-1541101767792-f9b2b1c4f127?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&&auto=format&fit=facearea&facepad=3&w=300&h=300&q=80" alt="Image Description">
                    </div>
                    <!-- CTA view -->
                    <div>
                        <a href="#" class="poppins-medium text-accent text-sm animate-pulse">View space ></a>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-layouts.app>
