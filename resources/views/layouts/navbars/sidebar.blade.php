<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/login.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Creative Tim') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
     

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/user.png"></i>
          <p>{{ __('USUARIOS') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('user.create') }}">
                <i><img style="width:25px" src="{{ asset('material') }}/img/crear_user.png"></i>
                <span class="sidebar-normal">{{ __('Crear Usuarios') }} </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{ route('user.index') }}">
                <i><img style="width:25px" src="{{ asset('material') }}/img/listar_user.png"></i>
                <span class="sidebar-normal"> {{ __('Listar Usuarios') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>




      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/finca.png"></i>
          <p>{{ __('CRITERIO 1 RETORNO') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">

           
            
            <li class="nav-item">
              <a class="nav-link" href="{{ route('unidad.index') }}">
                <i><img style="width:25px" src="{{ asset('material') }}/img/regist_finc.png"></i>
                <span class="sidebar-normal"> {{ __('REGISTRO UNIDAD') }} </span>
              </a>
            </li>

            
      <li class="nav-item">
        <a class="nav-link" href="{{ route('valor.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Valor Presente Neto') }}</p>
        </a>
      </li>
          </ul>
        </div>
      </li>



      
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/finca.png"></i>
          <p>{{ __('CRITERIO 2 EFICIENCIA') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">

            

      <li class="nav-item">
        <a class="nav-link" href="{{ route('beneficio.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Beneficio Costo') }}</p>
        </a>
      </li>

           
            
          </ul>
        </div>
      </li>




      
      
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/finca.png"></i>
          <p>{{ __('CRITERIO 3 CONSERVACION') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">

            
            
      <li class="nav-item">
        <a class="nav-link" href="{{ route('cobertura.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Cobertura Vegetal') }}</p>
        </a>
      </li>


      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('plagas.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Plagas Enfermedades') }}</p>
        </a>
      </li>


      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('agua.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Agua por Superficie') }}</p>
        </a>
      </li>


      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('calidades.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Calidad Del Suelo') }}</p>
        </a>
      </li>
           
            
          </ul>
        </div>
      </li>






      
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/finca.png"></i>
          <p>{{ __('CRITERIO 4 DIVERSIDAD') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">

            
            <li class="nav-item">
        <a class="nav-link" href="{{ route('riquezas.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Riqueza Diversidad') }}</p>
        </a>
      </li>


      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('semillas.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Uso semillas Locales') }}</p>
        </a>
      </li>   
          </ul>
        </div>
      </li>





      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/finca.png"></i>
          <p>{{ __('CRITERIO 5 PARTICIPACION') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">

            

            <li class="nav-item">
        <a class="nav-link" href="{{ route('empleos.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Empleos Requeridos') }}</p>
        </a>
      </li>

      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('organizacion.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Participacion En Organizaciones') }}</p>
        </a>
      </li>            
          </ul>
        </div>
      </li>





      
      
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/finca.png"></i>
          <p>{{ __('CRITERIO 6 INNOVACION') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">

            

            <li class="nav-item">
        <a class="nav-link" href="{{ route('innovacion.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Innovacion Tecnologia') }}</p>
        </a>
      </li>


      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('capacitacion.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Capacitacion y Gestion  ') }}</p>
        </a>
      </li>

           
            
          </ul>
        </div>
      </li>





      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/finca.png"></i>
          <p>{{ __('CRITERIO 7 Suficiencia Del Agroecosistema') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">

            

            <li class="nav-item">
        <a class="nav-link" href="{{ route('dependencias.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Dependencias a Insumos') }}</p>
        </a>
      </li>


      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('ahorros.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Ahorro Interno ') }}</p>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('alimentarias.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Seguridad Alimentaria ') }}</p>
        </a>
      </li>

           
            
          </ul>
        </div>
      </li>


      
      
      

      
   
     


    </ul>
  </div>
</div>
