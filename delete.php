<?php
include_once('connection.php');
?>
<?php
// require_once 'conn.php';

// if($_REQUEST['file_id']){
//     $file_id=$_REQUEST['file_id'];

//     $query=mysqli_query($conn, "SELECT * FROM `file` WHERE `file_id`='$file_id'") or die("mysqli_error()");
//     $fetch=mysqli_fetch_array($query);

//     $location=$fetch['location'];


//     if(unlink($location)){
//         mysqli_query($conn, "DELETE FROM `file` WHERE `file_id`='$file_id'") or die("Error in Mysql");

//         header('location: index.php');
//     }

// }

?>
<?php
$folder_path = "videos";
// List of name of files inside
// specified folder
$files = glob($folder_path . '/*');

$VidName = $_GET['name'];
// Deleting all the files in the list
foreach ($files as $file) {

    if (is_file($file))
        echo "1213";
    // Delete the given file
    // unlink($file); 
}

// Built-in PHP function to delete file
$Delsql = "Delete From videos where name='$VidName' ";
mysqli_query($conn, $Delsql);
// Redirecting back
 header("Location: " . $_SERVER["HTTP_REFERER"]);
?>