<?php
    require 'main-menu.php';
?>
    <?php
        main_menu('updates');
    ?>
        <!-- Main Section -->
        <main id="claire-main">
            <!-- About Us -->

            <section class="claire-faq-top mt-0 pt-4">
                <div class="container-fluid-2">
                    <div class="row">
                        <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                            <h2 class="claire-headin">Wazobia News Updates</h2>
                            <span class="heading-meta">
                                Stay informed of changes and new trends on Wazobia for 
                                <span class="emphasis">free</span>. 
                            </span>
                            
                        </div>
                    </div>
                    
                </div>
            </section>
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
