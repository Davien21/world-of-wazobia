<?php
    require './admin-menu.php';
    require 'backends/view-questions-back.php';
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

            <section class="mb-5" >
                <div class="container-fluid-2 mt-2" >
                	<div class="">
                        <form class="text-right row mb-3" method="post" style="margin-top: -20px">
                            <div class="ml-auto col-auto">
                                <button class="btn btn-info" name="all-questions">All Questions</button>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-success" name="my-questions">My Questions</button>
                            </div>
                        </form>
                        <?php
                            foreach ($all_questions as $key => $value) {
                        ?>
                    		<a href="./question-profile.php?id=<?=$value['id']?>" class="w-100">
                                <div class="row mx-0 px-4 py-2 paper-box rounded-0 def-hover-info mb-2 justify-content-between" >
                                    <div class="question">
                                        <span><?=$key+1?>.</span>
                                        <span><?=$value['question']?></span>
                                    </div>
                                    <div class="q-type">
                                        <span class="badge <?=badge_class($value['type'])?> badge-success rounded-0 py-1 px-2">
                                            <?=$value['type']?>
                                        </span>
                                    </div>
                                </div> 
                            </a>
                        <?php
                            }
                        ?>
                	</div>
                </div>
            </section>
             
      
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
