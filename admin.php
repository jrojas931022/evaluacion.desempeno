<?php
// Initialize the session
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION["usuario_id"])) {
    // Si no está autenticado, redirige a la página de inicio de sesión
    header("Location: index.php");
    exit();
}

$tiempo_inactividad = 36000; // 30 minutos * 60 segundos/minuto

// Verifica si la sesión ha expirado debido a inactividad
if (isset($_SESSION['ultimo_acceso']) && (time() - $_SESSION['ultimo_acceso']) > $tiempo_inactividad) {
    // La sesión ha expirado, destrúyela y redirige al usuario al inicio de sesión
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
    <script src="app.js"></script>
    <script src="jspdf.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="jquery.min.js"></script>
    <script src="signature_pad.js"></script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <title> EVALUACI&Oacute;N DE DESEMPE&Ntilde;O</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />


</head>
<link rel="stylesheet" type="text/css" href="stylos.css">

<body class="g-sidenav-show  bg-gray-100">

    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="principal.php" target="_self" align="center">
                <!--<img src="assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">-->
                <span class="ms-1 font-weight-bold">Confeccion Trajes S.A</br> Evaluaci&oacute;n Desempe&ntilde;o</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="principal.php">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>shop </title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(0.000000, 148.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Principal</span>
                    </a>
                </li>


                <?php


                if (strlen(stristr($_SESSION["usuario_rol"], 100)) > 0) {

                    echo
                    ' <li class="nav-item">
                    <a class="nav-link  " href="evaluadores.php">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 42 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>box-3d-50</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(603.000000, 0.000000)">
                                                <path class="color-background"
                                                    d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                                                </path>
                                                <path class="color-background opacity-6"
                                                    d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z">
                                                </path>
                                                <path class="color-background opacity-6"
                                                    d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Resultados generales</span>
                    </a>
                </li>';
                } else {
                    echo '';
                }
                ?>

                <li class="nav-item">
                    <a class="nav-link  " href="documentos/manual.pdf" target="_blank">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 40 40" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>settings</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(304.000000, 151.000000)">
                                                <polygon class="color-background opacity-6"
                                                    points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
                                                </polygon>
                                                <path class="color-background opacity-6"
                                                    d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Manual de Uso</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Perfil de Usuario</h6>
                </li>

                <?php
                if (strlen(stristr($_SESSION["usuario_rol"], 100)) > 0) {

                ?>
                    <!-- Aqui solo aparece este <li> si el usuario es "usuario_admi", el codigo se interpreta como "si la variable session usuario es igual a usuario_admi muestrale esto" -->
                    <li class="nav-item">
                        <a class="nav-link  " href="register.php">
                            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>document</title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g transform="translate(154.000000, 300.000000)">
                                                    <path class="color-background opacity-6" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"></path>
                                                    <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <span class="nav-link-text ms-1">Crear Usuario</span>
                        </a>
                    </li>




                <?php

                } else {
                    echo '';
                }
                ?>



                <li class="nav-item">
                    <a class="nav-link" href="reset-password.php">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>customer-support</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(1.000000, 0.000000)">
                                                <path class="color-background opacity-6"
                                                    d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Cambiar Contrase&ntilde;a</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  " href="logout.php">
                        <div
                            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <svg width="12px" height="20px" viewBox="0 0 40 40" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>spaceship</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(4.000000, 301.000000)">
                                                <path class="color-background"
                                                    d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z">
                                                </path>
                                                <path class="color-background opacity-6"
                                                    d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z">
                                                </path>
                                                <path class="color-background opacity-6"
                                                    d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z">
                                                </path>
                                                <path class="color-background opacity-6"
                                                    d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Cerrar Sesion</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer mx-3 ">
            <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
                <div class="full-background" style="background-image: url('assets/img/curved-images/white-curved.jpg')">
                </div>

            </div>

        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                href="javascript:;">Pagina</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Elaborar Evaluaciones
                        </li>
                    </ol>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Busqueda....">
                        </div>
                    </div>
                    <ul class="navbar-nav  justify-content-end">

                        <li class="nav-item d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span
                                    class="d-sm-inline d-none"><?php echo htmlspecialchars($_SESSION["usuario_nombre"]); ?></span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">

                <div class="col-12 mt-4">
                    <div class="card mb-4">

                        <?php







                        if (isset($_POST['enviar'])) {


                            $fecha_evaluacion = date('Y-m-d', strtotime($_POST['fecha_evaluacion']));
                            $Periodo_evaluar = $_POST['Periodo_evaluar'];
                            $idEmpleado = $_POST['idEmpleado'];
                            $idEvaluador = $_POST['idEvaluador'];
                            $fila1 = $_POST['fila_1'];
                            $fila2 = $_POST['fila_2'];
                            $fila3 = $_POST['fila_3'];
                            $fila4 = $_POST['fila_4'];
                            $fila5 = $_POST['fila_5'];
                            $fila6 = $_POST['fila_6'];
                            $fila7 = $_POST['fila_7'];
                            $fila8 = $_POST['fila_8'];
                            $fila9 = $_POST['fila_9'];
                            $fila10 = $_POST['fila_10'];
                            $fila11 = $_POST['fila_11'];
                            $fila12 = $_POST['fila_12'];
                            $fila13 = $_POST['fila_13'];
                            $fila14 = $_POST['fila_14'];
                            $fila15 = $_POST['fila_15'];
                            $fila16 = $_POST['fila_16'];
                            $fila17 = $_POST['fila_17'];
                            $fila18 = $_POST['fila_18'];


                            $observacion1 = $_POST['observ_1'];
                            $observacion2 = $_POST['observ_2'];
                            $observacion3 = $_POST['observ_3'];
                            $observacion4 = $_POST['observ_4'];
                            $observacion5 = $_POST['observ_5'];
                            $observacion6 = $_POST['observ_6'];
                            $observacion7 = $_POST['observ_7'];
                            $observacion8 = $_POST['observ_8'];
                            $observacion9 = $_POST['observ_9'];
                            $observacion10 = $_POST['observ_10'];
                            $observacion11 = $_POST['observ_11'];
                            $observacion12 = $_POST['observ_12'];
                            $observacion13 = $_POST['observ_13'];
                            $observacion14 = $_POST['observ_14'];
                            $observacion15 = $_POST['observ_15'];
                            $observacion16 = $_POST['observ_16'];
                            $observacion17 = $_POST['observ_17'];
                            $observacion18 = $_POST['observ_18'];
                            $comentarios = $_POST['desempeno'];
                            $calificacion_General = $_POST['total'];
                            $calificacionLetra = $_POST['letra'];


                            $img = $_POST['base64'];
                            $img = str_replace('data:image/png;base64,', '', $img);
                            $fileData = base64_decode($img);
                            $fileName = uniqid() . '.png';
                            file_put_contents("./firmas_administrativas/" . $fileName, $fileData);


                            include("config.php");



                            $sql = "INSERT INTO encuesta (`id_encuesta`, `idEmpleado`, `idEvaluador`, `fecha_evaluacion`, `Periodo_evaluar`, `fila_1`, `fila_2`, `fila_3`, `fila_4`, `fila_5`, `fila_6`, `fila_7`, `fila_8`, `fila_9`, `fila_10`, `fila_11`, `fila_12`, `fila_13`, `fila_14`, `fila_15`, `fila_16`, `fila_17`, `fila_18`, `observ_1`, `observ_2`, `observ_3`, `observ_4`, `observ_5`, `observ_6`, `observ_7`, `observ_8`, `observ_9`, `observ_10`, `observ_11`, `observ_12`, `observ_13`, `observ_14`, `observ_15`, `observ_16`, `observ_17`, `observ_18`, `desempeno`, firma_empleado, calificacion_general, calificacionFinal) VALUE (NULL, '" . $idEmpleado . "',  '" . $idEvaluador . "', '" . $fecha_evaluacion . "', '" . $Periodo_evaluar . "', '" . $fila1 . "', '" . $fila2 . "', '" . $fila3 . "', '" . $fila4 . "', '" . $fila5 . "', '" . $fila6 . "', '" . $fila7 . "', '" . $fila8 . "', '" . $fila9 . "', '" . $fila10 . "', '" . $fila11 . "', '" . $fila12 . "', '" . $fila13 . "', '" . $fila14 . "', '" . $fila15 . "', '" . $fila16 . "', '" . $fila17 . "', '" . $fila18 . "','" . $observacion1 . "', '" . $observacion2 . "', '" . $observacion3 . "', '" . $observacion4 . "', '" . $observacion5 . "', '" . $observacion6 . "', '" . $observacion7 . "', '" . $observacion8 . "', '" . $observacion9 . "', '" . $observacion10 . "', '" . $observacion11 . "', '" . $observacion12 . "', '" . $observacion13 . "', '" . $observacion14 . "', '" . $observacion15 . "', '" . $observacion16 . "', '" . $observacion17 . "', '" . $observacion18 . "', '" . $comentarios . "', '" . $fileName . "', '" . $calificacion_General . "' , '" . $calificacionLetra . "')";



                            $resultado = mysqli_query($link, $sql);
                            //print_r($con);


                            if ($resultado) {
                                echo "<script language='JavaScript'>
                alert('Los datos fueron ingresados de manera exitosa ');
                location.assign('principal.php');
                </script>";
                            } else {
                                echo "<script language='JavaScript'>
                alert('Error, los datos no  fueron ingresados de manera exitosa ');
                location.assign('principal.php');
                </script>";
                            }
                            
                        } else {

                            error_reporting(0);
                        ?>
                            <form id="form" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="container-fluid py-3">

                                    <div class="col-12 mt-1">



                                        <h4 class="mb-1">Evaluacion de desempeño personal administrativos, mandos medios
                                            y superiores</h4>
                                        <br>
                                        <br>
                                        <h4>Recomendaciones</h4>
                                        <h6 for="floatingTextarea" ali> Diligencie en privado la siguiente evaluación y luego
                                            realice una retroalimentación al empleado iniciando por felicitar por los aspectos
                                            en los que ha mostrado un desempeño superior; dialogue sobre los puntos en los
                                            cuales su desempeño debe mejorar y establezca compromisos con el empleado de tal
                                            manera que se inicie proceso para alcanzar los objetivos propuestos para su cargo.
                                            Después de realizar la evaluación la persona
                                            encargada deberá compartirlo con el empleado evaluado y realizar los ajustes
                                            necesarios para luego enviar los resultados al proceso de Recursos Humanos.</h6>



                                        <input class="form-control form-control-sm" type="hidden" placeholder="busqueda"
                                            name="buscar1" value="<?php echo  $_SESSION["usuario_cedula"]; ?>">


                                        <?php $id_usuario = $_SESSION["usuario_id"]; ?>


                                        <style>
                                            body {
                                                display: flex;
                                                justify-content: center;
                                                align-items: center;
                                                height: 100vh;
                                                margin: 0;
                                            }

                                            .input-container {
                                                max-width: 300px;
                                                /* Establece el ancho máximo del contenedor */
                                                width: 100%;
                                                /* Hace que el contenedor ocupe el 100% del ancho disponible */
                                            }
                                        </style>

                                        <center>





                                        </center>

                                    </div>
                                </div>


                            </form>



                            <div class="col-12 mt-1">
                                <div class="card mb-2">
                                    <div class="card-header pb-0 p-3">
                                        <form id="form1" action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                                             <script>
                                                function sumar() {
                                                    const $total = document.getElementById('total');
                                                    let subtotal = 0;
                                                    [...document.getElementsByClassName("monto")].forEach(function(element) {
                                                        if (element.value !== '') {
                                                            subtotal += parseFloat(element.value);
                                                        }
                                                    });
                                                    $total.value = subtotal;
                                                }


                                                document.addEventListener('DOMContentLoaded', function() {
                                                    // Obtener referencias a los elementos del DOM
                                                    const valor1Input = document.getElementById('fila_1');
                                                    const valor2Input = document.getElementById('fila_2');
                                                    const valor3Input = document.getElementById('fila_3');
                                                    const valor4Input = document.getElementById('fila_4');
                                                    const valor5Input = document.getElementById('fila_5');
                                                    const valor6Input = document.getElementById('fila_6');
                                                    const valor7Input = document.getElementById('fila_7');
                                                    const valor8Input = document.getElementById('fila_8');
                                                    const valor9Input = document.getElementById('fila_9');
                                                    const valor10Input = document.getElementById('fila_10');
                                                    const valor11Input = document.getElementById('fila_11');
                                                    const valor12Input = document.getElementById('fila_12');
                                                    const valor13Input = document.getElementById('fila_13');
                                                    const valor14Input = document.getElementById('fila_14');
                                                    const valor15Input = document.getElementById('fila_15');
                                                    const valor16Input = document.getElementById('fila_16');
                                                    const valor17Input = document.getElementById('fila_17');
                                                    const valor18Input = document.getElementById('fila_18');
                                                    const resultadoInput = document.getElementById('resultados');
                                                    const letraInput = document.getElementById('letras');

                                                    // Función para realizar la suma y asignación de letra
                                                    function calcularResultado() {
                                                        // Obtener los valores de los campos
                                                        const valor1 = parseInt(valor1Input.value) || 0;
                                                        const valor2 = parseInt(valor2Input.value) || 0;
                                                        const valor3 = parseInt(valor3Input.value) || 0;
                                                        const valor4 = parseInt(valor4Input.value) || 0;
                                                        const valor5 = parseInt(valor5Input.value) || 0;
                                                        const valor6 = parseInt(valor6Input.value) || 0;
                                                        const valor7 = parseInt(valor7Input.value) || 0;
                                                        const valor8 = parseInt(valor8Input.value) || 0;
                                                        const valor9 = parseInt(valor9Input.value) || 0;
                                                        const valor10 = parseInt(valor10Input.value) || 0;
                                                        const valor11 = parseInt(valor11Input.value) || 0;
                                                        const valor12 = parseInt(valor12Input.value) || 0;
                                                        const valor13 = parseInt(valor13Input.value) || 0;
                                                        const valor14 = parseInt(valor14Input.value) || 0;
                                                        const valor15 = parseInt(valor15Input.value) || 0;
                                                        const valor16 = parseInt(valor16Input.value) || 0;
                                                        const valor17 = parseInt(valor17Input.value) || 0;
                                                        const valor18 = parseInt(valor18Input.value) || 0;

                                                        // Calcular la suma
                                                        const suma = valor1 + valor2 + valor3 + valor4 + valor5 + valor6 + valor7 + valor8 + valor9 + valor10 + valor11 + valor12 + valor13 + valor14 + valor15 + valor16 + valor17 + valor18;



                                                        // Asignar letra dependiendo del resultado
                                                        let letra;
                                                        if ((suma <= 54) && suma >= 43) {
                                                            letra = 'A';
                                                        } else if ((suma <= 42) && suma >= 26) {
                                                            letra = 'B';
                                                        } else if ((suma <= 25) && suma >= 18) {
                                                            letra = 'C';
                                                        }

                                                        // Mostrar el resultado en los campos de entrada
                                                        resultadoInput.value = suma;
                                                        letraInput.value = letra;
                                                    }

                                                    // Asociar la función al evento de cambio en los campos
                                                    valor1Input.addEventListener('input', calcularResultado);
                                                    valor2Input.addEventListener('input', calcularResultado);
                                                    valor3Input.addEventListener('input', calcularResultado);
                                                    valor4Input.addEventListener('input', calcularResultado);
                                                    valor5Input.addEventListener('input', calcularResultado);
                                                    valor6Input.addEventListener('input', calcularResultado);
                                                    valor7Input.addEventListener('input', calcularResultado);
                                                    valor8Input.addEventListener('input', calcularResultado);
                                                    valor9Input.addEventListener('input', calcularResultado);
                                                    valor10Input.addEventListener('input', calcularResultado);
                                                    valor11Input.addEventListener('input', calcularResultado);
                                                    valor12Input.addEventListener('input', calcularResultado);
                                                    valor13Input.addEventListener('input', calcularResultado);
                                                    valor14Input.addEventListener('input', calcularResultado);
                                                    valor15Input.addEventListener('input', calcularResultado);
                                                    valor16Input.addEventListener('input', calcularResultado);
                                                    valor17Input.addEventListener('input', calcularResultado);
                                                    valor18Input.addEventListener('input', calcularResultado);
                                                });
                                            </script>



                                            <?php
                                            include('config.php');
                                            $id = $_GET['id'];


                                            $sql = "SELECT * FROM empleado INNER JOIN evaluador ON empleado.idEvaluador = evaluador.id_evaluador WHERE id_empleado = '$id'  AND  empleado.tipo_personal = 'ADMINISTRATIVO'";


                                            $resultado = mysqli_query($link, $sql);
                                            while ($row = mysqli_fetch_assoc($resultado)) {
                                                $idempleado = $row['id_empleado'];
                                                $nombre = $row['nombre'];
                                            }
                                            ?>

                                            <h3><?php echo  $nombre ?></h3>



                                            <input type="hidden" name="idEvaluador" value="<?php echo  $_SESSION["usuario_id"]; ?>">
                                            <input type="hidden" id="idEmpleado" name="idEmpleado" value=" <?php echo  $idempleado; ?> ">






                                            <label for="start" style="font-size: 15px">Seleccione fecha:</label>
                                            <input type="date" id="fecha_evaluacion" name="fecha_evaluacion" value="2022-12-21" readonly>
                                            <br>
                                            <br>
                                            <label for="start" style="font-size: 15px">Seleccione periodo:</label>
                                            <input type="number" min="2023" max="2099" step="1" value="2023" name="Periodo_evaluar">

                                            <br>


                                            <br>

                                            <h4 class="mb-4">COMPETENCIAS DE CONOCIMIENTO</h4>
                                            <label for="floatingTextarea">1.CONOCIMIENTO TEORICO Y PRÁCTICO DEL CARGO: Aplica los
                                                conceptos adquiridos de su profesión
                                                para la ejecución de sus funciones y responsabilidades asignadas en el
                                                cargo.</label><br>




                                            <div class="col-sm-6 col-xl-4">
                                                <div class="bg-light rounded h-100 p-4">

                                                    <div>
                                                        <span>(1.Bajo, 2.Regular, 3.Alto)</span>
                                                        <input type="number" class="form-control form-control-sm monto" id="fila_1"
                                                            style="width : 100px; heigth : 20px" placeholder="" name="fila_1"
                                                            minlength="1" maxlength="1" size="20" min="1" max="3" onchange="sumar(this.value);" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <input class="form-control form-control-sm" type="text" placeholder="Observaciones"
                                                name="observ_1" maxlength="74" required>
                                            <br>

                                            <label for="floatingTextarea">2. MANEJO DE TECNOLOGÍA DE LA INFORMACIÓN: Capacidad de
                                                incorporar el uso de las TIC en la planificación y ejecución de los procesos propios
                                                de la organización de acuerdo a los estándares establecidos.</label><br>
                                            <div class="col-sm-6 col-xl-4">
                                                <div class="bg-light rounded h-100 p-4">

                                                    <div>
                                                        <span>(1.Bajo, 2.Regular, 3.Alto)</span>
                                                        <input type="number" class="form-control form-control-sm monto"
                                                            style="width : 100px; heigth : 20px" placeholder="" name="fila_2" id="fila_2"
                                                            minlength="1" maxlength="1" size="20" min="1" max="3" onchange="sumar(this.value);" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <input class="form-control form-control-sm" type="text" placeholder="Observaciones"
                                                name="observ_2" maxlength="74" required><br>



                                            <h4 class="mb-4">COMPETENCIAS DEL SABER HACER</h4>
                                            <label for="floatingTextarea">3. LIDERAZGO: Capacidad de aconsejar e influir sobre
                                                otros, orientando la acción de los demás en una dirección determinada.</label>
                                            <div class="col-sm-6 col-xl-4">
                                                <div class="bg-light rounded h-100 p-4">

                                                    <div>
                                                        <span>(1.Bajo, 2.Regular, 3.Alto)</span>
                                                        <input type="number" class="form-control form-control-sm monto"
                                                            style="width : 100px; heigth : 20px" placeholder="" name="fila_3"
                                                            minlength="1" maxlength="1" size="20" min="1" max="3" id="fila_3" onchange="sumar(this.value);" required>
                                                    </div>
                                                </div>
                                            </div>




                                            <input class="form-control form-control-sm" type="text" placeholder="Observaciones"
                                                name="observ_3" maxlength="74" required><br>

                                            <label for="floatingTextarea">4. PLANIFICACIÓN Y ORGANIZACIÓN: Es la capacidad de
                                                determinar eficazmente las metas y prioridades de su tarea/área/proyecto estipulando
                                                la acción, los plazos y los recursos requeridos. Incluye la instrumentación de
                                                mecanismos de seguimiento y verificación de la información.</label>

                                            <div class="col-sm-6 col-xl-4">
                                                <div class="bg-light rounded h-100 p-4">

                                                    <div>
                                                        <span>(1.Bajo, 2.Regular, 3.Alto)</span>
                                                        <input type="number" class="form-control form-control-sm monto"
                                                            style="width : 100px; heigth : 20px" placeholder="" name="fila_4"
                                                            minlength="1" maxlength="1" size="20" min="1" max="3" id="fila_4" onchange="sumar(this.value);" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <input class="form-control form-control-sm" type="text" placeholder="Observaciones"
                                                name="observ_4" maxlength="74" required><br>

                                            <label for="floatingTextarea">5. PRENSAMIENTO ANALÍTICO: Capacidad para organizar
                                                sistémicamente las partes de un problema o situación , realizar comparaciones y
                                                establecer prioridades.</label>

                                            <div class="col-sm-6 col-xl-4">
                                                <div class="bg-light rounded h-100 p-4">

                                                    <div>
                                                        <span>(1.Bajo, 2.Regular, 3.Alto)</span>
                                                        <input type="number" class="form-control form-control-sm monto"
                                                            style="width : 100px; heigth : 20px" placeholder="" name="fila_5" id="fila_5"
                                                            minlength="1" maxlength="1" size="20" min="1" max="3" onchange="sumar(this.value);" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <input class="form-control form-control-sm" type="text" placeholder="Observaciones"
                                                name="observ_5" maxlength="74" required><br>

                                            <label for="floatingTextarea">6. DIRECCIÓN DE PERSONAS: Capacidad de desarrollar,
                                                consolidar y conducir un equipo de trabajo, alentando a sus miembros a trabajar con
                                                autonomía y responsabilidad</label>

                                            <div class="col-sm-6 col-xl-4">
                                                <div class="bg-light rounded h-100 p-4">

                                                    <div>
                                                        <span>(1.Bajo, 2.Regular, 3.Alto)</span>
                                                        <input type="number" class="form-control form-control-sm monto"
                                                            style="width : 100px; heigth : 20px" placeholder="" name="fila_6" id="fila_6"
                                                            minlength="1" maxlength="1" size="20" min="1" max="3" onchange="sumar(this.value);" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <input class="form-control form-control-sm" type="text" placeholder="Observaciones"
                                                name="observ_6" maxlength="74" required><br>

                                            <label for="floatingTextarea">7. ORIENTACION AL CLIENTE INTERNO Y EXTERNO: Actitud
                                                permanente de contar con las necesidades del cliente para incorporar este
                                                conocimiento a la forma especifica de plantear la actividad laboral.</label>
                                            <div class="col-sm-6 col-xl-4">
                                                <div class="bg-light rounded h-100 p-4">

                                                    <div>
                                                        <span>(1.Bajo, 2.Regular, 3.Alto)</span>
                                                        <input type="number" class="form-control form-control-sm monto"
                                                            style="width : 100px; heigth : 20px" placeholder="" name="fila_7" id="fila_7"
                                                            minlength="1" maxlength="1" size="20" min="1" max="3" onchange="sumar(this.value);" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <input class="form-control form-control-sm" type="text" placeholder="Observaciones"
                                                name="observ_7" maxlength="74" required><br>

                                            <label for="floatingTextarea">8. COMUNICACIÓN ASERTIVA: Habilidad de trasmitir y recibir
                                                información clara dentro de un grupo de trabajo.</label><br>
                                            <div class="col-sm-6 col-xl-4">
                                                <div class="bg-light rounded h-100 p-4">

                                                    <div>
                                                        <span>(1.Bajo, 2.Regular, 3.Alto)</span>
                                                        <input type="number" class="form-control form-control-sm monto"
                                                            style="width : 100px; heigth : 20px" placeholder="" name="fila_8" id="fila_8"
                                                            minlength="1" maxlength="1" size="20" min="1" max="3" onchange="sumar(this.value);" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <input class="form-control form-control-sm" type="text" placeholder="Observaciones"
                                                name="observ_8" maxlength="74" required><br>

                                            <label for="floatingTextarea">9. CALIDAD EN EL TRABAJO: Realizar su operación de acuerdo
                                                a los métodos establecidos, es decir, haciendo las cosas bien desde la primera
                                                vez.</label>
                                            <div class="col-sm-6 col-xl-4">
                                                <div class="bg-light rounded h-100 p-4">

                                                    <div>
                                                        <span>(1.Bajo, 2.Regular, 3.Alto)</span>
                                                        <input type="number" class="form-control form-control-sm monto"
                                                            style="width : 100px; heigth : 20px" placeholder="" name="fila_9" id="fila_9"
                                                            minlength="1" maxlength="1" size="20" min="1" max="3" onchange="sumar(this.value);" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <input class="form-control form-control-sm" type="text" placeholder="Observaciones"
                                                name="observ_9" maxlength="74" required><br>

                                            <label for="floatingTextarea">10. ORIENTACIÓN A LOS RESULTADOS: Capacidad de encaminar
                                                todos los actos al logro de las metas establecidas.</label>

                                            <div class="col-sm-6 col-xl-4">
                                                <div class="bg-light rounded h-100 p-4">

                                                    <div>
                                                        <span>(1.Bajo, 2.Regular, 3.Alto)</span>
                                                        <input type="number" class="form-control form-control-sm monto"
                                                            style="width : 100px; heigth : 20px" placeholder="" name="fila_10" id="fila_10"
                                                            minlength="1" maxlength="1" size="20" min="1" max="3" onchange="sumar(this.value);" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <input class="form-control form-control-sm" type="text" placeholder="Observaciones"
                                                name="observ_10" maxlength="74" required><br>


                                            <h4 class="mb-4">COMPETENCIAS DEL SABER ESTAR</h4>

                                            <label for="floatingTextarea">11. Tolerancia a la Presión: Es la capacidad para
                                                responder y trabajar con alto desempeño en situaciones de mucha exigencia.</label>

                                            <div class="col-sm-6 col-xl-4">
                                                <div class="bg-light rounded h-100 p-4">

                                                    <div>
                                                        <span>(1.Bajo, 2.Regular, 3.Alto)</span>
                                                        <input type="number" class="form-control form-control-sm monto"
                                                            style="width : 100px; heigth : 20px" placeholder="" name="fila_11" id="fila_11"
                                                            minlength="1" maxlength="1" size="20" min="1" max="3" onchange="sumar(this.value);" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <input class="form-control form-control-sm" type="text" placeholder="Observaciones"
                                                name="observ_11" maxlength="74" required><br>

                                            <label for="floatingTextarea">12. TRABAJO EN EQUIPO: es la habilidad para participar
                                                activamente en la consecución de una meta en común.
                                                Supone facilidad para la relación interpersonal y la capacidad de comprender la
                                                repercusión de las propiasacciones sobre el éxito de las acciones de los
                                                demás.</label>
                                            <div class="col-sm-6 col-xl-4">
                                                <div class="bg-light rounded h-100 p-4">

                                                    <div>
                                                        <span>(1.Bajo, 2.Regular, 3.Alto)</span>
                                                        <input type="number" class="form-control form-control-sm monto"
                                                            style="width : 100px; heigth : 20px" placeholder="" name="fila_12" id="fila_12"
                                                            minlength="1" maxlength="1" size="20" min="1" max="3" onchange="sumar(this.value);" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <input class="form-control form-control-sm" type="text" placeholder="Observaciones"
                                                name="observ_12" maxlength="74" required><br>

                                            <label for="floatingTextarea">13. AUTOCONTROL: Capacidad de mantener controladas las
                                                emociones en situaciones negativas y de estrés.</label>
                                            <div class="col-sm-6 col-xl-4">
                                                <div class="bg-light rounded h-100 p-4">

                                                    <div>
                                                        <span>(1.Bajo, 2.Regular, 3.Alto)</span>
                                                        <input type="number" class="form-control form-control-sm monto"
                                                            style="width : 100px; heigth : 20px" placeholder="" name="fila_13" id="fila_13"
                                                            minlength="1" maxlength="1" size="20" min="1" max="3" onchange="sumar(this.value);" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <input class="form-control form-control-sm" type="text" placeholder="Observaciones"
                                                name="observ_13" maxlength="74" required><br>




                                            <label for="floatingTextarea">14. CONFIANZA: permite creer en nosotros mismos y en los
                                                demás. Brinda seguridad.</label>
                                            <div class="col-sm-6 col-xl-4">
                                                <div class="bg-light rounded h-100 p-4">

                                                    <div>
                                                        <span>(1.Bajo, 2.Regular, 3.Alto)</span>
                                                        <input type="number" class="form-control form-control-sm monto"
                                                            style="width : 100px; heigth : 20px" placeholder="" name="fila_14" id="fila_14"
                                                            minlength="1" maxlength="1" size="20" min="1" max="3" onchange="sumar(this.value);" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <input class="form-control form-control-sm" type="text" placeholder="Observaciones"
                                                name="observ_14" maxlength="74" required><br>

                                            <label for="floatingTextarea">15. COOPERACION: invita a compartir Con los demás tareas o
                                                actividades para alcanzar un fin común. Ayuda alograr grandes metas y crecer juntos.
                                                Mantiene relaciones cordiales recirproicas</label>

                                            <div class="col-sm-6 col-xl-4">
                                                <div class="bg-light rounded h-100 p-4">

                                                    <div>
                                                        <span>(1.Bajo, 2.Regular, 3.Alto)</span>
                                                        <input type="number" class="form-control form-control-sm monto"
                                                            style="width : 100px; heigth : 20px" placeholder="" name="fila_15" id="fila_15"
                                                            minlength="1" maxlength="1" size="20" min="1" max="3" onchange="sumar(this.value);" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <input class="form-control form-control-sm" type="text" placeholder="Observaciones"
                                                name="observ_15" maxlength="74" required><br>


                                            <label for="floatingTextarea">16. DISCIPLINA: cumple las reglas que la empresa ha
                                                establecido para mantener el orden de la compañía.</label>
                                            <div class="col-sm-6 col-xl-4">
                                                <div class="bg-light rounded h-100 p-4">

                                                    <div>
                                                        <span>(1.Bajo, 2.Regular, 3.Alto)</span>
                                                        <input type="number" class="form-control form-control-sm monto"
                                                            style="width : 100px; heigth : 20px" placeholder="" name="fila_16" id="fila_16"
                                                            minlength="1" maxlength="1" size="20" min="1" max="3" onchange="sumar(this.value);" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <input class="form-control form-control-sm" type="text" placeholder="Observaciones"
                                                name="observ_16" maxlength="74" required><br>

                                            <label for="floatingTextarea">17. HONESTIDAD: invita a pensar, hablar y actuar siempre
                                                con la verdad. Fortalece nuestra relación y hace posible la calidad de nuestro
                                                trabajo. Nuestro empleado debe ser honesto con la compañía, con su trabajo y con su
                                                familia. </label>
                                            <div class="col-sm-6 col-xl-4">
                                                <div class="bg-light rounded h-100 p-4">

                                                    <div>
                                                        <span>(1.Bajo, 2.Regular, 3.Alto)</span>
                                                        <input type="number" class="form-control form-control-sm monto"
                                                            style="width : 100px; heigth : 20px" placeholder="" name="fila_17" id="fila_17"
                                                            minlength="1" maxlength="1" size="20" min="1" max="3" onchange="sumar(this.value);" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <input class="form-control form-control-sm" type="text" placeholder="Observaciones"
                                                name="observ_17" maxlength="74" required><br>

                                            <label for="floatingTextarea">18. Responsabilidad y Compromiso: Comprender las
                                                características de la organización, alineando la conducta
                                                y la responsabilidad laboral con los valores, principios y objetivos de la
                                                misma.</label>
                                            <div class="col-sm-6 col-xl-4">
                                                <div class="bg-light rounded h-100 p-4">

                                                    <div>
                                                        <span>(1.Bajo, 2.Regular, 3.Alto)</span>
                                                        <input type="number" class="form-control form-control-sm monto"
                                                            style="width : 100px; heigth : 20px" placeholder="" name="fila_18" id="fila_18"
                                                            minlength="1" maxlength="1" size="20" min="1" max="3" onchange="sumar(this.value);" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <input class="form-control form-control-sm" type="text" placeholder="Observaciones"
                                                name="observ_18" maxlength="74" required><br>

                                            <div>
                                                <label>Resultado: </label>
                                                <input type="text" name="total" id="resultados" class="form-control form-control-sm monto" style="width : 195px; heigth : 20px" readonly>
                                                <label>Letra: </label>
                                                <input type="text" name="letra" id="letras" class="form-control form-control-sm" style="width : 195px; heigth : 20px" readonly>
                                            </div>
                                    </div>
                                    <br><br>
                                    <label for="floatingTextarea">Nota: Si la calificación General fue inferior a 36 puntos,
                                        debe tomar acciones para mejorar los resultados de lo contrario felicite e incetive
                                        la mejora continua. Como Jefe Inmediato y de acuerdo a los aspectos evaluados emita
                                        un concepto general del desempeño del evaluado</label>
                                    <br><br>

                                    <div class="form-floating">



                                        <div class="col-sm-18 col-xl-14">
                                            <div class="bg-light rounded h-100 p-4">

                                                <br>


                                                <textarea name="desempeno" class="form-control" placeholder="comentarios"
                                                    id="floatingTextarea"
                                                    required></textarea>

                                                <input type="hidden" name="pacient_id" value="0">
                                                <input type="hidden" name="base64" value="" id="base64">
                                                <br>
                                                <br>
                                                <!-- Contenedor y Elemento Canvas -->
                                                <div id="signature-pad" class="signature-pad">
                                                    <div class="description">Firma Empleado</div>

                                                    <div class="signature-pad--body">
                                                        <canvas style="width: 240px; height: 200px; border: 1px black solid; " id="canvas"></canvas>
                                                        <br>
                                                        <button id="clear" type="button">Borrar firma</button>

                                                    </div>
                                                </div>
                                                <br>
                                                <br>



                                                <a href="evaluaciones.php" style=" color:black">Regresar</a><br>
                                                <input type="submit" name="enviar" class="btn btn-sm btn-primary" value="FINALIZAR">

                                            </div>
                                        </div>
                                    </div>



                                    </form>


                                <?php
                            }
                                ?>






                                <script type="text/javascript">
                                    var wrapper = document.getElementById("signature-pad");

                                    var canvas = wrapper.querySelector("canvas");
                                    var signaturePad = new SignaturePad(canvas, {
                                        backgroundColor: 'rgb(255, 255, 255)'
                                    });

                                    function resizeCanvas() {

                                        var ratio = Math.max(window.devicePixelRatio || 1, 1);

                                        canvas.width = canvas.offsetWidth * ratio;
                                        canvas.height = canvas.offsetHeight * ratio;
                                        canvas.getContext("2d").scale(ratio, ratio);

                                        signaturePad.clear();
                                    }

                                    window.onresize = resizeCanvas;
                                    resizeCanvas();


                                    var button = document.getElementById("clear");
                                    button.onclick = function clearall() {
                                        var canvas = document.getElementById("canvas");
                                        var context = canvas.getContext("2d");
                                        context.clearRect(0, 0, canvas.width, canvas.height);
                                        var signaturePad = new SignaturePad(canvas, {
                                            backgroundColor: 'rgb(255, 255, 255)'
                                        });
                                    }
                                </script>
                                <script>
                                    document.getElementById('form1').addEventListener("submit", function(e) {

                                        var ctx = document.getElementById("canvas");
                                        var image = ctx.toDataURL(); // data:image/png....
                                        document.getElementById('base64').value = image;
                                    }, false);
                                </script>
                                </div>
                            </div>

                            <footer class="footer pt-3  ">
                                <div class="container-fluid">
                                    <div class="row align-items-center justify-content-lg-between">
                                        <div class="col-lg-6 mb-lg-0 mb-4">
                                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                                © <script>
                                                    document.write(new Date().getFullYear())
                                                </script>,
                                                hecho <i class="fa fa-heart"></i> por
                                                <a href="https://www.franciscorocha.com" class="font-weight-bold"
                                                    target="_blank">Confeccion Trajes S.A</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </footer>
                    </div>
                </div>



            </div>


    </main>


    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="fa fa-cog py-2"> </i>
        </a>
        <div class="card shadow-lg ">
            <div class="card-header pb-0 pt-3 ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Portal de Evaluación</h5>
                    <p></p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">cambiar colores</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Fondo Del Menú Lateral</h6>

                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="mt-3">
                    <h6 class="mb-0">Menu Lateral Fijo</h6>
                </div>
                <div class="form-check form-switch ps-0">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                </div>
                <hr class="horizontal dark my-sm-4">

                <a class="btn btn-outline-dark w-100" href="documentos/manual.pdf" target="_blank">Manual de Uso</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Siguenos!</h6>
                    <center>
                        <a href="https://www.youtube.com/channel/UCuyLBtOJSpTiiEPWO701CZg" class="btn btn-dark mb-0 me-2" target="_blank">
                            <i class="fab fa-youtube me-1" aria-hidden="true"></i> Twitter
                        </a>
                        <a href="https://es-la.facebook.com/franciscorochacolombia/" class="btn btn-dark mb-0 me-2" target="_blank">
                            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Facebook
                        </a>
                        <br>
                        <br>

                        <a href="https://www.instagram.com/franciscorocha_col/?hl=es-la" class="btn btn-dark mb-0 me-2" target="_blank">
                            <i class="fab fa-instagram me-1" aria-hidden="true"></i> Instagram
                        </a>

                        <a href="https://co.linkedin.com/company/franciscorochacolombia" class="btn btn-dark mb-0 me-2" target="_blank">
                            <i class="fab fa-linkedin me-1" aria-hidden="true"></i> Linkedin
                        </a>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#fff",
                    data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                    maxBarThickness: 6
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 15,
                            font: {
                                size: 14,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#fff"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false
                        },
                        ticks: {
                            display: false
                        },
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
        gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
        gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                        label: "Mobile apps",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#cb0c9f",
                        borderWidth: 3,
                        backgroundColor: gradientStroke1,
                        fill: true,
                        data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                        maxBarThickness: 6

                    },
                    {
                        label: "Websites",
                        tension: 0.4,
                        borderWidth: 0,
                        pointRadius: 0,
                        borderColor: "#3A416F",
                        borderWidth: 3,
                        backgroundColor: gradientStroke2,
                        fill: true,
                        data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                        maxBarThickness: 6
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#b2b9bf',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#b2b9bf',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>

</body>

</html>