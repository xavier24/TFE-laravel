@layout('main')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    {{ Form::open('user/signup','POST',array('class'=>'well')) }}
        {{ Form::token() }}
        {{ Form::text('username',Input::old('username'),array('class'=>'input-xlarge','placeholder'=>'Votre pseudo') ) }}
        {{$errors->first('username','<span class="error">:message</span>')}}
        <br />
        {{ Form::text('email',Input::old('email'),array('class'=>'input-xlarge','placeholder'=>'Votre email') ) }}
        {{$errors->first('email','<span class="error">:message</span>')}}
        <br />
        {{ Form::password('password',array('class'=>'input-xlarge','placeholder'=>'Mot de passe') ) }}
        {{$errors->first('password','<span class="error">:message</span>')}}
        <br />
        {{ Form::password('password_confirmation',array('class'=>'input-xlarge','placeholder'=>'Confirmez mot de passe') ) }}
        {{$errors->first('password_confirmation','<span class="error">:message</span>')}}
        <br />
        {{ Form::submit( 'S\'inscrire',array('class'=>'btn') ) }}
    {{ Form::close() }}
@endsection