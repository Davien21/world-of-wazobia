<?php
    require 'main-menu.php';
    require './backends/questions-back.php';
?>
    <?php
        main_menu('questions');
    ?>
        <!-- Main Section -->
        <main id="claire-main">
            <!-- About Us -->
            <div class="page-wrapper ullHeight">
                <section class="claire-faq-top mt-0 pt-4">
                    <div class="container-fluid-2">
                        <div class="row mt-5 mt-md-0">
                            <div class="col-md-12 ">
                                <h2 class="claire-headin my-0">Frequently Asked Questions</h2>
                                <span class="heading-meta">Get answers to the most common questions on Wazobia for free.</span>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 ">
                                <form id="faq-boxes" class="row pr-3  mb-0" method="post">
                                    <?php
                                        foreach ($question_types as $key => $value) {
                                    ?>  
                                        <div class="col faq mb-3 mb-lg-0 pr-0">
                                            <button name="<?=$value['name']?>" 
                                                class="w-100 paper-box-shadow text-center p-3 <?=$value['class']?>">
                                                <div class="mb-2 d-flex" >
                                                    <img src="assets/imgs/svgs/questions-2.svg" 
                                                        class="mx-auto" style="width: 20px;z-index: 1">
                                                </div>
                                                <h5>
                                                    <?=$value['name']?> 
                                                </h5>
                                            </button>
                                            
                                        </div>
                                    <?php
                                        }
                                    ?> 
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </section>

                <!-- Services -->
                <section class="claire-faq mt-3 pt-4 mb-5 animate-box " 
                                data-animate-effect="fadeInLeft">
                    <div class="container-fluid-2">
                        <?php

                            if (!empty($all_questions)) {
                                $num = 0;
                                foreach ($all_questions as $key => $value) {
                                    $num++;
                                    $value['question'] = nl2br($value['question']);
                                    $value['answer'] = nl2br($value['answer']);
                        ?>
                            <div class="dropper def-hover-info paper-box rounded-0 mb-3 ">
                                <div id="" class="flex py-2  align-items-center "  >
                                    <span class="col text-black semi-bold">
                                        <?="${num}. {$value['question']}"?>
                                    </span>
                                    <span class='lnr ti-angle-right col-auto'></span>
                                </div>
                                <div class=" drop d-none ml-3" >
                                    <span class="answer">
                                        &#8226;
                                        <?=$value['answer']?>
                                    </span>
                                </div>
                            </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                </section>
            </div>
            
      
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
        <script >
            if (!$('.faq button').hasClass('active-faq')) {
               $('#faq-boxes :first-child button').removeClass('passive-faq');
               $('#faq-boxes :first-child button').addClass('active-faq');
            }
        </script>
    </div>
</body>

</html>
