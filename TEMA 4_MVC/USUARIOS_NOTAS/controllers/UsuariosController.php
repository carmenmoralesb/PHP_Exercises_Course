<?php

require_once('models/UsuariosModel.php');

class UsuariosController {

    public function index() {
    require_once('views/usuario/Principal.phtml');
    }

    public function TodosUsuarios() {
        $usuario=new UsuariosModel();
        $todosUsuarios = $usuario->get_all();
        require_once('views/usuario/TodosUsuariosView.phtml');
    }

    public function registro() {
        require_once 'views/usuario/registro.php';
    }

    public function BorrarUsuario() {
        // le paso el id de usuario para borrarlo por la URL
        //$id = $_GET["u"];
        //$usuario=new UsuariosModel();
        // instancio el usuario y lo borro
        //$todosUsuarios = $usuario->delete($id);


        // otra forma

        if (isset($_GET['u'])) {
           $id=$_GET['u'];
           $usuario=new UsuariosModel();
           $usuario=$usuario->setId($id);
          $delete = $usuario->delete();

        }
    }

    public function save() {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if ($nombre && $apellidos && $email && $password) {
                $usuario = new UsuariosModel($nombre,$apellidos,$email,$password);

                $save = $usuario->save();
                if($save) {
                    $_SESSION['inserción'] = "Inserción realizada";
                    echo $_SESSION['inserción'];
                    header("Location:index.php?c=Usuarios&a=TodosUsuarios");

                }
                else {
                    $_SESSION['inserción'] = "Inserción fallida";
                    echo $_SESSION['inserción'];

                }
            }

                else {
                    $_SESSION['inserción'] = "Inserción fallida";
                    echo $_SESSION['inserción'];
                }
            }
        else {

            header("Location:index.php?c=Usuarios&a=TodosUsuarios");
        }
    }
}
?>