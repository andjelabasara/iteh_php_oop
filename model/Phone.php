 <?php

class Phone{
    private $id;
    private $model;
    private $description;
    private $price;
    private $user;
 
    public function __construct($id=null,$model=null,$description=null,$price=null,$user=null ) 
    {
        $this->id=$id;
        $this->model=$model;
        $this->description=$description;
        $this->price=$price;
       
        $this->user=$user; 

    }
 

    public static function getAllPhones($conn){
       
        $query= "select * from phone p inner join user u on u.userId=p.user";
        return $conn->query($query);
    }


    public static function addPhone($phone, $conn){

        $query= "insert into phone(model,description,price,user ) values('$phone->model','$phone->description',$phone->price,$phone->user )";
        
        return $conn->query($query);
        

    }


    public static function getPhoneById($id, $conn){

        $query= "select * from phone p inner join user u on u.userId=p.user where p.id=$id";
        
        return $conn->query($query);


    }


    public static function deletePhone($id,$conn){

        $query = "delete from phone where id=$id";
        return $conn->query($query);

    }

    public static function updatePhone($phone,$conn){

        $query = "update phone set model='$phone->model', description = '$phone->description', price = $phone->price where id = $phone->id";
        return $conn->query($query);

    }



}

?>