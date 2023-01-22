<?php require_once '../tools/variables.php' ?>
<?php $page_title = 'Update Customer' ?>
<?php $customer = 'active' ?>
<?php include('../includes/header.php') ?>
<?php require_once '../class/book.class.php'; ?>

<?php
require_once '../tools/functions.php';
$book = new Book;
if (isset($_POST['save'])) {



    //sanitize user inputs
    $book->id = $_POST['customer-id'];
    $book->name = htmlentities($_POST['name']);
    $book->email = htmlentities($_POST['email']);
    $book->number = htmlentities($_POST['number']);
    $book->address = htmlentities($_POST['address']);
    $book->arrival = htmlentities($_POST['arrival']);
    $book->service = htmlentities($_POST['service']);

    if ($book->edit()) {
        header('location: customer.php');
    }

} else {
    if ($book->fetch($_GET['id'])) {
        $data = $book->fetch($_GET['id']);
        $book->name = $data['name'];
        $book->email = $data['email'];
        $book->number = $data['number'];
        $book->address = $data['address'];
        $book->arrival = $data['arrival'];
        $book->service = $data['service'];
    }
}

?>


<body>
    <?php include('../includes/sidebar.php') ?>
    <div class="main-content">
        <h1>Update Customer</h1>
        <a class="back" href="customer.php"><i class='bx bx-caret-left'></i>Back</a>
        <div class="add-form-container">
            <form class="add-form" action="editcustomer.php" method="post">
                <input type="text" hidden name="customer-id" value="<?php echo $data['id']; ?>">
                <label for="name">Full Name</label>
                <input type="text" required placeholder="Enter name" name="name"
                    value="<?php if (isset($_POST['name'])) {
                            echo $_POST['name'];
                        } else {
                            echo $data['name'];
                        } ?>">

                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="Enter email"
                    value="<?php if (isset($_POST['email'])) {
                            echo $_POST['email'];
                        } else {
                            echo $data['email'];
                        } ?>">

                <label for="number">Number</label>
                <input type="number" id="number" name="number" min="0" required placeholder="Enter number" value="<?php if (isset($_POST['number'])) {
                                echo $_POST['number'];
                            } else {
                                echo $data['number'];
                            } ?>">

                <label for="address">address</label>
                <input type="text" id="address" name="address" required placeholder="Enter address" value="<?php if (isset($_POST['address'])) {
                                echo $_POST['address'];
                            } else {
                                echo $data['address'];
                            } ?>">

                <label for="arrival">Arrival</label>
                <input type="date" id="arrival" name="arrival" min="2022-12-10" required placeholder="Enter arrival" value="<?php if (isset($_POST['arrival'])) {
                    echo $_POST['arrival'];
                                } else {
                    echo $data['arrival'];
                                } ?>">

                <label for="service">address</label>
                <select name="service" id="service">
               <option value="None" <?php if (isset($_POST['service'])) {
                           if ($_POST['service']=='None')
                              echo ' selected="selected"';
                        } elseif ($book->service == 'None') echo ' selected="selected"' ?>
                  >--Select--</option>

               <option value="Change Oil" <?php if (isset($_POST['service'])) {
                           if ($_POST['service']=='Change Oil')
                              echo '
                  selected="selected"';
                        }elseif ($book->service == 'Change Oil') echo ' selected="selected"' ?>>Change Oil</option>

               <option value="CVT Cleaning" <?php if (isset($_POST['service'])) {
                           if ($_POST['service']=='CVT Cleaning')
                              echo '
                  selected="selected"';
                        } elseif ($book->service == 'CVT Cleaning') echo ' selected="selected"' ?>>CVT Cleaning</option>

               <option value="Suspension Tuning" <?php if (isset($_POST['service'])) {
                           if ($_POST['service']=='Suspension Tuning')
                              echo '
                  selected="selected"';
                        }elseif ($book->service == 'Suspension Tuning') echo ' selected="selected"' ?>>Suspension Tuning</option>

               <option value="Engine Overhaul" <?php if (isset($_POST['service'])) {
                           if ($_POST['service']=='Engine Overhaul')
                              echo '
                  selected="selected"';
                        }elseif ($book->service == 'Engine Overhaul') echo ' selected="selected"' ?>>Engine Overhaul</option>

               <option value="F.I. Cleaning" <?php if (isset($_POST['service'])) {
                           if ($_POST['service']=='F.I. Cleaning')
                              echo '
                  selected="selected"';
                        }elseif ($book->service == 'F.I. Cleaning') echo ' selected="selected"' ?>>F.I. Cleaning</option>

               <option value="Wiring Works" <?php if (isset($_POST['service'])) {
                           if ($_POST['service']=='Wiring Works')
                              echo '
                  selected="selected"';
                        }elseif ($book->service == 'Wiring Works') echo ' selected="selected"' ?>>Wiring Works</option>
            </select>

                <input type="submit" class="button" value="Save Changes" name="save" id="save">
            </form>
        </div>

</body>

</html>