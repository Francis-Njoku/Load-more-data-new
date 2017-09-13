<?php
session_start(); 
?>
<?php
ob_start();

if(isset($_POST['email']) && isset($_POST['password']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $url = 'https://homeworks.ng/api/authenticate';
    $key = 'CWAYwater3447';
    $url .= "?email=$email&password=$password&key=$key";

    $response = file_get_contents($url);
    $responseData = json_decode($response, true);
    if($responseData['status'] == 'success')
    {
        //login successful
        $_SESSION['logged_in'] = true;
        $_SESSION['email'] = $responseData['email'];
        $_SESSION['first_name'] = $responseData['first_name'];
        $_SESSION['last_name'] = $responseData['last_name'];
        $_SESSION['phone'] = $responseData['phone'];
        $_SESSION['role'] = $responseData['role'];
        //redirect user
        $url = 'australia_index.php';
		ob_end_clean(); // Delete the buffer.
        header("Location: $url");


    }
    else
    {
        $errorMessage = $responseData['description'];
        $_SESSION['error'] = $errorMessage;
        $url = 'australia_login.php';
        header("Location: $url");


    }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
    <link href="css/scholarship.css" rel="stylesheet" type="text/css">
</head>

<body>

<div class="section">
	    	<div class="scho-login">


	<h1>Please Login to view page</h1>
	<form class="form" action="" method="post">

           <?php if(isset($_SESSION['error'])){
               $error = $_SESSION['error'];
               echo "<span class=\"alert alert-danger\">$error</span>";
           }

           ?>

			<input class="input" type="email" name="email" id="email" placeholder="Email Address"/>

			<input class="input" type="password" name="password" id="password" placeholder="password" />


            <input class="input" type="hidden" value="submitted" />
			<input class="input" type="submit" name="submit" value="login" />
			
	</form>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Not registered &nbsp;<a href="https://www.homeworks.ng/students/sign_up" style="color:#70b234; text-decoration:none;">Sign Up</a></p>
                            </div>
                        </div>
                    </div>
</div> 
                    </div>


</body>
</html>