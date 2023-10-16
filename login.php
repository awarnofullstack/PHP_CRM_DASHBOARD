<?php
include 'redirect_if.php';
include 'connection.php';

if (isset($_POST['username'])) {

   $user = $_POST['username'];
   $pass = $_POST['password'];

   $query = mysqli_query($conn, "select * from users where username = '$user' AND password = '$pass'");
   $fetch = mysqli_fetch_array($query);


   if ($fetch) {
      $_SESSION['active'] = "true";
      header("Location: index.php");
   } else {
      $_SESSION['error'] = 'invalid login attempt';
   }
   
   ob_end_flush();
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Dashboard</title>

   <!-- cdn links -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="style.css" />
</head>

<body>
   <div class="main container-fluid bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">
      <div class="login shadow p-4 pt-5">
         <?php
         if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger">
               <?php
               $err = $_SESSION['error'] ? $_SESSION['error'] : '';
               echo $err;
               unset($_SESSION['error']);
               ?>
            </div>
         <?php }
         ?>
         <div class="profile shadow">
            <img src="profile.webp" alt="" class="img-fluid">
         </div>
         <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
            <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Username </label>
               <input type="text" name="username" required class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
               <label for="exampleInputPassword1" class="form-label">Password</label>
               <input type="password" name="password" required class="form-control" id="exampleInputPassword1">
            </div>

            <button class="text-center btn btn-primary">Login</button>
            
         </form>
      </div>
   </div>
   <!-- scripts  -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <script src="script.js"></script>
</body>

</html>