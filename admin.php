<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN CLISER</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    
    <!--Header-->
        <header id="header">
            <nav>
                <div class="container">
                    <div class="filter left border-shadow2">
                        <a href="index.php"><i class="fas fa-angle-double-left" aria-hidden="true"></i>INICIO</a>
                    </div>
                    <div class="text-center">
                        <a href="/" class="nav-brand">ADMINISTRAR PETICIONES</a>
                    </div>
                </div>
            </nav>

        </header>
    <!--/Header-->

    <!--Main Site-->
    <main id="site-main">
        <div class="container">
            <div class="box-nav">
                
                <div class="center">
                    <input id="in" type="search" class="in"><button id="btn" class="bt">BUSCAR</button>
                </div>
                
            </div>

            <!--form handling-->

            <form action="/" method="POST">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Problema</th>
                            <th>Servicio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 

                    $con = mysqli_connect("localhost", "root", "", "refrigeracion");

                    if($con){
                        $query = "select * from cases";
                        $result = mysqli_query($con, $query);

                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>
                                <td>". $row["id_case"] ."</td>
                                <td>". $row["name_issuer"] ."</td>
                                <td>". $row["lastname_issuer"] ."</td>
                                <td>". $row["email_issuer"] ."</td>
                                <td>". $row["phone_issuer"] ."</td>
                                <td>". $row["issue"] ."</td>
                                <td>". $row["service"] ."</td>
                                <td>
                                <a href='./responses/email_confirm.php?id=$row[id_case]' class='btn border-shadow update'>
                                <span class='text-gradient'><i class='fa-solid fa-check' aria-hidden='true'></i></span>
                            </a>
                            <a href='./responses/delete_confirm.php?id=$row[id_case]' class='btn border-shadow delete'>
                                <span class='text-gradient'><i class='fa fa-times' aria-hidden='true'></i></span>
                            </a>
                                </td>
                            </tr>    
                            ";
                        }
                    }

                    ?>
                    </tbody>
                </table>
            </form>
        </div>
    </main>