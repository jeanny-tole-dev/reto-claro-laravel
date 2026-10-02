<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vehículo - Reto Claro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root { 
            --claro-red: #DA291C; 
            --claro-red-hover: #B22016;
            --bg-canvas: #F4F6F9; 
            --sidebar-dark: #212529; 
        }
        body { background-color: var(--bg-canvas); font-family: 'Segoe UI', sans-serif; }
        .sidebar { background-color: var(--sidebar-dark); min-height: 100vh; color: white; padding: 20px; }
        .card-custom { border: none; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.1); }
        .header-custom { background-color: var(--claro-red); color: white; padding: 20px; border-radius: 15px 15px 0 0; text-align: center; }
        
      
        .btn-save { 
            background-color: var(--claro-red); 
            color: white; 
            border-radius: 50px; 
            padding: 12px 35px; 
            border: none; 
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-save:hover { 
            background-color: var(--claro-red-hover); 
            color: white; 
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(218, 41, 28, 0.3);
        }
        .btn-cancel { background-color: #6c757d; color: white; border-radius: 50px; padding: 12px 35px; text-decoration: none; display: inline-block; }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar d-none d-md-block">
            <h5 class="text-center mb-4">RETO CLARO</h5>
            <nav class="nav flex-column">
                <a class="nav-link text-white" href="{{ route('vehiculos.index') }}"><i class="bi bi-car-front me-2"></i>Inventario</a>
            </nav>
        </div>

        <main class="col-md-10 p-5">
            <a href="{{ route('vehiculos.index') }}" class="text-secondary text-decoration-none mb-4 d-inline-block">
                <i class="bi bi-arrow-left"></i> Volver al listado
            </a>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card card-custom">
                        <div class="header-custom">
                            <h4 class="mb-0">ACTUALIZAR VEHÍCULO</h4>
                        </div>
                        <div class="card-body p-4 bg-white">
                            <form action="{{ route('vehiculos.update', $vehiculo->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold">Placa (3 letras y 3 números)</label>
                                        <input type="text" name="placa" id="placa" class="form-control" 
                                               value="{{ old('placa', $vehiculo->placa) }}" maxlength="6" 
                                               style="text-transform: uppercase;" oninput="validarPlaca(this)" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Marca</label>
                                        <input type="text" name="marca" class="form-control" value="{{ old('marca', $vehiculo->marca) }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Modelo (Año)</label>
                                        <input type="number" name="modelo" class="form-control" value="{{ old('modelo', $vehiculo->modelo) }}" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label fw-bold">Color</label>
                                        <input type="text" name="color" class="form-control" value="{{ old('color', $vehiculo->color) }}" required>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label fw-bold">Fecha de Compra</label>
                                        <input type="date" name="fecha_compra" class="form-control" value="{{ old('fecha_compra', $vehiculo->fecha_compra) }}" required>
                                    </div>

                                    <div class="col-md-12 mb-4">
                                        <label class="form-label fw-bold">¿Accidentes?</label>
                                        <select name="accidente" class="form-select" required>
                                            <option value="No" {{ old('accidente', $vehiculo->accidente) == 'No' ? 'selected' : '' }}>No</option>
                                            <option value="Si" {{ old('accidente', $vehiculo->accidente) == 'Si' ? 'selected' : '' }}>Si</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-save">Actualizar Cambios</button>
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
    function validarPlaca(input) {
        let v = input.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
        let letras = v.substring(0, 3).replace(/[^A-Z]/g, '');
        let numeros = v.substring(letras.length, 6).replace(/[^0-9]/g, '');
        input.value = letras + numeros;
    }
</script>

@if($errors->any())
<script>
    Swal.fire({
        title: '¡Atención!',
        text: '{{ $errors->first() }}',
        icon: 'error',
        confirmButtonColor: '#DA291C',
        confirmButtonText: 'Corregir'
    });
</script>
@endif

</body>
</html>