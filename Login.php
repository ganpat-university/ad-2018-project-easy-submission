<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $uname=$_POST['username'];
    $password=md5($_POST['password']);
    $sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':uname', $uname, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);

    if($query->rowCount() > 0)
    {

        $_SESSION['alogin']=$_POST['username'];
        if($uname=="admin")
        {
            $_SESSION['identity']="admin";
        }
        if($uname=="ketan")
        {
            $_SESSION['identity']="Student";
        }
        if($uname=="professor")
        {
            $_SESSION['identity']="Professor";
        }

      /*  $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "srms";

// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT identity FROM admin where username='admin'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["identity"]."<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    */

         echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
    } else{

        echo "<script>alert('Invalid Details');</script>";

    }


}

?>

<!DOCTYPE html>
<head>
    <title>Login Page</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/mainlogin.css">
</head>

<div class="limiter">
    <div class="container-login100" style="background-image: url('abc.jpg')">
        <div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					EASY SUBMISSION
				</span>
            <form class="login100-form p-b-33 p-t-5" method = "post" >

                <div class="wrap-input100 ">
                    <input class="input100" type="text" name="username" placeholder="User name">
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                </div>

                <div class="wrap-input100 ">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>

                <div class="container-login100-form-btn m-t-32">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
</body>
</html>