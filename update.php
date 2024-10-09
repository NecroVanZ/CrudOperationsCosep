<?php require_once('connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body>

<?php
if(isset($_GET['id'])){

  $update_id = $_GET['id'];

  //get connection
  $connection = $newconnection->openConnection();
  //prepare query statement
  $stmt = $connection->prepare("SELECT * FROM students_table WHERE id = $update_id LIMIT 1");
  //excute query
  $stmt->execute();
  //fetch results of query
  $result = $stmt->fetchAll();  

  //check if query is true
  if($result){

    foreach ($result as $row) {
 
?>
    <tr>
<div class="container">
    
<form action="code.php" method="post" class="row g-3">
<div class="col-md-6">
  <!-- hidden input for id -->

  <!-- put the value in each input  by calling the result base on the query above -->
  <input type="hidden" name="id" value="<?php echo $row->id?>" name = "id" required>
    <label for="first_name" class="form-label">First Name</label>
    <input type="text" class="form-control" id="first_name" value="<?php echo $row->first_name?>" name = "first_name" required>
  </div>
  <div class="col-md-6">
    <label for="last_name" class="form-label">Last Name</label>
    <input type="last_name" class="form-control" id="last_name" value="<?php echo $row->last_name?>" name = "last_name" required>
  </div>
  <div class="col-md-6">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" value="<?php echo $row->email?>" name = "email" required>
  </div>
  <div class="col-md-6">
    <label for="gender" class="form-label">Gender</label>
    <select id="gender" class="form-select" value="" name ="gender" required>
      <option selected>Male</option>
      <option>Female</option>
    </select>
  </div>
  <div class="col-6">
    <label for="birthdate" class="form-label">birthdate</label>
    <input type="date" class="form-control" id="birthdate" value="<?php echo $row->birthdate?>"  name ="birthdate" required>
  </div>
  <div class="col-6">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control" id="address" value="<?php echo $row->home_address?>" placeholder="1234 Main St" name = "home_address" required>
  </div>
 

  <div class="col-12">
    <!-- name attribute = updatestudent -->
    <button type="submit" class="btn btn-warning" name ="updatestudent">Update</button>
    <a href="index.php" class="btn btn-warning float-end">Back</a>
  </div>
</form>

<!-- Take note to add name attribute in the inputs -->
<?php
   }
  }
}
?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>





