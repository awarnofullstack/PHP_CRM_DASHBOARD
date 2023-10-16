<?php

$active = "resources";

include 'inc/header.php'
?>

<div class="col-10 main-section bg-white border p-2">
   <h5 class="css">Manage Resources</h5>

   <!-- main header content  -->
   <div class="dn-form-container">
      <div class="d-flex justify-content-between top">
         <h3>Add Resources</h3>

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

      $label = '';
      $type = '';
      $file = '';

      if (isset($_GET['id'])) {
         $find_id = $_GET['id'];

         $query = mysqli_query($conn, "select * from resources where id = $find_id");

         if ($query) {
            $find_result = mysqli_fetch_array($query);
            $label = $find_result['label'];
            $type = $find_result['type'];
            $file = $find_result['file'];
         }
      }


      if (isset($_GET['delete'])) {
         $find_id = $_GET['delete'];

         $file_query = mysqli_query($conn, "select * from resources where id = $find_id");
         $find_result = mysqli_fetch_array($file_query);
         $file = $find_result['file'];

         if ($file) {
            unlink($file);
         }


         $query = mysqli_query($conn, "delete from resources where id = $find_id");

         if ($query) {
            set_ss("resources deleted with id = $find_id successfuly", $_SERVER['PHP_SELF']);
         } else {
            set_ss("resources delete with id = $find_id failed", $_SERVER['PHP_SELF'], 'error');
         }
      }



      /* post or update content on request */
      if (isset($_POST['save'])) {

         $label = $_POST['label'];
         $type = $_POST['type'];
         $file = $_FILES['file'];


         print_r($_POST);


         $path = upload_file($_FILES['file'], $conn);

         /* post if id null (content not available in DB) */
         $query = mysqli_query($conn, "insert into resources (label,type,file) values ('$label','$type','$path')");

         if ($query) {
            set_ss('resources inserted successfully', $_SERVER['PHP_SELF']);
         } else {
            set_ss('resources failed to insert' . mysqli_error($conn), $_SERVER['PHP_SELF'], 'error');
         }
      }

      /* update if id not null (content available in DB) */
      if (isset($_POST['edit'])) {

         $id = $_GET['id'];
         $label = $_POST['label'];
         $type = $_POST['type'];

         if (isset($_FILES['file'])) {


            // delete old file if updated new 
            $file_query = mysqli_query($conn, "select * from resources where id = $find_id");
            $find_result = mysqli_fetch_array($file_query);
            $old_file = $find_result['file'];

            if ($old_file) {
               unlink($old_file);
            }


            $path = upload_file($_FILES['file'], $conn);
            $query = mysqli_query($conn, "UPDATE resources SET label='$label',type='$type',file='$path' WHERE id = $id");
         } else {
            $query = mysqli_query($conn, "UPDATE resources SET label = '$label', type = '$type' WHERE id = $id");
         }

         if ($query) {
            set_ss('resources updated successfully', $_SERVER['PHP_SELF']);
         } else {
            set_ss('resources failed to update' . $id . mysqli_error($conn), $_SERVER['PHP_SELF'], 'error');
         }
      }


      ?>
      <!-- handle form request for main form content -->
      <form action="<?php $_SERVER['PHP_SELF']; ?>
      <?php isset($_GET['id']) ? '?id=' . $_GET['id'] : ''; ?>" method="POST" id="class-form" enctype="multipart/form-data">
         <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" id="type" class="form-select">
               <option value="Central Goverment" <?php echo $type == 'Central Goverment' ? 'selected' : ''; ?>>Central Goverment</option>
               <option value="State Govt. Rules And Guidelines" <?php echo $type == 'State Govt. Rules And Guidelines' ? 'selected' : ''; ?>>State Govt. Rules And Guidelines</option>

               <option value="User Manuals And Guides" <?php echo $type == 'User Manuals And Guides' ? 'selected' : ''; ?>>User Manuals And Guides</option>

               <option value="Compliance Documents" <?php echo $type == 'Compliance Documents' ? 'selected' : ''; ?>>Compliance Documents</option>
            </select>
         </div>
         <div class="mb-3">
            <label for="name" class="form-label">Label</label>
            <input type="text" name="label" value="<?php echo $label; ?>" required class="form-control" id="name" placeholder="type....">
         </div>
         <div class="mb-3">
            <label for="file" class="form-label">File</label>
            <input type="file" name="file" value="<?php echo $file; ?>" class="form-control" id="file">
         </div>
      </form>

   </div>

   <!-- classes list  -->
   <div class="dn-form-container">
      <div class="d-flex justify-content-between top">
         <h3>Resources list</h3>
      </div>

      <table class="table">
         <tr>
            <th>ID</th>
            <th>Label</th>
            <th class="text-left">File</th>
            <th class="text-left">Size</th>
            <th>Type</th>
            <th>Action</th>
         </tr>

         <?php
         /* check if data exist */
         $select = mysqli_query($conn, "select * from resources");
         $inc = 0;
         while ($item = mysqli_fetch_array($select)) {
            $inc++ ?>
            <tr>
               <td><?php echo $inc; ?></td>
               <td><?php echo $item['label']; ?></td>
               <td class="text-left px-0"><a href="<?php echo $item['file']; ?>" target="_blank" class="btn-sm btn-danger">VIEW</a></td>
               <td class="text-left"><a href="<?php echo $item['file']; ?>" target="_blank" class="btn-sm btn-danger"><?php 
               if(isset($item['file'])){
                  echo number_format(filesize($item['file']) / 1024 / 1024, 2);
                  }?> MB</a></td>

               <td><?php echo $item['type']; ?></td>
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