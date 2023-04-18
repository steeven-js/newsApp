<!-- component -->
<!-- This is an example component -->
<div class="max-w-2xl mx-auto">
    <div class="bg-white shadow-md border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <img src="{{ Storage::url($onenews->image) }}" alt=""> 
        </a>
        <div class="p-5">
            <a href="#">
                    <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2 dark:text-white">{{ $onenews->titre }}</h5>
                </a>
                <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">{{ $onenews->description }}</p>
        </div>
    </div>
</div>
