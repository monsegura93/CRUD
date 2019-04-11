<!DOCTYPE html>
<html>
    <head>
        <?php
            $con = mysqli_connect("localhost", "root", "root", "crud") or die ("Error");
        ?>
        <title>CRUD | Editar</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/uikit.min.css" />
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body style="width:80%; margin: 50px auto;">
        <div class="uk-grid-large uk-child-width-expand@s" uk-grid>
            <h2 class="uk-heading-bullet">Editar Usuario</h2>
        </div>
        <?php

            $usuario = "";
            $pass = "";
            $email = "";
            $editar_id = "";
            $actualizar = "";
            $ejecutar = "";
            //valido que exista la editar exista por metodo get
            if(isset($_GET['editar'])){

                $editar_id = $_GET['editar']; //obtengo la variable enviada por get

                $consulta = "SELECT * FROM users WHERE id='$editar_id'"; 
                $ejecutar = mysqli_query($con, $consulta);

                $fila = mysqli_fetch_array($ejecutar);

                $usuario = $fila['user'];
                $pass = $fila['password'];
                $email = $fila['email'];
            }
        ?>

        <br>

        <form method="POST" action="editar.php" id="MiFormulario">
            <input type="hidden" name="id" value="<?php echo $editar_id; ?>"><br>
            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input class="uk-input" type="text" name="user" value="<?php echo $usuario; ?>">
                </div>
            </div>
            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input class="uk-input" type="text" name="passw" value="<?php echo $pass; ?>">
                </div>
            </div>
            <div class="uk-margin">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: mail"></span>
                    <input class="uk-input" type="text" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="uk-margin">
                <div class="uk-inline">
                    <input type="submit" name="actualizar" id="actualizar" value="ACTUALIZAR DATOS" class="uk-button uk-button-secondary actualizar">
                </div>
            </div>
        </form>

        <?php
            if(isset($_POST['actualizar'])){
                $id = $_POST['id'];
                $actualizar_usr = $_POST['user'];
                $actualizar_password = $_POST['passw'];
                $actualizar_email = $_POST['email'];

                $actualizar = "UPDATE users SET user = '$actualizar_usr', password = '$actualizar_password', email = '$actualizar_email' WHERE id = '$id'";

                $ejecutar = mysqli_query($con, $actualizar);

                if($ejecutar){
                    header("Location: index.php");
                }
            }
        ?>

    </body>
</html>