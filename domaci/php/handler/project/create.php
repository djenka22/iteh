<?php
session_start();

require "../../dbConfig.php";
require "../../model/project.php";

if(isset($_POST['name']) && isset($_POST['description'])) {
        $project = new Project(null, $_POST['name'],$_POST['description']);

        $status = Project::create($project, $conn);
        if ($status){
            $_SESSION['message'] = "Project created successfully";
            header("Location: ../../project-create.php");
            exit(0);
        }else{
            $_SESSION['message'] = "Project is not created";
            header("Location: ../../project-create.php");
            exit(0);
        }
    }

?>