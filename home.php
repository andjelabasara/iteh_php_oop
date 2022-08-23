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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    .mainPart{
        padding: 150px;
    }
</style>
</head>
<body>
    
    <div class="mainPart">
    <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#addModal">Dodaj</button>
    <br>
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
            <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#updateModal" onclick="getDetailsUpdateModal(<?php echo $row['id']?> )" >Update</button></td>
            </tr>
         
            <?php endwhile;?>
        
        </tbody>
        </table>

    </div>




<!-- Update modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="lblUpdateModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="titleUpdate">Update mobile phone</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                              
                        <form  id="updateform" style="max-width:500px;margin:auto" method="POST" enctype="multipart/form-data">
 
                            <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="Model" name="modelupdate" id="modelupdate" required>
                            </div>

                            <div class="input-container">
                                <i class="fa fa-pencil icon"></i>
                                <input class="input-field" type="text" placeholder="Description" name="descriptionupdate" id="descriptionupdate" required>
                            </div>
                            
                            <div class="input-container">
                                <i class="fa fa-tag icon"></i>
                                <input class="input-field" type="text" placeholder="Price" name="priceupdate" id="priceupdate" required>
                            </div>
                            <input  class="input-field" type="text" id="hiddenData" name ="hiddenData" hidden>
                       
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="update" name="update"  >  Update</button>
                            
                        </div>                   
                    
                        </form>


                        </div>
                        
                       
                </div>
            </div>
        </div>
<!-- End Update modal -->






<!-- Add modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="lblUpdateModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="titleUpdate">Add mobile phone</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                              
                        <form  id="addform" style="max-width:500px;margin:auto" method="POST" enctype="multipart/form-data">
 
                            <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" placeholder="Model" name="model" id="model" required>
                            </div>

                            <div class="input-container">
                                <i class="fa fa-pencil icon"></i>
                                <input class="input-field" type="text" placeholder="Description" name="description" id="description" required>
                            </div>
                            
                            <div class="input-container">
                                <i class="fa fa-tag icon"></i>
                                <input class="input-field" type="text" placeholder="Price" name="price" id="price" required>
                            </div>
                          
                       
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="add" name="add"  >  Add</button>
                            
                        </div>                   
                    
                        </form>


                        </div>
                        
                       
                </div>
            </div>
        </div>
<!-- End Add modal -->





























    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>