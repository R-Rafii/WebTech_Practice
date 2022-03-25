<?php 

	require('db.php');

	function login($username, $password){
		$c = getConnection();
        //global $role ; 
        $sql = "SELECT * FROM Login WHERE UserName = '{$username}' AND UserPassword = '{$password}'";
        $sqlm = "SELECT * FROM Login WHERE UserName = '{$username}' AND UserPassword = '{$password}' AND UserRole = 'manager'";
        $sqlw = "SELECT * FROM Login WHERE UserName = '{$username}' AND UserPassword = '{$password}' AND UserRole = 'worker'";
        $sqls = "SELECT * FROM Login WHERE UserName = '{$username}' AND UserPassword = '{$password}' AND UserRole = 'seller'";
         $result = mysqli_query($c,$sql);
         $role1 = mysqli_query($c,$sqlm);
         $role2 = mysqli_query($c,$sqlw);
         $role3 = mysqli_query($c,$sqls);
		$result = mysqli_query($c, $sql);
		if(mysqli_num_rows($result)){
			return true;
            if (mysqli_num_rows($role1))
            {
                
                 $GLOBAL['role'] = "manager" ;
            }
            else if (mysqli_num_rows($role2))
            {
                $GLOBAL['role'] = "worker" ;
            }
            else if (mysqli_num_rows($role3))
            {
                $GLOBAL['role'] = "seller" ;
            }
		}else{
			return false;
		}
	}

?>