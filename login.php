<?php
    require 'main-menu.php';
?>
    <?php
        main_menu('login');
    ?>
        <!-- Main Section -->
        <main id="claire-main" class=""> 
           
            <!-- Blog -->

            
            <section class="claire-updates mt-0 pt-4 fullHeight" >
                <div class="container-fluid-2 mt-5" >
                    <div class="row mt-5">
                        <div class="col-12 ">
                            <div class="flex mb-3" style="margin-top: -20px;">
                                <a href="./admin-login.php" class="btn btn-info ml-auto">Login as Admin</a>
                            </div>
                        	<div class="row">
                        		<h4 class="col-12 text-center wow-green">WORLD OF WAZOBIA</h4>
	                            <div class="col-sm-8 col-md-8 col-lg-7 col-xl-5 mx-auto " style="font-size: 0.9em">
	                            	<form method="post" class="p-4 bg-white rounded-top paper-box-shadow">
	                            		<div class="form-group">
	                            			<label>Email Address</label>
	                            			<input type="text" class="form-control" name="email">
	                            		</div>
	                            		<div class="form-group">
	                            			<div class="d-flex">
	                            				<label>Password</label>
	                            				<a href="" class="ml-auto link">Forgot?</a>
	                            			</div>
	                            			<input type="password" class="form-control" name="pass">
	                            		</div>
	                            		<div class="py-2">
	                            			<button class="btn btn-block btn-success ">Login</button>
	                            		</div>
	                            	</form>
	                            	<div class="bg-light text-center py-3 paper-box-shadow rounded-bottom">
	                            		Not a member yet? <a href="subscribe.php" class="link">Create a New Account</a>
	                            	</div>
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
        <script src="./assets/js/questions.js"></script>
    </div>
</body>

</html>
