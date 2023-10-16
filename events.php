<?php

$active = "events";
include 'inc/header.php'
?>
<style>
   .ck-editor__editable_inline {
      min-height: 200px;
   }
</style>
<div class="col-10 main-section bg-white border p-2">
   <h5 class="css">Manage events</h5>


   <!-- main header content  -->
   <div class="dn-form-container">
      <div class="d-flex justify-content-between top">
         <h3>Add Event</h3>

         <?php
         if (isset($_GET['id'])) { ?>
            <button type="submit" form="blog-form" class="btn btn-primary" name="edit">Update</button>
         <?php } else { ?>
            <button type="submit" form="blog-form" name="save" class="btn btn-primary">Save</button>
         <?php } ?>

      </div>


      <!-- handle form request for classes -->
      <?php
      /* find by id and update */

      $blog_title = '';
      // $blog_description = '';
      $blog_banner = 'alt.jpg';

      $typeofevent = '';
      $event_schedule = '';
      $event_location = '';
      $event_guide = '';
      $event_desc = '';

      if (isset($_GET['id'])) {
         $find_id = $_GET['id'];

         $query = mysqli_query($conn, "select * from events where id = $find_id");

         if ($query) {
            $find_result = mysqli_fetch_array($query);
            $blog_title = $find_result['title'];
            $typeofevent = $find_result['typeofevent'];
            $event_schedule = $find_result['eventschedule'];
            $event_location = $find_result['eventlocation'];
            // $blog_description = $find_result['shortdescription'];
            $event_guide = $find_result['eventguide'];
            $event_desc = $find_result['shortdescription'];
            $blog_banner = $find_result['eventbanner'];
         }
      }


      if (isset($_GET['delete'])) {
         $find_id = $_GET['delete'];

         $query = mysqli_query($conn, "delete from events where id = $find_id");

         if ($query) {
            set_ss("clients deleted with id = $find_id successfuly", $_SERVER['PHP_SELF']);
         } else {
            set_ss("clients delete with id = $find_id failed", $_SERVER['PHP_SELF'], 'error');
         }
      }

      /* post or update content on request */
      if (isset($_POST['save'])) {

         $title = $_POST['title'];
         // $blog_description = $_POST['shortdescription'];
         $typeofevent = $_POST['typeofevent'];
         $event_schedule = $_POST['eventschedule'];
         $event_location = $_POST['eventlocation'];
         $event_guide = $_POST['eventguide'];
         $event_desc = $_POST['shortdescription'];
         $blog_banner = upload_file($_FILES['eventbanner'], $conn);

         $query = "insert into events (title,eventbanner,shortdescription,typeofevent,eventschedule,eventlocation , eventguide) values ('$title','$blog_banner','$event_desc','$typeofevent' , '$event_schedule' , '$event_location' , '$event_guide')";
         $query = mysqli_query($conn, $query);

         /* post if id null (content not available in DB) */
         if ($query) {
            set_ss('Event  inserted successfully', $_SERVER['PHP_SELF']);
         } else {
            set_ss('Event failed to insert : ' . mysqli_error($conn), $_SERVER['PHP_SELF'], 'error');
         }
      }

      /* update if id not null (content available in DB) */
      if (isset($_POST['edit'])) {

         $id = $_GET['id'];

         $title = $_POST['title'];
         // $blog_description = $_POST['shortdescription'];
         $typeofevent = $_POST['typeofevent'];
         $event_schedule = $_POST['eventschedule'];
         $event_location = $_POST['eventlocation'];
         $event_guide = $_POST['eventguide'];
         $event_desc = $_POST['shortdescription'];

         $blog_banner = upload_file($_FILES['eventbanner'], $conn);




         if ($_FILES['logo']['name'] && $_FILES['eventbanner']['name']) {
            $logo = upload_file($_FILES['logo'], $conn);
            $blog_banner = upload_file($_FILES['eventbanner'], $conn);
            $query = "UPDATE events SET title = '$title',eventbanner = '$blog_banner', shortdescription = '$event_desc' WHERE id = $id";
         } else if ($_FILES['banner']['name']) {
            $blog_banner = upload_file($_FILES['eventbanner'], $conn);
            $query = "UPDATE events SET title = '$title',eventbanner = '$blog_banner', shortdescription = '$event_desc' WHERE id = $id";
         } else {
            $query = "UPDATE events SET title = '$title',eventbanner = '$blog_banner', shortdescription = '$event_desc' WHERE id = $id";
         }
         $query = mysqli_query($conn, $query);

         if ($query) {
            set_ss('clients updated successfully', $_SERVER['PHP_SELF']);
         } else {
            set_ss('clients failed to update' . mysqli_error($conn), $_SERVER['PHP_SELF'], 'error');
         }
      }


      ?>
      <!-- handle form request for main form content -->


      <form action="<?php $_SERVER['PHP_SELF']; ?>
      <?php isset($_GET['id']) ? '?id=' . $_GET['id'] : ''; ?>" method="POST" enctype="multipart/form-data" id="blog-form">
         <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" value="<?php echo $blog_title; ?>" required class="form-control" id="title" placeholder="type....">
         </div>
         <div class="mb-3">
            <label for="typeofevent" class="form-label">Type Of Event</label>
            <input type="text" name="typeofevent" value="<?php echo $typeofevent; ?>" required class="form-control" id="typeofevent" placeholder="type....">
         </div>
         <div class="mb-3">
            <label for="eventschedule" class="form-label">Schedule Of Event</label>
            <input type="text" name="eventschedule" value="<?php echo $event_schedule; ?>" required class="form-control" id="eventschedule" placeholder="type....">
         </div>
         <div class="mb-3">
            <label for="eventlocation" class="form-label">Location Of Event</label>
            <input type="text" name="eventlocation" value="<?php echo $event_location; ?>" required class="form-control" id="eventlocation" placeholder="type....">
         </div>
         <div class="mb-3">
            <label for="shortdescription" class="form-label">Short Description</label>
            <textarea class="form-control" name="shortdescription" id="shortdescription" required rows="4"><?php echo $event_desc; ?></textarea>
         </div>
         <div class="mb-3">
            <label for="eventguide" class="form-label">Event Guide</label>
            <textarea class="form-control" name="eventguide" id="eventguide" required rows="4"><?php echo $event_guide; ?></textarea>
         </div>
         <div class="mb-3">
            <label for="bannerselect" class="form-label">Banner</label>
            <input type="file" oninput="pic2.src=window.URL.createObjectURL(this.files[0])" name="eventbanner" <?php isset($_GET['id']) ? '' : 'required'; ?> class="form-control" id="eventbanner" placeholder="type....">
         </div>
         <div class="mb-3">
            Preview Banner
            <br>
            <img src="<?php echo $blog_banner; ?>" id="pic2" alt="preview" width="auto" height="200px">
         </div>
      </form>

   </div>


   <!-- classes list  -->
   <div class="dn-form-container">
      <div class="d-flex justify-content-between top">
         <h3>Events list</h3>
      </div>

      <table class="table">
         <tr>
            <th>id</th>
            <th>Title</th>
            <th>Logo</th>
            <th>Event Type</th>
            <th>Status</th>
            <th>Action</th>
         </tr>


         <?php
         /* check if data exist */
         $select = mysqli_query($conn, "select * from events");
         $inc = 0;
         while ($item = mysqli_fetch_array($select)) {
            $inc++ ?>

            <tr>
               <td><?php echo $inc; ?></td>
               <td><?php echo $item['title']; ?></td>
               <td>
                  <img src="<?php echo $item['eventbanner']; ?>" width="auto" height="60px" alt="">
               </td>
               <td><?php echo $item['typeofevent']; ?></td>

               <td><span class="text-success fw-bold">active</span></td>
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

   <script>
      ClassicEditor
         .create(document.querySelector('#ed'))
         .catch(error => {
            console.error(error);
         });
   </script>