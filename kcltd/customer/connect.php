<?php 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['number'];
    $address = $_POST['address'];
    $dateofarrival = $_POST['arrival'];
    $service = $_POST['service'];

    //Database Connection//
    $conn = new mysqli('localhost', 'root', '', 'kcltd');
    if($conn->connect_error){
        die('Connection Failed  : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into customers(name, email, number, address, arrival, service)
            values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisss",$name, $email, $phone, $address, $dateofarrival, $service);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
?>
<html>
    <title>Booking Successful</title>
    <body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal({
  title: "Booking Successful!",
  text: "Thank you for trusting us.",
  icon: "success",
  button: "OK",
}).then(function (result) {
  if (true) {
    window.location = "home.php";
  }
})
    </script>
    </body>
</html>
