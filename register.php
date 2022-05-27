<?php
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['Email'];
        $phone = $_POST['Phone'];
        $password = $_POST['Password'];
        
        $connection = mysqli_connect('localhost','root','','elitecars');
        if(!$connection)
        {
            echo "Connection failed"; 
        }
    if(isset($_POST['submit'])){

        $insert_query = "INSERT INTO `registration` (`name`, `username`, `Email`, `Phone Number`, `password`)VALUES ('$name', '$username', '$email', '$phone', '$password')";
    
        if(mysqli_query($connection, $insert_query)){
            echo "<script>alert('Wow! User Registration Completed.')</script>"."<br>";
            header("refresh:3; url= index.html");
        }else{
            echo "Insertion failed"."<br>";
            header("refresh:3; url=index.html");
        }
    }
    else{
        echo "Some Error occured";
        header("refersh:2; url=index.html");
    }
?>