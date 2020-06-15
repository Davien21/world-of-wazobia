<?php
    require './main-menu.php';
    require './backends/register-back.php';
?>
<!DOCTYPE HTML>
<html lang="en" class="full-height">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>World of Wazobia</title>

        <link rel="icon" type="image/png" href="assets/imgs/favicon.png" />
        <link rel="stylesheet" href="./assets/css/animate.css">
        <link rel="stylesheet" href="./assets/css/bootstrap.css">
        <link rel="stylesheet" href="./assets/css/extra-responsive.css">
        <link rel="stylesheet" href="./assets/css/style.css">

    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
        <script src="js/respond.min.js"></script>
    <![endif]-->
    </head>
    <body style="background-color: #011C67 !important;">
        <main>
            <section id="register" class="container-fluid mt-2 mb-5">
                <div class="brand-div row justify-content-center" >
                    <img src="assets/imgs/svgs/invest.svg" class="col-auto">
                    <h4 class="def-font-face wow-main-header" class="col">WORLD OF WAZOBIA</h4>
                    
                </div>
                <div class="row mt-5 ">
                    <div class="col-sm-10 col-md-7 col-lg-6 col-xl-5  mx-auto px-0 p">
                        <div class="bg-light d-flex flex-wrap justify-content-between py-3 paper-box-shadow rounded-top">
                            <div class="col-auto text-center" style="font-size: 1.2em">
                                <span class=" <?=$plan_class?>"><?=$plan?> Plan</span>
                            </div>
                            <!-- <a href="./subscribe.php" class="col-auto link">How would you like to pay?</a> -->

                        </div>
                        <div class="row rounded-bottom bg-white">
                             
                        </div>
                         
                    </div>
                </div>
            </section>
            
        </main>
    </body>
        <!-- Js -->
        <?php
            main_scripts();
        ?>
        <script src="./assets/js/questions.js"></script>
    </div>
</body>

</html>
    