<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST') { 
    
    $fromname = $_POST['from'];
    $toname = $_POST['to'];
    $amount = $_POST['amt'];

    $row=0; 
    $conn = mysqli_connect('localhost','root','','thirteen bank') or die("connection failed".mysqli_connect_error());
    
    $bal=array();

    $query = mysqli_query($conn,"SELECT TotalAmt from details WHERE Name = '$fromname'");
    $row = mysqli_num_rows($query); if($row>0) {
        while($row = mysqli_fetch_assoc($query)) { 
            $bal[0]=$row['TotalAmt'];
        }
    }
    $query = mysqli_query($conn,"SELECT TotalAmt from details WHERE Name = '$toname'");
    $row = mysqli_num_rows($query); if($row>0) {
        while($row = mysqli_fetch_assoc($query)) { 
            $bal[1]=$row['TotalAmt'];
        }
    }

    $frombal = $bal[0];
    $tobal = $bal[1];

    if($frombal<$amount){
        echo "The Sender's Balance is less than the amount to transfer!";
    }
    else{
        $upvalue1 = $frombal - $amount;
        $upvalue2 = $tobal + $amount;

        $sql1 = "UPDATE `details` SET `TotalAmt`='$upvalue1' WHERE Name = '$fromname';"; 
        $query1 = mysqli_query($conn,$sql1);
        $sql2 = "UPDATE `details` SET `TotalAmt`='$upvalue2' WHERE Name = '$toname';"; 
        $query2 = mysqli_query($conn,$sql2);
        if($query1 && $query2) { 
            
            $sql3="INSERT INTO `history`(`From`, `To`, `Amount`) VALUES ('$fromname','$toname','$amount')";
            $query3 = mysqli_query($conn,$sql3);
            if($query3){
                echo "<pre>";
                echo "Transfer successful!";
                echo "</pre>";
            }
            else {
                echo "<pre>";
            echo "Transfer Successful but Addition to History Failed!";
            echo "</pre>";
            }         
        }
        else { 
            echo "<pre>";
            echo "Transfer Failed!";
            echo "</pre>";
        }
    }    
}
?>
