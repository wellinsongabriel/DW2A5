<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <!--Fonte do Googgle-->
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <!--CSS Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        
        <link rel="stylesheet" href="/css/styles.css">
       <script src="/js/scripts.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg bg-light">                    
                <div class="container-fluid"> 
                    
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <a class="navbar-brand" href="/">
                      <img src="/img/logo.png" alt="" width="30">
                    </a> 
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link"  href="/">Eventos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/eventos/criar">Criar Eventos</a>
                      </li>
                      @auth
                      <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Meus eventos</a>
                      </li>
                      <li class="nav-item">
                        <form action="/logout" method="POST">
                          @csrf
                          <a href="/logout" class="nav-link" 
                          onclick="event.preventDefault();
                          this.closest('form').submit();">
                            Sair
                          </a>
                        </form>
                      </li>
                      @endauth
                      @guest                          
                      <li class="nav-item">
                        <a class="nav-link" href="/login">Entrar</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/register">Cadastrar</a>
                      </li>
                      @endguest
                    </ul>
                  </div>
                </div>
              </nav>
        </header>
      <main>
          <div class="container-fluid">
            <div class="row">
              @if (session('msg'))
                  <p class="msg">{{session('msg')}}</p>
              @endif
              @yield('content')
            </div>
          </div>
      </main>    
    </body>
    <footer>
        <p>WCG Eventos &copy; 2022</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</html>
