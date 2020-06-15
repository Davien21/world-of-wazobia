    <?php
        require '../database/classes/DbConnect.php';
        require '../database/classes/SelectQuery.php';
        require '../database/classes/InsertQuery.php';
        require '../backends/form-validations.php';
        if (!(isset($_SESSION['user']) or !isset($_SESSION['id'])) and !(isset($_GET['name']))) {
            exit(header('Location:logout.php'));
        }else {
                $id = sanitizeInputs($_GET['name']);
                $select_query = new SelectQuery('academia');
            if(!isset($_GET['req'])) {
                $response = $select_query->get_assignment_file_name($id);
            }else {
                $req = sanitizeInputs($_GET['req']);
                if ($req === 'assignment-submit') {
                    $response = $select_query->get_assignment_submit_file_name($id);
                }
            }
            $filepath = '../backends/attachments/'.$response;
            
            // Quick check to verify that the file exists
            if( !file_exists($filepath) ) die("File not found");
            // Force the download
            header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
            header("Content-Length: " . filesize($filepath));
            header("Content-Type: image/jpeg;");
            header('Pragma: private');      
            readfile($filepath);
        }   
    ?>