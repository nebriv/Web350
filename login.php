<?php
include('includes/header.php');
$log = new logger();

if (isset($_POST['username']) && isset($_POST['password'])){
  if ($user->checkCredentials($_POST['username'], $_POST['password'])){
    $user->buildObject($user->checkCredentials($_POST['username'], $_POST['password']));
    if (isset($_POST['rememberme'])) {
      $user->buildCookie();
    }else{
      $user->buildSession();
    }
    $log->auth("success", $user);
    if (isset($_POST['referer'])){
      header( 'Location: '.$_POST['referer'] ) ;
    }else{
      header( 'Location: http://csa.nebriv.com' ) ;
    }
  }else{
    
    echo $log->auth("failure", $user);
    echo "      <form action='login.php' method='post' accept-charset='UTF-8' class='form-signin' role='form'>
          <h2 class='form-signin-heading'>Please sign in</h2>
          <div class='alert alert-danger'>Invalid Username or Password<br /><small><a href='reset.php'>Forgot Password?</a> / <a href='register.php'>Don't have an account?</a></div>
          <input name='username' class='form-control' placeholder='Username' required autofocus>
          <input name='password' type='password' class='form-control' placeholder='Password' required>
          <label class='checkbox'>
            <input type='checkbox' name='rememberme' value='remember-me'> Remember me
          </label>
          <button class='btn btn-lg btn-primary btn-block' type='submit'>Sign in</button>
        </form>";
    }
}else{
  
  echo "      <form action='login.php' method='post' accept-charset='UTF-8' class='form-signin' role='form'>
        <h2 class='form-signin-heading'>Please sign in</h2>
        <input name='username' class='form-control' placeholder='Username' required autofocus>
        <input name='password' type='password' class='form-control' placeholder='Password' required>
        <label class='checkbox'>
          <input type='checkbox' name='rememberme' value='remember-me'> Remember me
        </label>
        <button class='btn btn-lg btn-primary btn-block' type='submit'>Sign in</button>
      </form>";
}


include('includes/footer.php');

?>
