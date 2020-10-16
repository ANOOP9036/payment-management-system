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
                <p>Best Places for Money Transfers</p>
                <div class="home">
                    <a href="index.php" >Home</a>
                </div>
            </div>
        </div>
    </header>
    <section id="table">
        <div class="container">
            <div class="customers">
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Mobile No.</th>
                        <th>Email</th>
                        <th>Current Balance</th>
                        <th>Transfer</th>
                    </tr>
                     
                    <?php
                        $sql = "SELECT * FROM customer;";
                        $result = mysqli_query($conn,$sql);
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['mobile']."</td><td>".$row['email']."</td><td>".$row['balance']."</td>" ?><td><a href="view.php?id=<?php echo $row['id']; ?>" class="btn">View</a></td><?php echo "</tr>" ;

                            }
                        }
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