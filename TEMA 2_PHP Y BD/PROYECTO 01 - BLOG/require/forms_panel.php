<div class="lateral">
    <div class="lat1">
    <?php require_once "require/form_buscar.php"?>
    </div>
    
    <div class="lat1">
    <h2 align="center" class="cabeform">Panel</h2>
    <ul class="listapanel">
    <li class="botonpanel"><a href="crear_entrada.php">Crear entrada</a></li>
    <li class="botonpanel"><a href="crear_categoria.php">Crear categoría</a></li>
    <li class="botonpanel"><a href="mis_datos.php?id=<?php ECHO $_SESSION['id']?>">Mis datos</a></li>
    <li class="botonpanel"><a href="logout.php">Cerrar sesión</a></li>
    </ul>
</div>
</div>