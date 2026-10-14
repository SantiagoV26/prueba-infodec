<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Población - Sofía Restrepo</title>
    <!-- Documentación: Inclusión de Bootstrap vía CDN para asegurar un diseño responsivo en PC, Tablets y Móviles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Consulta de Población por País</h4>
                    </div>
                    <div class="card-body">
                        
                        <!-- Formulario: Selector de País -->
                        <div class="mb-4">
                            <label for="pais_id" class="form-label fw-bold">Seleccione un País (*)</label>
                            <select class="form-select" id="pais_id" required onchange="cargarCiudades(this.value)">
                                <option value="">-- Seleccione --</option>
                                <!-- Iteramos sobre los países enviados desde el Controlador -->
                                @foreach($paises as $pais)
                                    <option value="{{ $pais->id }}">
                                        {{ $pais->nombre }} (Idioma: {{$pais->idioma }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Sección de Resultados: Tabla de Ciudades (Oculta por defecto) -->
                        <div id="resultados_div" style="display: none;">
                            <h5 class="mb-3 text-secondary">Ciudades disponibles y su población:</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Ciudad</th>
                                            <th>Población (Habitantes)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="ciudades_tbody">
                                        <!-- Aquí se inyectarán las filas dinámicamente con JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 
      Documentación: Script en Vanilla JavaScript para manejar la petición asíncrona (AJAX)
      Esto permite actualizar las ciudades sin tener que recargar toda la página web.
    -->
    <script>
        function cargarCiudades(paisId) {
            const resultadosDiv = document.getElementById('resultados_div');
            const tbody = document.getElementById('ciudades_tbody');

            // Si el usuario vuelve a la opción "-- Seleccione --", ocultamos la tabla
            if (!paisId) {
                resultadosDiv.style.display = 'none';
                return;
            }

            // Consumo de nuestra API interna construida en Laravel
            fetch(`/ciudades/${paisId}`)
                .then(response => response.json())
                .then(data => {
                    // Limpiar resultados anteriores
                    tbody.innerHTML = '';

                    if (data.length === 0) {
                        tbody.innerHTML = '<tr><td colspan="2" class="text-center text-danger">No hay ciudades registradas.</td></tr>';
                    } else {
                        // Iterar el JSON y construir las filas de la tabla
                        data.forEach(ciudad => {
                            const tr = document.createElement('tr');
                            
                            // Formatear el número para mejor lectura (ej. 7,181,000)
                            const poblacionFormateada = new Intl.NumberFormat('es-CO').format(ciudad.poblacion);
                            
                            tr.innerHTML = `
                                <td><strong>${ciudad.nombre}</strong></td>
                                <td>${poblacionFormateada}</td>
                            `;
                            tbody.appendChild(tr);
                        });
                    }
                    
                    // Mostrar la tabla una vez llenada
                    resultadosDiv.style.display = 'block';
                })
                .catch(error => console.error('Error al cargar ciudades:', error));
        }
    </script>
</body>
</html>