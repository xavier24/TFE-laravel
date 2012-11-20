@layout('main')
@section('content')
    @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <h2>Contact</h2>
    {{ Form::open('contact','POST',array('class'=>'well') ) }}
    {{ Form::token() }}
    
    {{ Form::text('nom',Input::old('nom'),array('class'=>'input-xlarge','placeholder'=>'Nom') )}}
    {{ $errors->first('nom','<span class="error">:message</span>') }}
    <br />
    {{ Form::text('email',Input::old('email'),array('class'=>'input-xlarge','placeholder'=>'Email') )}}
    {{ $errors->first('email','<span class="error">:message</span>') }}
    <br />
    {{ Form::textarea('message',Input::old('message'),array('placeholder'=>'Votre message') ) }}
    {{ $errors->first('message','<span class="error">:message</span>' ) }}
    <br />
    {{ Form::submit('Envoyer',array('class'=>'btn') ) }}
    
    {{ Form::close() }}
@endsection