<?php
require_once 'db.php';
if (isset($_GET['delete'])) {
    $stm = $db->prepare('DELETE  FROM employees WHERE id=? ');
    $stm->execute([$_GET['delete']]);

}
$result = $db->query('SELECT employees.*, positions.name as position FROM employees
LEFT JOIN positions ON employees.position_id = positions.id ');
$employees = $result->fetchAll(PDO::FETCH_ASSOC);


$stm = $db->prepare("SELECT id,name FROM positions");
$stm->execute([]);
$positions = $stm->fetchAll(PDO::FETCH_ASSOC);


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

        <div class="mt-5 col-sm-12 col-md-12 col-lg-12 mb-3">
            <div class="card">
                <div class="card-header fw-bold bg-primary">Employees by positions</div>
                <div class="card-body d-flex gap-3">
                    <?php foreach ($positions as $position) { ?>
                        <a href="position.php?id=<?= $position['id'] ?>"
                           class="btn btn-info"><?= $position['name'] ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="mt-5 col-sm-12 col-md-12 col-lg-12 mb-3">
            <div class="card">
                <div class="card-header fw-bold bg-primary">Employees List</div>
                <div class="card-body">
                    <a href="new.php" class="btn btn-success float-end">New employee</a>
                    <table class="table table-striped ">

                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Education</th>
                            <th>Position</th>
                            <th>Salary</th>
                            <th>Phone</th>
                            <th>MORE</th>
                            <th>UPDATE</th>
                            <th>DELETE</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($employees as $employee) { ?>
                            <tr>
                                <td> <?= $employee['name'] ?></td>
                                <td> <?= $employee['surname'] ?></td>
                                <td> <?= $employee['education'] ?></td>
                                <td> <?= $employee['position'] ?></td>
                                <td> <?= $employee['salary'] ?> EUR</td>
                                <td> <?= $employee['phone'] ?></td>
                                <td><a class="btn btn-primary" href="employee.php?id=<?= $employee['id'] ?>">More</a>
                                </td>
                                <td><a class="btn btn-info" href="update.php?id=<?= $employee['id'] ?>">Update</a></td>
                                <td><a class="btn btn-danger" href="index.php?delete=<?= $employee['id'] ?>">Delete</a>
                                </td>
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