<!DOCTYPE html>
<html>
    <head>
        <?php
            $con = mysqli_connect("localhost", "root", "root", "crud") or die ("Error");
        ?>
        <title>CRUD | Agregar</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/uikit.min.css" />
        <script src="js/uikit.min.js"></script>
        <script src="js/uikit-icons.min.js"></script>
    </head>
    <body style="width:80%; margin: 50px auto;">

        <div class="uk-grid-large uk-child-width-expand@s" uk-grid>
            <h2 class="uk-heading-bullet">Agregar Usuario</h2>
        </div>

        <div class="uk-child-width-expand@s" uk-grid>
            <form action="agregar.php" method="POST">
                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                        <input class="uk-input" type="text" name="user" placeholder="Escriba usuario">
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: lock"></span>
                        <input class="uk-input" type="password" name="passw" placeholder="Escriba password">
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: mail"></span>
                        <input class="uk-input" type="text" name="email" placeholder="Escriba email">
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-inline ">
                        <input type="submit" name="insert" value="INSERTAR DATOS" class="uk-button uk-button-secondary uk-button-large ">
                    </div>
                </div>
            </form>

            <?php
                if(isset($_POST['insert'])){
                    $usr = $_POST['user'];
                    $pass = $_POST['passw'];
                    $email = $_POST['email'];

                    $insertar = "INSERT INTO users (user, password, email) VALUES ('$usr', '$pass', '$email')";

                    $ejecutar = mysqli_query($con, $insertar);

                    if($ejecutar){
                        header("Location: index.php");
                        echo "<script>window.open('index.php','_self')</script>";
                    }
                }
            ?>
        </div>        
    </body>
</html>