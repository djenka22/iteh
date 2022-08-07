<?php
session_start();

require "../../dbConfig.php";
require "../../model/task.php";

if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['description'])) {
        $task = new Task($_POST['id'], $_POST['name'],$_POST['description']);

        $status = Task::update($task, $conn);
        if ($status){
            $_SESSION['message'] = "Task updated successfully";
            header("Location: ../../task-update.php?id=".$_POST['id']);
            exit(0);
        }else{
            $_SESSION['message'] = "Task is not updated";
            header("Location: ../../index.php");
            exit(0);
        }
    }

?>