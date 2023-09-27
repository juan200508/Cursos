@extends('layouts.template')

@section('content')
    <div class="row d-flex justify-content-md-center p-3">
        <div class="col col-lg-2">
            <select class="form-select" aria-label="Default select example">
                <option selected>Filtrar</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Septiembre</option>
            </select>
        </div>
        <div class="col col-lg-2">
            <button type="button" class="btn btn-primary"><i class="uil uil-plus"></i> Crear evento</button>
        </div>
    </div>
    <div class="container-fluid p-4">
        <div class="row">
            <div class="col-6">
                <h4 class="text-center p-4">Cursos</h4>
                <div class="row border-end">
                    <div class="col-6 pb-4">
                        <div class="card shadow-sm ">
                            <div class="card-body">
                                <h5 class="card-title">Lógica y algoritmos I</h5>
                                <p class="card-text"><small class="text-muted">Agosto - 15 2023</small></p>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <div class="d-flex justify-content-center">
                                    <a href="#" class="btn btn-danger mx-2">Eliminar</a>
                                    <a href="#" class="btn btn-outline-primary mx-2">Editar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <h4 class="text-center p-4">Apoyos</h4>
                <div class="row">
                    <div class="col-6 pb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Apoyo de sostenimiento</h5>
                                <p class="card-text"><small class="text-muted">Agosto - 15 2023</small></p>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <div class="d-flex justify-content-center">
                                    <a href="#" class="btn btn-danger mx-2">Eliminar</a>
                                    <a href="#" class="btn btn-outline-primary mx-2">Editar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
