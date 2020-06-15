<?php
    require 'main-menu.php';
?>
    <?php
        main_menu('questions');
    ?>
        <!-- Main Section -->
        <main id="claire-main">
            <!-- About Us -->
            
            <section class="claire-faq-top mt-0 pt-4">
                <div class="container-fluid-2">
                    <div class="row">
                        <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                            <h2 class="claire-headin">Frequently Asked Questions</h2>
                            <span class="heading-meta">Get answers to the most common questions on Wazobia for free.</span>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 animate-box " data-animate-effect="fadeInLeft">
                            <div id="faq-boxes" class="owl-theme owl-carousel">
                                <button class="faq p-3 active-faq">
                                    <div class="mb-2" style="width: 45px;z-index: 1">
                                        <img src="assets/imgs/svgs/questions-2.svg">
                                    </div>
                                    <h6>
                                        General 
                                    </h3>
                                </button>
                                <button class="faq p-3 passive-faq">
                                    <div class="mb-2" style="width: 45px;z-index: 1">
                                        <img src="assets/imgs/svgs/questions-2.svg">
                                    </div>
                                    <h6>
                                        Wazobia Basics
                                    </h3>
                                </button>
                                <button class="faq p-3 passive-faq">
                                    <div class="mb-2" style="width: 45px;z-index: 1">
                                        <img src="assets/imgs/svgs/questions-2.svg">
                                    </div>
                                    <h6>
                                        Useful Info
                                    </h3>
                                </button>
                                <button class="faq p-3 passive-faq">
                                    <div class="mb-2" style="width: 45px;z-index: 1">
                                        <img src="assets/imgs/svgs/questions-2.svg">
                                    </div>
                                    <h6>
                                        Complaints
                                    </h3>
                                </button>
                                <button class="faq p-3 passive-faq">
                                    <div class="mb-2" style="width: 45px;z-index: 1">
                                        <img src="assets/imgs/svgs/questions-2.svg">
                                    </div>
                                    <h6>
                                        Transactions
                                    </h3>
                                </button>
                                <button class="faq p-3 passive-faq">
                                    <div class="mb-2" style="width: 45px;z-index: 1">
                                        <img src="assets/imgs/svgs/questions-2.svg">
                                    </div>
                                    <h6>
                                        Share an Issue
                                    </h3>
                                </button>
                                <button class="faq p-3 passive-faq">
                                    <div class="mb-2" style="width: 45px;z-index: 1">
                                        <img src="assets/imgs/svgs/questions-2.svg">
                                    </div>
                                    <h6>
                                        Ask Specific Question
                                    </h3>
                                </button>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
            <!-- Services -->
            <section class="claire-faq mt-3 pt-4 mb-5">
                <div class="container-fluid-2">
                    <div class="dropper question-box animate-box rounded" data-animate-effect="fadeInLeft">
                        <div id="question"  style="border-bottom: 1px dotted #000;" 
                            class="flex py-2  align-items-center rounded-top"  >
                            <span class="col question text-black">
                                Stay informed of changes and new trends on Wazobia for free.
                            </span>
                            <span class='lnr ti-angle-right col-auto pr-'></span>
                        </div>
                        <div class="answer drop flex rounded-bottom" style="display: none;">
                            <span class="col">
                                uhg
                            </span>
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
