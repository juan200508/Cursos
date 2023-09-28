@extends('layouts.template')

@section('content')
    {{-- Include the create service modal --}}
    <div class="row d-flex justify-content-md-center p-3">
        <div class="col col-lg-2">
            <form action="{{ url('service') }}" method="GET">
                <div class="row">
                    <div class="col-2">
                        <button class="btn btn-sm my-1 btn-info">
                            <i class="uil uil-filter"></i>
                        </button>
                    </div>
                    <div class="col-10">
                        <select class="form-select" aria-label="Default select example" name="month">
                            <option disabled selected>Filtrar</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-6">
                {{-- Card for courses --}}
                <div class="row border-end">
                    @foreach ($services as $service)
                        <div class="col-6 pb-4">
                            <div class="card shadow-sm ">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ $service->name }} -
                                        @if ($service->status === 1)
                                            <span class="text-success">Activo</span>
                                        @else
                                            <span class="text-danger">Inactivo</span>
                                        @endif
                                    </h5>

                                    <p class="card-text"><small class="text-muted">{{ $service->start_date }} to
                                            {{ $service->end_date }}</small></p>
                                    <p class="card-text">{{ $service->description }}</p>
                                    <div class="d-flex justify-content-center">
                                        {{-- Help with chapGPT for look the services that have an applicant --}}
                                        @if ($services->contains('id', $service->id))
                                            <a href="#" class="btn btn-danger mx-2 buttonIns" id="cancel"
                                                data-id="{{ $service->id }}">
                                                Cancelar Inscripción
                                            </a>
                                        @elseif ($service->status === 0)
                                            {{-- If the service is inactive, you can't inscribated --}}
                                        @else
                                            <a href="#" class="btn btn-success mx-2 buttonIns" id="inscription"
                                                data-id="{{ $service->id }}">
                                                Inscribirme
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <script>
            // Method for inscription a applicant to a service
            let buttonsIns = document.querySelectorAll('.buttonIns')
            buttonsIns.forEach((button) => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    // Help with ChatGPT for get the id of the service
                    let service_id = this.dataset.id;
                    let id = this.id;

                    console.log(service_id);

                    let url = id === 'inscription' ? `inscriptions/store/${service_id}` :
                        `inscriptions/cancel/${service_id}`

                    console.log(id);
                    axios.post(url)
                        .then((result) => {
                            console.log(result);
                            Swal.fire({
                                icon: 'info',
                                title: result.data.message,
                                showConfirmButton: false,
                                timer: 1700
                            }).then(() => {
                                location.reload();
                            })
                        })
                        .catch((error) => {
                            console.log(error);
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: error.response.data.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        })
                })
            });
        </script>
    @endsection
