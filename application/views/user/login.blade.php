@layout('main')
@section('content')
    @if(Session::has('login_errors'))
        <div class="alert alert-error">Mauvais identifiant</div>
    @endif
    {{ Form::open('user/login','POST',array('class'=>'well form-inline')) }}
        {{ Form::token() }}
        {{ Form::text('username',Input::old('username'),array('class'=>'input-xlarge','placeholder'=>'Email') ) }}
        {{$errors->first('username','<span class="error">:message</span>')}}
        
        {{ Form::password('password',array('class'=>'input-xlarge','placeholder'=>'Mot de passe') ) }}
        {{$errors->first('password','<span class="error">:message</span>')}}
        
        {{ Form::submit( 'Connexion',array('class'=>'btn') ) }}
    {{ Form::close() }}
@endsection