<?php
require_once 'db.php';
$result = $db->query('SELECT * FROM employees');
$employees = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employees List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Employees List</div>
                <table class="table ">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Education</th>
                        <th>Salary</th>
                        <th>Phone</th>
                        <th>MORE</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($employees as $employee) { ?>
                        <tr>
                            <td> <?= $employee['id'] ?></td>
                            <td> <?= $employee['name'] ?></td>
                            <td> <?= $employee['surname'] ?></td>
                            <td> <?= $employee['education'] ?></td>
                            <td> <?= $employee['salary'] ?></td>
                            <td> <?= $employee['phone'] ?></td>
                            <td><a class="btn btn-light" href="employee.php?id=<?=$employee['id']?>">More</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>
</html>