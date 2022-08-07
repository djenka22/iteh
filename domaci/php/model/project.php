<?php

class Project {

    private $id;
    private $name;
    private $description;

    public function __construct ($id = null, $name = null, $description = null) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
    }

    public static function findAll (mysqli $conn) {
        $query = "SELECT * FROM project";
        return $conn->query($query);
    }

    public static function findById($id, mysqli $conn)
    {
        $query = "SELECT * FROM project WHERE id=$id";
       /* $array = array();
        $result = $conn->query($query);
        if($result){
            while($red = $result->fetch_array()) {
                $array[] = $red;
            }
        }
        
        return $array;*/
        return $conn->query($query);
        
    }
    
    public static function deleteById($id, mysqli $conn)
    {
        $query = "DELETE FROM project WHERE id=$id";
        return $conn->query($query);
    }

    public static function create(Project $project, mysqli $conn)
    {
        $query = "INSERT INTO project(name,description) VALUES('$project->name','$project->description')";
        return $conn->query($query);
    }

    public static function update(Project $project, mysqli $conn){
        $query = "UPDATE project set name ='$project->name', description='$project->description' WHERE id='$project->id'";
        return $conn->query($query);
    }

}


?>