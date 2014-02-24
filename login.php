<?php
include('includes/header.php');

if (isset($_POST['username']) && isset($_POST['password'])){
  if ($user->checkCredentials($_POST['username'], $_POST['password'])){
    $user->buildObject($user->checkCredentials($_POST['username'], $_POST['password']));
    $user->buildSession();
    if (isset($_POST['referer'])){
      header( 'Location: '.$_POST['referer'] ) ;
    }else{
      header( 'Location: http://csa.nebriv.com' ) ;
    }
  }else{
    echo "<div class='alert alert-danger'>Invalid Username or Password</div>";
    echo "      <form action='login.php' method='post' accept-charset='UTF-8' class='form-signin' role='form'>
          <h2 class='form-signin-heading'>Please sign in</h2>
          <input name='username' type='email' class='form-control' placeholder='Email address' required autofocus>
          <input name='password' type='password' class='form-control' placeholder='Password' required>
          <label class='checkbox'>
            <input type='checkbox' value='remember-me'> Remember me
          </label>
          <button class='btn btn-lg btn-primary btn-block' type='submit'>Sign in</button>
        </form>";
    }
}else{
  echo "      <form action='login.php' method='post' accept-charset='UTF-8' class='form-signin' role='form'>
        <h2 class='form-signin-heading'>Please sign in</h2>
        <input name='username' type='email' class='form-control' placeholder='Email address' required autofocus>
        <input name='password' type='password' class='form-control' placeholder='Password' required>
        <label class='checkbox'>
          <input type='checkbox' value='remember-me'> Remember me
        </label>
        <button class='btn btn-lg btn-primary btn-block' type='submit'>Sign in</button>
      </form>";
}


include('includes/footer.php');

?>
