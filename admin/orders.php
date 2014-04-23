<?php
include('includes/header.php');



$db = buildDBObject();
$editproduct = new Product();
if (isset($_GET['product'])){
  $editproduct->buildObject($_GET['product']);
}

?>

<script>
  function saveProduct(){

    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var password2 = document.getElementById('password2').value;
    var fname = document.getElementById('fname').value;
    var lname = document.getElementById('lname').value;

    var xhr;
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE 8 and older
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var data = "what=" + "product" +  "&username=" + username + "&email=" + email + "&password=" + password + "&password2=" + password2 + "&fname=" + fname + "&lname=" + lname;
    xhr.open("POST", "http://csa.nebriv.com/admin/save.php", true); 
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
    xhr.send(data);

    xhr.onreadystatechange = display_data;
    function display_data() {
      if (xhr.readyState == 4) {
        if (xhr.status == 200) {
          document.getElementById("userMessages").innerHTML = xhr.responseText;
        } else {
          document.getElementById("userMessages").innerHTML = xhr.responseText;
        }
      }
    }
  }
</script>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Order Management</h1>
          <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li class="active"><a href="products.php">Order Management</a></li>

          </ol>
          <div class="col-md-4 pull-left">
          <h3 class="sub-header">There are currently no orders.</h3>



          <div class="col-md-7 pull-left">
<!--             <h3 class="sub-header">User Sessions</h3>
            <form class="form-horizontal" role="form">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Remember me
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Sign in</button>
                </div>
              </div>
            </form> -->
          </div>


        </div>

<?php
include('includes/footer.php');
?>