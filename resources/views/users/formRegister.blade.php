@extends('layouts.template')

@section('content')

    <!-- START USER FORM -->

    <div class="container w-50 mt-5 mb-5 shadow-sm p-4">

        <form>

            <div class="row justify-content-center m-4">
                <div class="col-auto">

                    <h2>Registrar</h2>
                </div>

            </div>

            {{-- Row top --}}
            <div class="row">

                <div class="mb-3">
                    <label for="inputName" class="form-label">Nombre completo*</label>
                    <input type="text" class="form-control shadow-sm" id="inputName" 
                     placeholder="Escribe nombre de completo" required/>
                </div>

                <!-- Right column -->
                <div class="col">

                    {{-- Input ID --}}
                    <div class="mb-3">
                        <label for="inputId" class="form-label">No. Documento* <small>(Sin puntos, ni coma)</small></label>
                        <input type="number" class="form-control shadow-sm" id="inputId"
                             placeholder="Escribe el número de identidad" required>
                    </div>

                    {{-- Input number phone --}}
                    <div class="mb-3">
                        <label for="inputPhone" class="form-label">Teléfono</label>
                        <input type="number" class="form-control shadow-sm" id="inputPhone"
                             placeholder="Escribe el número de teléfono">
                    </div>

                    {{-- Input social class --}}
                    <div class="mb-3">
                        <label for="inputSocialClass" class="form-label">Estrato</label>
                        <input type="number" class="form-control shadow-sm" id="inputSocialClass"
                            placeholder="Escribe el número de estrato">
                    </div>

                    {{-- Input Address --}}
                    <div class="mb-3">
                        <label for="inputAddress" class="form-label">Dirección</label>
                        <input type="email" class="form-control shadow-sm" id="inputAddress"
                        placeholder="Escribe la dirección">
                    </div>

                </div>

                <!-- Left column -->
                <div class="col">

                    {{-- Input email --}}
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">Correo electrónico*</label>
                        <input type="email" class="form-control shadow-sm" id="inputEmail"
                            placeholder="Escribe un correo electrónico" required>
                    </div>

                    {{-- Select option gender --}}
                    <div class="form-group mb-3">
                        <label for="sexOption" class="form-label">Género</label>
                        <select class="form-select" id="sexOption">
                            <option selected disabled>Seleccione un género</option>
                            <option value="">Masculino</option>
                            <option value="">Femenino</option>
                            <option value="">Otro</option>
                        </select>
                    </div>

                    {{-- Input birthday --}}
                    <div class="mb-3">
                        <label for="inputDateBirth" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control shadow-sm" id="inputDateBirth"
                            >
                    </div>

                    {{-- Select option career --}}
                    <div class="mb-3">
                        <label for="careerOption" class="form-label">Programa académico*</label>
                        <select class="form-select" id="careerOption">
                            <option selected disabled>Seleccione una carrera</option>
                            <option value="">Ingeniería de sistemas</option>
                            <option value="">Ingeniería informatica</option>
                        </select>
                    </div>
                </div>

            </div>

            {{-- Row bottom --}}
            <div class="row justify-content-center m-4">
                <div class="col-auto">
                    <button type="button" class="btn btn-success text-white"><i class="uil uil-user icon"></i>
                        Registrar
                    </button>
                </div>

            </div>

        </form>

    </div>

    <!-- END USER FORM -->
@endsection
