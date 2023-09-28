@extends('layouts.template')

@section('content')
    <!-- START USER FORM -->

    <div class="container w-50 mt-5 mb-5 shadow p-4 bg-white rounded-4 px-5">

        <form method="POST" id="formEdit">
            @csrf
            <div class="row justify-content-center m-4">
                <div class="col-auto">
                    <h2>Actualizar mi Información</h2>
                </div>
            </div>

            <input type="hidden" name="id" id="" value="{{ $applicant->id }}">

            {{-- Row top --}}
            <div class="row">
                <div class="mb-3">
                    <label for="inputName" class="form-label fw-bold">Nombre completo
                    </label>
                    <input type="text" class="form-control shadow-sm" id="inputName"
                        placeholder="Escribe nombre de completo" name="name" required value="{{ $applicant->name }}" />
                </div>

                <!-- Right column -->
                <div class="col">
                    {{-- Input ID --}}
                    <div class="mb-3">
                        <label for="inputId" class="form-label fw-bold">No. Documento
                        </label>
                        <input type="number" class="form-control shadow-sm" id="inputId"
                            placeholder="Escribe el número de identidad" name="document" value="{{ $applicant->document }}"
                            required>
                    </div>

                    {{-- Input number phone --}}
                    <div class="mb-3">
                        <label for="inputPhone" class="form-label fw-bold">Teléfono</label>
                        <input type="number" class="form-control shadow-sm" id="inputPhone"
                            placeholder="Escribe el número de teléfono" name="phone" value="{{ $applicant->phone }}">
                    </div>

                    {{-- Input social class --}}
                    <div class="mb-3">
                        <label for="inputSocialClass" class="form-label fw-bold">Estrato</label>
                        <input type="number" class="form-control shadow-sm" id="inputSocialClass"
                            placeholder="Escribe el número de estrato" name="social_class"
                            value="{{ $applicant->social_class }}">
                    </div>

                    {{-- Input Address --}}
                    <div class="mb-3">
                        <label for="inputAddress" class="form-label fw-bold">Dirección</label>
                        <input type="text" class="form-control shadow-sm" id="inputAddress"
                            placeholder="Escribe la dirección" name="adress" value="{{ $applicant->address }}">
                    </div>

                </div>

                <!-- Left column -->
                <div class="col">

                    {{-- Input email --}}
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label fw-bold">Correo electrónico
                        </label>
                        <input type="email" class="form-control shadow-sm" id="inputEmail"
                            placeholder="Escribe un correo electrónico" required name="email"
                            value="{{ $applicant->email }}">
                    </div>

                    {{-- Select option gender --}}
                    <div class="form-group mb-3">
                        <label for="sexOption" class="form-label fw-bold">Género</label>
                        <select class="form-select" id="sexOption" name="gender">
                            <option selected>{{ $applicant->gender }}</option>
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>

                    {{-- Input birthday --}}
                    <div class="mb-3">
                        <label for="inputDateBirth" class="form-label fw-bold">Fecha de nacimiento</label>
                        <input type="date" class="form-control shadow-sm" id="inputDateBirth" name="birth_date"
                            value="{{ $applicant->birth_date }}">
                    </div>

                    {{-- Select option career --}}
                    <div class="mb-3">
                        <label for="careerOption" class="form-label fw-bold">Programa académico
                        </label>
                        <select class="form-select" id="careerOption" name="degree_id">
                            <option selected disabled>Seleccione una carrera</option>
                            @foreach ($degrees as $degree)
                                <option value="{{ $degree->id }}"
                                    {{ $applicant->degreeId === $degree->id ? 'selected' : '' }}>
                                    {{ $degree->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

            {{-- Row bottom --}}
            <div class="row justify-content-center m-4">
                <div class="col-auto">
                    <button type="submit" class="btn btn-warning">
                        <i class="uil uil-save icon"></i>
                        Actualizar
                    </button>
                </div>

            </div>

        </form>

    </div>

    <!-- END USER FORM -->

    <script>
        // Method for create an applicant - ADMINISTRATOR
        let formEdit = document.querySelector('#formEdit')

        formEdit.addEventListener('submit', (event) => {
            event.preventDefault();

            let formData = new FormData(formEdit);

            axios.post('update', formData)
                .then((result) => {
                    Swal.fire({
                        title: result.data.message,
                        icon: 'success',
                        confirmButtonText: 'Listo',
                        showCloseButton: false,
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                    }).then((reponse) => {
                        if (reponse.isConfirmed) {
                            window.location.href = result.data.url;
                        }
                    })
                })
                .catch((error) => {
                    console.log(error);
                    Swal.fire({
                        title: error.response.data.message,
                        icon: 'error',
                        confirmButtonText: 'Listo',
                        showCloseButton: false,
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                    })
                })
        })
    </script>
@endsection
