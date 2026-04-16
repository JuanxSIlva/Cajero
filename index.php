<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cajero Automático</title>
</head>
<body>
    <h2>Bienvenido a PHP Bank</h2>
    <form action="" method="post">
        <label for="">PIN</label>
        <input type="password" name="pin" required><br/>

        <label for="">Monto a retirar: </label>
        <input type="number" name="monto" min="1" required><br/><br/>

        <button type="submit" value="">Realizar retiro</button>

        <!-- Hacemos que la pagina que se llame a ella misma o se recargue -->
        <button type="button" onclick="window.location.href='index.php'">Finalizar</button>
    </form>
    <hr style="width: 400px; margin-left: 0; border: 1px solid black;">

    <!-- Aqui viene la programación de PHP -->
     <?php
        //Utilizamos las variables de entorno $_SERVER 
        if($_SERVER["REQUEST_METHOD"]=="POST"){ //Preguntamos sobre el metodo de envio es post?
            //Capturamos las variables del formulario
            $pinIngresado = $_POST['pin'];
            $montoRetirar = $_POST['monto'];
            
        // echo "$pinIngresado ----- $montoRetirar";
        // Simulamos que los datos estan en una BD
        $cliente = "Aprendiz"; //String
        $saldoInicial = 50000; //Integer
        $pinCorrecto = 1234;

        //Lógica de la validación
        if($pinIngresado == $pinCorrecto){
            echo "Tu saldo actual es: $saldoInicial <br/>";
            echo "Tu monto a retirar es: $montoRetirar <br/>";
            if($montoRetirar <= $saldoInicial){
                $nuevoSaldo = $saldoInicial - $montoRetirar;
                echo "Tu nuevo saldo es: $nuevoSaldo";
                
            }
            else{
                echo "Saldo insuficiente";
            }

        }
        else{
            echo "Pin Incorrecto";
        }
    }

     ?>

</body>
</html>