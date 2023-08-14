<?php
//autor: Moreno Bravo Jose
require_once 'model/dao/EventoDAO.php';
require_once 'model/dto/EventoDTO.php';

class EventosController {
    private $model;
    private $evento;
 
    public function __construct() {
        $this->evento = new EventoDAO();
    }

    public function index() {

        $this->model=new EventoDAO();
        $resultados = $this->model->getAll();
        $evento = $this->evento;
        if (empty($_SESSION[ID_ROLE]) || $_SESSION[ID_ROLE] == '2') {
            require_once VEVENTOS. 'user.php';
        }else{
            require_once VEVENTOS . 'list.php';
        }
      
        
    }

      public function search(){
        // lectura de parametros enviados
        $parametro = (!empty($_POST["b"]))?htmlentities($_POST["b"]):"";
       //comunica con el modelo (enviar datos o obtener datos)
        $resultados = $this->evento->selectAll($parametro);
       // comunicarnos a la vista
       $titulo="Buscar servicio";
       require_once VEVENTOS.'list.php';
      }
  
      // muestra el formulario de nuevo producto
      public function view_new(){
        //comunicarse con el modelo
        $resultados = $this->evento->selectAll("");

        // comunicarse con la vista
        $titulo="Nuevo servicio";
        require_once VEVENTOS.'nuevo.php';
       }

       // lee datos del formulario de nuevo servicio y lo inserta en la bdd (llamando al ServicioDAO)
      public function new() {
        //cuando la solicitud es por post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // leer parametros
            $even = new Evento();
            $even->setId(htmlentities($_POST['id']));
            $even->setTipo(htmlentities($_POST['tipo']));
            $even->setUbicacion(htmlentities($_POST['ubicacion']));
            $even->setCantidad(htmlentities($_POST['cantidad']));
            $even->setFecha(htmlentities($_POST['fecha']));
            $even->setProductos(htmlentities($_POST['productos']));
            $even->setServicioAdicional(htmlentities($_POST['servicioAdicional']));
            
    
            // actualizar el servicio
            $exito = $this->evento->insert($even);
    
            // establecer un mensaje y color de acuerdo al éxito de la actualización
            if ($exito) {
                $msj = 'servicio guardado exitosamente';
                $color = 'primary';
            } else {
                $msj = "No se pudo realizar el guardado";
                $color = "danger";
            }
    
            // almacenar el mensaje y color en la sesión para su posterior visualización
            if(!isset($_SESSION)) { session_start(); }
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
    
            // redirigir al usuario a la página de detalle del servicio actualizado
            header('Location:index.php?c=eventos&f=index&id=');
          }
    }

    public function delete(){
        //leer parametros
        $even = new Evento();
        $even->setId(htmlentities($_REQUEST['id']));
        $even->setUbicacion('ubicacion');
    
        //comunicando con el modelo
        $exito = $this->evento->delete($even);
        $msj = 'Servicio eliminado exitosamente';
        $color = 'primary';
        if (!$exito) {
            $msj = "No se pudo eliminar el Servicio";
            $color = "danger";
        }
    
        if(!isset($_SESSION)){ session_start();};
        $_SESSION['mensaje'] = $msj;
        $_SESSION['color'] = $color;
        //llamar a la vista
        header('Location:index.php?c=eventos&f=index');
    }

    // muestra el formulario de editar servicio
    public function view_edit(){
        //leer parametro
        $id= $_REQUEST['id']; // verificar, limpiar
        //comunicarse con el ServiciosDAOo de clientes
       $evento = $this->evento->selectOne($id);
   
       // comunicarse con la vista
       $titulo="Editar servicio";
       require_once VEVENTOS.'edit.php';
   
     }

     // lee datos del formulario de editar servicios y lo actualiza en la bdd (llamando al ServiciosDAOo)
     public function edit(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // leer parametros
            $even = new Evento();
            $even->setId(htmlentities($_POST['id']));
          $even->setTipo(htmlentities($_POST['tipo']));
          $even->setUbicacion(htmlentities($_POST['ubicacion']));
          $even->setCantidad(htmlentities($_POST['cantidad']));
          $even->setFecha(htmlentities($_POST['fecha']));
          $even->setProductos(htmlentities($_POST['productos']));
          $even->setServicioAdicional(htmlentities($_POST['servicioAdicional']));
    
            // actualizar el cliente
            $exito = $this->evento->update($evento);
    
            // establecer un mensaje y color de acuerdo al éxito de la actualización
            if ($exito) {
                $msj = 'servicio actualizado exitosamente';
                $color = 'primary';
            } else {
                $msj = "No se pudo realizar la actualizacion";
                $color = "danger";
            }
    
            // almacenar el mensaje y color en la sesión para su posterior visualización
            if(!isset($_SESSION)) { session_start(); }
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
    
            // redirigir al usuario a la página de detalle del servicio actualizado
            header('Location:index.php?c=eventos&f=index');
        }
    }
    
  }

?>