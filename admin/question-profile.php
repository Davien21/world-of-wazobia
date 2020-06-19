<?php
    require './admin-menu.php';
    require 'backends/question-profile-back.php';
?>
    <?php
        admin_menu('questions');
    ?>
        <!-- Main Section -->
        <main id="claire-main" class=""> 
           
            <!-- Blog -->
            <header aria-label="breadcrumb " class="">
                <div class="container-fluid-2 mt-5 mt-md-2  pt-4 sync-cont-fluid">
                    <div class="row grey-dash-bottom justify-content-between align-items-center">
                        <div class="col ">
                            <ol class="breadcrumb ">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Questions</li>
                            </ol>
                        </div>
                        <div class="col-auto">
                            <a href="./add-question.php" class="btn btn-waz">Post New Question</a>
                        </div>
                    </div>
                </div>
            </header>
            <section class="container-fluid-2">
                <?php
                    if (isset($red_alert) and !strstr($red_alert, 'already')) {
                ?>
                    <div class="alert col-sm-12 col-md-12 col-lg-7 alert-danger"><?=$red_alert?></div>
                <?php
                    }else if(isset($red_alert) and strstr($red_alert, 'already')){
                ?>
                    <div class="alert col-sm-12 col-md-12 col-lg-7 alert-danger"> 
                        <span class="d-block"><?=$red_alert?></span> 
                        <a href="./home.php" class="btn btn-success mt-3">Back to Home</a>
                        <a href="./view-questions.php" class="btn btn-info mt-3">View Questions</a>
                    </div>
                <?php
                    }else if (isset($green_alert)) {
                ?>
                    <div class="alert col-sm-12 col-md-12 col-lg-7 alert-success"> 
                        <span class="d-block"><?=$green_alert?></span> 
                        <a href="./home.php" class="btn btn-success mt-3">Back to Home</a>
                        <a href="./view-questions.php" class="btn btn-info mt-3">View Questions</a>
                    </div>
                <?php
                    }
                ?>
            </section>
            <section class="container-fluid-2">
                <?php
                    if (!empty($action)) {
                ?>
                    <div class="content mb-3">                          
                        <div class="profile-row col-sm-12 col-lg-10 col-xl-8 bg-white pt-4 py-3">
                            <div class="row m-auto">
                            <section class="col-sm-12">
                                <div class="row">
                                    <div class="col">
                                        <div class="text-black">
                                            <span>Do you really want to </span>
                                            <span class="font-weight-bold"><?=ucfirst($action)?></span>  
                                            <span>this Question?</span>
                                        </div>
                                        <p class="font-weight-bold text-black"><?=$question_data['question']?></p>
                                    </div>
                                    <form class="btn-group col-12" method="post">
                                        <button name="close-del" class="btn  btn-primary px-4">No</button>
                                        <button name="confirm-del" class="btn  btn-danger px-4">Yes</button>
                                    </form>
                                </div>
                                
                            </section>
                        </div>
                      </div>
                    </div>
                <?php
                    }
                ?>
            </section>
            <?php
                if (!$does_not_exist) {
            ?>
            <section class="mb-5" >
                <div class="container-fluid-2 mt-2" >

                	<div class="content">                          
                        <div class="profile-row col-sm-12 col-lg-10 col-xl-8 bg-white pt-4 pb-3">
                            <div class="row m-auto">
                            <section class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6 px-0 px-md-3">
                                        <div class="col-md-12 header">
                                            <span class="h5"> Question Details </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 px-0 px-md-3">
                                        <div class="account-info">
                                            <div class="px-3">
                                                <span class=""> Type: </span> 
                                                <span class="py-2 badge badge-success d-inline-block">
                                                    <?=$question_data['type']?>
                                                </span> 
                                            </div>
                                            <div class="px-3">
                                                <span class=""> Question: </span> 
                                                <span class="d-block text-black">
                                                    <?=$question_data['question']?>
                                                </span> 
                                            </div>
                                            <div class="px-3">
                                                <span> Answer: </span> 
                                                <span class="d-block text-black">
                                                    <?=$question_data['answer']?>
                                                </span> 
                                            </div>
                                            <div class="row mx-0">
                                                <a href="./edit-question.php?id=<?=$question_data['id']?>" 
                                                    class="btn btn-info col-12 col-lg-auto mb-3 mb-lg-0">
                                                    Edit Question
                                                </a>
                                                <form class="px-0 px-md-3 col-12 col-lg-auto mb-3 mb-lg-0" method="Post">
                                                    <div class="">
                                                        <button name="init-delete" class="btn btn-danger btn-block">
                                                            Delete Question
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                             
                        </div>
                      </div>
                    </div>
                </div>
            </section>
            <?php
                }
            ?>
      
            <!-- Footer -->
            <?php
                // make_footer();
            ?>
        </main>

        <!-- Js -->
        <?php
            main_scripts();
        ?>
    </div>
</body>

</html>
