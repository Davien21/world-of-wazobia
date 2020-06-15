<?php
    require './admin-menu.php';
    // require 'backends/home-back.php';
?>
    <?php
        admin_menu('updates');
    ?>
        <!-- Main Section -->
        <main id="claire-main" class=""> 
           
            <!-- Blog -->

            
            <section class="claire-updates mt-0 pt-4 fullHeight" >
                <div class="container-fluid-2 mt-5" >
                    <div class="row mt-5">
                        <div class="col-12 ">
                        	<div class="row">
                        		<h4 class="col-12 text-center wow-green">
                    				<a href="../index.php">View Updates</a>
                        		</h4>
	                           	
                        		
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
