<form action="{{action('PruebaController@recibir')}}" method="POST">
{{ csrf_field() }}
<label for="nombre">Nombre</label>
<input type="text" name="nombre">
<label for="apellidos">Apellidos</label>
<input type="text" name="apellidos">
<input type="submit" value="Enviar">
</form>