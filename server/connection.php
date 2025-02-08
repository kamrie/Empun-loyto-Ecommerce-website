<?php

// to connect to the database, we need to call this function an it has 4 parameters
            //hostname,username, password, databasename
$conn = mysqli_connect("localhost","root","", "mirabella_project")
         or die("couldn't connect to database");
         

// if (! $conn){
//     die("connection failed: " . mysqli_connect_error());
// }


?>

