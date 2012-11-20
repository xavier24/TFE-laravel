<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    {{HTML::style('css/bootstrap.css')}}
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          {{ HTML::link('/', 'Car-people',array('class'=>'brand')) }}
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Rechercher une annonce</a></li>
              <li>{{ HTML::link('annonce/add','Publier une annonce') }}</li>
              @if(Auth::guest() )
                <li>{{ HTML::link('user/signUp','Inscription') }}</li>
              @else
                <li>{{ HTML::link('user/'.Auth::User()->id,'Mon compte') }}</li>
              @endif
              <li><a href="#contact">Aide - FAQ</a></li>
              <li>{{ HTML::link('contact/','Contact') }}</li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div>
        @if(Auth::guest() )
        <p>{{ HTML::link('user/login','Connexion') }}</p>
        <p>{{ HTML::link('user/signUp','Inscription') }}</p>
        @else
        <p>{{ HTML::link('user/'.Auth::User()->id,'Mon compte') }}</p>
        <p>{{ HTML::link('user/logOut','Déconnexion') }}</p>
        @endif
    </div>
    <div class="container">
        @yield('content')
    </div> <!-- /container -->

    <!-- Le javascript-->
   {{HTML::script('js/bootstrap.js')}}

  </body>
</html>
