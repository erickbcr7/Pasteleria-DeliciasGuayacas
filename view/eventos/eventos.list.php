<!--autor: Choez Rosado Erick-->
<?php require_once HEADER; ?>

<div class="container">
<h2> <?php echo $titulo?></h2>
    <div class="row">
        <div class="col-sm-6">
            <form action="index.php?c=eventos&f=search" method="POST">
                <input type="text" name="b" id="busqueda"  placeholder="buscar..."/>
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
            </form>       
        </div>
        <div class="col-sm-6 d-flex flex-column align-items-end">
            <a href="index.php?c=eventos&f=view_new"> 
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-plus"></i> 
                   Nuevo</button>

            </a>
        </div>
    </div>
    <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
             <th>Tipo de Evento </th>
            <th>Ubicacion </th>
            <th>Número de Invitados</th>
            <th>Fecha del Evento </th>
            <th>Productos </th>
            <th>Servicio Adicional </th>
            </thead>
            <tbody class="tabladatos">
                <?php         
                foreach ($resultados as $fila) {
                  ?>
                <tr>
                    <td><?php echo $fila['ev_tipo'];?></td>
                    <td><?php echo $fila['ev_ubicacion'];?></td>
                    <td><?php echo $fila['ev_cantidad'];?></td>
                    <td><?php echo $fila['ev_fecha'];?></td>
                    <td><?php echo $fila['ev_productos'];?></td>
                    <td><?php echo $fila['ev_servicioAdicional'];?></td>
                    <td>
                        <a class="btn btn-primary" 
                    href="index.php?c=eventos&f=view_edit&id=<?php echo  $fila['ev_id']; ?>">
                    <i class="fas fa-marker"></i></a>
                    <a class="btn btn-danger" 
                   onclick="if(!confirm('Esta seguro de eliminar el evento?'))return false;" 
                    href="index.php?c=eventos&f=delete&id=<?php echo  $fila['ev_id']; ?>">
                    <i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                <?php  }?>
            </tbody>
        </table>
    </div>

</div>
<?php  require_once FOOTER ?>