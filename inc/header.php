<?php

ob_start();
include 'connection.php';
include 'redirect_if_not.php';

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


   <!-- font awesome  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- font awesome  -->

   <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

   <link rel="stylesheet" href="style.css" />
</head>

<body>
   <div class="main container-fluid bg-light">
      <header>
         <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
               <a class="navbar-brand fw-bold" href="index.php">Dashboard</a>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                     <li class="nav-item">
                        <a class="nav-link active btn btn-primary text-white fw-bold" aria-current="page" href="logout.php"><i class="fas fa-cog pe-2"></i> Logout</a>
                     </li>
                  </ul>
               </div>
            </div>
         </nav>
      </header>
      <div class="content">
         <div class="row py-2">
            <!-- sidebar  -->
            <div class="col-12">
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
               <?php
               if (isset($_SESSION['success'])) { ?>
                  <div class="alert alert-success">
                     <?php
                     $err = $_SESSION['success'] ? $_SESSION['success'] : '';
                     echo $err;
                     unset($_SESSION['success']);
                     ?>
                  </div>
               <?php }
               ?>
            </div>
            <div class="col-2" style="min-height: calc(100vh - 65px)">
               <ul class="list-unstyled text-dark bg-white p-2 sidebar-custom">
                  <li class="<?php echo $active == 'events' ? 'active' : ''; ?>">
                     <a href="events.php"><i class="fas fa-blog"></i> Events</a>
                  </li>
                  <li class="<?php echo $active == 'reserve' ? 'active' : ''; ?>">
                     <a href="reserve.php"><i class="fas fa-table"></i> Reservation</a>
                  </li>
                  <li class="<?php echo $active == 'franchise' ? 'active' : ''; ?>">
                     <a href="franchise_table.php"><i class="fas fa-globe"></i> Franchise</a>
                  </li>
                  <li class="<?php echo $active == 'media' ? 'active' : ''; ?>">
                     <a href="media.php"><i class="fas fa-compact-disc"></i> Media</a>
                  </li>
                  <li class="<?php echo $active == 'brands' ? 'active' : ''; ?>">
                     <a href="brand.php"><i class="fas fa-compact-disc"></i>Brands</a>
                  </li>
                  <li class="<?php echo $active == 'testimonials' ? 'active' : ''; ?>">
                     <a href="testimonials.php"><i class="fas fa-compact-disc"></i>Testimonials</a>
                  </li>
                  <li class="<?php echo $active == 'catalog' ? 'active' : ''; ?>">
                     <a href="catalog.php"><i class="fas fa-compact-disc"></i>Catalog</a>
                  </li>
                  <li class="<?php echo $active == 'faqs' ? 'active' : ''; ?>">
                     <a href="faqs.php"><i class="fas fa-compact-disc"></i>Faqs</a>
                  </li>
                  <li class="<?php echo $active == 'contact' ? 'active' : ''; ?>">
                     <a href="contact.php"><i class="fas fa-address-book"></i> Contact</a>
                  </li>
                  <li class="<?php echo $active == 'glance_menu' ? 'active' : ''; ?>">
                     <a href="glance_menu.php"><i class="fas fa-address-book"></i>Glance Menu</a>
                  </li>
                  <li class="<?php echo $active == 'gimg' ? 'active' : ''; ?>">
                     <a href="gimg.php"><i class="fas fa-address-book"></i>Glimpse Images</a>
                  </li>
                  <li class="<?php echo $active == 'menu' ? 'active' : ''; ?>">
                     <a href="menu.php"><i class="fas fa-address-book"></i>Menu</a>
                  </li>


                  <!-- <li class="<?php echo $active == 'media' ? 'active' : ''; ?>">
                     <a href="media.php"><i class="fas fa-compact-disc"></i> Media</a>
                  </li>
                  <li class="<?php echo $active == 'interviews' ? 'active' : ''; ?>">
                     <a href="interviews.php"><i class="fas fa-user-check"></i> Interviews</a>
                  </li>
                  <li class="<?php echo $active == 'videos' ? 'active' : ''; ?>">
                     <a href="videos.php"><i class="fas fa-video"></i> Videos</a>
                  </li>
                  <li class="<?php echo $active == 'articles' ? 'active' : ''; ?>">
                     <a href="articles.php"><i class="fas fa-newspaper"></i> Articles</a>
                  </li>

                  <li class="<?php echo $active == 'resources' ? 'active' : ''; ?>">
                     <a href="resources.php"><i class="fas fa-suitcase"></i> Resources</a>
                  </li>
                  <li class="<?php echo $active == 'services' ? 'active' : ''; ?>">
                     <a href="services.php"><i class="fas fa-globe"></i> Services</a>
                  </li>
                  <li class="<?php echo $active == 'services_table' ? 'active' : ''; ?>">
                     <a href="services_table.php"><i class="fas fa-table"></i> Services Table</a>
                  </li>
                  <li class="<?php echo $active == 'products' ? 'active' : ''; ?>">
                     <a href="products.php"><i class="fas fa-shop"></i> Products</a>
                  </li>
                  <li class="<?php echo $active == 'product_inquiry' ? 'active' : ''; ?>">
                     <a href="product_inquiry.php"><i class="fas fa-envelope"></i> Product Inquiries</a>
                  </li>
                  <li class="<?php echo $active == 'career' ? 'active' : ''; ?>">
                     <a href="career.php"><i class="fas fa-address-book"></i> Career</a>
                  </li>
                  <li class="<?php echo $active == 'contact' ? 'active' : ''; ?>">
                     <a href="contact.php"><i class="fas fa-address-book"></i> Contact</a>
                  </li>
                  <li class="<?php echo $active == 'subscribe' ? 'active' : ''; ?>">
                     <a href="subscribe.php"><i class="fas fa-at"></i> Subscribed Emails</a>
                  </li> -->
               </ul>
            </div>