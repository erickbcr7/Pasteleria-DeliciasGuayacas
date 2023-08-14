<!--autor:Choez Rosado Erick-->
<?php
// dao data access object
require_once 'config/Conexion.php';

class EventoDAO {
    private $con;

    public function __construct() {
        $this->con = Conexion::getConexion();
    }

    public function selectAll($parametro) {
        // sql de la sentencia
      $sql = "SELECT * FROM eventos WHERE ev_tipo LIKE :b1";
      $stmt = $this->con->prepare($sql);
      // preparar la sentencia
      $conlike = $parametro . '%';
      $data = array('b1' => $conlike);
      // ejecutar la sentencia
      $stmt->execute($data);
      //recuperar  resultados
      $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
      //retornar resultados
      return $resultados;
  }

  public function selectOne($id) { // buscar un evento por su id
        $sql = "select * from eventos where ".
        "ev_id=:id";
        // preparar la sentencia
        $stmt = $this->con->prepare($sql);
        $data = ['id' => $id];
        // ejecutar la sentencia
        $stmt->execute($data);
        // recuperar los datos (en caso de select)
        $evento = $stmt->fetch(PDO::FETCH_ASSOC);// fetch retorna el primer registro
        // retornar resultados
        return $evento;
    }

    public function insert($even){
        try{
        //sentencia sql
        $sql = "INSERT INTO eventos ( ev_tipo,  ev_ubicacion, ev_cantidad, ev_fecha, 
        ev_productos, ev_servicioAdicional) VALUES 
        ( :tip, :ubc, :can :fecha, :prod, :serv)";

        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
        'tip' =>  $even->getTipo(),
        'ubc' =>  $even->getUbicacion(),
        'can' =>  $even->getCantidad(),
        'fecha' =>  $even->getFecha(),
        'prod' =>  $even->getProductos(),
        'serv' =>  $even->getServicioAdicional()
        ];
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
        //rowCount permite obtner el numero de filas afectadas
           return false;
        }
    }catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
        return true;
    }

    public function update($even){

        try{
            //prepare
            $sql = "UPDATE eventos SET ev_tipo=:tip," .
                    "ev_ubicacion=:ubc,ev_cantidad=:can,ev_fecha=:fecha,ev_productos=:prod,ev_servicioAdicionaln=:serv, WHERE ev_id=:id";
           //bind parameters
            $sentencia = $this->con->prepare($sql);
            $data = [
                'tip' =>  $even->getTipo(),
                'ubc' =>  $even->getUbicacion(),
                'can' =>  $even->getCantidad(),
                'fecha' =>  $even->getFecha(),
                'prod' =>  $even->getProductos(),
                'serv' =>  $even->getServicioAdicional(),
                'id' =>  $even->getId()
                ];
            //execute
            $sentencia->execute($data);
            //retornar resultados, 
            if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
                //rowCount permite obtner el numero de filas afectadas
                return false;
            }
        }catch(Exception $e){
          echo $e->getMessage();
            return false;
        }
            return true;       
    }

   public function delete($even){
       try{
        //prepare
        $sql = "UPDATE eventos SET ev_tipo=:tip,ev_ubicacion=:ubc,ev_cantidad=:can," .
        "ev_fecha=:fecha,ev_productos=:prod,ev_servicioAdicionaln=:serv WHERE ev_id=:id";
        //now());
        //bind parameters
        $sentencia = $this->con->prepare($sql);
        $data = [
            'tip' =>  $even->getTipo(),
            'ubc' =>  $even->getUbicacion(),
            'can' =>  $even->getCantidad(),
            'fecha' =>  $even->getFecha(),
            'prod' =>  $even->getProductos(),
            'serv' =>  $even->getServicioAdicional(),
            'id' =>  $even->getId()
        ];
        //execute
        $sentencia->execute($data);
        //retornar resultados, 
        if ($sentencia->rowCount() <= 0) {// verificar si se inserto 
        //rowCount permite obtner el numero de filas afectadas
        return false;
        }
    }catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
    
        return true;
    }
    
}
