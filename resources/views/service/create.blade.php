<div class="modal fade" id="createService" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Registrar Evento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Create Service Form --}}

                <form method="POST" id="formCreate">
                    @csrf
                    {{-- Row top --}}
                    <div class="row">
                        <div class="mb-3">
                            <label for="inputName" class="form-label fw-bold">Nombre del Evento</label>
                            <input type="text" class="form-control shadow-sm bg-ligth" id="inputName"
                                placeholder="Escribe el nombre del evento" name="name" required />
                        </div>

                        <div class="mb-3">
                            <label for="inputId" class="form-label fw-bold">Descripción</label>
                            <textarea class="form-control shadow-sm bg-ligth" id="inputId" placeholder="Escribe la descripción" name="description"
                                required></textarea>
                        </div>

                        <!-- Right column -->
                        <div class="col input-group">
                            {{-- Input number phone --}}
                            <div class="mb-3">
                                <label for="inputPhone" class="form-label fw-bold">Fecha de Inicio</label>
                                <input type="date" class="form-control form-control shadow-sm bg-ligth"
                                    id="inputPhone" name="start_date">
                            </div>

                            {{-- Input social class --}}
                            <div class="mb-3">
                                <label for="careerOption" class="form-label fw-bold">Tipo de Servicio</label>
                                <select class="form-select" id="careerOption" name="category_id">
                                    <option selected disabled>Seleccione un tipo</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Left column -->
                        <div class="col">
                            {{-- Input email --}}
                            <div class="mb-3">
                                <label for="inputPhone" class="form-label fw-bold">Fecha Final</label>
                                <input type="date" class="form-control shadow-sm bg-ligth" id="inputPhone"
                                    name="end_date">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">
                            <i class="uil uil-save mx-1"></i>Guardar
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
