<?php
    require './main-menu.php';
    require './admin/backends/login-back.php';
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
                                <a href="./login.php" class="btn btn-info ml-auto">Login as User</a>
                            </div>
                        	<div class="row">
                        		<h4 class="col-12 text-center wow-green">
                    				<a href="./index.php">WORLD OF WAZOBIA</a>
                        		</h4>
	                            <div class="col-sm-8 col-md-8 col-lg-7 col-xl-5 mx-auto " style="font-size: 0.9em">
	                            	<form method="post" class="p-4 bg-white rounded-top paper-box-shadow">
                            			<h4 class="">Admin Login</h4>
	                            		<div class="form-group">
	                            			<label>Email Address</label>
	                            			<input type="text" class="form-control" name="email" value="<?=$email?>">
	                            			<span class="err"><?=$email_err?></span>
	                            		</div>
	                            		<div class="form-group">
	                            			<div class="d-flex">
	                            				<label>Password</label>
	                            				<a href="" class="ml-auto link">Forgot?</a>
	                            			</div>
	                            			<input type="password" class="form-control" name="pass">
	                            			<span class="err"><?=$pass_err?></span>
	                            		</div>
	                            		<div class="py-2">
	                            			<button class="btn btn-block btn-success" name="login">Login</button>
	                            		</div>
	                            	</form>
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
