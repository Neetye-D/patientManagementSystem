<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    
<div class="container my-5">
   <form method="post"> 
    <input type="text" name="search" placeholder="search name">
    <button class="btn btn-dark btn-sm" type="submit" name="submit">search</button>
   </form>
   <div class="container my-5 ">
    <table class="table table-info table-hover text-center  border border-success ">
        <?php 

        if(isset($_POST['submit'])){
            $search = $_POST['search'];

            try {
                $select = "SELECT user.*, patient.* FROM user INNER JOIN patient ON user.email=patient.email WHERE user.first_name LIKE :search OR user.last_name LIKE :search";
                $stmt = $pdo->prepare($select);
                $stmt->bindValue(':search', "%$search%", PDO::PARAM_STR);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Gender</th></tr>";

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr><td>".$row['first_name']."</td><td>".$row['last_name']."</td><td>".$row['email']."</td><td>".$row['gender']."</td></tr>";
                    }
                } else {
                    echo "No results found";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        ?>
    </table>
   </div>
</div>

</body>
</html>
