<?php

$active = "articles";

include 'inc/header.php'
?>

<div class="col-10 main-section bg-white border p-2">
   <h5 class="css">Manage Articles</h5>

   <!-- main header content  -->
   <div class="dn-form-container">
      <div class="d-flex justify-content-between top">
         <h3>Add Article</h3>

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
      $short = '';
      $description = '';
      $url = '';
    //   $logo = 'alt.jpg';

      if (isset($_GET['id'])) {
         $find_id = $_GET['id'];

         $query = mysqli_query($conn, "select * from articles where id = $find_id");

         if ($query) {
            $find_result = mysqli_fetch_array($query);
            $title = $find_result['title'];
            $short = $find_result['short_description'];
            $description =  $find_result['description'];
            $url =  $find_result['url'];
         }
      }


      if (isset($_GET['delete'])) {
         $find_id = $_GET['delete'];

         $query = mysqli_query($conn, "delete from articles where id = $find_id");

         if ($query) {
            set_ss("articles deleted with id = $find_id successfuly", $_SERVER['PHP_SELF']);
         } else {
            set_ss("articles delete with id = $find_id failed", $_SERVER['PHP_SELF'], 'error');
         }
      }



      /* post or update content on request */
      if (isset($_POST['save'])) {

         $title = $_POST['title'];
            $short = htmlspecialchars($_POST['short_description']);
            $description =  htmlspecialchars($_POST['description']);
            $url =  $_POST['url'];

         $path = upload_file($_FILES['logo'],$conn);

         /* post if id null (content not available in DB) */
         $query = mysqli_query($conn, "insert into articles (title,short_description,description,url) values ('$title','$short','$description','$url')");

         if ($query) {
            set_ss('articles inserted successfully', $_SERVER['PHP_SELF']);
         } else {
            set_ss('articles failed to insert', $_SERVER['PHP_SELF'], 'error');
         }
      }

      /* update if id not null (content available in DB) */
      if (isset($_POST['edit'])) {

                $id = $_REQUEST['id'];

        $title = $_POST['title'];
            $short = htmlspecialchars($_POST['short_description']);
            $description =  htmlspecialchars($_POST['description']);
            $url =  $_POST['url'];

            $query = mysqli_query($conn, "UPDATE articles SET title='$title',short_description='$short',description='$description',url='$url' WHERE id = $id");
         
         if ($query) {
            set_ss('articles updated successfully', $_SERVER['PHP_SELF']);
         } else {
            set_ss('articles failed to update'.$id.mysqli_error($conn), $_SERVER['PHP_SELF'], 'error');
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
            <label for="name" class="form-label">Short Description</label>
            <textarea name="short_description" class="form-control" placeholder="type here.." id="" cols="20" rows="6" required><?php echo $short ;?></textarea>
         </div>
         <div class="mb-3">
            <label for="name" class="form-label">Description</label>
            <textarea name="description" class="form-control" placeholder="type here.." id="" cols="30" rows="10" required><?php echo $description ;?></textarea>
         </div>
         
         <div class="mb-3">
            <label for="title" class="form-label">Url <small class="fw-lighter text-secondary">(optional)</small></label>
            <input type="text" name="url" value="<?php echo $url; ?>" class="form-control" id="title" placeholder="type....">
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
            <th>Date</th>
            <th>Action</th>
         </tr>
         <?php
         /* check if data exist */
         $select = mysqli_query($conn, "select * from articles");
         $inc = 0;
         while ($item = mysqli_fetch_array($select)) {
            $inc++ ?>
            <tr>
               <td><?php echo $inc; ?></td>
               <td><?php echo $item['title']; ?></td>
               <td><?php echo date_format(date_create($item['date']), 'd-M-Y ⇢ h:i a');; ?></td>
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