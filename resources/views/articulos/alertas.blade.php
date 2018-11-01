@extends('layouts.master')

@section('content')

    <table class="table">
        <thead>
            <tr>
            <th>Cod</th>
            <th>Articulo</th>
            <th>Cantidad Disponible</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alertas as $alerta)
            <tr>
                <td>{{$alerta->codarticulo}}</td>
                <td>{{$alerta->articulo}}</td>
                <td>{{$alerta->cantidad}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection