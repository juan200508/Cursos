@extends('layouts.template')

@section('content')
    {{-- Include the create service modal --}}
    @include('service.create')
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
        @if (auth()->user()->role_id === 1)
            <div class="col col-lg-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createService">
                    <i class="uil uil-plus"></i> Crear evento
                </button>
            </div>
        @endif
    </div>
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-6">
                {{-- Card for courses --}}
                <h4 class="text-center p-4">Eventos</h4>
                <div class="row border-end">
                    @foreach ($events as $event)
                        <div class="col-6 pb-4">
                            <div class="card shadow-sm ">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ $event->name }} -
                                        @if ($event->status === 1)
                                            <span class="text-success">Activo</span>
                                        @else
                                            <span class="text-danger">Inactivo</span>
                                        @endif
                                    </h5>

                                    <p class="card-text"><small class="text-muted">{{ $event->start }} to
                                            {{ $event->end }}</small></p>
                                    <p class="card-text">{{ $event->description }}</p>
                                    <div class="d-flex justify-content-center">
                                        {{-- Actions of the administrator --}}
                                        @if (auth()->user()->role_id === 1)
                                            @if ($event->status === 1)
                                                <a href="#" class="btn btn-danger mx-2 button" id="disable"
                                                    data-id="{{ $event->id }}">
                                                    Desactivar
                                                </a>
                                            @else
                                                <a href="#" class="btn btn-success mx-2 button" id="enable"
                                                    data-id="{{ $event->id }}">
                                                    Activar
                                                </a>
                                            @endif
                                            {{-- Actions of the applicant --}}
                                        @else
                                            {{-- Help with chapGPT for look the services that have an applicant --}}
                                            @if ($services->contains('id', $event->id))
                                                <a href="#" class="btn btn-danger mx-2 buttonIns" id="cancel"
                                                    data-id="{{ $event->id }}">
                                                    Cancelar Inscripción
                                                </a>
                                            @elseif ($event->status === 0)
                                                {{-- If the service is inactive, you can't inscribated --}}
                                            @else
                                                <a href="#" class="btn btn-success mx-2 buttonIns" id="inscription"
                                                    data-id="{{ $event->id }}">
                                                    Inscribirme
                                                </a>
                                            @endif
                                        @endif
                                        @if (auth()->user()->role_id === 1)
                                            <a href="#" class="btn btn-outline-primary mx-2" data-bs-toggle="modal"
                                                data-bs-target="#editService{{ $event->id }}">Editar</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Include modal for edit a service --}}
                        @include('service.edit')
                    @endforeach
                </div>
            </div>
            <div class="col-6">
                <h4 class="text-center p-4">Apoyos</h4>
                <div class="row">
                    {{-- Card for supports --}}
                    @foreach ($supports as $support)
                        {{-- <input type="text" name="{{ $su }}" id=""> --}}
                        <div class="col-6 pb-4">
                            <div class="card shadow-sm ">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ $support->name }} -
                                        @if ($support->status === 1)
                                            <span class="text-success">Activo</span>
                                        @else
                                            <span class="text-danger">Inactivo</span>
                                        @endif
                                    </h5>

                                    <p class="card-text"><small class="text-muted">{{ $support->start }} to
                                            {{ $support->end }}</small></p>
                                    <p class="card-text">{{ $support->description }}</p>
                                    <div class="d-flex justify-content-center">
                                        {{-- Actions of the Administrator --}}
                                        @if (auth()->user()->role_id === 1)
                                            @if ($support->status === 1)
                                                <a href="#" class="btn btn-danger mx-2 button" id="disable"
                                                    data-id="{{ $support->id }}">
                                                    Desactivar
                                                </a>
                                            @else
                                                <a href="#" class="btn btn-success mx-2 button" id="enable"
                                                    data-id="{{ $support->id }}">
                                                    Activar
                                                </a>
                                            @endif
                                            {{-- Actions of the applicant --}}
                                        @else
                                            {{-- Help with chapGPT for look the services that have an applicant --}}
                                            @if ($services->contains('id', $support->id))
                                                <a href="#" class="btn btn-danger mx-2 buttonIns" id="cancel"
                                                    data-id="{{ $support->id }}">
                                                    Cancelar Inscripción
                                                </a>
                                            @elseif ($support->status === 0)
                                                {{-- If the service is inactive, you can't inscribated --}}
                                            @else
                                                <a href="#" class="btn btn-success mx-2 buttonIns" id="inscription"
                                                    data-id="{{ $support->id }}">
                                                    Inscribirme
                                                </a>
                                            @endif
                                        @endif
                                        @if (auth()->user()->role_id === 1)
                                            <a href="#" class="btn btn-outline-primary mx-2">Editar</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('service.edit')
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('service.js')
@endsection
