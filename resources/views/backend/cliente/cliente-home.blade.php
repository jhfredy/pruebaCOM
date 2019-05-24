@extends('backend.contenido.principal')
@section('body')
<div class="container-fluid mt--7">
    <div class="row">
      <div class="col-md-12">
        <div class="card shadow">
          <div class="card-header bg-transparent">
            <h1>REQUERIMIENTOS TÉCNICOS</h1>
          </div>
          <div class="card-body">
                <p>1. CRUD de personas
                Generar un CRUD (por ajax) de registro de personas (campos generales), por cada campo realizar su validación correspondiente, Ejemplo: email (validar formato correo asdf@edsd.wey).           
                Obligatorio incluir select anidado con país, departamento y municipio por ajax, donde el valor a relacionar con la persona es el municipio.</p>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Footer -->
    @include('backend.contenido.footer')
  </div>
@endsection