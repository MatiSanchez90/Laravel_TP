@extends('layouts.app')
@section('content')
<div class="container">
<a href="{{url('producto/create')}}" class="btn btn-success"> Agregar producto</a>
<br>
<br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Precio</th>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $prod)
        <tr>
            <td>{{$prod ->id}}</td>
            <td>{{$prod ->Nombre}}</td>
            <td>{{$prod ->Categoria}}</td>
            <td>{{$prod ->Precio}}</td>
            <td>{{$prod ->Descripcion}}</td>
            <td>
            <a href="{{url('/producto/'.$prod->id.'/edit')}}" class="btn btn-warning">Editar</a>    
            
                <form action="{{url('/producto/'.$prod->id)}}" class="d-inline" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <input class="btn btn-danger" type="submit" onclick="return confirm('¿Esta seguro que quiere borrar este producto?')" value="Borrar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $productos->links() }}

</div>
@endsection