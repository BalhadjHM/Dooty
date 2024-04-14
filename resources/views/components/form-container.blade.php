<div class="xl:h-[60%] flex flex-col xl:flex-row items-center xl:space-x-12">
    <div class="w-full h-full xl:basis-1/3 flex items-center bg-accent rounded-md">
        {{ $image }}
    </div>
    <div class="py-2 w-full xl:basis-2/3 space-y-4">
        <h1 class="my-2 text-text text-2xl sm:text-3xl poppins-bold">{{ $title }}</h1>
        {{ $form }}
    </div>
</div>
