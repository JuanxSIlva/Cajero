<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cajero Automático</title>
    <link rel="stylesheet" href="CSS/bootstrap.min.css">
</head>
<body>
    <div class="container d-flex flex-column align-items-center justify-content-center border border-dark shadow p-3 mt-5 bg-white rounded w-75">
        <h2 class="mb-3">Bienvenido a PHP Bank</h2>
        <form action="" method="post">
            <label for="">PIN</label>
            <input type="password" name="pin" required class="form-control"><br/>

            <label for="">Monto a retirar: </label>
            <input type="number" name="monto" min="1" required class="form-control"><br/><br/>

            <button type="submit" class="btn btn-primary" value="">Realizar retiro</button>

            <!-- Hacemos que la pagina que se llame a ella misma o se recargue -->
            <button type="button" class="btn btn-danger" onclick="window.location.href='index.php'">Finalizar</button>
        </form>
    

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
                // echo " <div class='card mx mx-auto'> Tu saldo actual es: $saldoInicial <br/>
                // <div/>";
                // echo "Tu monto a retirar es: $montoRetirar <br/>";
                if($montoRetirar <= $saldoInicial){
                    $nuevoSaldo = $saldoInicial - $montoRetirar;
                    echo "<br><div class='card  mx-auto'>
                               <div class='card-header '><h5>Transacción Exitosa</h5><div/>
                               <hr>
                                <div class='card-body'>
                                 <p><i class='bi bi-cash-coin'></i> Tu saldo actual es: $saldoInicial</p>
                                 <hr>
                                 <p><i class='bi bi-credit-card-2-front-fill'></i> Tu monto retirado es:$montoRetirar</p>
                                 <hr>
                                 <p><i class='bi bi-wallet'></i> Tu nuevo saldo es: $nuevoSaldo</p>
                                 
                                <div/>
                            <div/>"
                        ;
                    
                    }
                    else{
                        echo "<br><div class='text-danger card  mx-auto text-center border border-danger'><div class='card-header'><p>Saldo insuficiente</p><div/>";
                    }
                        }
                        
                        }
                        else{
                            echo "<br><div class='text-danger card  mx-auto text-center border border-danger'><div class='card-header'><p>Pin incorrecto!!</p><div/>";
                            }
                            
                            
        ?>

    </div>
</body>
</html>