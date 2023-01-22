<?php $page_title = 'Admin | Dashboard' ?>
<?php $dashboard = 'active' ?>
<?php include('../includes/header.php') ?>
<?php require_once '../tools/variables.php' ?>




<body>
    <?php include('../includes/sidebar.php') ?>
    <div class="welcome">
    <h1>Welcome to Kenoh Customs Dashboard</h1>
    </div>
    <div class="home-content">
        <div class="overview-boxes">
            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Admins

                    <?php
                        $connection = mysqli_connect("localhost","root","","kcltd");

                        $query = "SELECT id FROM admins ORDER BY id";
                        $query_run = mysqli_query($connection, $query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h1> '.$row.' </h1>';
                    ?>
                    </div>
                    <div class="indicator">
                        
                        <span class="text">As of <?php echo ' ' . date("m-d-Y"); ?></span>
                    </div>
                </div>
                <i class="fa-solid fa-user"></i>
            </div>

            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Customers

                    <?php
                        $connection = mysqli_connect("localhost","root","","kcltd");

                        $query = "SELECT id FROM customers ORDER BY id";
                        $query_run = mysqli_query($connection, $query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h1> '.$row.' </h1>';
                    ?>

                    </div>
                    <div class="indicator">
                        
                        <span class="text">As of <?php echo ' ' . date("m-d-Y"); ?></span>
                    </div>
                </div>
                <i class="fa-solid fa-users"></i>
            </div>

            <div class="box">
                <div class="right-side">
                    <div class="box-topic">Total Mechanics

                    <?php
                        $connection = mysqli_connect("localhost","root","","kcltd");

                        $query = "SELECT id FROM mecahnics ORDER BY id";
                        $query_run = mysqli_query($connection, $query);

                        $row = mysqli_num_rows($query_run);

                        echo '<h1> '.$row.' </h1>';
                    ?>

                    </div>

                    <div class="indicator">
                        
                        <span class="text">As of <?php echo ' ' . date("m-d-Y"); ?></span>
                    </div>
                </div>
                <i class="fa-solid fa-wrench"></i>
            </div>

            
        </div>

    </div>
    
</body>

</html>