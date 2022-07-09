<?php
include_once('connection.php');

?>
<!-- =========SESSION LOGIN TIME ADJUSTMENT=========== -->
<?php
session_start();
if (isset($_SESSION["ID"])) {
  $_SESSION['start'] = time();
  $_SESSION['expire'] = $_SESSION['start'] + (2 * 60);//You can adjust session LOGIN Time 
  header("Location: homePage.php");
?>

<?php
} else { ?>

  <h1>Please login first .</h1> <a href="login.php">Login</a>

<?php } ?>


<?php
$url = "localhost/WebProject/";
if (@file_get_contents($url)) {
  header("Location: homePage.php");
} else {
  echo `<h1>PAGE NOT FOUND SERVER Down</h1><a href="login.php" >Login</a>`;
}
?>




<!-- ROUGH CODE below -->
<?php
/*
//Uplaoding a File 
if (isset($_POST['but_upload'])) {
  $filename = $_FILES['file']['name'];
  $tempName = $_FILES['file']['tmp_name'];
  $folder = "videos/" . $filename;

  if ($filename != null) {
    $sql = "insert into videos(name,location) values('" . $filename . "','" . $folder . "')";
    if (mysqli_query($conn, $sql)) {
      move_uploaded_file($tempName, $folder);
      echo "Data inserted";
    } else {
      echo "Data not inserted";
    }
  } else {
    echo "File is empty or File data is not valid";
  }
}
*/
?>
<!-- 
<html>
<header>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" />
  <h1>ONLINE VIDEO APP</h1>

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
    <li class="nav-item">
      <a class="nav-link" href="manage.php">Manage Content</a>
    </li>

  </ul>

</header>


<script src="Delete.js">

</script>


<body>
  <hr />
   
  <div class="modal-dialog">


    <form method="post" action="index.php" enctype='multipart/form-data'>
      <input type='file' name='file' class="form-control-file" accept="video/" />
      <br />
      <input type='submit' value='Upload' name='but_upload' class="btn btn-primary">
    </form>
  </div>
  <hr />
  <?php
  /*
  //Fetching a videos from database folder
  $fetchVideos = mysqli_query($conn, "SELECT * FROM videos ORDER BY id DESC");
  while ($row = mysqli_fetch_assoc($fetchVideos)) {
    $location = $row['location'];
    $name = $row['name'];
    echo "<div id='vid-div' style='float: left; margin-right: 5px;'>
          <video src=" . $location . " controls width='320px' height='320px' ></video>     
          <br>
          <span>" . $name . "</span>
       </div>";
  }
  */
  ?>
</body>

</html> -->