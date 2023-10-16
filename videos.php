<?php

$active = "videos";

include 'inc/header.php'
?>

<div class="col-10 main-section bg-white border p-2">
   <h5 class="css">Manage Videos</h5>

   <!-- main header content  -->
   <div class="dn-form-container">
      <div class="d-flex justify-content-between top">
         <h3>Add Video</h3>

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

      $url = '';

      if (isset($_GET['id'])) {
         $find_id = $_GET['id'];

         $query = mysqli_query($conn, "select * from videos where id = $find_id");

         if ($query) {
            $find_result = mysqli_fetch_array($query);
            $url =  $find_result['url'];
         }
      }


      if (isset($_GET['delete'])) {
         $find_id = $_GET['delete'];

         $query = mysqli_query($conn, "delete from videos where id = $find_id");

         if ($query) {
            set_ss("Video deleted with id = $find_id successfuly", $_SERVER['PHP_SELF']);
         } else {
            set_ss("Video delete with id = $find_id failed", $_SERVER['PHP_SELF'], 'error');
         }
      }



      /* post or update content on request */
      if (isset($_POST['save'])) {

            $url =  $_POST['url'];
            
         $query = mysqli_query($conn, "insert into videos (url) values ('$url')");

         if ($query) {
            set_ss('Video inserted successfully', $_SERVER['PHP_SELF']);
         } else {
            set_ss('Video failed to insert', $_SERVER['PHP_SELF'], 'error');
         }
      }

      /* update if id not null (content available in DB) */
      if (isset($_POST['edit'])) {
        $id = $_GET['id'];

            $url =  $_POST['url'];

            $query = mysqli_query($conn, "UPDATE videos SET url='$url' WHERE id = $id");
         
         if ($query) {
            set_ss('Video updated successfully', $_SERVER['PHP_SELF']);
         } else {
            set_ss('Video failed to update'.$id.mysqli_error($conn), $_SERVER['PHP_SELF'], 'error');
         }
      }


      ?>
      <!-- handle form request for main form content -->
      <form action="<?php $_SERVER['PHP_SELF']; ?>
      <?php isset($_GET['id']) ? '?id=' . $_GET['id'] : ''; ?>" method="POST" id="class-form" enctype="multipart/form-data">
          
         <div class="mb-3">
            <label for="title" class="form-label">Url</label>
            <input type="text" name="url" value="<?php echo $url; ?>" class="form-control" required id="title" placeholder="paste link here...">
         </div>
      </form>

   </div>

   <!-- classes list  -->
   <div class="dn-form-container">
      <div class="d-flex justify-content-between top">
         <h3>Media list</h3>
      </div>

     <div class="row mx-auto container g-2">
         <?php
         /* check if data exist */
         $select = mysqli_query($conn, "select * from videos");
         $inc = 0;
         while ($item = mysqli_fetch_array($select)) {
            $inc++ ?>
            <div class="col-md-4 col-12 shadow">
               <div class="text-end">
                  <a href="<?php $_SERVER['PHP_SELF']; ?>?id=<?php echo $item['id']; ?>" class="btn-sm text-success"><i class="fas fa-edit"></i></a>
                  <a href="<?php $_SERVER['PHP_SELF']; ?>?delete=<?php echo $item['id']; ?>" class="btn-sm text-danger"><i class="fas fa-trash"></i></a>
               </div>
                <iframe src="<?php echo $item['url']; ?>" width="100%" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
         <?php }
         ?>
      </table>
   </div>




   <?php include 'inc/footer.php' ?>