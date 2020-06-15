<?php
    require './admin-menu.php';
    // require 'backends/home-back.php';
?>
    <?php
        admin_menu('home');
    ?>
        <!-- Main Section -->
        <main id="claire-main" class=""> 
           
            <!-- Blog -->

            
            <section class="claire-updates mt-0 pt-4 fullHeight" >
                <div class="container-fluid-2 mt-5" >
                    <div class="row mt-5">
                        <div class="col-12 ">
                        	<div class="row">
                        		<div class="col-6 col-md-4 col-lg-3">
                                    <a href="admin-view-groups.php" data-toggle="tooltip" data-placement="top" title="View Groups">
                                        <div class="d-flex">
                                            WORK IN PROGRESS GUYS...
                                        </div>
                                    </a>
                                </div>
	                           
                        		
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
