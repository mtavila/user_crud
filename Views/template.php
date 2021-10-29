<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="User Crud PHP">
    <meta name="author" content="Martín Avila">
    <title>... ::: User Crud ::: ...</title>
    <link href="Views/dist/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="Views/dist/vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="Views/dist/css/ruang-admin.css" rel="stylesheet">
</head>
<body id="page-top">
    
    <div id="wrapper">

        <!-- Menú -->
         <?php 

            include "module/menu.php";

        ?>

         <!-- Content -->

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <?php 

                    include "module/header.php";

                    
                    if(isset($_GET["ruta"]))
                    {
                        if($_GET["ruta"]=="inicio")
                        {
                            include "module/inicio.php";
                        }
                        elseif ($_GET["ruta"]=="usuarios" || $_GET["ruta"]=="mantenimiento-usuario") 
                        {
                            # code...
                            include "module/Users/".$_GET["ruta"].".php";
                        }
                        else 
                        {
                            include "module/404.php";
                        }
                    }
                    else 
                    {
                        include  "module/inicio.php";
                    }

                ?>

            </div>

            <!-- Footer -->

            <?php 

                include "module/footer.php";

            ?>

            <!-- Footer -->

        </div>



    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

        
    <script src="Views/dist/vendor/jquery/jquery.min.js"></script>
    <script src="Views/dist/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="Views/dist/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="Views/dist/js/ruang-admin.min.js"></script>

    <!-- SWEET ALERT 2-->
    <link href="Views/dist/vendor/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <script src="Views/dist/vendor/sweetalert2/sweetalert2.min.js"></script>

    <script src="Views/dist/js/usuarios.js"></script>

</body>
</html>