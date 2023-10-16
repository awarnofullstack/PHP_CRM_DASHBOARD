<?php

$active = "services_table";

include 'inc/header.php'
?>

<div class="col-10 main-section bg-white border p-2">
   <h5 class="css">Manage Services Tables</h5>

   <!-- main header content  -->
   <div class="dn-form-container">
      <div class="d-flex justify-content-between top">
         <h3>Add Service Table Data</h3>

         <?php
         if (isset($_GET['id'])) { ?>
            <button type="submit" form="table-form" class="btn btn-primary" name="edit">Update</button>
         <?php } else { ?>
            <button type="submit" form="table-form" name="save" class="btn btn-primary">Save</button>
         <?php } ?>

      </div>


      <!-- handle form request for classes -->
      <?php
      /* find by id and update */

      $service_id = '';
      $title = '';
      $defination = '';
      $description = '';
      $order = '';
      $icon = 'alt.jpg';
      
      

      if (isset($_GET['id'])) {
         $find_id = $_GET['id'];
         $query = mysqli_query($conn, "select * from services_table_data where id = $find_id");

         if($query){
             $find_table = mysqli_fetch_array($query);
             $service_id = $find_table['service_id'];
             $title = $find_table['title'];
             $defination = $find_table['defination'];
             $description = $find_table['description'];
             $order = $find_table['sr_no'];
             $icon = $find_table['icon'];
         }
      }


      if (isset($_GET['delete'])) {
         $find_id = $_GET['delete'];
         
         $query = mysqli_query($conn, "delete from services_table_data where id = $find_id");

         if ($query) {
            set_ss("Service deleted with id = $find_id successfuly", $_SERVER['PHP_SELF']);
         } else {
            set_ss("Service delete with id = $find_id failed", $_SERVER['PHP_SELF'], 'error');
         }
      }



      /* post or update content on request */
      if (isset($_POST['save'])) {


             $service_id = $_POST['service_id'];
             $title = $_POST['title'];
             $defination = $_POST['defination'];
             $description = $_POST['description'];
             $order = $_POST['order'];
             
             $path = upload_file($_FILES['icon'], $conn);
        
         $query = mysqli_query($conn, "insert into services_table_data 
         (service_id,title,defination,description,sr_no,icon) values 
         ('$service_id','$title','$defination','$description','$order','$path')");

         if ($query) {
            set_ss('services table data inserted successfully', $_SERVER['PHP_SELF']);
         } else {
            set_ss('services table data failed to insert' . mysqli_error($conn), $_SERVER['PHP_SELF'], 'error');
         }
      }

      /* update if id not null (content available in DB) */
      if (isset($_POST['edit'])) {

         $id = $_GET['id'];
         
         $service_id = $_POST['service_id'];
         $title = $_POST['title'];
         $defination = $_POST['defination'];
         $description = $_POST['description'];
         $order = $_POST['order'];
         
         
         if ($_FILES['icon']['name']) {
             
             $path = upload_file($_FILES['icon'], $conn);
             
             $query = mysqli_query($conn, "UPDATE services_table_data SET 
             service_id = '$service_id',
             title = '$title',
             defination = '$defination',
             description = '$description',
             sr_no = '$order',
             icon = '$path'
             WHERE id = $id");
         }else{
             $query = mysqli_query($conn, "UPDATE services_table_data SET 
             service_id = '$service_id',
             title = '$title',
             defination = '$defination',
             description = '$description',
             sr_no = '$order'
             WHERE id = $id");
         }
         

         if ($query) {
            set_ss('services table data updated successfully', $_SERVER['PHP_SELF']);
         } else {
            set_ss('services table data failed to update' . $id . mysqli_error($conn), $_SERVER['PHP_SELF'], 'error');
         }
      }

      ?>
      <!-- handle form request for main form content -->
      <form action="<?php $_SERVER['PHP_SELF']; ?>
      <?php isset($_GET['id']) ? '?id=' . $_GET['id'] : ''; ?>" method="POST" id="table-form" enctype="multipart/form-data">
         
         <div class="mb-3">
            <label for="service_id" class="form-label">Services</label>
            <select name="service_id" id="service_id" class="form-select">
               <?php
               $options = mysqli_query($conn, "select * from services where template = 'tables'");
               if (mysqli_num_rows($options) > 0) { ?>
                  <option value="">select</option>
                  <?php
                  while ($item = mysqli_fetch_assoc($options)) { ?>
                     <option value="<?php echo $item['id']; ?>" <?php echo $service_id == $item['id'] ? 'selected' : ''; ?>><?php echo $item['name']; ?></option>
                  <?php }
               } else { ?>
                  <option value="">empty</option>
               <?php }
               ?>
            </select>
         </div>
         
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="....">
            </div>
            <div class="mb-3">
                <label class="form-label">Defination</label>
                <input type="text" name="defination" value="<?php echo $defination; ?>" class="form-control" placeholder="....">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" name="description" value="<?php echo $description; ?>" class="form-control" placeholder="....">
            </div>
            <div class="mb-3">
                <label class="form-label">Order</label>
                <input type="text" name="order" value="<?php echo $order; ?>" class="form-control" placeholder="....">
            </div>
            <div class="mb-3">
            <label for="logo" class="form-label">Icon</label>
            <input type="file" name="icon" oninput="pic.src=window.URL.createObjectURL(this.files[0])" value="<?php echo $icon; ?>" class="form-control" id="logo">
         </div>
         <div class="mb-3">
            Preview Image
            <br>
            <img src="<?php echo $icon; ?>" id="pic" alt="preview" width="80px" height="auto">

         </div>
      </form>

   </div>

   <!-- classes list  -->
   <div class="dn-form-container">
      <div class="d-flex justify-content-between top">
         <h3>Services Table list</h3>
      </div>
<?php
         /* check if data exist */
         $tabs = mysqli_query($conn, "select * from services where template = 'tables' order by id ASC");
         $inc = 0;
         $services = array();
         while ($btn = mysqli_fetch_array($tabs)) {
             $services[] = $btn['id'];
            $inc++; 
            
            $curr_service = $btn['id'];
            ?>
            
            <button class="btn-sm tabs_btn <?php echo ($inc == 1)?'active':'' ;?>"><?php echo $btn['name'];?></button>
            
            <?php } ?>

<?php 
           $row_inc = 0;
            foreach($services as $service){
            $row_inc++;
                ?>
                <table class="table tabs_table <?php echo ($row_inc == 1)?'active':'';?>">
                 <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Defination</th>
                    <th>Order</th>
                    <th>Icon</th>
                    <th>Action</th>
                 </tr>
                  <?php
         /* check if data exist */
         $data = mysqli_query($conn, "select * from services_table_data where service_id = '$service' order by sr_no ASC");
         while ($item = mysqli_fetch_array($data)) {
            ?>
            <tr>
               <td><?php echo $item['id']; ?></td>
               <td><?php echo $item['title']; ?></td>
               <td><?php echo $item['defination']; ?></td>
               <td><?php echo $item['sr_no']; ?></td>
               <td><img src="<?php echo $item['icon']; ?>" alt="icon" width="30px" height="30px" /></td>
               <td>
                  <a href="<?php $_SERVER['PHP_SELF']; ?>?id=<?php echo $item['id']; ?>" class="btn-sm text-success"><i class="fas fa-edit"></i></a>
                  <a href="<?php $_SERVER['PHP_SELF']; ?>?delete=<?php echo $item['id']; ?>" class="btn-sm text-danger"><i class="fas fa-trash"></i></a>
               </td>
            </tr>
         <?php }
         ?>
            </table>
            <?php } ?>
      
   </div>




   <?php include 'inc/footer.php' ?>