<?php
include('includes/header.php');
if (isset($_SERVER['HTTP_REFERER'])){
	$referer = $_SERVER['HTTP_REFERER'];
}else{
	$referer = "http://csa.nebriv.com/index.php";
}
echo $referer;
?>
<h2>Registration</h2>
<?php
if (isset($_POST['Email']) && isset($_POST['userName'])){
  $email = $_POST['Email'];
  $username = $_POST['userName'];
  $password1 = $_POST['Password1'];
  $password2 = $_POST['Password2'];
	$referer2 = $_POST['referer'];
  $firstname = $_POST['firstName'];
  $lastname = $_POST['lastName'];

  if ($password1 != $password2){
    echo "<div class='alert alert-danger'>Passwords do not match!!!</div>";
  }else{
    $result = $user->registerUser($username, $password1, $email, $firstname, $lastname);
    if ($result == "Successfully made user"){
        $ID = $user->getID();
        //echo "<div class='alert alert-success'>Sucessfully Made Account!</div>";
		$user->buildObject($user->checkCredentials($username, $password1));
        $user->buildSession();
		header("Location: $referer2");
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
        <input class="form-control" id="firstName" name="firstName" placeholder="Enter first name">
      </div>
      <div class="form-group">
        <label for="lastName">Last Name</label>
        <input class="form-control" id="lastName" name="lastName" placeholder="Enter last name">
      </div>

      <div class="form-group">
        <label for="Password1">Password</label>
        <input type="password" class="form-control" id="Password1" name="Password1" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="Password2">Password Again</label>
        <input type="password" class="form-control" id="Password2" name="Password2" placeholder="Password">
      </div>
		<?php
			echo "<input type='hidden' name='referer' value='$referer'>";
		?>
      <button class='btn btn-lg btn-primary btn-block' type='submit'>Submit</button>
    </form>
  </div>
  <div class="col-md-4">
  </div>
</div>

<?php
}else{

echo "
<div class='row'>
  <div class='col-md-4'>
  </div>
  <div class='col-md-4'>
     <form action='register.php' method='post' accept-charset='UTF-8' class='form-signin' role='form'>
      <div class='form-group'>
        <label for='Email'>Email address</label>
        <input type='email' class='form-control' id='Email' name='Email' placeholder='Enter email'>
      </div>
      <div class='form-group'>
        <label for='userName'>Username</label>
        <input class='form-control' id='userName' name='userName' placeholder='Enter username'>
      </div>
      <div class='form-group'>
        <label for='firstName'>First Name</label>
        <input class='form-control' id='firstName' name='firstName' placeholder='Enter first name'>
      </div>
      <div class='form-group'>
        <label for='lastName'>Last Name</label>
        <input class='form-control' id='lastName' name='lastName' placeholder='Enter last name'>
      </div>

      <div class='form-group'>
        <label for='Password1'>Password</label>
        <input type='password' class='form-control' id='Password1' name='Password1' placeholder='Password'>
      </div>
      <div class='form-group'>
        <label for='Password2'>Password Again</label>
        <input type='password' class='form-control' id='Password2' name='Password2' placeholder='Password'>
      </div>

      <button class='btn btn-lg btn-primary btn-block' type='submit'>Submit</button>
    </form>
  </div>
  <div class='col-md-4'>
  </div>
</div>
";



}
?>




	  
<?php

include('includes/footer.php');

?>
