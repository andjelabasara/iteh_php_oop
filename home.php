<?php

    include 'dbbroker.php';
    include 'model/Phone.php';
    $result= Phone::getAllPhones($conn);





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    .mainPart{
        padding: 150px;
    }
</style>
</head>
<body>
    
    <div class="mainPart">
        <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Model</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">User</th>
            <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>

            <?php while( $row = $result->fetch_array()):  ?>
 
            <tr>
            
            <td> <?php echo $row['id']?></td>
            <td> <?php echo $row['model']?></td>
            <td> <?php echo $row['description']?></td>
            <td> <?php echo $row['price']?></td>
            <td> <?php echo $row['email']?></td>
            <td>
            <button type="button" class="btn btn-danger" onclick="deletePhone( <?php echo $row['id']   ?>  )">Delete</button>
            <button type="button" class="btn btn-warning">Update</button></td>
            </tr>
         
            <?php endwhile;?>
        
        </tbody>
        </table>

    </div>



    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>