@layout('main')
@section('content')
    @if('content')
        @foreach($annonces as $annonce)
            <h2>Départ : {{$annonce->depart}}</h2>
            <h2>Arrivée : {{$annonce->arrivee}}</h2>
            <p>le {{$annonce->date}}</p>
            <p><a href="{{URL::base().'/annonce/lire/'.Str::slug($annonce->depart.'-'.$annonce->arrivee).'/'.$annonce->id}}">Voir l'annonce</a></p>
            <p>Par <a href="{{URL::base().'/annonce/user/'.Str::slug($annonce->user->username).'/'.$annonce->user->id}}">{{$annonce->user->username}}</a></p>
            <hr />
        @endforeach
    @endif
@endsection