<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tu Tienda de Ropa</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>
  .dropdown-menu{
    max-height: 200px;
    overflow-y: scroll;
}
</style>

<body class="bg-light"> 
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('inicio') }}">BCDPKLK</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <i class="bi bi-cart"></i>
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('inicio') }}">Inicio </a> {{-- <span class="sr-only">(current)</span> --}}
            </li>
           
          </ul>
          <ul class="navbar-nav mr-auto">
            @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->nombre }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @if (auth()->user() && (auth()->user()->perfil_id == 1))
                <a class="dropdown-item" href="{{ route('vestimentas.create') }}">Agregar ropa</a>
                <a class="dropdown-item" href="{{ route('admin.show.vestimenta') }}">Listar vestimentas</a>
                
                
                  
               
                <a class="dropdown-item" href="{{route('logout')}}">Cerrar sesión</a>
                @else
                <a class="dropdown-item" href="#">Opcion 1</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('logout')}}">Cerrar sesión</a>
                @endif
              </div>
            </li>
            @endauth
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{route('show.login')}}">Iniciar sesión</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('show.register')}}">Registrar</a>
            </li>
            @endguest
          </ul>
          @auth
          <div class="dropdown">
            
            <button class="btn btn-primary dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="material-symbols-outlined">
                shopping_cart
              </span>
              Carrito de compras
            </button>
            <ul class="dropdown-menu">
              @if (!empty($carrito))
                <ul class="list-group">
                    @foreach ($carrito as $item)
                        <li class="list-group-item">{{ $item['detalleVestimenta']->id }}.- {{ $item['detalleVestimenta']->vestimenta->nombre }}: {{ $item['cantidad'] }}</li>
                    @endforeach
                </ul>
              @else
                <li><a class="dropdown-item" href="#">No hay elementos en el carrito</a></li>
              @endif
            </ul>
          </div>
          @endauth
        </div>
      </div>
    </nav>

    <div class="container mt-5">
      @yield('contenido-principal')  
    </div>

{{-- 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyWkE4I/8Z6vfa+nEmtH8Wr7kiCfIiW2fG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
    crossorigin="anonymous">
  </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script> --}}

</body>
</html>
