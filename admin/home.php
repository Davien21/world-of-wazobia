<?php
    require './admin-menu.php';
    require 'backends/home-back.php';
?>
    <?php
        admin_menu('home');
    ?>
        <!-- Main Section -->
        <main id="claire-main" class=""> 
           
            <!-- Blog -->

            
            <section class="claire-updates mt-0 pt-4 pt-md-0 fullHeight" >
                <div class="container-fluid-2 mt-5 mt-md-3" >
                    <div class="paper-box-shadow bg-white col-auto py-2">
                        <span>Welcome back</span>
                        <span class="semi-bold text-black"><?=$admin_dets['f_name']?></span>!
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 ">
                            <div>WORK IN PROGRESS...</div>
                            <div class="row">
                                <a href="./view-questions.php" class="col-6 col-md-4 col-lg-3" 
                                    data-toggle="tooltip" data-placement="top" title="View Questions">
                                    <div class=" main-box paper-box-shadow d-flex">
                                            <div class="row ">
                                                <div class="">
                                                    <span class="small"> You Published </span>
                                                    <p class="wow-green huge-font mb-0"> <?=$question_no?> </p>
                                                    <h6 class="arial" style="margin-top: -12px;font-weight: lighter;">Questions </h6>
                                                </div>
                                                <ul class="footer m-0 p-0">
                                                    <li>View All Questions</li>
                                                </ul>
                                            </div>
                                    </div>
                                </a>
                                <a href="#" class="col-6 col-md-4 col-lg-3" 
                                    data-toggle="tooltip" data-placement="top" title="View Complaints">
                                    <div class=" main-box paper-box-shadow d-flex">
                                            <div class="row ">
                                                <div>
                                                    <span class="small"> You Received </span>
                                                    <p class="text-danger huge-font mb-0"> 11 </p>
                                                    <h6 class="arial" style="margin-top: -12px;font-weight: lighter;">Complaints </h6>
                                                </div>
                                                <ul class="footer m-0 p-0">
                                                    <li>View All Questions</li>
                                                </ul>
                                            </div>
                                    </div>
                                </a>
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
