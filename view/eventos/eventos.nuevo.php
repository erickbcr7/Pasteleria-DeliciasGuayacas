<!--autor: Choez Rosado Erick-->
<!-- incluimos  Encabezado -->
<?php require_once HEADER; ?>

<div class="container">
<h2> <?php echo $titulo?></h2>
    <div class="card card-body">
       
        <form action="index.php?c=eventos&f=new" method="POST" name="formProdNuevo" id="formProdNuevo">
            <div class="form-row">
                 <div class="form-group col-sm-6">
                    <!--<label for="tipo">Tipo</label> -->
                    <!--<input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre producto" required> -->
                    <label for="tipo">¿Qué tipo de evento desea?</label>
                    <select id="ev_tipo" name="tipo" class="form-control">
                        <option value="0"><< Seleccione una opción >></option>
                        <option value="Graduacion">Graduacion</option>
                        <option value="Navidad">Navidad</option>
                        <option value="Infantiles & Cumpleaños">Infantiles & Cumpleaños</option>
                        <option value="Baby Shower">Baby Shower</option>
                        <option value="Halloween">Halloween</option>
                        <option value="Bautizo & Primera comunión">Bautizo & Primera comunión</option>
                        <option value="Belleza & Moda">Belleza & Moda</option>
                        <option value="Quinceañera">Quinceañera</option>
                    </select>
                </div>

                <div class="form-group col-sm-6">
                    <label for="ubicacion">Ubicacion</label>
                    <input type="text" name="ubicacion" id="ev_ubicacion" class="form-control" placeholder="Ubicacion del evento" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="cantidad">Número de Invitados</label>
                    <input type="number" name="cantidad" id="ev_cantidad" class="form-control" placeholder="Min:1" required>
                </div>

                <div class="form-group col-sm-6">
                    <label for="fecha">Fecha del evento</label>
                    <input type="date" id="ev_fecha" name="fecha" class="form-control">
                </div>          
                <label>¿Qué tipo de producto deseas en tu evento?</label>
                <div class="form-group col-sm-12">
                    
                    <input type="checkbox" id="ev_productos" name="productos" value="Bocaditos">
                    <label for="Bocaditos">Bocaditos</label>
                   
                    <input type="checkbox" id="ev_productos" name="productos" value="Tortas">
                    <label for="Tortas">Tortas</label>

                    
                    <input type="checkbox" id="ev_productos" name="productos" value="Postres" >
                    <label for="Postres">Postres</label>

                </div>
                
                <label>¿Necesitas servicio de montaje en el lugar del evento?</label>
                <div class="form-group col-sm-6">
               
                    <label for="servicioAdicional">
                    <input type="radio" id="ev_servicioAdicional" name="servicioAdicional" value="Si">
                        Si
                    </label>

                    <label for="servicioAdicional">
                    <input type="radio" id="ev_servicioAdicional" name="servicioAdicional" value="No">
                        No
                    </label>

                </div> 

                <div class="form-group mx-auto">
                    <button type="submit" class="btn btn-primary">Guardar</button>

                    <a href="index.php?c=eventos&f=index" class="btn btn-primary">
                        Cancelar</a>
                </div>
            </div>  
        </form>


    </div>
</div>

<!-- incluimos  pie de pagina -->
<?php require_once FOOTER; ?>
