<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Vehículo - Reto Claro</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --claro-red: #DA291C; 
            --claro-red-hover: #B22016;
            --bg-canvas: #F4F6F9;
            --sidebar-color: #212529;
        }

        body { 
            background-color: var(--bg-canvas); 
            font-family: 'Segoe UI', Roboto, sans-serif; 
        }

        .sidebar { 
            background-color: var(--sidebar-color); 
            min-height: 100vh; 
            box-shadow: 4px 0 10px rgba(0,0,0,0.1);
        }
        
        .brand-container {
            padding: 30px 15px;
            text-align: center;
        }

        .brand-text {
            color: #ffffff;
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 1.2px;
            margin-top: 15px;
            text-transform: uppercase;
        }

        .nav-link {
            color: #adb5bd;
            padding: 15px 25px;
            border-left: 5px solid transparent;
            transition: all 0.3s;
        }

        .nav-link:hover, .nav-link.active {
            color: #ffffff;
            background-color: rgba(255,255,255,0.05);
            border-left: 5px solid var(--claro-red);
        }

        .card-atlas { 
            border: none; 
            border-radius: 15px; 
            overflow: hidden; 
            box-shadow: 0 4px 20px rgba(0,0,0,0.08); 
        }
        
        .card-header-atlas { 
            background-color: var(--claro-red); 
            color: white; 
            padding: 20px; 
            border: none; 
            text-align: center; 
        }
        
        .btn-atlas { 
            background-color: var(--claro-red); 
            color: white; 
            border: none; 
            border-radius: 50px; 
            padding: 10px 30px; 
            font-weight: 600; 
            box-shadow: 0 4px 10px rgba(218, 41, 28, 0.2); 
            transition: all 0.3s ease; 
            width: auto; 
            display: inline-block;
        }
        
        .btn-atlas:hover { 
            background-color: var(--claro-red-hover); 
            transform: translateY(-1px); 
            color: white; 
        }

        .btn-cancel { 
            background-color: #6c757d; 
            color: white; 
            width: auto; 
            border-radius: 50px; 
            padding: 10px 30px; 
            transition: all 0.3s ease; 
        }
    </style>
</head>
<body>

<div class="container-fluid p-0">
    <div class="row g-0">
        
        <div class="col-md-2 d-none d-md-block sidebar">
            <div class="brand-container">
                <img src="{{ asset('images/logo_claro.png') }}" alt="Logo Claro" width="70">
                <div class="brand-text">RETO CLARO LARAVEL</div>
            </div>
            
            <nav class="nav flex-column mt-3">
                <a class="nav-link" href="{{ route('vehiculos.index') }}">
                    <i class="bi bi-car-front-fill me-2"></i> Inventario
                </a>
                <a class="nav-link active" href="{{ route('vehiculos.create') }}">
                    <i class="bi bi-plus-circle-fill me-2"></i> Nuevo Registro
                </a>
            </nav>
        </div>

        <main class="col-md-10 px-md-5 py-5">
            
            <a href="{{ route('vehiculos.index') }}" class="text-decoration-none text-secondary mb-4 d-inline-block">
                <i class="bi bi-arrow-left me-2"></i> Volver al inventario
            </a>

            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card card-atlas">
                        <div class="card-header-atlas text-center">
                            <h4 class="mb-0 fw-bold">Registrar Nuevo Vehículo</h4>
                        </div>
                        <div class="card-body p-4 bg-white">
                            <form action="{{ route('vehiculos.store') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold">Placa (Única)</label>
                                        <input type="text" name="placa" id="placa" class="form-control bg-light" value="{{ old('placa') }}" placeholder="Ej: ABC123" maxlength="6" style="text-transform: uppercase;" oninput="controlarPlaca(this)" required>
                                        </small>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Marca</label>
                                        <input type="text" name="marca" class="form-control bg-light" value="{{ old('marca') }}" placeholder="TOYOTA" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Modelo (Año)</label>
                                        <input type="number" name="modelo" class="form-control bg-light" value="{{ old('modelo') }}" placeholder="2024" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold">Color</label>
                                        <input type="text" name="color" class="form-control bg-light" value="{{ old('color') }}" placeholder="AZUL OSCURA" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold">Fecha de Compra</label>
                                        <input type="date" name="fecha_compra" class="form-control" value="{{ old('fecha_compra') }}" max="{{ date('Y-m-d') }}" required>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label fw-bold">¿Ha tenido accidentes?</label>
                                        <select name="accidente" class="form-select bg-light" required>
                                            <option value="No" {{ old('accidente') == 'No' ? 'selected' : '' }}>No</option>
                                            <option value="Si" {{ old('accidente') == 'Si' ? 'selected' : '' }}>Si</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="text-center gap-2 mt-3">
                                    <button type="submit" class="btn btn-atlas">
                                        <i class="bi bi-check-circle me-2"></i> Guardar Vehículo
                                    </button>
                                    <a href="{{ route('vehiculos.index') }}" class="btn btn-cancel">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function controlarPlaca(input) {
    let v = input.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
    let letras = v.substring(0, 3).replace(/[^A-Z]/g, '');
    let numeros = v.substring(letras.length, 6).replace(/[^0-9]/g, '');
    input.value = letras + numeros;
}
</script>

@if($errors->any())
<script>
    Swal.fire({
        title: 'Aviso', 
        text: '{{ $errors->first() }}', 
        icon: 'warning', 
        iconColor: '#DA291C', 
        confirmButtonColor: '#DA291C', 
        confirmButtonText: 'Entendido'
    });
</script>
@endif

</body>
</html>