<?php
$host = "localhost";
$user = "root";
$password = "";
$db_name= "eservices_db";

//create connections
$conn = new mysqli($host,$user,$password,$db_name);

if($conn->connect_error){
    die("Opps! connection failed");
}
/* else{
    echo "Connection Ok:)";
} */

?>