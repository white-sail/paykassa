<?php
//index.php
session_start();
include 'db/db-connect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>AutoKey paynet</title>
</head>
<body>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-4">

                    <?php if (isset($_SESSION['message'])) :?>
                        <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
                    <?php
                        unset($_SESSION['message']);
                        endif;
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h3>ХИСОБ РАКАМЛАРИ
                                <a href="xisob-raqam.php" class="btn btn-primary float-end">Add</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-light table-hover">
                                <thead>
                                    <tr>
                                        <th>Т/р</th>
                                        <th>Туман коди</th>
                                        <th>Хисоб раками</th>
                                        <th>Хисоб ракам маъумлти</th>
                                        <th>Izov id</th>
                                        <th>Тахрирлаш</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM xisobraqam";
                                        $statement = $conn->prepare($query);
                                        $statement-> execute();

                                        $statement->setFetchMode(PDO::FETCH_OBJ);
                                        $result =   $statement-> fetchAll();
                                        if ($result){
                                            foreach ($result as $row){
                                                ?>
                                                    <tr>
                                                        <td><?= $row->id; ?></td>
                                                        <td><?= $row->id_tuman; ?></td>
                                                        <td><?= $row->xRaqam; ?></td>
                                                        <td><?= $row->description; ?></td>
                                                        <td><?= $row->description_id; ?></td>
                                                        <td>
                                                            <a href="edit_xisobraqam.php?id=<?= $row->id; ?>" class="btn btn-outline-success">Тахрирлаш</a>
                                                        </td>
                                                    </tr>
                                                <?php

                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="5"> No Record Found </td>
                                                </tr>
                                            <?php
                                        }

                                    ?>


                                </tbody>
                            </table>
                        </div>


                    </div>

                </div>

            </div>
        </div>


<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>