<?php

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// $mailheader = "From:".$name."<".$email.">\r\n"

// $recipient = "contactme12435@gmail.com"

// mail($recipient,$subject,$message,$mailheader)
// Database connection
$conn = new mysqli('localhost','root','','test1');
if($conn->connection_error){
    die('Connection Failed : '.conn->connection_error);
}else{
    $stmt=$conn->prepare("insert into registration(name,email,subject,message)
    values(?,?,?,?)");
    $stmt->bind_param("ssss",$name,$email,$subject,$message);
    $stmt-> execute();
    echo'
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="form.css">
        <title>Document</title>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h1>Thank You for sending your feedback in my website I hope you enjoy exploring it.</h1>
            <p class="back">Go back to the <a href="Index.html">Home</a>.</p>
        </div>
    </body>
    </html>
    
    
    
    ';
    $stmt->close();
    $conn->close();
}
?>

