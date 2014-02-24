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
    echo "Invalid Username or Password";
      echo "<form name='login' action='login.php' method='post' accept-charset='UTF-8'>
            <input id='user_username' style='margin-bottom: 15px;' type='text' name='username' placeholder='Username' size='30' />
            <input id='user_password' style='margin-bottom: 15px;' type='password' name='password' placeholder='Password' size='30' />
            <input id='user_remember_me' style='float: left; margin-right: 10px;' type='checkbox' name='rememberme' value='1' />
            <label class='string optional' for='user_remember_me'> Remember me</label>
            <input class='btn btn-primary' style='clear: left; width: 100%; height: 32px; font-size: 13px;' type='submit' name='commit' value='Sign In' />
            </form>";
  }
}else{
  echo "<form name='login' action='login.php' method='post' accept-charset='UTF-8'>
            <input id='user_username' style='margin-bottom: 15px;' type='text' name='username' placeholder='Username' size='30' />
            <input id='user_password' style='margin-bottom: 15px;' type='password' name='password' placeholder='Password' size='30' />
            <input id='user_remember_me' style='float: left; margin-right: 10px;' type='checkbox' name='rememberme' value='1' />
            <label class='string optional' for='user_remember_me'> Remember me</label>
            <input class='btn btn-primary' style='clear: left; width: 100%; height: 32px; font-size: 13px;' type='submit' name='commit' value='Sign In' />
            </form>";
}


include('includes/footer.php');

?>
