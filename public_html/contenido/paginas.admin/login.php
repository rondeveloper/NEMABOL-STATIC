<?php
/* INGRESO POR FORMULARIO */
if (isset_post('ingresar')) {
    /* codigo captcha */
    $secret = "6LcNOxgTAAAAADNCXONZjIu37Abq0yVOF5Mg0pgw";
    /* respuesta vacía */
    $response = null;
    /* comprueba la clave secreta */
    $reCaptcha = new ReCaptcha($secret);
    if ((isset($_POST["g-recaptcha-response"])) && $_POST["g-recaptcha-response"]) {
        $response = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]
        );
    }
    if (($response != null && $response->success) || true) {
        $sw_loged = false;
        /* administrador */
        $resultado_administrador = query("SELECT * FROM administradores WHERE nick='" . post('nick') . "' AND nick<>'' AND password='" . hashpass(post('password')) . "' AND estado IN (1) ");
        if (num_rows($resultado_administrador) > 0) {
            $administrador = fetch($resultado_administrador);
            administradorSet('id', $administrador['id']);
            $sw_loged = true;
        }
        if ($sw_loged) {
            header("location: oficina");
        } else {
            echo "<script>alert('DATOS INCORRECTOS!');history.back();</script>";
        }
    } else {
        echo "<script>alert('Verifica que no eres un Robot');history.back();</script>";
    }
    exit;
}
?>  
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex" />
        <meta name="googlebot" content="noindex">
        <meta name="googlebot-news" content="nosnippet">
        <base href='<?php echo $dominio; ?>' target='_self'/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="eco,salud,sistema">
        <meta name="author" content="NEMABOL">
        <meta name="keyword" content="eco,salud,sistema">
        <title>OFICINA - NEMABOL</title>
        <link rel="icon" type="image/png" href="contenido/imagenes/images/favicon.png">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">
        <!-- Main styles for this application-->
        <link href="contenido/adm/css/style.css" rel="stylesheet">
        <style>
            .btn-primary{
                background-color: #db831f;
                border-color: #da6600;
            }
            .btn-primary:hover{
                background-color: #e8a150;
                border-color: #da6600;
            }
            .bg-primary{
                background: #ce6807 !important;
            }
            .card.bg-primary {
                border-color: #d8d8d8;
            }
        </style>
    </head>
    <body class="c-app flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-group">
                        <div class="card p-4">
                            <form action="" method="post">
                                <div class="card-body">
                                    <h1>OFICINA</h1>
                                    <p class="text-muted">Iniciar sesi&oacute;n en su cuenta</p>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg class="c-icon">
                                                <use xlink:href="contenido/adm/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                                </svg>
                                            </span>
                                        </div>
                                        <input class="form-control" type="text" name="nick" placeholder="Nombre de usuario" required=""/>
                                    </div>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg class="c-icon">
                                                <use xlink:href="contenido/adm/vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                                </svg>
                                            </span>
                                        </div>
                                        <input class="form-control" type="password" name="password" placeholder="Contrase&ntilde;a" required=""/>
                                    </div>
                                    <div class="control-group">
                                        <div style="width:300px;margin:auto;margin-bottom: 20px;">
                                            <script src='https://www.google.com/recaptcha/api.js?hl=es'></script>
                                            <div class="g-recaptcha" data-sitekey="6LcNOxgTAAAAAOIHv-MOGQ-9JMshusUgy6XTmJzD"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="submit" class="btn btn-primary px-4" name="ingresar" type="button" value="Ingresar"/>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button class="btn btn-link px-0" type="button">Olvido la contrase&ntilde;a?</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%;">
                            <div class="card-body text-center">
                                <div>
                                    <img src="https://nemabol.com/contenido/imagenes/img-prods/logo-nemabol.png" style="width: 75%;background: #FFF;border-radius: 10px;margin-bottom: 20px;"/>
                                    <p>Sistema de oficina de servicios ofrecidos por Nemabol</p>
                                    <a href="registro.html" class="btn btn-lg btn-outline-light mt-3">SOLICITAR AFILIACI&Oacute;N</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CoreUI and necessary plugins-->
        <script src="contenido/adm/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
        <!--[if IE]><!-->
        <script src="contenido/adm/vendors/@coreui/icons/js/svgxuse.min.js"></script>
        <!--<![endif]-->
    </body>
</html>