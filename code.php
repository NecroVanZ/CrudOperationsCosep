<?php
require_once('connection.php');

//INSERT DATA IN DATABASE
if(isset($_POST['addstudent'])) {
    
    //get data from inputs
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $home_address = $_POST['home_address'];

    try {
        //get connection
        $connection = $newconnection->openConnection();
        //query using positional parameters
        $query = "INSERT INTO students_table(`first_name`,`last_name`,`email`,`gender`,`birthdate`,`home_address`) VALUES(?,?,?,?,?,?)";
        //prepare the query
        $stmt = $connection->prepare($query);
        //execute query
        $query = $stmt->execute([$first_name,$last_name,$email,$gender,$birthdate,$home_address]);

        //check if query is true
        if($query){
            header("location: index.php");

        }
    } catch (PDOException $th) {
        echo "Error Message:" .$th->getMessage();
    }
}

// UPDATE DATA IN DATABASE

if(isset($_POST['updatestudent'])) {
   
    //get data from inputs
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $home_address = $_POST['home_address'];

    try {
        //get connection
        $connection = $newconnection->openConnection();
        //prepare query statement using named parameters
        $stmt = $connection->prepare("UPDATE students_table SET first_name=:first_name,last_name=:last_name,email=:email,gender=:gender,birthdate=:gender,home_address=:home_address WHERE id =:id LIMIT 1");

        //get data inputs
        $data = [
            ':first_name'=>$first_name,
            ':last_name'=>$last_name,
            ':email'=>$email,
            ':gender'=>$gender,
            ':birthdate'=>$birthdate,
            ':home_address'=>$home_address,
            ':id'=>$id
        ];
        //execute the query statement
        $query = $stmt->execute($data);
    
        //check if query is true
        if($query){
            header("location: index.php");

        }
    } catch (PDOException $th) {
        echo "Error Message:" .$th->getMessage();
    }
}
//DELETE DATA IN DATABASE
if(isset($_POST['deletestudent'])){

    //get id from value in delete button
    $id = $_POST['deletestudent'];
    try {
        //get connection
        $connection = $newconnection->openConnection();
        //prepare query
        $stmt = $connection->prepare("DELETE FROM students_table WHERE id = $id");
        //execute $query
        $query = $stmt->execute();
        //check of query is true
        if($query){
            header("location: index.php");
        }
    } catch (PDOException $th) {
        echo "Error Message:" .$th->getMessage();
    }
}

?>