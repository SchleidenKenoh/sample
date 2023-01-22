<?php $page_title = 'Mechanics' ?>
<?php $mechanicss = 'active' ?>
<?php include('../includes/header.php') ?>
<?php require_once '../tools/variables.php' ?>


<body>
    <?php include('../includes/sidebar.php') ?>
    <div class="main-content">
        <h1>Mechanics List</h1>
        <div class="table-heading">

            <a href="newmechanic.php" class="mec-btn">Add New Mechanic</a>
            
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Status</th>
                    <th class="action">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php

                    require_once '../class/mechanics.class.php';
                    $mechanic = new Mechanic();

                    foreach ($mechanic->show() as $value) { //start of loop
                ?>
                    <tr>
                        <!-- always use echo to output PHP values -->
                        <td><?php echo $value['id'] ?>
                        <td><?php echo $value['firstname'] . ' ' . $value['lastname'] ?>
                        <td><?php echo $value['email'] ?></td>
                        <td><?php echo $value['number'] ?></td>
                        <td><?php echo $value['status'] ?></td>
                        <td>
                            <div class="action">
                                <a class="action-edit" href="editmechanic.php?id=<?php echo $value['id'] ?>">Edit</a>
                                <a class="action-delete" href="deletemechanic.php?id=<?php echo $value['id'] ?>">Delete</a>
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