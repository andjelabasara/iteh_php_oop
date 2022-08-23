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
 

}

?>