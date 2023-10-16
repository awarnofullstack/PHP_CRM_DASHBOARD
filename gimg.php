<?php

$active = "gimg";

include 'inc/header.php'
?>

<div class="col-10 main-section bg-white border p-2">
    <h5 class="css">Glimpse Images</h5>

    <!-- main header content  -->
    <div class="dn-form-container">
        <div class="d-flex justify-content-between top">
            <h3>Add Glimpse Images</h3>

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


        $logo1 = 'alt.jpg';
        $logo2 = 'alt.jpg';
        $logo3 = 'alt.jpg';
        $logo4 = 'alt.jpg';
        $logo5 = 'alt.jpg';

        if (isset($_GET['id'])) {
            $find_id = $_GET['id'];

            $query = mysqli_query($conn, "select * from gimg where id = $find_id");

            if ($query) {
                $find_result = mysqli_fetch_array($query);
                $logo1 =  $find_result['logo1'];
                $logo2 =  $find_result['logo2'];
                $logo3 =  $find_result['logo3'];
                $logo4 =  $find_result['logo4'];
                $logo5 =  $find_result['logo5'];
            }
        }


        if (isset($_GET['delete'])) {
            $find_id = $_GET['delete'];

            $query = mysqli_query($conn, "delete from gimg where id = $find_id");

            if ($query) {
                set_ss("gimg deleted with id = $find_id successfuly", $_SERVER['PHP_SELF']);
            } else {
                set_ss("gimg delete with id = $find_id failed", $_SERVER['PHP_SELF'], 'error');
            }
        }



        /* post or update content on request */
        if (isset($_POST['save'])) {
            $logo1 =  $_POST['logo1'];
            $logo2 =  $_POST['logo2'];
            $logo3 =  $_POST['logo3'];
            $logo4 =  $_POST['logo4'];
            $logo5 =  $_POST['logo5'];

            $path1 = upload_file($_FILES['logo1'], $conn);
            $path2 = upload_file($_FILES['logo2'], $conn);
            $path3 = upload_file($_FILES['logo3'], $conn);
            $path4 = upload_file($_FILES['logo4'], $conn);
            $path5 = upload_file($_FILES['logo5'], $conn);

            /* post if id null (content not available in DB) */
            $query = mysqli_query($conn, "insert into gimg (logo1,logo2,logo3,logo4,logo5) values (
                '$path1' ,   
                '$path2' ,   
                '$path3' ,   
                '$path4' ,   
                '$path5'  
            )");

            if ($query) {
                set_ss('gimg inserted successfully', $_SERVER['PHP_SELF']);
            } else {
                set_ss('gimg failed to insert', $_SERVER['PHP_SELF'], 'error');
            }
        }

        /* update if id not null (content available in DB) */
        if (isset($_POST['edit'])) {


            $id = $_REQUEST['id'];
            // $content = str_replace("'", "\'", htmlspecialchars($_POST['content']));

            $arr = ["logo1","logo2","logo3","logo4","logo5"];
            $available = array();

            foreach ($arr as $value) {

                if($_FILES[$value]['name']){
                $path = upload_file($_FILES[$value], $conn);

                $available["$value"] = $path;
            }
        }

        $inc = 0;
        $string = "";

        foreach($available as $key => $val){

            $inc++;
            $count = count($available);

            if($count == $inc){
                $string .= "$key = '$val'";
            }else{
                $string .= "$key ='$val', ";
            }
        }
           
                if(strlen($string) > 0){

                    $query = mysqli_query($conn, "UPDATE gimg SET ".
                    $string." WHERE id = $id");
                }

            if ($query) {
                set_ss('gimg updated successfully', $_SERVER['PHP_SELF']);
            } else {
                set_ss('gimg failed to update ' . $id. $string . mysqli_error($conn), $_SERVER['PHP_SELF'], 'error');
            }
        }


        ?>
        <!-- handle form request for main form content -->
        <form action="<?php $_SERVER['PHP_SELF']; ?>
      <?php isset($_GET['id']) ? '?id=' . $_GET['id'] : ''; ?>" method="POST" id="class-form" enctype="multipart/form-data">
            <!-- <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" value="<?php echo $title; ?>" required class="form-control" id="title" placeholder="type....">
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Url</label>
                <input type="text" name="link" value="<?php echo $url; ?>" required class="form-control" id="link" placeholder="type....">
            </div> -->

            <!-- <div class="mb-3">
            <label for="name" class="form-label">Content</label>
            <textarea name="content" class="form-control" placeholder="type here.." id="" cols="30" rows="10" required><?php // echo $content ;
                                                                                                                        ?></textarea>
         </div> -->

            <div class="mb-3">
                <label for="logo1" class="form-label">Logo1</label>
                <input type="file" name="logo1" oninput="pic1.src=window.URL.createObjectURL(this.files[0])" value="<?php echo $logo1; ?>" class="form-control" id="logo">
            </div>
            <div class="mb-3">
                Preview Image
                <br>
                <img src="<?php echo $logo1; ?>" id="pic1" alt="preview" width="80px" height="auto">

            </div>

            <div class="mb-3">
                <label for="logo2" class="form-label">Logo2</label>
                <input type="file" name="logo2" oninput="pic2.src=window.URL.createObjectURL(this.files[0])" value="<?php echo $logo2; ?>" class="form-control" id="logo2">
            </div>
            <div class="mb-3">
                Preview Image
                <br>
                <img src="<?php echo $logo2; ?>" id="pic2" alt="preview" width="80px" height="auto">

            </div>

            <div class="mb-3">
                <label for="logo3" class="form-label">Logo3</label>
                <input type="file" name="logo3" oninput="pic3.src=window.URL.createObjectURL(this.files[0])" value="<?php echo $logo3; ?>" class="form-control" id="logo3">
            </div>
            <div class="mb-3">
                Preview Image
                <br>
                <img src="<?php echo $logo3; ?>" id="pic3" alt="preview" width="80px" height="auto">

            </div>

            <div class="mb-3">
                <label for="logo4" class="form-label">Logo4</label>
                <input type="file" name="logo4" oninput="pic4.src=window.URL.createObjectURL(this.files[0])" value="<?php echo $logo4; ?>" class="form-control" id="logo4">
            </div>
            <div class="mb-3">
                Preview Image
                <br>
                <img src="<?php echo $logo4; ?>" id="pic4" alt="preview" width="80px" height="auto">

            </div>


            <div class="mb-3">
                <label for="logo5" class="form-label">Logo5</label>
                <input type="file" name="logo5" oninput="pic5.src=window.URL.createObjectURL(this.files[0])" value="<?php echo $logo5; ?>" class="form-control" id="logo5">
            </div>
            <div class="mb-3">
                Preview Image
                <br>
                <img src="<?php echo $logo5; ?>" id="pic5" alt="preview" width="80px" height="auto">

            </div>


        </form>

    </div>

    <!-- classes list  -->
    <div class="dn-form-container">
        <div class="d-flex justify-content-between top">
            <h3>gimg list</h3>
        </div>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Logo1</th>
                <th>Logo2</th>
                <th>Logo3</th>
                <th>Logo4</th>
                <th>Logo5</th>
                <th>Action</th>
            </tr>
            <?php
            /* check if data exist */
            $select = mysqli_query($conn, "select * from gimg");
            $inc = 0;
            while ($item = mysqli_fetch_array($select)) {
                $inc++ ?>
                <tr>
                    <td><?php echo $inc; ?></td>
                    <td><img src="<?php echo $item['logo1']; ?>" alt="icon" width="30px" height="30px" /></td>
                    <td><img src="<?php echo $item['logo2']; ?>" alt="icon" width="30px" height="30px" /></td>
                    <td><img src="<?php echo $item['logo3']; ?>" alt="icon" width="30px" height="30px" /></td>
                    <td><img src="<?php echo $item['logo4']; ?>" alt="icon" width="30px" height="30px" /></td>
                    <td><img src="<?php echo $item['logo5']; ?>" alt="icon" width="30px" height="30px" /></td>
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