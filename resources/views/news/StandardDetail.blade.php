<h1>{{ $actu->titre }}</h1>
<p>{{ $actu->description }}</p>
{{-- @dd($actu) --}}
Auteur :{{ $actu->user->email }}
Categorie :{{ $actu->category->name }}