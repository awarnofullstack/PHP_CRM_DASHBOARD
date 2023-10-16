<?php

$active = "product_inquiry";

include 'inc/header.php'
?>

<div class="col-10 main-section bg-white border p-2">
   <h5 class="css">Product Inquiry Forms</h5>

   <!-- classes list  -->
   <div class="dn-form-container">
      <div class="d-flex justify-content-between top">
         <h3>Product Inquiry Forms</h3>
      </div>

      <table class="table">
         <tr>
            <th>ID</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Date</th>
         </tr>
         <?php
         /* check if data exist */
         $select = mysqli_query($conn, "select * from product_inquiry ORDER BY id DESC ");
         $inc = 0;
         while ($item = mysqli_fetch_array($select)) {
            $inc++ ?>
            <tr>
               <td><?php echo $inc; ?></td>
               <td class="text-nowrap"><?php echo $item['product_id']; ?> <?php echo $item['last_name']; ?></td>
               <td class="text-nowrap"><?php echo $item['product_name']; ?></td>
               <td class="text-nowrap"><?php echo $item['name']; ?></td>
               <td class="text-nowrap"><?php echo $item['email']; ?></td>
               <td class="text-nowrap"><?php echo $item['phone']; ?></td>
               <td class="text-nowrap"><?php echo $item['message']; ?></td>
               <td class="text-nowrap"><?php echo date_format(date_create($item['date']), 'd-M-Y ⇢ h:i a'); ?></td>
            </tr>
         <?php }
         ?>
      </table>
   </div>



   <?php include 'inc/footer.php' ?>