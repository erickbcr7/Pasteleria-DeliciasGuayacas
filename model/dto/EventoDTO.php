<!--autor:Choez Rosado Erick-->
<?php
// dto data transfer object
class Evento {
    //properties
    private $id, $tipo, $ubicacion,$cantidad, $fecha, 
    $productos, $servicioAdicional;

    function __construct() {
        
    }

    //getters
   function getId() {
        return $this->id;
    }

   
    function getTipo() {
        return $this->tipo;
    }


    function getUbicacion() {
        return $this->ubicacion;
    }

    function getCantidad(){
        return $this->cantidad;
    }
    function getFecha() {
        return $this->fecha;
    }

    function getProductos() {
        return $this->productos;
    }

    function getServicioAdicional() {
        return $this->servicioAdicional;
    }

    //setters
    function setId($id) {
        $this->id = $id;
    }


    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setUbicacion($ubicacion) {
        $this->ubicacion = $ubicacion;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setProductos($productos) {
        $this->productos = $productos;
    }

    function setServicioAdicional($servicioAdicional) {
        $this->servicioAdicional = $servicioAdicional;
    }

    // Methods get y set parametrizados
    public function __set($tipo, $valor) {
        // Verifica que la propiedad exista
        if (property_exists('Evento', $tipo)) {
            $this->$tipo = $valor;
        } else {
            echo $tipo . " No existe.";
        }
    }

    public function __get($tipo) {
      // Verifica que exista la propiedad
        if (property_exists('Evento', $tipo)) {
            return $this->$tipo;
        }
// Retorna null si no existe
        return NULL;
    }

    
    
}