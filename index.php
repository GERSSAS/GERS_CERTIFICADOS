<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">     
        <title>CERTIFICADOS GERS</title>       
        <link href="css/styles.css" rel="stylesheet"/>
        <link rel="stylesheet" href="style.css"/>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="shorcut icon" href="img/iconoGers.png">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <!--LOGO GERS -->
    <img src="img/logo_gers.jpg" width="210">    
    </nav>
    <br>
        <main>
        <div class="contenedor">
           <B> <h1><p style = "font-family:courier,arial;">
CERTIFICADOS
</p></h1></b> <br> <br>
          
                    <p>Para descargar los certificados emitidos por la empresa GERS SAS, ingrese el número de identificación o NIT.</p>
                    <center> Apreciado usuario si al momento de la descarga del certificado este mismo presenta un dato erróneo o no se encuentra actualizado, por favor comuníquese al siguiente correo:<h5>contabilidad@listas.gers.co</h5> </center>
                    <!--BUSCADOR -->
                    <form action="index.php" method="post"><br>                                                   
                                                      
                        <input  type="text" name="busqueda_nit" id="busqueda_nit" class="input-form" 
                        aria-describedby="emailHelp" placeholder="Número de identificacion o NIT:">
                        
                            <p class="form-text">*(Sin puntos ni dígito de verificación.)</p>

                            <button name="buscar" class="buscar" value="Buscar" type="submit" id="buscar" disabled>Buscar</button>                                               
                    </form>
        </div><br><br>                                                                                                                                                                      
        <!-- TABLA-->
        <div class="col-12">
                <div class="table-responsive">
                    <table  class="table">
                    <thead>
                    <tr>
                        <th>NIT / CC</th>
                        <th>RAZON SOCIAL / NOMBRE</th>
                        <th>CERTIFICADO</th>
                        <th>DESCARGAR</th>                                                                                    
                        <th>AÑO</th>                         
                    </tr>
                    </thead>                                            
        <!-- Conexion DB -->
        <?php               
            if (isset($_POST["buscar"])) {
                                                    
                include_once './lib/conf/conf.php';
                        
                $conn = mysqli_connect($server, $user, $pass, $database);
                       
        //Consulta con Inner join
                    $busqueda_nit = $_POST["busqueda_nit"];
                    $sql = "SELECT proveedores.nit, proveedores.nombre, certificados.nombre_certificado, certificados.año
                            FROM proveedores  
                            INNER JOIN certificados
                            ON proveedores.nit = certificados.fk_nit                                    
                            WHERE proveedores.nit = $busqueda_nit";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {                                               
                    while ($row = mysqli_fetch_assoc($result)){                                                                                          
                            ?>                               
                        <tr>                              
                        <td><?php echo $row['nit']; ?></td>                                
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['nombre_certificado']; ?></td>
                        <td><a href="descarga.php?file=<?php echo $row['nombre_certificado']; ?>.pdf" >
                        <button type="button" class="btn-outline-primary m-2">
                        <i class="fa-sharp fa-solid fa-file-arrow-down"></i></button></a>
                        </td>
                        <td><?php echo $row['año']; ?></td>
                        </tr>                                                                         
                        <?php                                                 
                        }                            
                        } else {
                            echo "¡No se encontraron resultados!  ";
                        }                                          
            }
        ?>
                    </table><br>
                </div></div>                                                        
    </main>
        <br><br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

            <!--FIN MOSTRAR CERTIFICADOS -->          
                <footer>                                                               
                        <div class="d-flex align-items-center justify-content-between small">                           
                            <div class="text-muted">Todos los derechos reservados                              
                            </div><br>
                        <div>
                        <div class="text-muted"> © GERS SAS</p>
                          </div>
                </footer>              
                <!--VALIDACION DE CAMPO --> 
                <script src="habilitar.js"></script>                         
    </body>
</html>