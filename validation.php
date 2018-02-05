<?php
  header("Content-Type: application/json; charset=UTF-8");
  $obj = json_decode($_GET["x"], false);

  $conn = mysqli_connect("localhost","test_user2","12345","test");
  $result = $conn->query("SELECT role FROM users WHERE email = ".$obj->email." AND password = ".$obj->password);
  $outp = array();
  $outp = $result->fetch_all(MYSQLI_ASSOC);
  if ($outp) {
    echo json_encode($outp);
  } else {
    echo json_encode("WRONG USER CREDENTIALS!");
  }

  mysqli_close($conn);
  
?>
