<!--autor:Choez Rosado Erick-->
<?php require_once HEADER; ?>

<div class="container">
<h2> <?php echo $titulo?></h2>
    <div class="card card-body">
    
        <form action="index.php?c=eventos&f=edit" method="POST" name="formProdNuevo" id="formProdNuevo">
        
            <input type="hidden" name="id" id="id" value="<?php echo $even['ev_id']; ?>">

            <div class="form-row">
               <div class="form-group col-sm-6">
               <label for="tipo">¿Qué tipo de evento desea?</label>
                    <select name="tipo" id="ev_tipo" class="form-control">
                        <option value="0"><< Seleccione una opción >></option>
                        <option value="1"<?php if ($even['ev_tipo']);?>>Graduacion</option>
                        <option  value="Navidad"<?php if ($even['ev_tipo'])?>>Navidad</option>
                        <option value="Infantiles & Cumpleaños" <?php if ($even['ev_tipo'])?>>Infantiles & Cumpleaños</option>
                        <option value="Baby Shower" <?php if ($even['ev_tipo'])?>>Baby Shower</option>
                        <option value="Halloween"<?php if ($even['ev_tipo'])?>>Halloween</option>
                        <option value="Bautizo & Primera comunión"<?php if ($even['ev_tipo'])?>>Bautizo & Primera comunión</option>
                        <option value="Belleza & Moda"<?php if ($even['ev_tipo'])?>>Belleza & Moda</option>
                        <option value="Quinceañera"<?php if ($even['ev_tipo'])?>>Quinceañera</option>
                    </select>
                </div>

                <div class="form-group col-sm-6">
                    <label for="ubicacion">Ubicacion</label>
                    <input type="text" name="ubicacion" id="ev_ubicacion" value="<?php echo $even['ev_ubicacion']; ?>" class="form-control" placeholder="Ubicacion del evento" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="cantidad">Número de Invitados</label>
                    <input type="number" name="cantidad" id="ev_cantidad" value="<?php echo $even['ev_cantidad']; ?>" class="form-control" placeholder="Min:1" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="fecha">Fecha del evento</label>
                    <input type="date" id="ev_fecha" name="fecha" value="<?php echo $even['ev_fecha']; ?>" class="form-control">
                </div>          
                <label>¿Qué tipo de producto deseas en tu evento?</label>
                <div class="form-group col-sm-12">
                    
                    <input type="checkbox" id="ev_productos" name="productos" value="Bocaditos"<?php if ($even['ev_productos'] === 'Bocaditos')?>>
                    <label for="Bocaditos">Bocaditos</label>
                   
                    <input type="checkbox" id="ev_productos" name="productos" value="Tortas"<?php if ($even['ev_productos'] === 'Tortas')?>>
                    <label for="Tortas">Tortas</label>

                    
                    <input type="checkbox" id="ev_productos" name="productos" value="Postres"<?php if ($even['ev_productos'] === 'Postres')?>>
                    <label for="Postres">Postres</label>

                </div>
                
                <label>¿Necesitas servicio de arreglos en el lugar del evento?</label>
                <div class="form-group col-sm-6">
               
                    <label for="ev_servicioAdicional">
                    <input type="radio" id="ev_servicioAdicional" name="ev_servicioAdicional" value="Si"<?php if ($even['ev_servicioAdicional'] === 'Si')?>>
                        Si
                    </label>

                    <label for="ev_servicioAdicional">
                    <input type="radio" id="ev_servicioAdicional" name="ev_servicioAdicional" value="No"<?php if ($even['ev_servicioAdicional'] === 'No')?>>
                        No
                    </label>

                </div> 

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary"
                     onclick="if (!confirm('Esta seguro de modificar el evento?')) return false;" >Guardar</button>
                    <a href="index.php?c=eventos&f=index" class="btn btn-primary">Cancelar</a>
                </div>
                    
            </div>  
        </form>
    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once FOOTER; ?>
