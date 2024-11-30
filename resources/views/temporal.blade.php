<h2>Registro de Instalaciones</h2>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#facilityModal">
    Agregar Instalación
</button>

<!-- Modal -->
<div class="modal fade" id="facilityModalCreate" tabindex="-1" aria-labelledby="facilityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="facilityModalLabel">Nueva Instalación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('facilities.index') }}">
                    @csrf
                    <div class="form-group">
                        <label for="FacNo">Número de Instalación *</label>
                        <input type="text" class="form-control" id="FacNo" name="FacNo" maxlength="8" required>
                    </div>
                    <div class="form-group">
                        <label for="FacName">Nombre de Instalación *</label>
                        <input type="text" class="form-control" id="FacName" name="FacName" maxlength="50" required>
                    </div>
                    <button type="submit" class="btn btn-success">Registrar Instalación</button>
                </form>
            </div>
        </div>
    </div>
</div>