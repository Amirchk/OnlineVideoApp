<?php
include('connection.php');
?>
<html>
<header>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" />
    <h1>ONLINE VIDEO APP</h1>
    <nav class="d-flex justify-content-center">
        <h2><a class="navbar-brand" href="index.php"> &nbsp;Home</a></h2>
        <h2> <a class="navbar-brand" href="register.php">&nbsp; Register</a></h2>
        <h2> <a class="navbar-brand" href="login.php"> &nbsp;Login</a></h2>
        <h2> <a class="navbar-brand" href="manage.php"> &nbsp;ManageContent</a></h2>
    </nav>
</header>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
  
}
</style>


<body>
    <?php
        $fetchVideosName = mysqli_query($conn, 'select * from videos order by id DESC');
         
        while ($row = mysqli_fetch_array($fetchVideosName)) {
            $name = $row['name'];
            echo "<div id='vid-div' style='float: left; margin-right: 5px;'>   
                  <br>
                  <table>
  <thead>
    <tr>
      <th>name</th>
      <th>Action</th>
    </tr>
    <tbody>
    <tr>
      <td>".$name."</td>
      <td><a href='delete.php?name=$name' >delete</a></td>
    </tr>
    </tbody>
   </thead>
   </table>
               </div>";
          }
    ?>
</body>

</html>