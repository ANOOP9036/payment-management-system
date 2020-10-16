<?php
include_once './includes/dbh.inc.php';
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
    <header>
        <div class="container">
            <div class="logo">
                <h1>AAN Bank</h1>
                <div class="pipe"></div>
                <p>Best Place for Money Transfers</p>
                <div class="home">
                    <a href="index.php">Home</a>
                </div>
            </div>
        </div>
    </header>
    <section id="table1">
        <div class="container">
            <div class="history">
                <table>
                    <tr>
                        <th>Sender ID</th> 
                        <th>Reciever ID</th>
                        <th>Amount Credited</th>
                    </tr>
                    <?php

                    $sql1 = "SELECT * FROM history;";
                    $result = mysqli_query($conn, $sql1);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>" . $row['rid'] . "</td><td>" . $row['sid'] . "</td><td>" . $row['amount'] . "</td></tr>";
                        }
                    }
                    // echo "<tr><td>".$id."</td><td>".$sid."</td><td>".$amount."</td></tr>";
                    ?>

                </table>
            </div>
            <footer class="footer">
                <h3> Anoop A Nair &copy; 2020</h3>
                <p>A Banking Management System Internship Project Made By Anoop</p>
            </footer>
        </div>
    </section>
</body>

</html>