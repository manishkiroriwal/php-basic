<?php
// include 'first.php';//include if cause any error then it preceed to next line.
// require 'first.php';  ---> if it cause any error then it stop where it occurs.
// $a = readfile("myfile.txt");

$fptr = fopen("myfile.txt","r");
if(!$fptr){
    die("Unable to open the file. Please enter a valid filename");
}
else{
    // $content = fread($fptr,filesize("myfile.txt"));
    // echo $content;

    // while($a=fgets($fptr)){//reading the file line by line
    //     echo $a;
    // }


    while($a=fgetc($fptr)){//reading the file char by char
        echo $a;
        // break;
        if($a =="."){
            break;
        }
    }
}
fclose($fptr);
?>