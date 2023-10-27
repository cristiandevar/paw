{{-- Extiende de la plantilla de Admin LTE, nos permite tener el panel en la vista --}}
@extends('adminlte::page')

{{-- Titulo en las tabulaciones del Navegador --}}
@section('title', 'Productos')

@section('plugins.Datatables', true)

{{-- Titulo en el contenido de la Pagina --}}
@section('content_header')
    <h1>Contactenos</h1>
@stop

{{-- Contenido de la Pagina --}}
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-3">
            
            {{-- <a href="{{ route('product.create') }}" 
                class="btn btn-success text-uppercase">
                Nuevo Producto
            </a>
            <a 
                href="{{ route('products-list-pdf') }}"
                class="btn btn-success text-uppercase">
                <i class="far fa-file-pdf fa-2xl"></i>
            </a>
            <a 
                href="{{ route('products-excel') }}"
                class="btn btn-success text-uppercase">
                <i class="far fa-file-excel fa-2xl"></i>
            </a>
        </div> --}}
        
        @if(session('alert'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('alert') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>                    
                </div>
            </div>
        @endif

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card mb-5">
                    <form action="{{ route('send-email') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        

                        <div class="card-body">
                            
                           <div class="mb-3 row">
                                <label for="subject" class="col-sm-4 col-form-label"> * Asunto </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject', null) }}" required>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="body" class="col-sm-4 col-form-label"> * Mensaje </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="body" name="body" rows="15" required>{{ old('body', null ) }}</textarea>
                                </div>
                            </div>
                        
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success text-uppercase">
                                Enviar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

{{-- Importacion de Archivos CSS --}}
@section('css')
@stop


{{-- Importacion de Archivos JS --}}
@section('js')
@stop