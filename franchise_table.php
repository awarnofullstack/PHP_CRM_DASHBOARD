<?php

$active = "franchise";

include 'inc/header.php'
?>

<div class="col-10 main-section bg-white border p-2">
   <h5 class="css">Franchises</h5>

   <!-- classes list  -->
   <div class="dn-form-container">
      <div class="d-flex justify-content-between top">
         <h3>Partners</h3>
      </div>

      <table class="table">
         <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Budget</th>
            <th>Brand</th>
            <th>Location</th>
            <th>Description</th>
         </tr>
         <?php
         /* check if data exist */
         $select = mysqli_query($conn, "select * from franchise_table ORDER BY id DESC ");
         $inc = 0;
         while ($item = mysqli_fetch_array($select)) {
            $inc++ ?>
            <tr>
               <td><?php echo $inc; ?></td>
               <td class="text-nowrap"><?php echo $item['fname']; ?></td>
               <td class="text-nowrap"><?php echo $item['femail']; ?></td>
               <td class="text-nowrap"><?php echo $item['fphone']; ?></td>
               <td class="text-nowrap"><?php echo $item['fbudget']; ?></td>
               <td class="text-nowrap"><?php echo $item['fbrand']; ?></td>
               <td class="text-nowrap"><?php echo $item['fbusinesslocation']; ?></td>
               <td class="text-nowrap"><?php echo $item['fdescription']; ?></td>
               
            </tr>
         <?php }
         ?>
      </table>
   </div>



   <?php include 'inc/footer.php' ?>