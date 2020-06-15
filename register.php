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
                    <a href="./index.php">
                        <img src="assets/imgs/svgs/invest.svg" class="col-auto">
                        <h4 class="def-font-face wow-main-header" class="col">
                            <a href="./index.php">WORLD OF WAZOBIA</a> 
                        </h4>
                    </a>
                </div>
                <?php
                    if(!$successful) {
                ?>
                <div class="row mt-5 ">
                    <div class="col-sm-10 col-md-7 col-lg-6 col-xl-5  mx-auto px-0 p">
                        <div class="bg-light d-flex flex-wrap justify-content-between py-3 paper-box-shadow rounded-top">
                            <div class="col-auto" style="font-size: 1.2em">
                                <span class="<?=$plan_class?>"><?=$plan?> Plan</span>
                            </div>
                            <a href="./subscribe.php" class="col-auto link">Choose a different Plan</a>

                        </div>
                        <form method="post" class="p-4 bg-white paper-box-shadow rounded-bottom">
                            <div class="form-group">
                                <label for="f-name">First Name</label>
                                <input class="form-control" id="f-name" type="text" name="f-name" value="<?=$f_name?>">
                                <span class="err"><?=$f_name_err?></span>
                            </div>
                            <div class=" form-group">
                                <label for="l-name">Last Name</label>
                                <input class="form-control" id="l-name" type="text" name="l-name" value="<?=$l_name?>">
                                <span class="err"><?=$l_name_err?></span>
                            </div>
                            <div class="mb-3 form-group">
                                <label for="email">Email Address</label>
                                <input class="form-control"  type="email" id="email" name="email" value="<?=$email?>">
                                <span class="err"><?=$email_err?></span>
                            </div>
                            <div class=" form-group">
                            <label for="phone">Phone Number</label>
                                <input class="form-control"  type="tel" id="phone" name="phone" value="<?=$phone?>">
                                <span class="err"><?=$phone_err?></span>
                            </div>
                            <div class=" form-group">
                                <label for="pass">Password</label>
                                <input class="form-control" id="pass" type="password" name="pass" >
                                <span class="err"></span>
                            </div>
                            <div class=" form-group">
                                <label for="c-pass">Confirm Password</label>
                                <input class="form-control" id="c-pass" type="password" name="c-pass" >
                                <span class="err"><?=$pass_err?></span>
                            </div>
                            <div class="">
                                <button class="btn btn-block btn-success " name="register">Sign Up</button>
                            </div>
                        </form>
                         
                    </div>
                </div>
                <?php
                    }else {
                ?>
                    <section id="successful-reg" class="mt-5"  >
                        <div class="container-fluid">
                            <div class="row">
                                <div class="bg-white border-sm col-12 col-sm-10 col-md-8 mx-auto rounded pb-4 p-3 p-sm-4 p-md-5 text-center ">

                                    <div class="text-success px-3 py-2 rounded-top ">
                                        <span class="h5">Registration Successful</span>
                                        <input id='success-tick' type='checkbox' style="display: none;" />
                                        <label for='success-tick ' style="margin-bottom: 0;">
                                          <span class="tick-box"></span>
                                        </label>
                                    </div>
                                    <span class="underline-text h4">Congratulations!</span>
                                    <span class="d-block pt-3">You have successfully registered </span>
                                    <span class="d-block pt-3">Click the button below to make payment </span>
                                    <span class="d-block my-2 emphasis"><?=$full_name?></span>
                                    <form >
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <button class="btn btn-success " onclick="payWithPaystack()">Make Payment</button> 
</form>
<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_2e63fd5f553184f0bcf6dd6dcf8077f5e224eb11',
      email: 'chidiebereekennia@email.com',
      amount: 10000,
      currency: "NGN",
      plan: "PLN_7kk67iod5czhw2w",
      ref: "1000334000",
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          alert('successfully subscribed. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>

                                </div>
                            </div>
                        </div>
                        
                    </section>
                    

                <?php
                    }
                ?>
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
