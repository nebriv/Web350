<?php
include('includes/header.php');
?>
<h2>Registration</h2>
<?php
if (isset($_POST['Email'])){
  echo "Ok!";
  $email = $_POST['Email'];
  $username = $_POST['userName'];
  $password1 = $_POST['Password1'];
  $password2 = $_POST['Password2'];

  $firstname = $_POST['firstName'];
  $lastname = $_POST['lastName'];

  if ($password1 != $password2){
    echo "<div class='alert alert-danger'>Passwords do not match!!!</div>";
  }else{
    echo "Ok2!";
    $result = $user->registerUser($username, $password1, $email, $firstname, $lastname);
    if ($result == "Successfully made user"){
        $ID = $user->getID();
        echo "<div class='alert alert-success'>Sucessfully Made Account!</div>";
        echo $ID;
        $user->buildSession();
    }elseif ($result == "Error making user2"){

    }elseif ($result == "Error hashing password"){

    }elseif ($result == "Error making user"){

    }elseif ($result == "This user already exists"){
      echo "<div class='alert alert-danger'>Sorry this user already exists! <a href='reset.php'>Forgot password?</a></div>";
    }
  }
  ?>

  <div class="row">
  <div class="col-md-4">
  </div>
  <div class="col-md-4">
     <form action='register.php' method='post' accept-charset='UTF-8' class='form-signin' role='form'>
      <div class="form-group">
        <label for="Email">Email address</label>
        <input type="email" class="form-control" id="Email" name="Email" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="userName">Username</label>
        <input class="form-control" id="userName" name="userName" placeholder="Enter username">
      </div>
      <div class="form-group">
        <label for="firstName">First Name</label>
        <input class="form-control" id="firstName" placeholder="Enter first name">
      </div>
      <div class="form-group">
        <label for="lastName">Last Name</label>
        <input class="form-control" id="lastName" placeholder="Enter last name">
      </div>

      <div class="form-group">
        <label for="Password1">Password</label>
        <input type="password" class="form-control" id="Password1" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="Password2">Password Again</label>
        <input type="password" class="form-control" id="Password2" placeholder="Password">
      </div>

      <button class='btn btn-lg btn-primary btn-block' type='submit'>Submit</button>
    </form>
  </div>
  <div class="col-md-4">
  </div>
</div>

<?php
}else{
  echo "not ok!";
}
?>



<div class="row">
  <div class="col-md-4">
  </div>
  <div class="col-md-4">
     <form name='register' action='register.php' method='post'>
      <div class="form-group">
        <label for="Email">Email address</label>
        <input type="email" class="form-control" id="Email" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="userName">Username</label>
        <input class="form-control" id="userName" placeholder="Enter username">
      </div>
      <div class="form-group">
        <label for="firstName">First Name</label>
        <input  class="form-control" id="firstName" placeholder="Enter first name">
      </div>
      <div class="form-group">
        <label for="lastName">Last Name</label>
        <input class="form-control" id="lastName" placeholder="Enter last name">
      </div>

      <div class="form-group">
        <label for="Password1">Password</label>
        <input type="password" class="form-control" id="Password1" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="Password2">Password Again</label>
        <input type="password" class="form-control" id="Password2" placeholder="Password">
      </div>
      <button class='btn btn-lg btn-primary btn-block' type='submit'>Submit</button>
    </form>
  </div>
  <div class="col-md-4">
  </div>
</div>
	  
<?php

include('includes/footer.php');

?>
