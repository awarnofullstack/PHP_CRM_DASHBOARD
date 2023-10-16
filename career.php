<?php

$active = "career";

include 'inc/header.php'
?>

<div class="col-10 main-section bg-white border p-2">
   <h5 class="css">Career Forms</h5>

   <!-- classes list  -->
   <div class="dn-form-container">
      <div class="d-flex justify-content-between top">
         <h3>Career Forms</h3>
      </div>

      <table class="table">
         <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Designation</th>
            <th>DOB</th>
            <th>Refrence</th>
            <th>Message</th>
            <th>Resume</th>
            <th>Date</th>
         </tr>
         <?php
         /* check if data exist */
         $select = mysqli_query($conn, "select * from career ORDER BY id DESC ");
         $inc = 0;
         while ($item = mysqli_fetch_array($select)) {
            $inc++ ?>
            <tr>
               <td><?php echo $inc; ?></td>
               <td class="text-nowrap"><?php echo $item['first_name']; ?> <?php echo $item['last_name']; ?></td>
               <td class="text-nowrap"><?php echo $item['designation']; ?></td>
               <td class="text-nowrap"><?php echo $item['dob']; ?></td>
               <td class="text-nowrap"><?php echo $item['reach_from']; ?></td>
               <td class="text-nowrap"><?php echo $item['message']; ?></td>
               <td class="text-nowrap"><a href="<?php echo $item['resume']; ?>" download="<?php echo $item['resume']; ?>" class="text-warning">download</a></td>
               <td class="text-nowrap"><?php echo date_format(date_create($item['date']), 'd-M-Y ⇢ h:i a'); ?></td>
            </tr>
         <?php }
         ?>
      </table>
   </div>



   <?php include 'inc/footer.php' ?>