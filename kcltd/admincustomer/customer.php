<?php require_once '../tools/variables.php' ?>
<?php $page_title = 'Customers' ?>
<?php $customer = 'active' ?>
<?php include('../includes/header.php') ?>
<body>
    <?php include('../includes/sidebar.php') ?>
    <div class="main-content">
        <h1>Customers List</h1>
        <div class="table-heading">

            <a href="newcustomer.php" class="nc-button">Add New Customer</a>

        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Address</th>
                    <th>Arrival</th>
                    <th>Service</th>
                    <th class="action">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php

                require_once '../class/book.class.php';
                $book = new Book();

                foreach ($book->show() as $value) { //start of loop
                ?>
                <tr>
                    <!-- always use echo to output PHP values -->
                    <td>
                        <?php echo $value['id'] ?>
                    <td>
                        <?php echo $value['name'] ?>
                    <td>
                        <?php echo $value['email'] ?>
                    </td>
                    <td>
                        <?php echo $value['number'] ?>
                    </td>
                    <td>
                        <?php echo $value['address'] ?>
                    </td>
                    <td>
                        <?php echo $value['arrival'] ?>
                    </td>
                    <td>
                        <?php echo $value['service'] ?>
                    </td>
                    <td>
                        <div class="action">
                            <a class="action-edit" href="editcustomer.php?id=<?php echo $value['id'] ?>">Edit</a>
                            <a class="action-delete" href="deletecustomer.php?id=<?php echo $value['id'] ?>">Delete</a>
                        </div>
                    </td>
                </tr>
                <?php

                    //end of loop
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>