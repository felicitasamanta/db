<?php
require_once 'db.php';

if (isset($_POST['add'])) {
    $stm = $db->prepare("INSERT INTO employees (name, surname, education, position_id, salary, phone ) VALUES (?, ?, ?, ?, ?, ?)");
    $stm->execute([$_POST['name'], $_POST['surname'], $_POST['education'], $_POST['position_id'], $_POST['salary'], $_POST['phone']]);
    header("location: index.php");
    die();
}

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
        <div class=" col-12  mt-5 mb-3">
            <div class="card">
                <div class="card-header fw-bold bg-success">Add new employee</div>
                <div class="card-body">
                    <form method="post" action="new.php">
                        <div class="mb-3">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="surname">Surname</label>
                            <input type="text" class="form-control" name="surname">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="education">Education</label>
                            <input type="text" class="form-control" name="education">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="position">Position</label>
                            <select class="form-control" name="position_id">
                                <?php foreach ($positions as $position) { ?>
                                    <option value="<?= $position['id'] ?>"><?= $position['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="salary">Salary</label>
                            <input type="text" class="form-control" name="salary">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                        <button class="btn btn-success" name="add" value="1">Add</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
</body>
</html>