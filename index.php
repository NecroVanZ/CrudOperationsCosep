<?php
  require_once('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Operations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
 
</head>
<body>
<!-- include the add.php fie -->
<?php include('add.php'); ?>

<div class="container">
    
<table class="table table-dark">

  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Birthdate</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
      <th scope="col"></th>
      
    </tr>
  </thead>
  <tbody>
  <?php

  //fetch data in the table

  //get connection
   $connection = $newconnection->openConnection();
   //prepare statement
   $stmt =  $connection->prepare("SELECT * FROM students_table ORDER BY id DESC LIMIT 5");
   //execute query
   $stmt->execute();
   //fetch results of the query
   $result = $stmt->fetchAll();

   //if query is true then all data will be looped
   if($result){
    foreach ($result as $row) {
 
  ?>
    <tr>
    
      <td><?php echo $row->id?></td>
      <td><?php echo $row->first_name?></td>
      <td><?php echo $row->last_name?></td>
      <td><?php echo $row->email?></td>
      <td><?php echo $row->gender?></td>
      <td><?php echo $row->birthdate?></td>
      <td><?php echo $row->home_address?></td>
      <td><a href="update.php?id=<?php echo $row->id?>" class="btn btn-warning" >Edit</a></td>
      <td>
      <form action="code.php" method="post">
      <button type="submit" class="btn btn-danger" name ="deletestudent" value="<?php echo $row->id?>" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
      </form>
    </td>
    </tr>
    
<?php 
   }
  }
?>
  </tbody>

</table>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>





