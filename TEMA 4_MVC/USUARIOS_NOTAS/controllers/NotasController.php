<?php

require_once('models/NotasModel.php');

class NotasController {

    public function index() {
    require_once('views/notas/Principal.phtml');
    }

    public function listarTodasNotas() {
        $nota=new NotasModel();
        $todasNotas = $nota->get_all();
        require_once('views/notas/listarTodasNotas.phtml');
    }

    public function insertarNotas() {
        require_once 'views/notas/insertarNotas.phtml';
    }

    public function verNotasUsuario() {

        if(isset($_GET["u"])) {
            $id = $_GET["u"];

            if ($id) {
                $nota=new NotasModel();
                $todasNotas = $nota->notas_usuario($id);
                require_once 'views/notas/verNotasUsuario.phtml';
            }
            else {
                $_SESSION['consulta'] = "¡Encontrado!";
                echo $_SESSION['consulta'];

            }
        }
            else {
                $_SESSION['consulta'] = "No encontrado";
                echo $_SESSION['consulta'];
            }
    }


    public function save() {
        //print_r($_POST);
        if (isset($_POST)) {
            
            $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $usuario_id = isset($_POST['usuario_id']) ? $_POST['usuario_id'] : false;

            if ($usuario_id && $titulo && $descripcion) {
                $nota = new NotasModel($usuario_id,$titulo,$descripcion);
                $save = $nota->save();

                if($save) {
                    $_SESSION['inserción'] = "Inserción realizada correctamente";
                    echo $_SESSION['inserción'];
                }
                else {
                    //$_SESSION['inserción'] = "Inserción no realizada";
                   // header("Location:index.php?c=Notas&a=insertarNotas");

                }
            } else {
                    $_SESSION['inserción'] = "Inserción no realizada";
                    echo $_SESSION['inserción'];
                }
        }else{
             header("Location:index.php?c=Notas&a=insertarNotas");
        }
           
    }
}
?>