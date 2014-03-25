<?php
include('includes/header.php');


?>


<div class="row">
  <div class="col-md-4">
  </div>
  <div class="col-md-4"
    <form role="form">
      <div class="form-group">
        <label for="Email">Email address</label>
        <input type="email" class="form-control" id="Email" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="userName">Username</label>
        <input type="email" class="form-control" id="userName" placeholder="Enter email">
      </div>

      <div class="form-group">
        <label for="Password1">Password</label>
        <input type="password" class="form-control" id="Password1" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="Password2">Password</label>
        <input type="password" class="form-control" id="Password2" placeholder="Password">
      </div>

      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>
  <div class="col-md-4">
  </div>
</div>
	  
<?php

include('includes/footer.php');

?>
