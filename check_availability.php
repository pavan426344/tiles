<?php
$isAvailable = true;

switch ($_POST['type']) {
    
    case 'username':
    default:
        $username = $_POST['username'];
        include("config.php");

  $result = mysqli_query($con,"select * from userregistration where username='$username'");
  $row = mysqli_fetch_row($result);
  $user_count = $row[0];
  if($user_count>0) {
      $isAvailable = true; // or false
  }else{
     $isAvailable = false; // or false
  }
        $isAvailable = true; // or false
        break;
}

// Finally, return a JSON
echo json_encode(array(
    'valid' => $isAvailable,
));
?>