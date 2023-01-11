<?php
session_start();
include 'db/db-connect.php';

if (isset($_POST['save_xisobraqam_btn']))
{
    $xTuman = $_POST['tKod'];
    $xRaqami = $_POST['xRaqam'];
    $xInfo = $_POST['xInfo'];
    $xKod = $_POST['xKod'];

    $query = "INSERT INTO xisobraqam (id_tuman, xRaqam, description, description_id) VALUES (:id_tuman, :xRaqam, :description, :description_id)";
    $query_run = $conn->prepare($query);

    $data = [
      ':id_tuman'=>$xTuman,
      ':xRaqam'=>$xRaqami,
      ':description'=>$xInfo,
      ':description_id'=>$xKod,
        ];
    $query_execute = $query_run->execute($data);

    if ($query_execute){
        $_SESSION['message']="Inserted Successfully";
        header('Location: index.php');
        exit(0);
    }
    else
    {
        $_SESSION['message']="Not Inserted";
        header('Location: index.php');
        exit(0);
    }


}

?>