<?php
session_start();

require "../../dbConfig.php";
require "../../model/task.php";

if(isset($_POST['id'])){
        $id = mysqli_real_escape_string($conn, $_POST['id']);

        $status = Task::deleteById($id, $conn);
        if ($status){
            $_SESSION['message'] = "Task removed successfully";
            header("Location: ../../project-view-tasks.php?id=".$_POST['project']);
            exit(0);
        }else{
            $_SESSION['message'] = "Task is not removed";
            header("Location: ../../index.php");
            exit(0);
        }
    }

?>