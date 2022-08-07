<?php

class Project {

    private $id;
    private $name;
    private $description;
    private $project;

    public function __construct ($id = null, $name = null, $description = null, $project) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->project = $project;
    }

    public static function findAll ($mysqli $conn) {
        $query = "SELECT * FROM task";
        return $conn->query($query);
    }

    public static function findById($id, mysqli $conn)
    {
        $query = "SELECT * FROM task WHERE id=$id";
        $array = array();
        $result = $conn->query($query);
        if($result){
            while($red = $result->fetch_array()) {
                $array[] = $red;
            }
        }
        
        return $array;
        
    }
    
    public static function deleteById($id, mysqli $conn)
    {
        $query = "DELETE FROM task WHERE id=$id";
        return $conn->query($query);
    }

    public static function create(Task $task, mysqli $conn)
    {
        $query = "INSERT INTO task(name,description,project_id) VALUES('$task->name','$task->description','$task->project')";
        return $conn->query($query);
    }

    public static function update(Task $task, mysqli $conn){
        $query = "UPDATE task set name ='$task->name', description='$task->description'";
        return $conn->query($query);
    }

}


?>