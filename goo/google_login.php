<?php
require('http.php');
require('oauth_client.php');
require('config.php'); 

$client = new oauth_client_class;

// set the offline access only if you need to call an API
// when the user is not present and the token may expire
$client->offline = FALSE;

$client->debug = false;
$client->debug_http = true;
$client->redirect_uri = REDIRECT_URL;

$client->client_id = CLIENT_ID;
$application_line = __LINE__;
$client->client_secret = CLIENT_SECRET;

if (strlen($client->client_id) == 0 || strlen($client->client_secret) == 0)
  die('Please go to Google APIs console page ' .
          'http://code.google.com/apis/console in the API access tab, ' .
          'create a new client ID, and in the line ' . $application_line .
          ' set the client_id to Client ID and client_secret with Client Secret. ' .
          'The callback URL must be ' . $client->redirect_uri . ' but make sure ' .
          'the domain is valid and can be resolved by a public DNS.');

/* API permissions
 */
$client->scope = SCOPE;
if (($success = $client->Initialize())) {
  if (($success = $client->Process())) {
    if (strlen($client->authorization_error)) {
      $client->error = $client->authorization_error;
      $success = false;
    } elseif (strlen($client->access_token)) {
      $success = $client->CallAPI(
              'https://www.googleapis.com/oauth2/v1/userinfo', 'GET', array(), array('FailOnAccessError' => true), $user);
    }
  }
  $success = $client->Finalize($success);
}
if ($client->exit)
  exit;
if ($success) {
  // Now check if user exist with same email ID
  $sql = "SELECT COUNT(*) AS count from customer where cus_email = :email_id";
  try {
    $stmt = $DB->prepare($sql);
    $stmt->bindValue(":email_id", $user->email);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if ($result[0]["count"] > 0) {
      // User Exist 

      $_SESSION["name"] = $user->name;
      $_SESSION["email"] = $user->email;
      $_SESSION["new_user"] = "no";

     
    } else {
      // New user, Insert in database
      // $sql = "INSERT INTO `users` (`name`, `email`) VALUES " . "( :name, :email)";
      $sql = "INSERT INTO `customer` (`cus_name`, `cus_email`) VALUES " . "( :name, :email)";
      $stmt = $DB->prepare($sql);
      $stmt->bindValue(":name", $user->name);
      $stmt->bindValue(":email", $user->email);
      $stmt->execute();
      $result = $stmt->rowCount();
      if ($result > 0) {
        $_SESSION["name"] = $user->name;
        $_SESSION["email"] = $user->email;
        $_SESSION["new_user"] = "yes";
        $_SESSION["e_msg"] = "";

      }
    }
  } catch (Exception $ex) {
    $_SESSION["e_msg"] = $ex->getMessage();
  }

  $_SESSION["user_id"] = $user->id;

} else {
  $_SESSION["e_msg"] = $client->error;
}
 $_SESSION["user_id"];

if(isset($_SESSION['email'])){

            include("../condb.php");

            $email = $_SESSION['email'];
            $sql="SELECT * FROM customer WHERE  cus_email='$email' ";

            $result = mysqli_query($condb,$sql);
            if(mysqli_num_rows($result)==1){
                $row = mysqli_fetch_array($result);
                $_SESSION["cus_id"] = $row["cus_id"];
                $_SESSION["cus_name"] = $row["cus_name"];
                $_SESSION["cus_status"] = $row["cus_status"];
                if($_SESSION["cus_status"]=='ONLINE'){
                  Header("Location: ../views/welcome.php");
                }

                if ($_SESSION["cus_status"]!='ONLINE'){   

                  echo "<script>";
                    echo "alert(\" ถูกระงับการใช้งาน\");"; 
                    echo "window.location = 'index.php'; ";
                  echo "</script>";

                }

            }else{
              echo "<script>";
                  echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                  echo "window.history.back()";
              echo "</script>";

    }
    // header("location:../views/welcome.php");
  }


exit;

?>
<script>
    var log={
        name_log:$(name),
        email_log:$(email)
    }

  $.ajax({
			type: "POST",
			contentType: "application/json",
			url: "/chklogin.php",
			data: JSON.stringify(log),
			dataType: 'json',
			success: function (log) {

      },
        error: function (e) {
				alert("ERROR: table3", e);
				console.log("ERROR: table3", e);
			}
		});

</script>