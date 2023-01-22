<?php $page_title = 'Add New Mechanic' ?>
<?php $mechanicss = 'active' ?>
<?php include('../includes/header.php') ?>
<?php require_once '../class/mechanics.class.php'; ?>

<?php
require_once '../tools/functions.php';
if (isset($_POST['save'])) {

    $mechanic = new Mechanic;

    //sanitize user inputs
    $mechanic->firstname = htmlentities($_POST['fn']);
    $mechanic->lastname = htmlentities($_POST['ln']);
    $mechanic->email = htmlentities($_POST['email']);
    $mechanic->number = htmlentities($_POST['number']);
    $mechanic->status = "Inactive";
    if (isset($_POST['status'])) {
        $mechanic->status = $_POST['status'];
    }
    if ($mechanic->add()) {
        header('location: mechanics.php');
    }
    


}
?>


<body>
    <?php include('../includes/sidebar.php') ?>
    <div class="main-content">
        <h1>New Mechanic</h1>
        <a class="back" href="mechanics.php"><i class='bx bx-caret-left'></i>Back</a>
        <div class="add-form-container">
                <form class="add-form" action="newmechanic.php" method="post">
                    <label for="fn">First Name</label>
                    <input type="text" id="fn" name="fn" required placeholder="Enter first name" value="<?php if(isset($_POST['fn'])) { echo $_POST['fn']; } ?>">
                
                    <label for="ln">Last Name</label>
                    <input type="text" id="ln" name="ln" required placeholder="Enter last name" value="<?php if(isset($_POST['ln'])) { echo $_POST['ln']; } ?>">
                    
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Enter email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">

                    <label for="number">Number</label>
                    <input type="number" id="number" name="number" required placeholder="Enter Number"
                        value="<?php if (isset($_POST['number'])) {
                        echo $_POST['email'];
                    } ?>">
                    
                    <label for="status">Is Status of Mechanic Active?</label><br>
                    <label class="container" for="status">Yes
                        <input type="checkbox" name="status" id="status" value="Active" <?php if(isset($_POST['status'])) { if ($_POST['status'] == 'Active') echo ' checked'; } ?>>
                        <span class="checkbox"></span>
                    </label>
                    <input type="submit" class="save-button" value="Save Mechanic" name="save" id="save">
                </form>
    </div>

</body>

</html>