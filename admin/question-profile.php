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

            <section class="mb-5" >
                <div class="container-fluid-2 mt-2" >

                	<div class="content">                          
                        <div class="profile-row col-sm-12 col-md-8 bg-white pt-4 pb-3">
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
                                                <strong class=""> Type: </strong> 
                                                <span class="py-2 badge badge-success d-inline-block">
                                                    Wazobia Basics
                                                </span> 
                                            </div>
                                            <div class="px-3">
                                                <strong> Question: </strong> 
                                                <span class="d-block">
                                                    How do I make an investment
                                                </span> 
                                            </div>
                                            <div class="px-3">
                                                <strong> Answer: </strong> 
                                                <span class="d-block">
                                                    Log in to your dashboard, click on the invest button below
                                                </span> 
                                            </div>
                                            <div class="">
                                                <a href="./edit-question.php" class="btn btn-info">Edit Question</a>
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
