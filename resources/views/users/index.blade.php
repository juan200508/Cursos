@extends('layouts.template')

@section('content')
    <!-- START TABLE -->

    <div class="row justify-content-center mt-4">
        <div class="col-auto">

            <button type="button" class="btn btn-primary text-white"><i class="uil uil-plus"></i> Crear aspirante</button>
        </div>

    </div>


    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <b>Aspirantes</b>
            </div>
            <table class="table">
                <tbody>
                    <tr>
                        <td></td>
                        <td>
                            <div class="my-4">
                                1
                            </div>
                        </td>
                        <td>
                            <div class="justify-content-center">
                                <div class="my-1">
                                    <span>Nombre</span><br>
                                    <span>No. identi</span><br>
                                    <span>Correo</span>
                                </div>
                            </div>

                        </td>
                        <td></td>
                        <td>
                            <div class="row justify-content-center">
                                <div class="col-auto my-4">
                                    <button type="button" class="btn btn-danger btn-sm">Deshabilitar</button>
                                    <button type="button" class="btn btn-outline-primary btn-sm">Editar</button>
                                </div>
                            </div>

                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <div class="my-4">
                                2
                            </div>
                        </td>
                        <td>
                            <div class="justify-content-center">
                                <div class="my-1">
                                    <span>Nombre</span><br>
                                    <span>No. identi</span><br>
                                    <span>Correo</span>
                                </div>
                            </div>

                        </td>
                        <td></td>
                        <td>
                            <div class="row justify-content-center">
                                <div class="col-auto my-4">
                                    <button type="button" class="btn btn-success btn-sm">Habilitar</button>
                                    <button type="button" class="btn btn-outline-primary btn-sm">Editar</button>
                                </div>
                            </div>

                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
    <!-- END TABLE -->
@endsection
