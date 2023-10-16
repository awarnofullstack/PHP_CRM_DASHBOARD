<?php
ob_start();
include 'connection.php';

/* set session and reload page */
function set_ss($value, $url, $type = 'success')
{
   $_SESSION[$type] = $value;
   header("Location: $url");
}

function upload_file($file, $conn, $int = 0)
{
   $target_dir = "uploads/";
   $target_file = $target_dir . date('Y-F-d-h-i-s') . $int . basename($file["name"]);
   $success = move_uploaded_file($file["tmp_name"], $target_file);
   if (!$success) {
      return false;
   }
   return $target_file;
}


ob_end_flush();

                        if(isset($_REQUEST['career'])){
                            
                          $first_name = $_REQUEST['first_name'];
                          $last_name = $_REQUEST['last_name'];
                          $designation = $_REQUEST['designation'];
                          $dob = $_REQUEST['dob'];
                          $reach_from = $_REQUEST['reach_from'];
                          $message = $_REQUEST['message'];
                          $path = upload_file($_FILES['cv'],$conn);
                            
                          $insert_career = "insert into career (first_name,last_name,designation,dob,reach_from,message,resume) 
                          values ('$first_name','$last_name','$designation','$dob','$reach_from','$message','$path')";
                          $career = mysqli_query($conn,$insert_career);
                          
                          if($career){
                              set_ss("form submitted successfuly", "php/career.php");
                          }else{
                               set_ss("form failed to submit", "php/career.php","error");
                          }
                        }
                        ?>