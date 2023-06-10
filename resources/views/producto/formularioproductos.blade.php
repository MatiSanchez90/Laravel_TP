
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li> 
    @endforeach 
    </ul>
</div>
@endif
<div class="form-group">
<label for="Nombre" >Nombre</label>
<input type="text" class="form-control" name="Nombre" value="{{ isset($producto->Nombre)?$producto->Nombre:''}}">
<br>
</div>
<div class="form-group">
<label for="Categoria" >Categoria</label>
<input type="text" class="form-control" name="Categoria" value="{{isset($producto->Categoria)?$producto->Categoria:''}}">
<br>
</div>
<div class="form-group">
<label for="Precio" >Precio</label>
<input type="number" class="form-control" name="Precio" value="{{isset($producto->Precio)?$producto->Precio:''}}">
<br>
</div>
<div class="form-group">
<label for="Descripcion" >Descripcion</label>
<input type="text" class="form-control" name="Descripcion" value="{{isset($producto->Descripcion)?$producto->Descripcion:''}}">
<br>
</div>
<input class="btn btn-success" type="submit" value="Enviar">
<a class="btn btn-primary" href="{{url('producto/')}}"> Regresar</a>
</div>