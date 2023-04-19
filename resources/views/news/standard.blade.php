<h1>Liste des News</h1>

@forelse ($actus as $itemActus)
    <h3>{{ Str::limit($itemActus->titre, 20) }}</h3>
    <a href="{{ route('news.standardDetail', $itemActus) }}"></a>
@empty
    <p>Pas de news</p>
@endforelse