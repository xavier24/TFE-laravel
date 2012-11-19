@layout('main')
@section('content')
    @if('content')
        @foreach($annonces as $annonce)
            <h2>Départ : {{$annonce->depart}}</h2>
            <h2>Arrivée : {{$annonce->arrivee}}</h2>
            <p>le {{$annonce->date}}</p>
            <p>Par {{$annonce->user->username}}</p>
            <hr />
        @endforeach
    @endif
@endsection