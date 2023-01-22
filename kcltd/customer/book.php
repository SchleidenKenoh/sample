<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Book Service</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<!-- header section starts  -->

<section class="header">

   <a href="home.php" class="logo">Kenoh Customs</a>

   <nav class="navbar">
      <a href="home.php">home</a>
      <a href="about.php">about</a>
      <a href="package.php">packages</a>
      <a href="book.php">book</a>
      <a href="login.php" id="logout">logout</a>
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section>

<!-- header section ends -->

<div class="heading" style="background:url(images/header-bg-1.jpg) no-repeat">
   <h1>book now</h1>
</div>

<!-- booking section starts  -->

<?php require_once '../class/book.class.php'; ?>

<?php
require_once '../tools/functions.php';
if (isset($_POST['save'])) {

   $book = new Book;

   //sanitize user inputs
   $book->name = htmlentities($_POST['name']);
   $book->email = htmlentities($_POST['email']);
   $book->number = htmlentities($_POST['number']);
   $book->address = htmlentities($_POST['address']);
   $book->arrival = htmlentities($_POST['arrival']);
   $book->service = htmlentities($_POST['service']);

   if ($book->add()) {
      header('location: book.php');
   }



}
?>

<section class="booking">

   <h1 class="heading-title">book our service!</h1>

   <form action="connect.php" method="post" class="book-form">

      <div class="flex">
         <div class="inputBox">
            <span>Name</span>
            <input type="text" required placeholder="Enter your name" name="name">
         </div>
         <div class="inputBox">
            <span>Email</span>
            <input type="email" required placeholder="Enter your email" name="email">
         </div>
         <div class="inputBox">
            <span>Phone</span>
            <input type="text" required placeholder="Enter your number" name="number">
         </div>
         <div class="inputBox">
            <span>Address</span>
            <input type="text" required placeholder="Enter your address" name="address">
         </div>
         <div class="inputBox">
            <span>Date of Arrival</span>
            <input type="date" name="arrival" min="2022-12-10">
         </div>
         <div class="inputBox">
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
         </div>
      </div>

      <input type="submit" value="submit" class="btn" name="save">

   </form>

</section>

<!-- booking section ends -->

















<!-- footer section starts  -->

<section class="footer">

   <div class="box-container">
         
   <div class="box">
         <h3>contact info</h3>
         <a href="#"> <i class="fas fa-phone"></i> +63 926 259 0076</a>
         <a href="#"> <i class="fas fa-phone"></i> +63 935 431 3397</a>
         <a href="#"> <i class="fas fa-envelope"></i> kenoh-customs@gmail.com </a>
         <a href="#"> <i class="fas fa-map"></i> Zamboanga City, Philippines 7000</a>
      </div>

      <div class="box">
         <h3>follow us</h3>
         <a href="#"> <i class="fab fa-facebook-f"></i> facebook.com/kenohcustoms </a>
         <a href="#"> <i class="fab fa-twitter"></i> twitter.com/kenoh.customs </a>
         <a href="#"> <i class="fab fa-instagram"></i> instagram.com/kenoh.customs</a>
         <a href="#"> <i class="fab fa-linkedin"></i> linkedin.com/kenoh.customs</a>
      </div>

   </div>

   

</section>


<!-- footer section ends -->









<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>