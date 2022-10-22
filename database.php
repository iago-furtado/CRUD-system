<?php

class database{
  private $servername = "172.31.22.43";
  private $username   = "Iago200507139";
  private $password   = "3AoppHwZNO";
  private $database   = "Iago200507139";
  public  $con;


  // Database Connection
  public function __construct()
  {
    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
    if(mysqli_connect_error()) {
      trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
    }else{
      return $this->con;
    }
  }

  // Insert stocks data into investiment portifolio table
  public function insertData($post)
  {
    $cod = $this->con->real_escape_string($_POST['cod']);
    $companyName = $this->con->real_escape_string($_POST['companyName']);
    $qtt = $this->con->real_escape_string($_POST['qtt']);
    $price = $this->con->real_escape_string($_POST['price']);
    $query="INSERT INTO portfolio(cod,companyName,qtt,price) VALUES('$cod','$companyName','$qtt','$price')";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:index.php?msg1=insert");
    }else{
      echo "Could not add the record";
    }
  }

  // // fetch all the records(Read)
  // public function read($id = null){
  //   $sql = "SELECT * FROM portfolio";
  //   if($id){
  //     $sql .= " WHERE id= $id";
  //   }
  //   $res = mysqli_query($this->con, $sql);
  //   return $res;
  // }

  // public function sanitize($var){
  //   $return = mysqli_real_escape_string($this->con, $var);
  //   return $return;
  // }

  public function displayData()
  {
    $query = "SELECT * FROM portfolio";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }else{
      echo "No found records";
    }
  }

// fetch record by id(Read and  Update)
  public function displyaRecordById($id)
  {
    $query = "SELECT * FROM portfolio WHERE id = '$id'";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row;
    }else{
      echo "Record not found";
    }
  }

  // Update portfolio data into portfolio table
  public function updateRecord($postData)
  {
    $cod = $this->con->real_escape_string($_POST['ucod']);
    $companyName = $this->con->real_escape_string($_POST['ucompanyName']);
    $qtt = $this->con->real_escape_string($_POST['uqtt']);
    $price = $this->con->real_escape_string($_POST['uprice']);
    $id = $this->con->real_escape_string($_POST['id']);
    if (!empty($id) && !empty($postData)) {
      $query = "UPDATE portfolio SET cod = '$cod', companyName = '$companyName', qtt = '$qtt', price = '$price' WHERE id = '$id'";
      $sql = $this->con->query($query);
      if ($sql==true) {
        header("Location:index.php?msg2=update");
      }else{
        echo "Registration updated failed try again!";
      }
    }
  }

  // Delete portfolio data from portfolio table
  public function deleteRecord($id)
  {
      $query = "DELETE FROM portfolio WHERE id = '$id'";
      $sql = $this->con->query($query);
      if ($sql==true) {
        header("Location:index.php?msg3=delete");
      }else{
        echo "Record does not delete try again";
      }
  }
}
?>