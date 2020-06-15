<?php
    require './admin-menu.php';
    require 'backends/add-question-back.php';
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
                                            <span class="h5"> Add Question </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 px-0 px-md-3">
                                        <form class="account-info m-0" method="post">
                                            <div class="px-3 ">
                                                <label> Type </label>
                                                <span class="type d-none"><?=$type?></span> 
                                                <select class="form-control def-font-face" tabindex="1" name="type">
                                                    <option selected="" disabled="">--Select a Question Type--</option>
                                                    <?php
                                                        foreach ($question_types as $key => $value) {
                                                    ?>
                                                        <option><?=$value?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                                <span class="err"><?=$type_err?></span>
                                            </div>
                                            <div class="px-3 ">
                                                <label for="question"> Question </label> 
                                                <span class="question d-none"><?=$question?></span> 

                                                <textarea id="question" class="form-control" 
                                                    tabindex="2" name="question" placeholder="Type in a question...">
                                                    
                                                </textarea>
                                                <span class="err"><?=$question_err?></span>
                                            </div>
                                            <div class="px-3 ">
                                                <label for="answer"> Answer </label> 
                                                <span class="answer d-none"><?=$answer?></span> 
                                                <textarea rows="4" class=" form-control" id="answer" 
                                                    tabindex="3" name="answer" placeholder="Type in the answer...">
                                                    
                                                </textarea>
                                                <span class="err"><?=$answer_err?></span>
                                            </div>
                                            <div class="" tabindex="4">
                                                <button name="add" class="btn btn-success px-4 def-font-face form-control">
                                                    Add Question 
                                                </button>
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
        <script>
            let question = $('span.question').text();
            $('textarea#question').text(question);

            let answer = $('span.answer').text();
            $('textarea#answer').text(answer);
            let type = $('span.type').text()
            for (var i = 0; i < $('select[name=type] option').length; i++) {
                if($('select[name=type] option')[i].innerText == type) {
                    $('select[name=type] option')[i].setAttribute('selected', true);
                }
            }
        </script>
    </div>
</body>

</html>
