<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="{{ route('home') }}">{{ $title }}</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="{{ route('inicio') }}" class="nav-link">
            <i class="material-icons">unarchive</i> {{ __('Inicio') }}
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('quienes') }}" class="nav-link">
            <i class="material-icons">dashboard</i> {{ __('Quienes Somos') }}
          </a>
        </li>


        <li class="nav-item">
          <a href="{{ route('ayuda') }}" class="nav-link">
            <i class="material-icons">content_paste</i> {{ __('Ayuda') }}
          </a>
        </li>

       
       {{--<li class="nav-item{{ $activePage == 'register' ? ' active' : '' }}">
          <a href="{{ route('need') }}" class="nav-link">
            <i class="material-icons">person_add</i> {{ __('Ayuda') }}
          </a>
        </li>--}}

        <li class="nav-item{{ $activePage == 'login' ? ' active' : '' }}">
          <a href="{{ route('login') }}" class="nav-link">
            <i class="material-icons">fingerprint</i> {{ __('Login') }}
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->