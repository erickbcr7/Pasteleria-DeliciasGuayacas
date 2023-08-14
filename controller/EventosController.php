<!--autor:Choez Rosado Erick-->
<?php
require_once 'model/dao/EventoDAO.php';
require_once 'model/dto/EventoDTO.php';


class EventosController {
    private $evento;
    public function __construct() {// constructor
        $this->evento = new EventoDAO();
    }

    // funciones del controlador
    public function index() {
     
      //comunica con el modelo (enviar datos o obtener datos)
      $resultados = $this->evento->selectAll("");
      // comunicarnos a la vista
      $titulo="Buscar Eventos";
      require_once VEVENTOS.'list.php';
      
    }

    public function search(){
      // lectura de parametros enviados
      $parametro = (!empty($_POST["b"]))?htmlentities($_POST["b"]):"";
     //comunica con el modelo (enviar datos o obtener datos)
      $resultados = $this->evento->selectAll($parametro);
     // comunicarnos a la vista
     $titulo="Buscar Eventos";
     require_once VEVENTOS.'list.php';
    }

    // muestra el formulario de nuevo evento
    public function view_new(){
          //comunicarse con el modelo
          $resultados = $this->evento->selectAll("");

          // comunicarse con la vista
          $titulo="Nuevo Evento";
          require_once VEVENTOS.'nuevo.php';

    }

    // lee datos del formulario de nuevo evento y lo inserta en la bdd (llamando al modelo)
    public function new() {
      //cuando la solicitud es por post
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el evento
          
          $even = new Evento();
          // lectura de parametros
          $even->setId(htmlentities($_POST['id']));
          $even->setTipo(htmlentities($_POST['tipo']));
          $even->setUbicacion(htmlentities($_POST['ubicacion']));
          $even->setCantidad(htmlentities($_POST['cantidad']));
          $even->setFecha(htmlentities($_POST['fecha']));
          $even->setProductos(htmlentities($_POST['productos']));
          $even->setServicioAdicional(htmlentities($_POST['servicioAdicional']));
        
          //comunicar con el modelo
          $exito = $this->evento->insert($even);

          $msj = 'Producto guardado exitosamente';
          $color = 'primary';
          if ($exito) {
              $msj = "No se pudo realizar el guardado";
              $color = "danger";
          }
          if (!isset($_SESSION)) {
              session_start();
          };
          $_SESSION['mensaje'] = $msj;
          $_SESSION['color'] = $color;
          //llamar a la vista
          header('Location:index.php?c=eventos&f=index');
      } 
  }
  
  public function delete(){
      //leeer parametros
     $even = new Evento();
     $even->setId(htmlentities($_REQUEST['id']));
     $even->setUbicacion('ubicacion');
           
         //comunicando con el modelo
         $exito = $this->evento->delete($even);
        $msj = 'Evento eliminado exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo eliminar los datos";
                $color = "danger";
            }
             if(!isset($_SESSION)){ session_start();};
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
        //llamar a la vista
          header('Location:index.php?c=eventos&f=index');
  }


   // muestra el formulario de editar producto
   public function view_edit(){
     //leer parametro
     $id= $_REQUEST['id']; // verificar, limpiar
     //comunicarse con el modelo de productos
    $even = $this->evento->selectOne($id);
    // comunicarse con la vista
    $titulo="Editar producto";
    require_once VEVENTOS.'edit.php';

  }

   // lee datos del formulario de editar producto y lo actualiza en la bdd (llamando al modelo)
   public function edit(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {// actualizar
      // verificaciones
             //if(!isset($_POST['codigo'])){ header('');}
          // leer parametros
          $even = new Evento();
          $even->setId(htmlentities($_POST['id']));
          $even->setTipo(htmlentities($_POST['tipo']));
          $even->setUbicacion(htmlentities($_POST['ubicacion']));
          $even->setCantidad(htmlentities($_POST['cantidad']));
          $even->setFecha(htmlentities($_POST['fecha']));
          $even->setProductos(htmlentities($_POST['productos']));
          $even->setServicioAdicional(htmlentities($_POST['servicioAdicional']));
        
          //llamar al modelo
          $exito = $this->evento->update($even);
          
          $msj = 'Producto actualizado exitosamente';
          $color = 'primary';
          if (!$exito) {
              $msj = "No se pudo realizar la actualizacion";
              $color = "danger";
          }
           if(!isset($_SESSION)){ session_start();};
          $_SESSION['mensaje'] = $msj;
          $_SESSION['color'] = $color;
      //llamar a la vista
     header('Location:index.php?c=eventos&f=index');
         
      } 
   }
}
