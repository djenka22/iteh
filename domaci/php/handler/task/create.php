<?php
session_start();

require "../../dbConfig.php";
require "../../model/task.php";

if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['id'])) {
        $task = new Task(null, $_POST['name'],$_POST['description'], $_POST['id']);

        $status = Task::create($task, $conn);
        if ($status){
            $_SESSION['message'] = "Task created successfully";
            header("Location: ../../task.create.php");
            exit(0);
        }else{
            $_SESSION['message'] = "Task is not created";
            header("Location: ../../task-create.php");
            exit(0);
        }
    }

?>