<?php
    $con = mysqli_connect('localhost','root','','test');
    $sql = "insert into Persons (PersonID, LastName, FirstName, Address, City) VALUES (01, 'rafi', 'raihan', '100 ulon', 'Dhaka')";
    mysqli_query($con,$sql);

?>