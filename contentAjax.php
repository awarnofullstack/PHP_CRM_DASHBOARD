<?php
include 'connection.php';

if(isset($_REQUEST['text'])){

   $search = $_POST['text'];

   $query = "select * from class_detail_list inner join classes on class_detail_list.class_name = classes.name where class_detail_list.content like '%$search%'";


   $result = mysqli_query($conn,$query) or die(mysqli_error($conn));

   $data = "<tr>
               <th>Type</th>
               <th>Class</th>
               <th>Title</th>
               <th>Detail</th>
               <th>View</th>
            </tr>";
   
    while($item = mysqli_fetch_array($result)){
          
         $data .= "<tr>
                     <td>".$item['type']." classes</td>
                     <td>".$item['class_name']."</td>
                     <td>".$item['title']."</td>
                     <td>".$item['content']."</td>
                     <td><a href='".$item['link']."' class='btn btn-primary'>view</a></td>
                  </tr>";
      }
      echo $data;
   }