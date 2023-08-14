<?php 
ob_start();
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN CLISER</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <style>
        .error {
            /* text-align: center; */
            color: white;
        }

        a:visited {
            color: white;
        }
    </style>
    <!--Header-->
        <header id="header">
            <nav>
                <div class="container">
                    <div class="text-center">
                    </div>
                </div>
            </nav>

        </header>

<main id="site-main">
    <div class="filter">
        <a href="index.php"><i class="fas fa-angle-double-left" aria-hidden="true"></i>INICIO</a>
    </div>
    <h2>ADMINISTRADOR</h2>
    <div class="box">
        <class= class="fondo">

        <h2 class="title">LOGIN</h2>

        <form action="" method="POST">
            <!--REGISTRAR USUARIO-->
            <div class="inputBox">
                <i class="fa-solid fa-user"></i>
                <input class = "inp" id="usuario" type="text" name="username" required>
                <span>Usuario</span>
                <i></i>
            </div>

            <!--REGISTRAR CONTRASEÑA-->

            <div class="inputBox">
                <i class="fa-solid fa-user"></i>
                <input class = "inp" id="clave" type="password" name="passcode" required>
                <span>Contraseña</span>
                <i></i>
            </div>
            <div style="text-align: center;">

                <input type="submit" class="btn text-dark update" value="Iniciar" name="submit-user">
                <br>
                <br>
                <!-- <a href="admin.php">btn provicional</a> -->
            </div>
        </form>

        </div>
    
     </div>


</main>

<?php 
        $con = mysqli_connect("localhost", "root", "", "refrigeracion");

        if(isset($_POST['submit-user'])){

            $username = $_POST['username'];
            $passcode = $_POST['passcode'];

            if($con){
                // $query = "select * from users where username='$username and passcode='$passcode'";
                $query = "select * from users where username='{$username}' and passcode='{$passcode}';";
                $result = mysqli_query($con, $query);
                $res = array();
    
                if($result->num_rows != 0){
                    header('location:admin.php');
                }else{
                    echo '<h1 class="error">La combinacion de usuario y contraseña no es valida!</h1>';
                    // return FALSE;
                }
            }else{
                echo "Database connection failed";
            }
        }
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
</body>
</html>
