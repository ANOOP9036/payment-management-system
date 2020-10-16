<?php
    session_start();
    include_once './includes/dbh.inc.php';
    $id = $_POST['id'];
    $sid = $_POST['sid'];
    // $name = $_POST['name'];
    $amount = $_POST['amount'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>AAN Bank</title>
</head>

<body>
    <?php
   
    if($id == $sid){
        
        echo '<script>alert("Same Customer id....Transaction cannot be processed")</script>';
        
    }elseif($amount == 0){
        echo '<script>alert("Amount Cannot be Zero")</script>';
    }
    else{
        $i = 0;

        $sql = "SELECT id FROM customer;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['id'] == $sid) {
                    $i = $i + 1;
                    $sql1 = "SELECT balance FROM customer WHERE id='$row[id]';";
                    $sql2 = "SELECT balance FROM customer WHERE id='$id';";
                    $result1 = mysqli_query($conn, $sql1);
                    $result2 = mysqli_query($conn, $sql2);
                    $resultCheck1 = mysqli_num_rows($result1);
                    if ($resultCheck1 > 0) {
                        $row1 = mysqli_fetch_assoc($result1);
                        $row2 = mysqli_fetch_assoc($result2);
                        if($row2['balance'] >= $amount){
                            $row1['balance'] = $row1['balance'] + $amount;
                            $row2['balance'] = $row2['balance'] - $amount;
                            $newamount = $row1['balance'];
                            $newamount1 = $row2['balance'];
    
                            $sql3 = "UPDATE customer SET balance=$newamount where id =$sid;";
                            $sql4 = "UPDATE customer SET balance=$newamount1 where id =$id;";
    
                            if (mysqli_query($conn, $sql3)) {
                                $sql5 = "INSERT INTO history (rid, sid, amount) VALUES ('$id','$sid','$amount');";
                                mysqli_query($conn, $sql5);
                                echo '<script>alert("Transaction Succesfull")</script>';
                            }
                            if (mysqli_query($conn, $sql4)) {
                                // echo '<script>alert("Transaction Succesfull")</script>';
                            }
                        }else{
                            echo '<script>alert("Insufficient Balance")</script>';
                        }
                       
                    }
                }
            }
            if ($i == 0) {
                echo '<script>alert("Wrong Customer Id...Transaction Could not Processed")</script>';
            }
        }
        
    }
    ?>
    <a href="index.php" class="back">Back To Home</a>
</body>

</html>