<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Confirm</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;900&display=swap" rel="stylesheet">
</head>
<body>

    <?php 
    
    $id = $_GET['id'];
    function deleteCase($ids){
        $con = mysqli_connect("localhost", "root", "", "refrigeracion");

        if($con) {
            $query = "delete from cases where id_case='{$ids}'";
            $result = mysqli_query($con, $query);
    
            header('location:../admin.php');
        }
    }
    
    
    ?>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        main {
            display: flex;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 25px
        }

        h1 {
            font-weight: 900;
        }

        .return:visited {
            color: white;
        }

        .return {
            text-decoration: none;
            background: #0077b6;
            color white;
            padding: 25px;
            border-radius: 15px;
            color: white;
            font-size: 16px;
        }

        .danger {
            text-decoration: none;
            background: #B70404;
            color white;
            padding: 25px;
            border-radius: 15px;
            color: white;
            border: none;
            font-size: 16px;
        }

        .danger:hover {
            cursor: pointer;
        }

        .text-danger {
            color: #B70404;
        }
    </style>

    <main>
        <h1>Estas seguro que deseas ELIMINAR la solicitud?</h1>
        <h2 class="text-danger">No podras deshacer estos cambios.</h2>
        <!-- <p>Pase buen dia!</p> -->
        <form action="" method="post">
            <button class="danger" type="submit" name="delete-case">Eliminar caso</button>
        </form>
        <a class="return" href="../index.php">Volver al inicio</a>
    </main>

    <?php 
    
    if(isset($_POST['delete-case'])){
        deleteCase($id);
    }

    ?>
</body>
</html>