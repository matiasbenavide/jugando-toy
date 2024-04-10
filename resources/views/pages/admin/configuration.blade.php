@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin-section.css') }}">
@endsection
@section('content')
    <div class="admin-section">
        <p class="title">Configuración</p>
        <form action="{{ url('/administracion/productos/actualizar-precios') }}" method="POST">
            @csrf
            <div class="row col-8 justify-content-between">

                {{-- INPUT WITH COLOR --}}
                <div class="col-6">
                    <label class="label" for="priceUpdateColor">Actualizar precios con color</label>
                    <input class="form-input" type="number" name="priceUpdateColor" id="priceUpdateColor">
                </div>

                {{-- INPUT WITHOUT COLOR --}}
                <div class="col-6">
                    <label class="label" for="priceUpdateNoColor">Actualizar precios sin color</label>
                    <input class="form-input" type="number" name="priceUpdateNoColor" id="priceUpdateNoColor">
                </div>
            </div>
            <button class="btn button-filter w-50" style="max-width: none; margin-top: 1rem;">Aplicar aumento</button>
        </form>
    </div>
    <script type="module">
        import { showSuccess, showErrors } from "{{ asset(mix('js/module/sweetAlert.js')) }}";
    </script>
@endsection
