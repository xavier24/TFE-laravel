@layout('main')
@section('content')
@if(Session::has('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif

    <h2>Publier une annonce</h2>
    {{ Form::open('annonce/add','POST',array('class'=>'well') ) }}
    {{ Form::token() }}
    
    {{ Form::text('depart',Input::old('depart'),array('class'=>'input-xxlarge','placeholder'=>'Départ') )}}
    {{ $errors->first('depart','<span class="error">:message</span>') }}
    <br />
    {{ Form::text('arrivee',Input::old('arrivee'),array('class'=>'input-xxlarge','placeholder'=>'Arrivée') )}}
    {{ $errors->first('arrivee','<span class="error">:message</span>') }}
    <br />
    {{ Form::textarea('description',Input::old('description'),array('class'=>'input-xxlarge','placeholder'=>'Votre description') ) }}
    {{ $errors->first('description','<span class="error">:message</span>' ) }}
    <br />
    {{ Form::submit('Envoyer',array('class'=>'btn') ) }}
    
    {{ Form::close() }}
@endsection