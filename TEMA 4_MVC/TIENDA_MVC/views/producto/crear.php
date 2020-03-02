<?php if(isset($edit) && isset($pro) && is_object($pro)) { ?>
	<h1>Editar producto <?=$pro->nombre?></h1>
	<?php $url_action = "index.php?c=Producto&a=save&id=".$pro->id; ?>
	
<?php } else { ?>
	<h1>Crear nuevo producto</h1>
	<?php $url_action = "index.php?c=Producto&a=save"; ?>
<?php } ?>
	
<div class="form_container ml-auto mr-auto">
	<form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label for="nombre">Nombre</label>
		<input type="text" class="form-control" name="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : ''; ?>"/>
	</div>
	<div class="form-group">
		<label for="descripcion">Descripción</label>
		<textarea  class="form-control" name="descripcion"><?=isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?></textarea>
	</div>
	<div class="form-group">
		<label for="precio">Precio</label>
		<input type="text" class="form-control" name="precio" value="<?=isset($pro) && is_object($pro) ? $pro->precio : ''; ?>"/>
	</div>
	<div class="form-group">
		<label for="stock">Stock</label>
		<input type="number" class="form-control" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : ''; ?>"/>
</div>
<div class="form-group">
		<label for="categoria">Categoria</label>
		<?php $categorias = Utils::mostrarCats(); ?>
		<select name="categoria" class="form-control">
			<?php while ($cat = $categorias->fetchObject()): ?>
				<option value="<?= $cat->id ?>" <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : ''; ?>>
					<?= $cat->nombre ?>
				</option>
			<?php endwhile; ?>
		</select>
			</div>
		<div class="form-group">	
		<label for="imagen">Imagen</label>
		<?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
			<img src="uploads/images/<?=$pro->imagen?>" class="thumb"/> 
		<?php endif; ?>
		<input type="file" name="imagen" />
		</div>
		<button type="submit" class="btn btn-primary">Guardar</button>
	</form>
</div>