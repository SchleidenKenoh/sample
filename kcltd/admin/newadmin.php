<?php $page_title = 'New Admin' ?>
<?php $adminss = 'active' ?>
<?php include('../includes/header.php') ?>
<?php require_once '../class/admins.class.php'; ?>

<?php
require_once '../tools/functions.php';
if (isset($_POST['save'])) {

    $admins = new Admin;

    //sanitize user inputs
    $admins->firstname = htmlentities($_POST['fn']);
    $admins->lastname = htmlentities($_POST['ln']);
    $admins->email = htmlentities($_POST['email']);
    $admins->number = htmlentities($_POST['number']);
    $admins->status = "Inactive";
    if (isset($_POST['status'])) {
        $admins->status = $_POST['status'];
    }
    if ($admins->add()) {
        header('location: admins.php');
    }
    


}
?>


<body>
    <?php include('../includes/sidebar.php') ?>
    <div class="main-content">
        <h1>New Admin</h1>
        <a class="back" href="admins.php"><i class='bx bx-caret-left'></i>Back</a>
        <div class="add-form-container">
                <form class="add-form" action="newadmin.php" method="post">
                    <label for="fn">First Name</label>
                    <input type="text" id="fn" name="fn" required placeholder="Enter first name" value="<?php if(isset($_POST['fn'])) { echo $_POST['fn']; } ?>">
                
                    <label for="ln">Last Name</label>
                    <input type="text" id="ln" name="ln" required placeholder="Enter last name" value="<?php if(isset($_POST['ln'])) { echo $_POST['ln']; } ?>">
                    
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Enter email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">

                    <label for="number">Number</label>
                    <input type="number" id="number" name="number" min="0" required placeholder="Enter Number"
                        value="<?php if (isset($_POST['number'])) {
                        echo $_POST['email'];
                    } ?>">
                    
                    <label for="status">Is Status of Admin Active?</label><br>
                    <label class="container" for="status">Yes
                        <input type="checkbox" name="status" id="status" value="Active" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'Active') echo ' checked'; } ?>>
                        <span class="checkbox"></span>
                    </label>
                    <input type="submit" class="save-button" value="Save Admin" name="save" id="save">
                </form>
    </div>

</body>

</html>