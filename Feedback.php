<?php
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $phone = $_POST['phonenumber'];       
        $subject = $_POST['subject'];
        
        $connection = mysqli_connect('localhost','root','','elitecars');
        if(!$connection)
        {
            echo "Connection failed"; 
        }
    if(isset($_POST['submit'])){

        $insert_query = "INSERT INTO `feedback` (`First Name`, `Last Name`, `Phone Number`, `Subject`) VALUES ('yash', 'chaurasiya', '1234567895', 'hello');";
    
        if(mysqli_query($connection, $insert_query)){
            echo "<script>alert('Wow! User Registration Completed.')</script>"."<br>";
            header("refresh:3; url= index.html");
        }else{
            echo "<script>alert('Wow! User Registration Completed.')</script>"."<br>";
            header("refresh:3; url=index.html");
        }
    }
    else{
        echo "Some Error occured";
        header("refersh:2; url=index.html");
    }
?>