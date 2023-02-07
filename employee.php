<?php
require_once 'db.php';
$id = $_GET['id'];
$stm = $db->prepare("SELECT * FROM employees WHERE id=?");
$stm->execute([$id]);
$employee = $stm->fetch(PDO::FETCH_ASSOC);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="container mt-3 mb-3">
    <div>
        <h1> <?= $employee['name'] . " " . $employee['surname'] ?> </h1>
        <hr>
        <div class="row">
            <div class="col-6">
                <p class="fw-bold">Išsilavinimas: <br>
                <p> <?= $employee['education'] ?></p></p> </div>
            <div class="col-6">
                <p class="fw-bold"> Telefonas: <br>
                <p> <?= $employee['phone'] ?></p></p> </p>
            </div>

        </div>
        <div class="col-12">
            <p class=" fw-bold">Mėnesinė alga: <br>
            <p> <?= $employee['salary'] ?> EUR</p> </p></div>
        <div class="card col-md-8 col-sm-10 border border-primary">
            <div class="card-header bg-primary text-light">Mokesčiai</div>
            <div>
                <table class="table ">
                    <tr class="col-md-8 col-sm-10">
                        <td class="col-md-6 col-sm-8">Priskaičiuotas atlyginimas „ant popieriaus"</td>
                        <td class="col-md-2 col-sm-2 text-end"><?= number_format(($employee['salary']), 2) ?> EUR</td>
                    </tr>
                    <tr class="col-md-8 col-sm-10">
                        <td class="col-md-6 col-sm-8">Pritaikytas NPD</td>
                        <td class="col-md-2 col-sm-2 text-end">skaiciavimas</td>
                    </tr>
                    <tr class="col-md-8 col-sm-10">
                        <td class="col-md-6 col-sm-8"> Pajamų mokestis 20 %</td>
                        <td class="col-md-2 col-sm-2 text-end">
                        </td>
                    </tr
                    <tr class="col-md-8 col-sm-10">
                        <td class="col-md-6 col-sm-8">Sodra. Sveikatos draudimas 6.98 %</td>
                        <td class="col-md-2 col-sm-2 text-end"><?= number_format(round($employee['salary'] * 0.0698, 2), 2) ?>
                            EUR
                        </td>
                    </tr>
                    <tr class="col-md-8 col-sm-10">
                        <td class="col-md-6 col-sm-8">Sodra. Socialinis draudimas 12.52 %</td>
                        <td class="col-md-2 col-sm-2 text-end"><?= number_format(($employee['salary'] * 0.1252), 2) ?>
                            EUR
                        </td>
                    </tr>
                    <tr class="bg-primary bg-opacity-10 col-md-8 col-sm-10">
                        <td class="col-md-6 col-sm-8">Išmokamas atlyginimas „į rankas"</td>
                        <td class="col-md-2 col-sm-2 text-end fw-bold"><?= number_format(($employee['salary'] - ($employee['salary'] * 0.0698 + $employee['salary'] * 0.1252)), 2) ?>
                            EUR
                        </td>
                    </tr>
                    <tr class="col-md-8 col-sm-10">
                        <td colspan="2" class=" col-md-8 col-sm-10 fw-bold ">Darbo vietos kaina</td>

                    </tr>
                    <tr class="col-md-8 col-sm-10">
                        <td class="col-md-6 col-sm-8">Sodra 1.77 %</td>
                        <td class="col-md-2 col-sm-2 text-end"><?= number_format($employee['salary'] * 0.0177, 2) ?>
                            EUR
                        </td>
                    </tr>
                    <tr class="bg-primary bg-opacity-10 col-md-8 col-sm-10">
                        <td class="col-md-6 col-sm-8">Visa darbo vieta</td>
                        <td class="col-md-2 col-sm-2 text-end fw-bold"><?= number_format(($employee['salary'] * 1.0177), 2) ?>
                            EUR
                        </td>
                    </tr>


                </table>
            </div>
        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>