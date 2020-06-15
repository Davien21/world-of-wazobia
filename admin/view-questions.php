<?php
    require './admin-menu.php';
    // require 'backends/home-back.php';
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

            <section class="" >
                <div class="container-fluid-2 mt-2" >
                	<div class="row ">
                		<a href="./question-profile.php" class="col">
                            <div class="row mx-0 px-4 py-2 paper-box rounded-0 def-hover-info mb-4 justify-content-between" >
                                <div class="question">
                                    <span>1.</span>
                                    <span>How do i become a guider?</span>
                                </div>
                                <div class="q-type">
                                    <span class="badge badge-success rounded-0 py-1 px-2">Guider</span>
                                </div>
                            </div> 
                        </a>
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
