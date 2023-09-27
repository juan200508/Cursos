@extends('layouts.template')

@section('content')
    <!-- START USER FORM -->

    <div class="container w-50 mt-5 mb-5 shadow-sm p-4">

        <form method="POST" id="formCreate" action="{{ route('applicant.store') }}">
            @csrf
            <div class="row justify-content-center m-4">
                <div class="col-auto">
                    <h2>Registrar</h2>
                </div>
            </div>

            {{-- Row top --}}
            <div class="row">
                <div class="mb-3">
                    <label for="inputName" class="form-label fw-bold">Nombre completo
                        <small class="text-danger">(Obligatorio)</small>
                    </label>
                    <input type="text" class="form-control shadow-sm" id="inputName"
                        placeholder="Escribe nombre de completo" name="name" required />
                </div>

                <!-- Right column -->
                <div class="col">
                    {{-- Input ID --}}
                    <div class="mb-3">
                        <label for="inputId" class="form-label fw-bold">No. Documento
                            <small class="text-danger">(Obligatorio)</small>
                        </label>
                        <input type="number" class="form-control shadow-sm" id="inputId"
                            placeholder="Escribe el número de identidad" name="document" required>
                    </div>

                    {{-- Input number phone --}}
                    <div class="mb-3">
                        <label for="inputPhone" class="form-label fw-bold">Teléfono</label>
                        <input type="number" class="form-control shadow-sm" id="inputPhone"
                            placeholder="Escribe el número de teléfono" name="phone">
                    </div>

                    {{-- Input social class --}}
                    <div class="mb-3">
                        <label for="inputSocialClass" class="form-label fw-bold">Estrato</label>
                        <input type="number" class="form-control shadow-sm" id="inputSocialClass"
                            placeholder="Escribe el número de estrato" name="social_class">
                    </div>

                    {{-- Input Address --}}
                    <div class="mb-3">
                        <label for="inputAddress" class="form-label fw-bold">Dirección</label>
                        <input type="email" class="form-control shadow-sm" id="inputAddress"
                            placeholder="Escribe la dirección" name="adress">
                    </div>

                </div>

                <!-- Left column -->
                <div class="col">

                    {{-- Input email --}}
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label fw-bold">Correo electrónico
                            <small class="text-danger">(Obligratorio)</small>
                        </label>
                        <input type="email" class="form-control shadow-sm" id="inputEmail"
                            placeholder="Escribe un correo electrónico" required name="email">
                    </div>

                    {{-- Select option gender --}}
                    <div class="form-group mb-3">
                        <label for="sexOption" class="form-label fw-bold">Género</label>
                        <select class="form-select" id="sexOption" name="gender">
                            <option selected disabled>Seleccione un género</option>
                            <option value="">Masculino</option>
                            <option value="">Femenino</option>
                            <option value="">Otro</option>
                        </select>
                    </div>

                    {{-- Input birthday --}}
                    <div class="mb-3">
                        <label for="inputDateBirth" class="form-label fw-bold">Fecha de nacimiento</label>
                        <input type="date" class="form-control shadow-sm" id="inputDateBirth" name="birth_date">
                    </div>

                    {{-- Select option career --}}
                    <div class="mb-3">
                        <label for="careerOption" class="form-label fw-bold">Programa académico
                            <small class="text-danger">(Obligatorio)</small>
                        </label>
                        <select class="form-select" id="careerOption" name="degree_id">
                            <option selected disabled>Seleccione una carrera</option>
                            @foreach ($degrees as $degree)
                                <option value="{{ $degree->id }}">{{ $degree->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

            {{-- Row bottom --}}
            <div class="row justify-content-center m-4">
                <div class="col-auto">
                    <button type="submit" class="btn btn-success text-white"><i class="uil uil-user icon"></i>
                        Registrar
                    </button>
                </div>

            </div>

        </form>

    </div>

    <!-- END USER FORM -->

    @include('users.js')
@endsection
