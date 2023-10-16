<?php

$active = "glance_menu";

include 'inc/header.php'
?>

<div class="col-10 main-section bg-white border p-2">
    <h5 class="css">Manage Glance Menu</h5>

    <!-- main header content  -->
    <div class="dn-form-container">
        <div class="d-flex justify-content-between top">
            <h3>Add Menu</h3>

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
        $steps = [];
        $logo = 'alt.jpg';



        if (isset($_GET['id'])) {
            $find_id = $_GET['id'];

            $query = mysqli_query($conn, "select * from services where id = $find_id");

            if ($query) {
                $find_result = mysqli_fetch_array($query);


                $steps = json_decode($find_result['steps']) ?? [];

                $logo =  $find_result['logo'];
            }
        }


        if (isset($_GET['delete'])) {
            $find_id = $_GET['delete'];

            $query = mysqli_query($conn, "delete from services where id = $find_id");

            if ($query) {
                set_ss("Service deleted with id = $find_id successfuly", $_SERVER['PHP_SELF']);
            } else {
                set_ss("Service delete with id = $find_id failed", $_SERVER['PHP_SELF'], 'error');
            }
        }



        /* post or update content on request */
        if (isset($_POST['save'])) {

            $steps = json_encode($_POST['steps']);
            $logo =  $_FILES['logo'];

            $path = upload_file($_FILES['logo'], $conn);

            /* post if id null (content not available in DB) */
            $query = mysqli_query($conn, "insert into services 
         (logo,steps) values 
         ('$path','$steps')");

            if ($query) {
                set_ss('services inserted successfully', $_SERVER['PHP_SELF']);
            } else {
                set_ss('services failed to insert' . mysqli_error($conn), $_SERVER['PHP_SELF'], 'error');
            }
        }

        /* update if id not null (content available in DB) */
        if (isset($_POST['edit'])) {

            $id = $_REQUEST['id'];
            $steps = json_encode($_POST['steps']);


            if ($_FILES['logo']['name']) {
                $path = upload_file($_FILES['logo'], $conn);
                $query = mysqli_query($conn, "UPDATE services SET steps='$steps',logo='$path' WHERE id = $id");
            } else {
                $query = mysqli_query($conn, "UPDATE services SET 
            steps='$steps'
            WHERE id = $id");
            }

            if ($query) {
                set_ss('services updated successfully', $_SERVER['PHP_SELF']);
            } else {
                set_ss('services failed to update ' . $id . mysqli_error($conn), $_SERVER['PHP_SELF'], 'error');
            }
        }


        ?>
        <!-- handle form request for main form content -->
        <form action="<?php $_SERVER['PHP_SELF']; ?>
      <?php isset($_GET['id']) ? '?id=' . $_GET['id'] : ''; ?>" method="POST" id="class-form" enctype="multipart/form-data">

            <div class="mb-3 toggle_template_table" id="stepsDiv">
                <label for="steps" class="form-label">Steps</label>
                <?php
                if (count($steps) > 0) {
                    $inc = 1;
                    foreach ($steps as $val) { ?>
                        <div class="d-flex g-2 align-items-center">
                            <span onclick="$(this).parent().remove()"><i class="fas fa-times"></i></span>
                            <input type="text" name="steps[]" value="<?php echo $val; ?>" class="form-control mb-1" id="steps" placeholder="type....">
                        </div>
                    <?php $inc++;
                    }
                } else {
                    ?>
                    <div class="d-flex g-2 align-items-center ">
                        <span onclick="$(this).parent().remove()"><i class="fas fa-times"></i></span>
                        <input type="text" name="steps[]" value="" class="form-control  mb-1" id="steps" placeholder="type....">
                    </div>
                <?php } ?>

            </div>
            <button type="button" class="btn-sm btn-primary border-0 mb-3 toggle_template_table" onclick="addSteps()">Add More</button>

            <div class="mb-3">
                <label for="logo" class="form-label">Photo</label>
                <input type="file" name="logo" oninput="pic.src=window.URL.createObjectURL(this.files[0])" value="<?php echo $logo; ?>" class="form-control" id="logo">
            </div>
            <div class="mb-3">
                Preview Image
                <br>
                <img src="<?php echo $logo; ?>" id="pic" alt="preview" width="80px" height="auto">

            </div>
        </form>

    </div>

    <!-- classes list  -->
    <div class="dn-form-container">
        <div class="d-flex justify-content-between top">
            <h3>services list</h3>
        </div>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Logo</th>
                <th>Action</th>
            </tr>
            <?php
            /* check if data exist */
            $select = mysqli_query($conn, "select * from services");
            $inc = 0;
            while ($item = mysqli_fetch_array($select)) {
                $inc++ ?>
                <tr>
                    <td><?php echo $inc; ?></td>
                    <td><img src="<?php echo $item['logo']; ?>" alt="icon" width="30px" height="30px" /></td>
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
        function addSteps() {
            let count = $('#stepsDiv input').length;

            let input = `
         <div class="d-flex g-2 align-items-center">
               <span onclick="$(this).parent().remove()"><i class="fas fa-times"></i></span>
         <input type="text" name="steps[]" value="" class="form-control mb-1" placeholder="type....">
         </div>`;

            $('#stepsDiv').append(input);

        }

        if ($('#template').val() != 'tables') {
            $('.toggle_template_table').show();
        } else {
            $('.toggle_template_table').hide();
        }

        $(document).on('change', '#template', function() {
            if ($(this).val() == 'tables') {
                $('.toggle_template_table').hide();
            } else {
                $('.toggle_template_table').show();
            }
        })
    </script>


    <script>
        $(document).on('click', '.tabs_btn', function() {

            $('.tabs_btn.active').removeClass('active');
            $('.tabs_table.active').removeClass('active');

            let index = $(this).index();
            $(this).addClass('active');
            $('.tabs_table').eq(index - 1).addClass('active');

        })
    </script>