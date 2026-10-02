<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Vehículos - Claro</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --claro-red: #DA291C;
            --sidebar-color: #212529;
            --bg-canvas: #F4F6F9;
        }
        body { background-color: var(--bg-canvas); font-family: 'Segoe UI', sans-serif; margin: 0; padding: 0; }
        
        .sidebar { background-color: var(--sidebar-color); min-height: 100vh; box-shadow: 4px 0 10px rgba(0,0,0,0.1); }
        .nav-link { color: #adb5bd; padding: 15px 25px; border-left: 5px solid transparent; transition: 0.3s; text-decoration: none; display: block; }
        .nav-link.active { color: white; background: rgba(255,255,255,0.05); border-left: 5px solid var(--claro-red); }
        .card-table { border: none; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); }
        .btn-atlas { background: var(--claro-red); color: white; border-radius: 50px; padding: 10px 25px; font-weight: 600; border: none; transition: 0.3s; display: inline-block; }
        .btn-atlas:hover { background: #B22016; color: white; }
        .search-input { border-radius: 50px 0 0 50px !important; border-color: #dee2e6; padding-left: 20px; }
        .search-btn { border-radius: 0 50px 50px 0 !important; border-color: #dee2e6; background: white; color: var(--claro-red); }

        .badge-status {
            width: 50px !important; height: 24px !important;
            display: inline-flex !important; align-items: center; justify-content: center;
            padding: 0 !important; font-size: 0.75rem; font-weight: 700; text-transform: uppercase;
        }
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row g-0">
        <div class="col-md-2 d-none d-md-block sidebar">
        <div class="p-4 text-center"> <img src="{{ asset('images/logo_claro.png') }}" 
         alt="Logo Claro" 
         width="70" 
         class="d-block mx-auto mb-3"> 

    <div class="text-white small fw-bold mt-3">RETO CLARO LARAVEL </div>

</div>
            <nav class="nav flex-column mt-3">
                <a class="nav-link active" href="{{ route('vehiculos.index') }}">
                    <i class="bi bi-car-front-fill me-2"></i> Inventario
                </a>
            </nav>
        </div>

        <main class="col-md-10 px-md-5 py-5">
            @yield('content')
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')

</body>
</html>