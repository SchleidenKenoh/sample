<?php require_once '../tools/variables.php' ?>
<?php $page_title = 'Add New Customer' ?>
<?php $customer = 'active' ?>
<?php include('../includes/header.php') ?>
<?php require_once '../class/book.class.php'; ?>

<?php
require_once '../tools/functions.php';
$book = new Book;
if (isset($_POST['save'])) {



    //sanitize user inputs
    $book->name = htmlentities($_POST['name']);
    $book->email = htmlentities($_POST['email']);
    $book->number = htmlentities($_POST['number']);
    $book->address = htmlentities($_POST['address']);
    $book->arrival = htmlentities($_POST['arrival']);
    $book->service = htmlentities($_POST['service']);

    if ($book->add()) {
        header('location: customer.php');
    }

}

?>


<body>
    <?php include('../includes/sidebar.php') ?>
    <div class="main-content">
        <h1>Add New Customer</h1>
        <a class="back" href="customer.php"><i class='bx bx-caret-left'></i>Back</a>
        <div class="add-form-container">
            <form class="add-form" action="newcustomer.php" method="post">
                <label for="name">Full Name</label>
                <input type="text" required placeholder="Enter name" name="name"
                >

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="Enter email"
                >

                <label for="number">Number</label>
                <input type="number" id="number" name="number" min="0" required placeholder="Enter number">

                <label for="address">address</label>
                <input type="text" id="address" name="address" required placeholder="Enter address">

                <label for="arrival">Arrival</label>
                <input type="date" id="arrival" name="arrival" min="2022-12-08" required placeholder="Enter arrival" value="<?php if (isset($_POST['arrival'])) {
                    echo $_POST['arrival'];
                                } ?>">

                <label for="service">Service Type</label>
            <select name="service" id="service">
               <option value="None" <?php if (isset($_POST['service'])) {
                           if ($_POST['service']=='None')
                              echo ' selected="selected"';
                        } ?>
                  >--Select--</option>
               <option value="Change Oil" <?php if (isset($_POST['service'])) {
                           if ($_POST['service']=='Change Oil')
                              echo '
                  selected="selected"';
                        } ?>>Change Oil</option>
               <option value="CVT Cleaning" <?php if (isset($_POST['service'])) {
                           if ($_POST['service']=='CVT Cleaning')
                              echo '
                  selected="selected"';
                        } ?>>CVT Cleaning</option>
               <option value="Suspension Tuning" <?php if (isset($_POST['service'])) {
                           if ($_POST['service']=='Suspension Tuning')
                              echo '
                  selected="selected"';
                        } ?>>Suspension Tuning</option>
               <option value="Engine Overhaul" <?php if (isset($_POST['service'])) {
                           if ($_POST['service']=='Engine Overhaul')
                              echo '
                  selected="selected"';
                        } ?>>Engine Overhaul</option>
               <option value="F.I. Cleaning" <?php if (isset($_POST['service'])) {
                           if ($_POST['service']=='F.I. Cleaning')
                              echo '
                  selected="selected"';
                        } ?>>F.I. Cleaning</option>
               <option value="Wiring Works" <?php if (isset($_POST['service'])) {
                           if ($_POST['service']=='Wiring Works')
                              echo '
                  selected="selected"';
                        } ?>>Wiring Works</option>
            </select>

                <input type="submit" class="cust-button" value="Save Customer" name="save" id="save">
            </form>
        </div>

</body>

</html>