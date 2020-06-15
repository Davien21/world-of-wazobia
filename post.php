<?php
    require 'main-menu.php';
?>
    <?php
        main_menu('updates');
    ?>
        <!-- Main Section -->
        <main id="claire-main">
           
            <!-- Blog -->

            <section class="claire-updates mt-0 pt-4">
                <div class="container-fluid-2">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="blog-entry animate-box" data-animate-effect="fadeInLeft">
                                <a href="post.php" class="blog-img">
                                    <div class="blog-img-div p-3 ">
                                        <img class="news-svg" src="assets/imgs/svgs/news.svg">
                                    </div>
                                    <div class="desc"> 
                                        <span><a href="post.php">Topic | Dec 30, 2020</a></span>
                                        <h3>
                                            <a href="post.php">Title: Top 5 Benefits of Body Polishing</a>
                                        </h3>
                                        <a href="post.php">
                                            <p>
                                                Content: Quisque volutpat non nisl id tincidunt. Praesent at eros vitae dui pulvinar ornare. Morbi mollis a enim nec ullamcorper. Proin condimentum ut mauris ut placerat. 
                                                Donec commodo diam lorem, commodo viverra metus mollis nec.
                                            </p>
                                            
                                        </a>
                                    </div>

                                </a>
                            </div>
                            
                            
                        </div>
                       
                    </div>
                </div>
            </section>
            <section class="container-fluid-2">
                <!-- Comments -->
                <div class="row">
                    <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                        <div class="clear" id="">
                            <div class="" id="">
                                <h4 class="">Comments</h4>
                                <ol class="" style="list-style:none;">
                                    <li class="">
                                        <div class="">
                                            <div class=""> 
                                                <h6 class="">Merry Brown</h6> 
                                            </div>
                                            <div class=""> Dec 28, 2020</div>
                                            <p>Quisque volutpat non nisl id tincidunt. Praesent at eros vitae dui pulvinar ornare. Morbi mollis a enim nec ullamcorper. Proin condimentum ut mauris ut placerat. Donec commodo diam lorem, commodo viverra metus mollis nec.</p>
                                            
                                        </div>
                                         
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
      
            <!-- Footer -->
            <?php
                make_footer();
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
