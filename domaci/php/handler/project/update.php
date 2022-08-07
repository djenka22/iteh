<?php
session_start();

require "../../dbConfig.php";
require "../../model/project.php";

if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['description'])) {
        $project = new Project($_POST['id'], $_POST['name'],$_POST['description']);

        $status = Project::update($project, $conn);
        if ($status){
            $_SESSION['message'] = "Project updated successfully";
            header("Location: ../../project-update.php?id=".$_POST['id']);
            exit(0);
        }else{
            $_SESSION['message'] = "Project is not updated";
            header("Location: ../../index.php");
            exit(0);
        }
    }

?>