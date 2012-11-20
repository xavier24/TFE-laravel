@layout('main')
@section('content')
    @if($annonce)
    <article>
        <h1>{{$annonce->depart}} - {{$annonce->arrivee}}</h1>
            <h5>Départ : {{$annonce->depart}}</h5>
            <h5>Arrivée : {{$annonce->arrivee}}</h5>
            <p>le {{$annonce->date}}</p>
            <p>Avec <a href="{{URL::base().'/annonce/user/'.Str::slug($annonce->user->username).'/'.$annonce->user->id}}">{{$annonce->user->username}}</a></p>
            <hr />
    </article>
    @endif
@endsection