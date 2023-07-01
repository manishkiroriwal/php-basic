<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "phpdb";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    print mysqli_connect_error;
}
else{
    $sql = "SELECT * FROM `descript`";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    echo $num;
    echo "<br>";

    
    while($row = mysqli_fetch_assoc($result)){
        echo var_dump($row);
        echo "<br>";
    }
    // UPDATE `descript` SET `email` = 'home@gmail.com' WHERE `descript`.`sno.` = 1;/
    // DELETE FROM `descript` WHERE `descript`.`sno.` = 5


// mysqli_affected_rows --> it shows affected rows while updating the data in the table...
}
?>
