
<div class="container">
    
<!-- Action: to code.php file with a post method -->
<form action ="code.php" method="POST" class="row g-12">
<div class="col-md-4">
    <label for="first_name" class="form-label" >First Name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" required>
  </div>
  <div class="col-md-4">
    <label for="last_name" class="form-label">Last Name</label>
    <input type="last_name" class="form-control" id="last_name" name="last_name" required>
  </div>
  <div class="col-md-4">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name ="email" required>
  </div>
  <div class="col-md-4">
    <label for="gender" class="form-label">Gender</label>
    <select id="gender" class="form-select" name="gender" required>
      <option selected>Male</option>
      <option>Female</option>
    </select>
  </div>
  <div class="col-4">
    <label for="birthdate" class="form-label">Birthdate</label>
    <input type="date" class="form-control" id="birthdate" name="birthdate" required>
  </div>
  <div class="col-4">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control" id="address" name="home_address" placeholder="1234 Main St" required>
  </div>
 
  <!-- Button name: addstudent  -->
  <div class="col-12">
    <button type="submit" class="btn btn-primary float-end" name ="addstudent" style="margin-bottom:10px;margin-top:10px;">Add</button>
  </div>

   <!-- Take note: Put a name attribute in each input  -->
</form>
</div>






