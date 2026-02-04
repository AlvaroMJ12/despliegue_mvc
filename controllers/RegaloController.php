<?php
//Creamos el controlador
class RegaloController{
    protected $view;

    //Constructor de View
    function __construct(){
        $this->view = new View();
    }

    //Funcion para obtener todos los datos de Participante
    function listar(){
        require 'models/ParticipanteModel.php';

        //Creamos una instancia  de nuestro modelo
        $items = new ParticipanteModel();

        $listado = $items->getAll();

        $data['items'] = $listado;


        $this->view->show("regaloListarView.php", $data);
    }

    function editar(){
        require 'models/ParticipanteModel.php';

        //Creamos una instancia  de nuestro modelo
        $items = new ParticipanteModel();

        $listado = $items->getAll();

        $data['items'] = $listado;

        $codigo = $_REQUEST["codigo"];

        if(isset($codigo)){
            $regalo = $items->getById($codigo);

            $data['items'] = $regalo; 
        }

        if(isset($_POST['submit'])){
            if (!isset($_REQUEST['nombre']) || empty($_REQUEST['nombre']))
                $errores['nombre'] = "* Nombre: es obligatorio el nombre.";

            if(empty($errores)){
                $items->setCodigo($_POST["codigo"]);
                $items->setNombre($_POST['nombre']);
                $items->setRegalo($_POST['regalo']);
                $items->save();

                header("Location: index.php?controlador=Regalo&accion=listar");
                exit;
            }
        }

        $this->view->show("regaloEditarView.php", $data);
        
    }

}
?>