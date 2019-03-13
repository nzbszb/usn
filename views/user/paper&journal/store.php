<?php
session_start();
include ("../../../src/User/DB/database.php");
include ("../../../src/User/PaperJournal/PaperJournal.php");
$obj_pj = new PaperJournal($pdo);
$_POST['usn_paper_journal_id'] = time() . "_" . sha1($_POST['usn_paper_journal_username']);
//print_r($_POST);
//print_r($_FILES);
//die();


if((!empty($_POST['usn_paper_journal_title']) || !empty($_POST['usn_paper_journal_details'])) && !empty($_FILES['usn_paper_journal_file']['name']) && !empty($_POST['usn_paper_journal_username'])) {
//    print_r($_FILES);
//    print_r($_POST);
//    die();
    if (!empty($_FILES['usn_paper_journal_file']['name'])) {
        $filevalidextensions = array("doc", "docx", "pdf", "txt", "xls", "xlsx", "ppt", "pptx", "zip", "rar", "sql", "ini", "java", "c", "cpp", "m");
        $filename = time() . "_" . sha1($_POST['usn_paper_journal_username']);
        $fileext = explode('.', basename($_FILES['usn_paper_journal_file']['name']));
        $file_extension = end($fileext);
        $file_name = $_FILES['usn_paper_journal_file']['name'].":".$filename . "." . $file_extension;
        $up_file_name = $filename . "." . $file_extension;

        if (in_array($file_extension, $filevalidextensions)) {

            if ($_FILES['usn_paper_journal_file']['error'] == 0) {
                move_uploaded_file($_FILES['usn_paper_journal_file']['tmp_name'], "../../../paper&journal/file/" . $up_file_name);
                $_POST['usn_paper_journal_file'] = $file_name;

                $obj_pj->paperJournalSetData($_POST);
                $obj_pj->paperJournalInfoStore();
            } else {
                if (isset($_SESSION['message'])) {
                    unset($_SESSION['message']);
                    $_SESSION['message'] = '<h4>File size is more than 5MB!</h4>';
                    header('location:../paper&journal/');
                } else {

                    $_SESSION['message'] = '<h4>File size is more than 5MB!</h4>';
                    header('location:../paper&journal/');
                }
            }
        } else {
            if (isset($_SESSION['message'])) {
                unset($_SESSION['message']);
                $_SESSION['message'] = '<h4>It is not a valid file!</h4>';
                header('location:../paper&journal/');
            } else {
                $_SESSION['message'] = '<h4>It is not a valid file!</h4>';
                header('location:../paper&journal/');

            }
        }
    }
    else{
        header('location:../paper&journal/');
    }
}
else{
    header('location:../paper&journal/');
}
