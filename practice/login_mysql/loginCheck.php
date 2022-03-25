<?php
require('userModel.php');
if(isset($_REQUEST['mLogin'])){

    include ('database.php');
		
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    if($username != null && $password != null){

        $status = login($username, $password);
        
       
   
     
     if($status)
    {
        echo "o" ;
        setcookie('m_status', 'true', time()+4600, '/');
        if($role = "manager"){
            header('location: u1.php');
        }
        else if($role = "worker"){
            header('location: u2.php');
        }
        else if($role = "seller"){
            header('location: u3.php');
        }
        
    }
    else {
        echo "not ok";

    }
            // setcookie('m_status', 'true', time()+4600, '/');
            //header('location: ../m_views/m_Home.php');
        
        //echo 'invalid username/password   <br><br><a href="../m_views/m_login.php">Back</a>';
        }
        else{
        echo 'null submission  <br><br>';
    }
}

?>