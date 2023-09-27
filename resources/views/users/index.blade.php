@extends('layouts.template')

@section('content')
    <!-- START TABLE -->

    <div class="row justify-content-center mt-4">
        <div class="col-auto">
            <a href="{{ route('users.store') }}" class="btn btn-primary text-white">
                <i class="uil uil-plus"></i> Crear aspirante
            </a>
        </div>

    </div>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <b>Aspirantes</b>
            </div>
            <table class="table">
                <tbody>
                    @foreach ($applicants as $applicant)
                        <tr>
                            <td>
                                <div class="my-4 px-3">
                                    <strong>{{ $applicant->id }}</strong>
                                </div>
                            </td>
                            <td>
                                <div class="justify-content-center">
                                    <div class="my-1">
                                        <span><strong>{{ $applicant->name }}</strong></span><br>
                                        <span class="text-secondary">{{ $applicant->document }}</span><br>
                                        <span class="text-secondary">{{ $applicant->email }}</span>
                                    </div>
                                </div>
                            </td>

                            <td>
                                @if ($applicant->status === 1)
                                    <div class="my-4">
                                        <span class="text-success">Activo</span>
                                    </div>
                                @else
                                    <div class="my-4">
                                        <span class="text-danger">Inactivo</span>
                                    </div>
                                @endif
                            </td>

                            <td>
                                <div class="row justify-content-center">
                                    <div class="col-auto my-4">
                                        @if ($applicant->status === 1)
                                            <a href="#" data-id="{{ $applicant->id }}"
                                                class="btn btn-danger btn-sm button" id="disable">
                                                Deshabilitar
                                            </a>
                                        @else
                                            <a href="#" data-id="{{ $applicant->id }}"
                                                class="btn btn-success btn-sm button" id="enable">
                                                Habilitar
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END TABLE -->
    @include('users.js')
@endsection
