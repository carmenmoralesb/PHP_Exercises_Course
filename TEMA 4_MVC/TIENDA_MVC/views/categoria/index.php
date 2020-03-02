<h1>Gestionar categorias</h1>

<a href="index.php?c=Categoria&a=crear" class="btn btn-dark mb-4">
	Crear categoria
</a>

<table class="table">
  <thead class="thead-dark">
  <tr>
		<th>ID</th>
		<th>NOMBRE</th>
	</tr>
	</thead>
  <tbody>
	<?php while($cat = $categorias->fetchObject()) { ?>
		<tr>
			<td><?=$cat->id;?></td>
			<td><?=$cat->nombre;?></td>
		</tr>
	<?php } ?>
</table>
