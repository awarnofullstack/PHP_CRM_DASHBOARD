<?php
include 'connection.php';


if(isset($_REQUEST['product_id'])){
    
    $id = $_REQUEST['product_id'];
    $product_name = $_REQUEST['product_name'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $message = $_REQUEST['message'];
    
    
    
    $insert = "insert into product_inquiry (product_id,product_name,name,email,phone,message) 
    values ('$id','$product_name','$name','$email','$phone','$message')";
    
    $result = mysqli_query($conn,$insert);
    
    if($result){
        echo "inquiry submitted successfuly";
    }else
    {
     echo "inquiry failed to submit: ".mysqli_error($conn);   
    }
}


?>