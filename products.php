<?php

$active = "products";

include 'inc/header.php'
?>

<div class="col-10 main-section bg-white border p-2">
   <h5 class="css">Manage Products</h5>

   <!-- main header content  -->
   <div class="dn-form-container">
      <div class="d-flex justify-content-between top">
         <h3>Add Product</h3>

         <?php
         if (isset($_GET['id'])) { ?>
            <button type="submit" form="class-form" class="btn btn-primary" name="edit">Update</button>
         <?php } else { ?>
            <button type="submit" form="class-form" name="save" class="btn btn-primary">Save</button>
         <?php } ?>

      </div>


      <!-- handle form request for classes -->
      <?php
      /* find by id and update */

      $name = '';
      $description = '';
      $logo = 'alt.jpg';

      if (isset($_GET['id'])) {
         $find_id = $_GET['id'];

         $query = mysqli_query($conn, "select * from products where id = $find_id");

         if ($query) {
            $find_result = mysqli_fetch_array($query);
            $name = $find_result['name'];
            $description = $find_result['description'];
            $logo =  $find_result['image'];
         }
      }


      if (isset($_GET['delete'])) {
         $find_id = $_GET['delete'];

         $query = mysqli_query($conn, "delete from products where id = $find_id");

         if ($query) {
            set_ss("Product deleted with id = $find_id successfuly", $_SERVER['PHP_SELF']);
         } else {
            set_ss("Product delete with id = $find_id failed", $_SERVER['PHP_SELF'], 'error');
         }
      }



      /* post or update content on request */
      if (isset($_POST['save'])) {

         $name = htmlspecialchars($_POST['name']);
         $description = htmlspecialchars(str_replace("'", "\'", $_POST['description']));
         $logo =  $_FILES['logo'];

         $path = upload_file($_FILES['logo'], $conn);

         /* post if id null (content not available in DB) */
         $query = mysqli_query($conn, "insert into products 
         (name,description,image) values 
         ('$name','$description','$path')");

         if ($query) {
            set_ss('Product inserted successfully', $_SERVER['PHP_SELF']);
         } else {
            set_ss('Product failed to insert' . mysqli_error($conn), $_SERVER['PHP_SELF'], 'error');
         }
      }

      /* update if id not null (content available in DB) */
      if (isset($_POST['edit'])) {

         $id = $_GET['id'];
         $name = htmlspecialchars($_POST['name']);
         $description = htmlspecialchars(str_replace("'", "\'", $_POST['description']));

         if ($_FILES['logo']['name']) {
            $path = upload_file($_FILES['logo'], $conn);
            $query = mysqli_query($conn, "UPDATE products SET 
            name='$name',
            description='$description',
            image='$path' WHERE id = $id");
         } else {
            $query = mysqli_query($conn, "UPDATE products SET name='$name',
            description='$description',
            WHERE id = $id");
         }

         if ($query) {
            set_ss('Product updated successfully', $_SERVER['PHP_SELF']);
         } else {
            set_ss('Product failed to update' . $id . mysqli_error($conn), $_SERVER['PHP_SELF'], 'error');
         }
      }


      ?>
      <!-- handle form request for main form content -->
      <form action="<?php $_SERVER['PHP_SELF']; ?>
      <?php isset($_GET['id']) ? '?id=' . $_GET['id'] : ''; ?>" method="POST" id="class-form" enctype="multipart/form-data">
         <div class="mb-3">
            <label for="title" class="form-label">Name</label>
            <input type="text" name="name" value="<?php echo $name; ?>" required class="form-control" id="name" placeholder="type....">
         </div>

         <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" placeholder="type here.." id="description" cols="30" rows="10" required><?php echo $description; ?></textarea>
         </div>
         
         <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" name="logo" oninput="pic.src=window.URL.createObjectURL(this.files[0])" value="<?php echo $logo; ?>" class="form-control" id="logo">
         </div>
         <div class="mb-3">
            Preview Image
            <br>
            <img src="<?php echo $logo; ?>" id="pic" alt="preview" width="80px" height="auto">

         </div>
      </form>

   </div>

   <!-- classes list  -->
   <div class="dn-form-container">
      <div class="d-flex justify-content-between top">
         <h3>Products list</h3>
      </div>
            
            <table class="table">
                 <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Action</th>
                 </tr>
                  <?php
         /* check if data exist */
         $data = mysqli_query($conn, "select * from products");
         while ($item = mysqli_fetch_array($data)) {
            ?>
            <tr>
               <td><?php echo $item['id']; ?></td>
               <td><?php echo $item['name']; ?></td>
               <td><img src="<?php echo $item['image']; ?>" width="auto" height="60px" /></td>
               <td>
                  <a href="<?php $_SERVER['PHP_SELF']; ?>?id=<?php echo $item['id']; ?>" class="btn-sm text-success"><i class="fas fa-edit"></i></a>
                  <a href="<?php $_SERVER['PHP_SELF']; ?>?delete=<?php echo $item['id']; ?>" class="btn-sm text-danger"><i class="fas fa-trash"></i></a>
               </td>
            </tr>
         <?php }
         ?>
            </table>
   </div>




   <?php include 'inc/footer.php' ?>