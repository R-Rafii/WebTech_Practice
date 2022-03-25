<?php
if(isset($_REQUEST['mLogin'])){

    include ('database.php');
		
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    if($username != null && $password != null){
        
       
    $sql = "SELECT * FROM Login WHERE UserName = '{$username}' AND UserPassword = '{$password}'";
    $sqlm = "SELECT * FROM Login WHERE UserName = '{$username}' AND UserPassword = '{$password}' AND UserRole = 'manager'";
    $sqlw = "SELECT * FROM Login WHERE UserName = '{$username}' AND UserPassword = '{$password}' AND UserRole = 'worker'";
    $sqls = "SELECT * FROM Login WHERE UserName = '{$username}' AND UserPassword = '{$password}' AND UserRole = 'seller'";
     $result = mysqli_query($con,$sql);
     $role1 = mysqli_query($con,$sqlm);
     $role2 = mysqli_query($con,$sqlw);
     $role3 = mysqli_query($con,$sqls);
     
     if(mysqli_num_rows($result))
    {
        setcookie('m_status', 'true', time()+4600, '/');
        if(mysqli_num_rows($role1)){
            header('location: u1.php');
        }
        else if(mysqli_num_rows($role2)){
            header('location: u2.php');
        }
        else if(mysqli_num_rows($role3)){
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