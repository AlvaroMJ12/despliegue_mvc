<?php
//regaloEditarView.php
// Incluimos la autentificación
include_once("common/autentificacion.php"); ?>

<?php include_once("common/cabecera.php"); ?>
<body>
    <?php
        //Esto hace que tengamos el menu de la pagina web
        include_once("common/menu.php"); 
    ?>

    <div class="container md-col-offset-2">
        
		<h2 class="text-center">Editar Regalo para el Participante <?php echo $items->getCodigo()?></h2>
		<!-- Parte específica de nuestra vista -->
		<!-- Formulario para editar un items -->
		<form action="index.php" method="post">
            <input type="hidden" name="controlador" value="Regalo">
		    <input type="hidden" name="accion" value="editar">
		    <input type="hidden" name="codigo" value="<?php echo $items->getCodigo(); ?>">
            
            <div class="form-group">
				<label for="nombre">ID</label>
				<input class="form-control" type="text" name="codigo" value="<?php echo $items->getCodigo()?>" readonly>
			</div>

			<?php echo isset($errores["nombre"]) ? "*" : "" ?>
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input class="form-control" type="text" name="nombre" value="<?php echo $items->getNombre()?>">
			</div>

			<div class="form-group">
				<label for="nombre">Regalo</label>
				<input class="form-control" type="text" name="regalo" value="<?php echo $items->getRegalo()?>">
			</div>

			<input class="btn btn-success btn-block" type="submit" name="submit" value="Aceptar">
			<button class="btn btn-danger btn-block" type="button" onclick="window.location.href='index.php?controlador=Regalo&accion=listar&codigo=<?php echo $items->getCodigo(); ?>'">Cancelar</button>
		</form>
	</div>
</body>