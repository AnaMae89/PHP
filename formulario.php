<!DOCTYPE html>
<html>

<head>
    <title>Formulario de registro SCIII</title>
    <link href="estilos.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="group">
    <form method="POST" action=" ">
        <h2><em>Formulario de registro</em></h2>
        <label for="nombre" class="form-label">Nombre <samp><em>(requerido)</em></samp></label>
        <input type="text" name="nombre" class="form-input" require/>

        <label for="apellido" class="form-label">Apellido <samp><em>(requerido)</em></samp></label>
        <input type="text" name="apellido" class="form-input" require/>


        <label for="email" class="form-label">Email <samp><em>(requerido)</em></samp></label>
        <input type="text" name="email" class="form-input"/>

        <input class="form-btn" name="submit" type="submit" value="Suscribirse"/>

        <?php
        if($_POST){
            $nombre= $_POST['nombre'];
            $apellido= $_POST['apellido'];
            $email= $_POST['email'];


            //Conexion con PDO

        $servername = "localhost";
        $username="root";
        $password="";
        $dbname="micursosql";

        //Create connection
        $conn = new mysqli($servername,$username,$password,$dbname);

        //Check connection
        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }else {
            echo "Conectado<br>";
            echo "*****************************<br>";
        }

        $sql= "INSERT INTO usuario (nombre,apellido,email)
        VALUES ('$nombre','$apellido','$email')";

        if($conn->query($sql)=== TRUE){
            echo "New record created successfully";
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();

        }

        ?>
    </form>
    </div>
</body>
</html>