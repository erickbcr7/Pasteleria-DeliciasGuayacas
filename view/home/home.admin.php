<?php require_once HEADER?>
    <div class="container">
        <h1>Bienvenido, <?php echo $_SESSION['name']; ?>.</h1>
        <h3>Esta es la pantalla de control de la pastelería</h3>
        <h3>Acciones disponibles:</h3>
        <ul>
            <li><a href="index.php?c=Citas">Eventos</a></li>
            <li><a href="index.php?c=Productos">Productos</a></li>
            <li><a href="index.php?c=Eventos">Eventos</a></li>
            <li><a href="index.php?c=Servicios"></a>Pedidos</li>
            <li><a href="index.php?c=Clientes">Usuarios</a></li>
        </ul>
        
    </div>
<?php require_once FOOTER?>