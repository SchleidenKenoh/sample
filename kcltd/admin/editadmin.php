<?php $page_title = 'Update Admin' ?>
<?php $adminss = 'active' ?>
<?php include('../includes/header.php') ?>
<?php require_once '../class/admins.class.php'; ?>

<?php
require_once '../tools/functions.php';
$admin = new Admin;
if (isset($_POST['save'])) {



    //sanitize user inputs
    $admin->id = $_POST['admin-id'];
    $admin->firstname = htmlentities($_POST['fn']);
    $admin->lastname = htmlentities($_POST['ln']);
    $admin->email = htmlentities($_POST['email']);
    $admin->number = htmlentities($_POST['number']);
    $admin->status = "Inactive";
    if (isset($_POST['status'])) {
        $admin->status = $_POST['status'];
    }
    if ($admin->edit()) {
        header('location: admins.php');
    }

} else {
    if ($admin->fetch($_GET['id'])) {
        $data = $admin->fetch($_GET['id']);
        $admin->firstname = $data['firstname'];
        $admin->lastname = $data['lastname'];
        $admin->email = $data['email'];
        $admin->number = $data['number'];
        $admin->status = $data['status'];
    }
}

?>


<body>
    <?php include('../includes/sidebar.php') ?>
    <div class="main-content">
        <h1>Update Admin</h1>
        <a class="back" href="admins.php"><i class='bx bx-caret-left'></i>Back</a>
        <div class="add-form-container">
            <form class="add-form" action="editadmin.php" method="post">
                        <input type="text" hidden name="admin-id" value="<?php echo $data['id']; ?>">
                        <label for="fn">First Name</label>
                        <input type="text" id="fn" name="fn" required placeholder="Enter first name" value="<?php if(isset($_POST['fn'])) { echo $_POST['fn']; } else { echo $data['firstname']; }?>">

                        <label for="ln">Last Name</label>
                        <input type="text" id="ln" name="ln" required placeholder="Enter last name" value="<?php if(isset($_POST['ln'])) { echo $_POST['ln']; } else { echo $data['lastname']; }?>">
                        
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required placeholder="Enter email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } else { echo $data['email']; }?>">
                        
                        <label for="number">Number</label>
                        <input type="number" id="number" name="number" required placeholder="Enter number"
                            value="<?php if (isset($_POST['number'])) {
                            echo $_POST['number'];
                        } else {
                            echo $data['number'];
                        } ?>">

                        <label for="status">Is Status of Admin Active?</label><br>
                        <label class="container" for="status">Yes
                            <input type="checkbox" name="status" id="status" value="Active" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'Active') echo ' checked'; } elseif ($data['status'] == 'Active') echo ' checked'; ?>>
                            <span class="checkbox"></span>
                        </label>
                        <input type="submit" class="button" value="Save Changes" name="save" id="save">
                    </form>
        </div>

</body>

</html>