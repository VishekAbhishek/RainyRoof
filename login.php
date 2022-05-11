<?php 

    $email = $_POST["email"];
    $upass = $_POST["upass"];

    $Database_Connection = new mysqli("localhost", "root", "", "mydb");

    if($Database_Connection->connect_errno)
    {
        echo "<h1>Connetion Failed...</h1>" . $Database_Connection->connect_error;
        exit();    
    }

    $statement = $Database_Connection->prepare("SELECT * FROM user_info WHERE email = ?");
    $statement->bind_param("s", $email);
    $statement->execute();
    $result = $statement->get_result();

    if($result->num_rows > 0)
    {
        $data = $result->fetch_assoc();
        if($data['Password'] === $upass)
            include("index.html");
        else 
            echo "<h1>Invalid Password</h1>";
    }
    else 
    {
        echo "<h1>Invalid Username</h1>";
    }

    $statement->close();
    $Database_Connection->close();
    
?>