<?php session_start();

require "dbConfig.php";


if (isset($_GET['id'])) {
    $projectId = mysqli_real_escape_string($conn, $_GET['id']);

}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>


  <body>
        <div class="container mt-5">
        <?php include('message.php'); ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create a task
                                <a href="project-view-tasks.php?id=<?=$projectId;?>" class="btn btn-danger float-end">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="#" id="createTask" method="POST">
                                <div class="mb-3">
                                     <input type="hidden" name="id" value="<?= $projectId ?>">
                                
                                     <label>Task Name</label>
                                     <input type="text" name="name" class="form-control">
                                
                                </div>
                                <div class="mb-3">
                                
                                     <label>Task Description</label>
                                     <input type="text" name="description" class="form-control">
                                
                                </div>
                                <div class="mb-3">
                                    <button type="submit" id="createTask" name="save_task"  class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>





    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>
</html>