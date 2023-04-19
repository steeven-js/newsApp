<!-- component -->
<!-- This is an example component -->
<div class="max-w-2xl mx-auto">
    <div class="bg-white shadow-md border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img src="{{ Storage::url($show->image) }}" alt="">
        </a>
        <div class="p-5">
            <a href="#">
                <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 dark:text-white">{{ $show->titre }}</h5>
            </a>
            <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">{{ $show->description }}</p>
        </div>
        <div
            class="ml-4 text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-green-200 text-green-700 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-arrow-right mr-2">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
            {{ $show->category->name }}
        </div>
    </div>
</div>
