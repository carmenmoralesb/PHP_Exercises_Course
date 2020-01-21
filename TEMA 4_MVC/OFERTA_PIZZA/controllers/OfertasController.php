<?php

require_once('models/OfertasModel.php');

class ofertasController {
    public function index() {
        $oferta=new ofertasModel();
        $todasOfertas = $oferta->getOfertas();
        require_once('views/ofertas/Principal.phtml');
    }

    public function listarTodasOfertas() {
        $oferta=new ofertasModel();
        $todasOfertas = $oferta->getOfertas();
        require_once('views/ofertas/listarTodasOfertas.phtml');
    }

    public function NuevaOferta() {
        $oferta=new ofertasModel();

        //var_dump($oferta);
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $oferta_selec = $oferta->getOfertasById($id);
            //var_dump($oferta_selec);
            $oferta_selec = $oferta_selec->fetchObject();
            //print_r($oferta_selec->imagen);
           // var_dump($oferta_selec);
        }
        require_once 'views/ofertas/insertarOfertas.phtml';
    }

    public function BorrarOferta() {
        if (isset($_GET['id'])) {
           $id=$_GET['id'];
           $oferta=new OfertasModel();
           $oferta=$oferta->setId($id);
          $delete = $oferta->Delete();
        }
    }

    public function grabarOferta() {
        //print_r($_POST);
        if (isset($_POST)) {
            $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            //$imagen= isset($_POST['imagen']) ? $_POST['imagen'] : false;

            // guardar imagen
            if (isset($_FILES['imagen'])) {
            $file =$_FILES['imagen'];
            $filename = $file['name'];
            $mimetype = $file['type'];

            var_dump($_FILES['imagen']);
            //var_dump($titulo);
            //var_dump($descripcion);

            if ($mimetype == 'image/jpeg'  || $mimetype == 'image/jpg' || $mimetype=='image/png' || $mimetype=='image/gif') {
                if (!is_dir('uploads/img')) {
                    var_dump($FILE);
                    mkdir('uploads/img',0777,true);
                }
                move_uploaded_file($file['tmp_name'],'uploads/img/'.$filename);
            }
        }
            $imagen = 'uploads/img/'.$file['name'];
            $imagen = (string)$imagen;
            var_dump($imagen);

            if ($imagen && $titulo && $descripcion) {
                $oferta = new ofertasModel($imagen,$titulo,$descripcion);

                if (!isset($_GET['id'])) {
                $save = $oferta->Insert();

                if($save) {
                    $_SESSION['inserción'] = "Inserción realizada correctamente";
                    echo $_SESSION['inserción'];
                    header("Location:index.php?c=ofertas&a=index");
                }
                else {
                    $_SESSION['inserción'] = "Inserción no realizada";
                    header("Location:index.php?c=ofertas&a=insertarofertas");
                }
                }

                else {
                    $save = $oferta->Modificar($_GET['id'],$imagen,$titulo,$descripcion);
                    if ($save) {
                        $_SESSION['modificar'] = "Modificación realizada correctamente";
                        echo $_SESSION['modificiar'];
                        header("Location:index.php?c=ofertas&a=index");
                    }
                    else {
                        $_SESSION['modificar'] = "Modificación no realizada";
                        header("Location:index.php?c=ofertas&a=insertarofertas");
                    }
                }
            } 
            else {
                    $_SESSION['inserción'] = "Inserción no realizada";
                    echo $_SESSION['inserción'];
                }
        }
    }
}