@layout('main')
@section('content')
    @if($user)
        <h1>Trajets proposés</h1>
        @foreach($user->annonces as $annonce)
            <h2><a href="{{URL::base().'/annonce/lire/'.Str::slug($annonce->depart.'-'.$annonce->arrivee).'/'.$annonce->id}}">{{$annonce->depart}} - {{$annonce->arrivee}}</a></h2>
        @endforeach
    @endif
@endsection