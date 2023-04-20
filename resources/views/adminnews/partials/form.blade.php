<form action="{{ !empty($actu) ? route('news.edit', $actu->id) : route('news.add') }}" method="POST"
    enctype="multipart/form-data">
    {{-- @dd($actu) --}}
    @csrf
    <div class="mb-5">
        <label for="titre" class="mb-3 block text-base font-medium text-[#07074D]">
            Titre
        </label>
        <input type="text" name="titre" placeholder="Sasissez un titre" value="{{ !empty($actu) ? $actu->titre : '' }}"
            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
    </div>
    <div class="mb-5">
        <label for="image" class="mb-3 block text-base font-medium text-[#07074D]">
            Ajouter une image
        </label>
        @isset($actu)
            <div class="relative h-20 w-20">
                <img class="h-full w-full object-cover object-center" src="{{ Storage::url($actu->image) }}"
                    alt="" />
            </div>
        @endisset
        <input type="file" name="image" placeholder="Ajouter une image"
            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
    </div>
    <div class="mb-5">
        <label for="description" class="mb-3 block text-base font-medium text-[#07074D]">
            Description
        </label>
        <textarea rows="4" name="description" placeholder="Description"
            class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">{{ !empty($actu) ? $actu->description : '' }}</textarea>
    </div>

    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selectionner une catégorie</label>

    <select name="category"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @forelse ($categories as $itemCategory)
            @if (!empty($actu) && $itemCategory->id == $actu->category->id)
                <option value="{{ $itemCategory->id }}" selected>{{ $itemCategory->name }}</option>
            @else
                <option value="{{ $itemCategory->id }}">{{ $itemCategory->name }}</option>
            @endif

        @empty
        @endforelse

    </select>

    <div class="mt-3">
        <button
            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
            {{ !empty($actu) ? 'Modifier' : 'Ajouter' }}
        </button>
    </div>
    {{-- @dd($categories) --}}
</form>
