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
                            <a href="./view-questions.php" class="btn btn-waz">View Questions</a>
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
                                            <span class="h5"> Edit Question </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 px-0 px-md-3">
                                        <form class="account-info m-0" method="post">
                                            <div class="px-3 ">
                                                <label> Type </label> 
                                                <select class="form-control" tabindex="1">
                                                    <?php
                                                        foreach ($question_types as $key => $value) {
                                                    ?>
                                                        <option><?=$value?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="px-3 ">
                                                <label> Question </label> 
                                                <textarea class="question form-control" tabindex="2">
                                                    
                                                </textarea>
                                            </div>
                                            <div class="px-3 ">
                                                <label> Answer </label> 
                                                <textarea class="question form-control" tabindex="3">
                                                    
                                                </textarea>
                                            </div>
                                            <div class="" tabindex="4">
                                                <button name="save" class="btn btn-success px-4 def-font-face form-control">Save </button>
                                            </div>
                                        </form>
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
