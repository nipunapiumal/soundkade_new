<?php

include 'db/db.php';
if (!isset($_SESSION)) {
    session_start();
    //$level = $_SESSION['val'];
    $level = htmlspecialchars(trim($_SESSION['val']), ENT_QUOTES, 'UTF-8');

    if ($level == 1) {

        header('Content-type: application/json');
        $response = array();

        //if(isset($_POST['submit'])){

        //$id = $_GET['id'];
        $id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');

        if ($id == 1) {
            $form = $_POST['form'];

            if (!empty($_POST['field'])) {
                foreach ($_POST['field'] as $field) {
                    $qv = mysqli_query($conn, "SELECT * FROM fields_map WHERE form_id='$form' and field_id='$field'");

                    if (mysqli_num_rows($qv) == 0) {
                        $sql = "INSERT INTO fields_map SET form_id='$form', field_id='$field'";

                        if (mysqli_query($conn, $sql)) {
                            $response['status'] = 'ok';
                        } else {
                            $response['status'] = 'error';
                        }
                    }
                }
            }
            echo json_encode($response);
        }

        /////////////////////// update /////////////////////////////////////////////		

        if ($id == 2) {
            $form = $_POST['form'];
            mysqli_query($conn, "DELETE FROM fields_map WHERE form_id='$form'");

            if (!empty($_POST['field'])) {
                foreach ($_POST['field'] as $field) {
                    $qv = mysqli_query($conn, "SELECT * FROM fields_map WHERE form_id='$form' and field_id='$field'");

                    if (mysqli_num_rows($qv) == 0) {
                        $sql = "INSERT INTO fields_map SET form_id='$form', field_id='$field'";

                        if (mysqli_query($conn, $sql)) {
                            $response['status'] = 'ok';
                        } else {
                            $response['status'] = 'error';
                        }
                    }
                }
            }
            echo json_encode($response);
        }
    } else {
        header("Location: index.php");
    }
}
?>