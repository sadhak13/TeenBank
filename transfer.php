<!DOCTYPE html>
<html>
<head>

<script>
  function validateForm() {
  let x = document.forms["myForm"]["from"].value;
  let y = document.forms["myForm"]["to"].value;
  let a = document.forms["myForm"]["amt"].value;
  if (x == y) {
    alert("From and To should not be same");
    return false;
  }
  if(a.length == 0 || a==0){
    alert("Amount should not be empty");
    return false;
  }
}
</script>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  *{
            padding: 0;
            margin: 0;
        }

        .navbar-brand{
    background: transparent,
    }

    .leftbody{
width: 65%;
height: 900px;
background: rgb(37, 36, 36);
position: relative;
top: 0px;
overflow: hidden;
}

.rightbody{
width: 100%;
height: 900px;
background-image: url("yp4.jpg");
background-size:cover;
position: relative;
top: 0px;
overflow: hidden;
}

.card{
    bottom: 680px;
    left: 25%;
    padding-top: 1%;
    padding-bottom: 1%;
    border-radius: 10px;
    padding-left: 2%;
    padding-right: 2%;
    width: 50%;
}


</style>
</head>


<?php 
$row=0; 
$conn = mysqli_connect('localhost','root','','thirteen bank') or die("connection failed".mysqli_connect_error()); 
$sql = "Select* FROM details"; 
$query = mysqli_query($conn,$sql); 
$row = mysqli_num_rows($query); if($row>0) { 
    ?>


<body>
     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
                <button onclick="pop()" type="button" class="btn btn-outline-dark">About</button>
                <script>
                  function pop(){alert("This feature is under construction 🛠")}
                </script>
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
    <!-- transfer dabba -->
    <div class="mainbody">
      <div class="rightbody">
        <div class="leftbody">
          
        


      </div>
      <form action="transpro.php" onsubmit="return validateForm()" name="myForm" method="post">
      <div class="card">
        <div class="mb-2">
          <label for="from" class="form-label">From(Customer name)</label>
          <select id="from" name="from" class="form-select">
          <option>choose account</option>
          <?php
    while($row = mysqli_fetch_assoc($query)) { 
        ?>

            
            <option value="<?php echo $row["Name"]; ?>"><?php echo $row["Name"]; ?></option>

            <?php
    }
}
else { 
    echo "No record"; 
    }
?>

          </select>
          </div>
          <div class="mb-4">
            <label for="to" class="form-label">To(Customer name)</label>
            <select id="to" name="to" class="form-select">
              <option>choose account</option>
              <?php
              $conn = mysqli_connect('localhost','root','','thirteen bank') or die("connection failed".mysqli_connect_error()); 
              $sql = "Select* FROM details"; 
              $query = mysqli_query($conn,$sql);
              $row = mysqli_num_rows($query); if($row>0) { 
    while($row = mysqli_fetch_assoc($query)) { 
        ?>

            
            <option value="<?php echo $row["Name"]; ?>"><?php echo $row["Name"]; ?></option>

            <?php
    }
}
else { 
    echo "No record"; 
    }
?>
              

            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Amount to be transfer</label>
            <input type="number"  id="amt" name="amt" >
          </div>
          <table>
            <tr>
              <td style="text-align: center;">
               
                <button type="submit" value="Submit"  style="align-items: center;" class="btn btn-primary">Submit</button>
                </a>
              </td>
              <td style="text-align: center;">
                  
                    <button href="home.html" class="btn btn-primary">Cancel</button>
                  
              </td>
            </tr>
          </table>
      </div>
  </form>

    </div>
    </div>

    <footer class="text-center mt-5 py-2">
    <p>&copy 2022. Code & Design by <b>SADHAK BANERJEE</b> <br> All Rights Reserved </p>
</footer>

</body>
</html>
