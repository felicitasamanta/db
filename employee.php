<?php
require_once 'db.php';
$id=$_GET['id'];
$stm = $db->prepare("SELECT * FROM employees WHERE id=?" );
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    <link href="./style.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5"
<div>
    <div class="card col-sm-6 col-md-5 mx-auto">
        <div class="card-header">Employee paycheck</div>
        <div class="card-body">
            Employee full name: <?=$employee['name']." ".$employee['surname'] ?> <br>
            Education: <?=$employee['education'] ?> <br>
            Salary VAT: <?=$employee['salary'] ?> EUR
            <hr>
        </div>
        <table class="table table-striped">

            <tr>
                <th class="col-3">NPD:</th>
                <td class="col-2">skaiciavimas</td>
            </tr>
            <tr>
                <th class="col-3"> Pajamų mok. 20%:</th>
                <td class="col-2">
                </td>
            </tr>
            <tr>
                <th class="col-3"> Sveikatos draudimas 6.98 %:</th>
                <td class="col-2"><?= $employee['salary'] * 0.0698 ?> EUR</td>
            </tr>
            <tr>
                <th class="col-3">Soc. draudimas 12.52 %:</th>
                <td class="col-2"><?= $employee['salary'] * 0.1252 ?> EUR</td>
            </tr>
            <tr>
                <th class="col-3">Į rankas:</th>
                <td class="col-2"><?= $employee['salary'] - ( $employee['salary'] * 0.0698 + $employee['salary'] * 0.1252 )?> EUR</td>
            </tr>
            <tr>
                <th class="col-sm-6 col-md-5 text-center ">Darbdavio sąnaudos:</th>

            </tr>
            <tr>
                <th class="col-3">Sodra 1.77 %:</th>
                <td class="col-2"><?=$employee['salary'] * 0.0177 ?> EUR</td>
            </tr>
            <tr>
                <th class="col-3">Visa darbo vieta:</th>
                <td class="col-2"><?=$employee['salary'] * 1.0177 ?> EUR</td>
            </tr>

        </table>
    </div>
</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>