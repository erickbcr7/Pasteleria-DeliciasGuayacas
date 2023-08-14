<?php require_once HEADER;
if(!isset($_SESSION)){session_start();}
if (isset($_SESSION['name']) && isset($_SESSION['role'])) {
    header("Location:index.php"); 
}
?>
<div class="container" style="margin-top: 30px;">
    <div class="mx-auto card border-primary mb-3" style="max-width: 40rem;  border: none;">
        <div class="card-header text-danger text-center" style="font-weight: bold;">INICIAR SESIÓN</div>
        <div class="card-body text-primary">
            <form action="index.php?c=auth&f=login" onSubmit=" return validar()" method="post">
                <div class="mb-3 row">
                    <label style="margin-top: 20px; font-size: 15px; color: black; text-align: center;" for="email" class="col-sm-2 col-form-label">Usuario:</label>
                    <div class="col-sm-10"> <br>
                        <input type="text" class="form-control" id="email" name="email" onchange="showOrDissmissAlert(this, false)">
                    </div>
                    <small class="alert-danger invisible w-75 ms-auto me-2 mt-2">Su correo es invalido</small>
                </div>
                <div class="mb-3 row">
                    <label style="font-size: 14px; color: black; text-align: center;" for="password" class="col-sm-2 col-form-label">Contraseña:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" onchange="showOrDissmissAlert(this, false)">
                    </div>
                    <small class="alert-danger invisible w-75 ms-auto me-2 mt-2">Su contraseña es invalida</small>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-6 offset-sm-3">
                        <button style="background-color: #FFD700; font-weight: bold; color: blue; padding: 10px; border: none;" class="btn btn-outline-success w-100" 
                        type="submit">INGRESAR</button>
                    </div>  
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const $ = (element) => document.querySelector(element);

    function validar() {
        var valido = true;
        const $email = $("#email");
        const $password = $("#password");

        //validacion del correo
        if (!validarEmail($email.value)) {
            showOrDissmissAlert($email, true);
            valido = false;
        } else {
            showOrDissmissAlert($email, false);
        }

        //validacion de la contraseña
        if ($password.value === "" || $password.value === null) {
            valido = false;
            showOrDissmissAlert($password, true);
        }
        return valido;
    }

    function validarEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    const showOrDissmissAlert = (element, show) => {
        element.style.border =  show ? "1px solid red" : "1px solid #ccc";
        const textsReplace = show ? ["invisible","alert"] :["alert","invisible"];
        const parentNode = element.parentNode;
        const $small = parentNode.nextElementSibling || parentNode.nextSibling;
        $small.className = $small.className.replaceAll(textsReplace[0], textsReplace[1]);
    };

    const $checkbox = $("#flexCheckDefault");
    const $password = $("#password");
    $checkbox.addEventListener("change", () => {
        $password.type = $checkbox.checked ? "text" : "password";
    });
</script>