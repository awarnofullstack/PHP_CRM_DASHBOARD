<?php

$active = "reserve";

include 'inc/header.php'
?>

<div class="col-10 main-section bg-white border p-2">
   <h5 class="css">Reservations Applied</h5>

   <!-- classes list  -->
   <div class="dn-form-container">
      <div class="d-flex justify-content-between top">
         <h3>Customers</h3>
      </div>

      <table class="table">
         <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date</th>
            <th>Time</th>
            <th>Quantity</th>
            <th>Outlet</th>
         </tr>
         <?php
         /* check if data exist */
         $select = mysqli_query($conn, "select * from reserve_table ORDER BY id DESC ");
         $inc = 0;
         while ($item = mysqli_fetch_array($select)) {
            $inc++ ?>
            <tr>
               <td><?php echo $inc; ?></td>
               <td class="text-nowrap"><?php echo $item['customername']; ?></td>
               <td class="text-nowrap"><?php echo $item['customeremail']; ?></td>
               <td class="text-nowrap"><?php echo $item['customernumber']; ?></td>
               <td class="text-nowrap"><?php echo $item['customerdate']; ?></td>
               <td class="text-nowrap"><?php echo $item['customertime']; ?></td>
               <td class="text-nowrap"><?php echo $item['customerqty']; ?></td>
               <td class="text-nowrap"><?php echo $item['customeroutlet']; ?></td>
               
            </tr>
         <?php }
         ?>
      </table>
   </div>



   <?php include 'inc/footer.php' ?>