<?php 
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $upass = $_POST["upass"];

    $Database_Connection = new mysqli("localhost", "root", "", "mydb");

    if($Database_Connection->connect_errno)
    {
        die("<h1>Connetion Failed...</h1>" . $Database_Connection->connect_error); 
    }

    $statement = $Database_Connection->prepare("INSERT INTO user_info (First_Name, Last_Name, Mobile_Number, email, password) VALUES(?,?,?,?,?)");
    $statement->bind_param("ssiss", $fname, $lname, $mobile, $email, $upass);
    $statement->execute();
    include("login.html");

    echo '<script> alert("sign up sucessesfully"</script>';

    $statement->close();
    $Database_Connection->close();
    
?>