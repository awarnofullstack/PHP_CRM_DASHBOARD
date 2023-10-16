<?php

$active = "subscribe";

include 'inc/header.php'
?>

<div class="col-10 main-section bg-white border p-2">
   <h5 class="css">Subscribed Newsletter</h5>

   <!-- classes list  -->
   <div class="dn-form-container">
      <div class="d-flex justify-content-between top">
         <h3>Subscribed Emails</h3>
      </div>

      <table class="table">
         <tr>
            <th>id</th>
            <th>Email</th>
            <th>Date on subscribed</th>
            <th>Active</th>
         </tr>
         <?php
         /* check if data exist */
         $select = mysqli_query($conn, "select * from subscribed ORDER BY id DESC ");
         $inc = 0;
         while ($item = mysqli_fetch_array($select)) {
            $inc++ ?>
            <tr>
               <td><?php echo $inc; ?></td>
               <td class="text-nowrap"><?php echo $item['email']; ?></td>
               <td class="text-nowrap"><?php echo date_format(date_create($item['date']), 'd-M-Y ⇢ h:i a'); ?></td>
               <td class="text-nowrap text-success"><?php echo $item['active']??'active'; ?></td>
            </tr>
         <?php }
         ?>
      </table>
   </div>



   <?php include 'inc/footer.php' ?>