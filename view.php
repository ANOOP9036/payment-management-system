<?php
include_once './includes/dbh.inc.php';
$id = intval($_GET['id']);
$sql = "SELECT * FROM customer WHERE id='$id';";
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
                    <a href="index.php">Home</a>
                </div>
            </div>
        </div>
    </header>
    <section id="details">
        <div class="container">
            <div class="transfer">
                <?php
                if ($resultCheck > 0) {
                    $row = mysqli_fetch_assoc($result);
                ?><label for="test">Customer Id :-</label>
                    <h3 class="test"><?php echo ":  " . $row['id']; ?></h3>
                    <label for="test">Name</label>
                    <h3 class="test"><?php echo ":  " . $row['name']; ?></h3>
                    <label for="test">Mobile Number</label>
                    <h3 class="test"><?php echo ":  " . $row['mobile']; ?></h3>
                    <label for="test">Emaid Id</label>
                    <h3 class="test"><?php echo ":  " . $row['email']; ?></h3>
                    <label for="test">Amount Balance</label>
                    <h3 class="test"><?php echo ":  " . $row['balance']; ?></h3><?php

                                                                            }
                                                                                ?>
                <a href="transfer.php?id=<?php echo $row['id']; ?>">Transfer Money</a>
            </div>
            <footer class="footer">
                <h3> Anoop A Nair &copy; 2020</h3>
                <p>A Banking Management System Internship Project Made By Anoop</p>
            </footer>
        </div>
    </section>
</body>

</html>