<?php
    require '../backends/base-config.php';
    function admin_menu($active_page) {
        $l1=$l2=$l3=$l4=$l5=$l6 = '';
        if ($active_page === 'home') {
            $l1 = "class='active'";
        }else if ($active_page === 'users') {
            $l2 = "class='active'";
        }else if ($active_page === 'questions') {
            $l3 = "class='active'";
        }else if ($active_page === 'updates') {
            $l4 = "class='active'";
        }else if ($active_page === 'issues') {
            $l5 = "class='active'";
        }else if ($active_page === 'settings') {
            $l6 = "class='active'";
        }
?>
<!DOCTYPE HTML>
<html lang="en" class="full-height">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>World of Wazobia</title>

    <link rel="icon" type="image/png" href="../assets/imgs/favicon.png" />
    <link rel="stylesheet" href="../assets/css/animate.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../assets/css/flexslider.css">
    <link rel="stylesheet" href="../assets/css/extra-responsive.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
        <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
 

<body class="def-body-bg-color">
    <div id="claire-page"> <a href="#" class="js-claire-nav-toggle claire-nav-toggle"><i></i></a>
        <!-- Sidebar Section -->
        <aside id="claire-aside" class=" navbar-nav">
            <!-- Logo -->
            <div class="claire-logo" title="Invest Smarter than ever before">
                <!-- <a href="index.php"><img src="assets/imgs/logo.png" alt="World of Wazobia Logo"></a> -->
                <div class="h3 dash-bottom" >
                    <a href="../index.php" class="w-100 pl-3">
                        <div class="brand-div " >
                            <img src="../assets/imgs/svgs/invest.svg">
                            <span class="" >World of Wazobia</span>
                        </div>
                    </a>
                
                </div>
            </div>
            <!-- Menu -->
            <header>
                 <nav id="claire-main-menu">
                    <ul class="ml-5">
                        <li <?=$l1?> ><a href='home.php'>Home</a></li>
                        <li <?=$l2?> ><a href='view-users.php'>Users</a></li>
                        <li <?=$l3?> ><a href='view-questions.php'>Questions</a></li>
                        <li <?=$l4?> ><a href='view-updates.php'>Updates</a></li>
                        <!-- <li <?=$l5?> ><a href='login.php'>Login</a></li> -->
                        <li <?=$l6?> ><a href='../backends/logout.php'>Logout</a></li>
                        <!-- <li><a href='../contact.php'>Contact Us</a></li> -->
                    </ul>
                </nav>
            </header>
           
            <!-- Info -->
    
            <!-- Footer -->
            <div class="claire-footer" aria-label="Navigation footer">
                <ul class="call-to-action flex">
                    
                </ul>
            </div>
        </aside>
                 
<?php
    }
?>
<?php
    function make_footer () {
?>
    <footer >
        <div id="claire-footer2" class="container-fluid-2">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="claire-logo ">
                        <a href="index.php"><img src="assets/imgs/svgs/invest.svg" alt=""></a>
                        <h2 class="text-center">World of Wazobia
                            <span class="animate-box pt-2" data-animate-effect="fadeInUp">Invest Smarter Than Ever Before.</span>
                        </h2>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-left">
                    <div class="claire-footer">
                        <p>Website by <a href="#" class="dev-ad">Rewire</a>.<br>
                            <span>&copy; 2020</span>
                        <span class="currentYear"></span> World of Wazobia. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php
    }
?>
<?php
    function main_scripts () {
?>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/modernizr-2.6.2.min.js"></script>
    <script src="../assets/js/jquery.easing.1.3.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.waypoints.min.js"></script>
    <script src="../assets/js/jquery.flexslider-min.js"></script>
    <script src="../assets/js/sticky-kit.min.js"></script>
    <script src="../assets/js/owl.carousel.min.js"></script>
    <script src="../assets/js/chidi.js"></script>
    <script src="../assets/js/main.js"></script>
<?php
    }
?>
<?php
    function make_subscription_data_modal () {
?>
    <!-- Modal -->
    <div class="modal fade pt-5" id="subscription_data" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog mt-5 pr-0" role="document" style="max-width: 370px !important;">
        <div class="modal-content">
          <div class="modal-header">
            <div class="svg-container">
                <img class="svgs" src="assets/imgs/svgs/online-payment.svg">
            </div>
            <h5 class="modal-title" id="subscription_data_title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <a href="" id="sub-link" class="btn btn-success btn-block">Select This Plan</a>
          </div>
        </div>
      </div>
    </div>
<?php
    }
?>
   