<x-app-layout>
    {{-- @dd($categories) --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center">
                @forelse ($categories as $itemcategories)   
                    <a href="{{ route('news.category', $itemcategories->id) }}" class="mr-5">
                        {{ $itemcategories->name }}
                    </a>
                @empty
                @endforelse
            </div>

            <h1>Liste des News</h1>
            {{ $actus->links() }}
            @forelse ($actus as $itemActus)
                <a href="{{ route('news.standardDetail', $itemActus) }}">
                    <h3>{{ Str::limit($itemActus->titre, 20) }}</h3>
                </a>
            @empty
                <p>Pas de news</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
