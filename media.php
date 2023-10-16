<?php

$active = "media";

include 'inc/header.php'
?>

<div class="col-10 main-section bg-white border p-2">
   <h5 class="css">Manage Media</h5>

   <!-- main header content  -->
   <div class="dn-form-container">
      <div class="d-flex justify-content-between top">
         <h3>Add Media</h3>

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

      $title = '';
      $label = '';
      $content = '';
      $url = '';
      $logo = 'alt.jpg';

      if (isset($_GET['id'])) {
         $find_id = $_GET['id'];

         $query = mysqli_query($conn, "select * from media where id = $find_id");

         if ($query) {
            $find_result = mysqli_fetch_array($query);
            $title = $find_result['title'];
            $logo =  $find_result['logo'];
            $url =  $find_result['link'];
            $content =  $find_result['content'];
         }
      }


      if (isset($_GET['delete'])) {
         $find_id = $_GET['delete'];

         $query = mysqli_query($conn, "delete from media where id = $find_id");

         if ($query) {
            set_ss("media deleted with id = $find_id successfuly", $_SERVER['PHP_SELF']);
         } else {
            set_ss("media delete with id = $find_id failed", $_SERVER['PHP_SELF'], 'error');
         }
      }



      /* post or update content on request */
      if (isset($_POST['save'])) {

         $title = $_POST['title'];
         $content = str_replace("'","\'",htmlspecialchars($_POST['content']));
         $url =  $_POST['link'];
         $logo =  $_FILES['logo'];

         $path = upload_file($_FILES['logo'],$conn);

         /* post if id null (content not available in DB) */
         $query = mysqli_query($conn, "insert into media (title,content,logo,link) values ('$title','$content','$path','$url')");

         if ($query) {
            set_ss('media inserted successfully', $_SERVER['PHP_SELF']);
         } else {
            set_ss('media failed to insert', $_SERVER['PHP_SELF'], 'error');
         }
      }

      /* update if id not null (content available in DB) */
      if (isset($_POST['edit'])) {

         $id = $_GET['id'];
         $title = $_POST['title'];
         $url =  $_POST['link'];
         $content = str_replace("'","\'",htmlspecialchars($_POST['content']));

         if ($_FILES['logo']['name']) {
            $path = upload_file($_FILES['logo'], $conn);

            $query = mysqli_query($conn, "UPDATE media SET title='$title',link='$url',content='$content',logo='$path' WHERE id = $id");
         } else {
            $query = mysqli_query($conn, "UPDATE media SET title = '$title',link='$url',content = '$content' WHERE id = $id");
         }

         if ($query) {
            set_ss('media updated successfully', $_SERVER['PHP_SELF']);
         } else {
            set_ss('media failed to update'.$id.mysqli_error($conn), $_SERVER['PHP_SELF'], 'error');
         }
      }


      ?>
      <!-- handle form request for main form content -->
      <form action="<?php $_SERVER['PHP_SELF']; ?>
      <?php isset($_GET['id']) ? '?id=' . $_GET['id'] : ''; ?>" method="POST" id="class-form" enctype="multipart/form-data">
         <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" value="<?php echo $title; ?>" required class="form-control" id="title" placeholder="type....">
         </div>
         
         <div class="mb-3">
            <label for="title" class="form-label">Url</label>
            <input type="text" name="link" value="<?php echo $url; ?>" required class="form-control" id="link" placeholder="type....">
         </div>
         
         <div class="mb-3">
            <label for="name" class="form-label">Content</label>
            <textarea name="content" class="form-control" placeholder="type here.." id="" cols="30" rows="10" required><?php echo $content ;?></textarea>
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
         <h3>Media list</h3>
      </div>

      <table class="table">
         <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Logo</th>
            <th>Action</th>
         </tr>
         <?php
         /* check if data exist */
         $select = mysqli_query($conn, "select * from media");
         $inc = 0;
         while ($item = mysqli_fetch_array($select)) {
            $inc++ ?>
            <tr>
               <td><?php echo $inc; ?></td>
               <td><?php echo $item['title']; ?></td>
               <td><img src="<?php echo $item['logo']; ?>" alt="icon" width="30px" height="30px" /></td>
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