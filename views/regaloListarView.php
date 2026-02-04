<?php
//regaloListarView.php
// Incluimos la autentificación
include_once("common/autentificacion.php"); ?>

<?php include_once("common/cabecera.php"); ?>
<body>
    <?php
        //Esto hace que tengamos el menu de la pagina web
        include_once("common/menu.php"); 
    ?>

    <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Regalo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($items as $item) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $item->getCodigo() ?>
                        </td>
                        <td>
                            <?php echo $item->getNombre() ?>
                        </td>
                        <td>
                            <?php echo $item->getRegalo() ?>
                        </td>
                        <td>
                            <a href="index.php?controlador=Regalo&accion=editar&codigo=<?php
                                // Para editar() necesitamos saber el id para saber a quien editar
                                echo $item->getCodigo() 
                                ?>" class="btn btn-primary btn-xs">
                                Editar
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

</body>