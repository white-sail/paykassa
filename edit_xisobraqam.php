<?php
include "db/db-connect.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Xisob raqam taxrirlash</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-8 mt-4">

            <div class="card">
                <div class="card-header">
                    <h3>Хисоб ракамни янгилаш
                        <a href="index.php" class="btn btn-danger float-end">Оркага</a>
                    </h3>
                </div>
                <div class="card-body">
                    <?php
                        if (isset($_GET['id'])){

                            $xisobr_id = $_GET['id'];
                            $query = "SELECT * FROM xisobraqam WHERE id=:x_id LIMIT 1";
                            $statement = $conn->prepare($query);
                            $data = [':x_id'=> $xisobr_id];
                            $statement->execute($data);

                            $result = $statement->fetch(PDO::FETCH_OBJ);


                        }
                    ?>
                    <form action="code.php" method="POST">
                        <div class="mb-3">
                            <label>Туман коди</label>
                            <input type="text" name="tKod" value="<?= $result->id_tuman?>" class="form-control"/>
                        </div>
                        <div class="mb-3">
                            <label>Хисоб раками</label>
                            <input type="text" name="xRaqam"  value="<?= $result->xRaqam?>" class="form-control"/>
                        </div>
                        <div class="mb-3">
                            <label>Хисоб ракам маълумотлари</label>
                            <textarea name="xInfo"  cols="30" rows="5" class="form-control"><?= $result->description ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Маълумотлар тартиби</label>
                            <input type="text" name="xKod"  value="<?= $result->description_id?>" class="form-control"/>
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="edit_xisobraqam_btn" class="btn btn-primary">Маълумотни саклаш</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>


<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>