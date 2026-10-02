@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="fw-bold m-0">Gestión de Vehículos</h2>
        
        <div class="d-flex gap-3">
            {{-- Buscador - Ruta en minúsculas --}}
            <form action="{{ route('vehiculos.index') }}" method="GET" class="d-flex">
                <div class="input-group">
                    <input type="text" name="buscar" class="form-control search-input" placeholder="Buscar vehículo..." value="{{ $buscar ?? '' }}">
                    <button class="btn search-btn border-start-0" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

            {{-- Botón Nuevo - Ruta en minúsculas --}}
            <a href="{{ route('vehiculos.create') }}" class="btn-atlas text-decoration-none">
                <i class="bi bi-plus-circle me-2"></i> Nuevo Registro
            </a>
        </div>
    </div>

    <div class="card card-table">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4"># ID</th>
                        <th>Placa</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                        <th class="text-center">Accidentes</th>
                        <th>Fecha Compra</th>
                        <th class="text-end pe-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Bucle corregido: todo en minúsculas --}}
                    @forelse($vehiculos as $vehiculo)
                    <tr>
                        <td class="ps-4 text-muted small">#{{ $vehiculo->id }}</td>
                        <td class="fw-bold text-dark">{{ $vehiculo->placa }}</td>
                        <td>{{ $vehiculo->marca }}</td>
                        <td><span class="badge bg-secondary">{{ $vehiculo->modelo }}</span></td>
                        <td>{{ $vehiculo->color }}</td>
                        <td class="text-center">
                            {{-- Lógica de color de badge --}}
                            <span class="badge badge-status {{ $vehiculo->accidente == 'Si' ? 'bg-danger' : 'bg-success' }}">
                                {{ $vehiculo->accidente }}
                            </span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($vehiculo->fecha_compra)->format('d/m/Y') }}</td>
                        <td class="text-end pe-4">
                            {{-- Botón Editar --}}
                            <a href="{{ route('vehiculos.edit', $vehiculo->id) }}" class="btn btn-sm btn-outline-primary border-0">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            
                            {{-- Formulario Eliminar --}}
                            <form action="{{ route('vehiculos.destroy', $vehiculo->id) }}" method="POST" class="d-inline form-eliminar">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-outline-danger border-0 btn-borrar">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">No se encontraron registros.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Paginación corregida --}}
        <div class="card-footer bg-white border-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div class="fw-bold text-secondary small">
                    Página {{ $vehiculos->currentPage() }} de {{ $vehiculos->lastPage() }} 
                    <span class="mx-2 text-muted">|</span> 
                    Total: {{ $vehiculos->total() }} vehículos
                </div>
                <div>
                    {{ $vehiculos->appends(['buscar' => $buscar ?? ''])->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    
    document.querySelectorAll('.btn-borrar').forEach(boton => {
        boton.addEventListener('click', function() {
            const formulario = this.closest('.form-eliminar');
            Swal.fire({
                title: '¿Estás segura?',
                text: "Se eliminará permanentemente.",
                icon: 'warning',
                iconColor: '#DA291C',
                showCancelButton: true,
                confirmButtonColor: '#DA291C',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, borrar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    formulario.submit();
                }
            });
        });
    });
</script>
@endpush