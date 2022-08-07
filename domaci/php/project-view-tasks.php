<?php
session_start();
require "dbConfig.php";
require "model/task.php";
require "model/project.php";


if (isset($_GET['id'])) {
    $projectId = mysqli_real_escape_string($conn, $_GET['id']);
    $result = Task::findByProject($projectId, $conn);
    $result1 = Project::findNameById($conn, $_GET['id']);
    $name = $result1->fetch_array()[0];
}
if (!$result) {
    echo "Error!";
    die();
}



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>


  <body>
 
    <div class="container mt-5">
    <?php include('message.php'); ?>

        <div class="row">
            <div class="column-md-12">
                <div class="card">
                    <div class="card-header">
                         <h4>Task details
                            <a href="task-create.php?id=<?= $projectId;?>" class="btn btn-primary float-end"> Create task </a> <p></p>
                            <a href="index.php" class="btn btn-danger float-end">Back</a> 

                         </h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Project Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                while($row = $result->fetch_array()) :
                                ?>
                                <tr>
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["description"]; ?></td>
                                    <td><?php echo $name ?></td>

                                    <td>
                                        <a href="task-update.php?id=<?= $row['id']; ?>&project=<?=$projectId?>" class="btn btn-success btn-sm">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                    
                                </tr>
                            <?php 
                            endwhile;
                        
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>