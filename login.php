<?php
include('connection.php');
?>

<!--CHECK THAT USER EXIST or NOT-->
<?php
$user_email = "";
$user_pass = "";
//$get_sql = "Select * from Register where Email='".$_POST['email']."' and Password='".$_POST['password']."' ";
$get_sql = "select  * from Register";
$result = mysqli_query($conn, $get_sql);
$user = mysqli_fetch_all($result, MYSQLI_ASSOC);

//-----Check that loin form should not empty
if (($_POST['email'] && $_POST['password']) == NULL) {
  //
} else {
  //iterate over all data in DB login to check that user is registered or not
  foreach ($user as $user_data) {
    if (($user_data['Email'] == $_POST['email'])) {
      $user_email = $_POST['email'];
      if ($user_data['Password'] == $_POST['password']) {
        $user_pass = $_POST['password'];
        break;
      }
      break;
    }
  }
  if ($user_email != $_POST['email']) {
    echo '<h2>You are not registered</h2>';
    echo 'Please Register <a href="register.php" >HERE</a>';
  } else if ($user_pass == $_POST['password']) { //check that password is correct?

    session_start();

    $message = "";
    if (count($_POST) > 0) {
      //===============if new user then add that email into LOGIN Database=========
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = mysqli_query($conn, "SELECT * FROM Login WHERE Email = '" . $_POST["email"] . "' and Password = '" . $_POST["password"] . "' ");
        if(!$result){
          $sql = "insert into Login (Email,Password) values('$email','$password')";
          mysqli_query($conn,$sql);
        }
      }

      $result = mysqli_query($conn, "SELECT * FROM Login WHERE Email = '" . $_POST["email"] . "' and Password = '" . $_POST["password"] . "' ");
      
      $row  = mysqli_fetch_assoc($result);
      //Setting Up Session variables for ID and EMAIL
      if (is_array($row)) {
        $_SESSION["ID"] = $row['ID'];
        $_SESSION["Email"] = $row['Email'];
        
      } else {
        $message = "Invalid email or Password!";
      }
    }
    if (isset($_SESSION["ID"])) {
      header("Location:index.php");
    }else{
      echo "session not valid";
    }
  } else {
    echo "<br><h1>WRONG PASSOWRD</h1>";
  }
}

?>


<html>
<header>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta3/css/bootstrap.min.css" integrity="sha512-N415hCJJdJx+1UBfULt+i+ihvOn42V/kOjOpp1UTh4CZ70Hx5bDlKryWaqEKfY/8EYOu/C2MuyaluJryK1Lb5Q==" crossorigin="anonymous" />

  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="register.php">Register</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="login.php">Login</a>
    </li>

  </ul>
</header>

<body>

  <section class="h-100 h-custom" style="background-color: #8fc4b7;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-8 col-xl-6">
          <div class="card rounded-3">
            <img src="img3.webp" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo" />
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">LOGIN FORM</h3>

              <form class="px-md-2" method="POST" action="">

                <div class="form-group">
                  <label for="email">Email address:</label>
                  <input type="email" name="email" class="form-control" id="email">
                </div>

                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" name="password" class="form-control" id="pwd">
                </div>

                <div class="checkbox">
                  <label><input type="checkbox"> Remember me</label>
                </div>

                <button type="submit" class="btn btn-success btn-lg mb-1">Login</button>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>

</html>