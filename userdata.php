<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User data</title>

    <style>
        body{
            height: 100vh;
            background: linear-gradient(
                to right,
                rgb(37, 36, 36) 0%,
                rgb(37, 36, 36) 65%,
                rgba(255, 188, 1, 0.78) 65%,
                rgba(255, 188, 1, 0.78) 100%
                
            );
        }

       .tabl{
            color: white;
            margin-top: 100px;
            position: relative;
            margin-left: 15%;
            width:70%
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.html">
                <img src="logo2.png" alt="" width="150" height="60" class="d-inline-block align-text-top">
                </a>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">
                      <button type="button" class="btn btn-outline-dark">About</button>
                    </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="Login.html">
                      <button type="button" class="btn btn-outline-dark">Sign out</button>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

<div class="tabl">
<?php 
$row=0; 
$conn = mysqli_connect('localhost','root','','thirteen bank') or die("connection failed".mysqli_connect_error()); 
$sql = "Select* FROM details"; 
$query = mysqli_query($conn,$sql); 
$row = mysqli_num_rows($query); if($row>0) { 
    ?>
    <table class="table table-hover table-striped table-dark">

<tr><th>SNo </th><th>Name</th><th>Email</th><th>AccountNo</th><th>PhoneNo</th><th>TotalAmt</th></tr>
<?php
    while($row = mysqli_fetch_assoc($query)) { 
        ?>
        
        <tr>
<td><?php echo $row["SNo"]; ?></td>
<td><?php echo $row["Name"]; ?></td> 
<td><?php echo $row["Email"]; ?></td> 
<td><?php echo $row["AccountNo"]; ?></td>
<td><?php echo $row["PhoneNo"]; ?></td>
<td><?php echo $row["TotalAmt"]; ?></td> 
 </tr>
 <?php
    }
}
else { 
    echo "No record"; 
    }
?>

</div>

</body>
</html>