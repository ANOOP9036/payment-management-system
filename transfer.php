<?php
include_once './includes/dbh.inc.php';
$id = intval($_GET['id']);
$sql = "SELECT name FROM customer WHERE id='$id';";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>AA Bank</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>AAN Bank</h1>
                <div class="pipe"></div>
                <p>Best Places for Money Transfers</p>
                <div class="home">
                    <a href="index.php" >Home</a>
                </div>
            </div>
        </div>
    </header>
    <section id="transaction">
        <div class="container">
            <div class="select">
                
                    <!-- <?php
                    if ($resultCheck > 0) {
                        $row = mysqli_fetch_assoc($result);

                    ?>
                        <label for="reciever">From</label>
                        <select name="reciever" id="action1">
                            <option value="Name1"><?php echo $row['name'];
                                                } ?></option>
                        </select>
                        <br>
                        <?php
                        $sql1 = "SELECT name FROM customer WHERE id != '$id';";
                        $result1 = mysqli_query($conn, $sql1);
                        $resultCheck1 = mysqli_num_rows($result1);
                        ?>

                        <br> -->
                        <form action="transaction.php" method="post">
                            Name: <input type="text" class="field4" name="name1"><br>
                            id: <input type="number" class="field1" name="id"><br>                    
                            Sender id: <input type="number" class="field2" name="sid"><br>
                            Name: <input type="text" class="field3" name="name2"><br>
                            Amount: <input type="number" class="amount" name="amount"><br>
                            <input type="submit" class="primary-btn" value="Pay">
                        </form>
                        


            </div>
            <footer class="footer">
                <h3> Anoop A Nair &copy; 2020</h3>
                <p>A Banking Management System Internship Project Made By Anoop</p>
            </footer>
        </div>
    </section>
</body>

</html>