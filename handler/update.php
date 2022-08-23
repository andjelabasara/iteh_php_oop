<?php
    include '../dbbroker.php';
    include '../model/Phone.php';
 



    if(isset($_POST['modelupdate']) && isset($_POST['descriptionupdate']) && isset($_POST['priceupdate'])){  
        $phone = new Phone($_POST['hiddenData'],$_POST['modelupdate'], $_POST['descriptionupdate'],$_POST['priceupdate'],null);

        $status = Phone::updatePhone($phone,$conn);
                
        if($status){
          
            echo 'Success';
         }else{
             echo $status;
             echo 'Failed';
         }
    }

?>