<?php
$host = '127.0.0.1';
$db   = 'miskas';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

// $sql = "
//     SELECT id, title, height, type
//     FROM trees
// ";

$sql = "
    SELECT id, title, height, type
    FROM trees
    ORDER BY title, height DESC
";

// $sql = "
//     SELECT id, title, height, type
//     FROM trees
//     WHERE title = 'Obelis' OR title = 'Pušis'
//     ORDER BY title, height
// ";

// $sql = "
//     SELECT id, title, height, type
//     FROM trees
//     WHERE height > 10
// ";

// $sql = "
//     SELECT id, title, height, type
//     FROM trees
//     LIMIT 3
// ";

// $sql = "
//     SELECT id, title, height, type
//     FROM trees
//     WHERE title LIKE '%p%'
// ";

$nice = ['Obelis', 'Agrastas'];

$nice = array_map(fn($t) => "'".$t."'", $nice);

$niceLine = implode(',', $nice);

// $sql = "
//     SELECT id, title, height, type
//     FROM trees
//     WHERE title IN ($niceLine)
// ";

// $sql = "
//     SELECT DISTINCT id, title, height, type
//     FROM trees
// ";


$stmt = $pdo->query($sql);

$trees = $stmt->fetchAll();

// echo '<pre>';
// print_r($trees);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Rorest OR Garden?</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="card m-4">
                    <div class="card-header">
                        Plant Tree
                    </div>
                    <div class="card-body">
                        <div>
                            <pre><code><?= $_SESSION['csql'] ?? '' ?></code></pre>
                        </div>
                        <form action="http://localhost/bit-php/001/028/create.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">height</label>
                                <input type="text" name="height" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Type</label>
                                <select class="form-select" name="type_id">
                                    <option value="1">Lapuotis</option>
                                    <option value="2">Spygliuotis</option>
                                    <option value="5">Palmė</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-outline-warning m-3">Plant Tree</button>
                        </form>
                    </div>
                </div>
                <div class="card m-4">
                    <div class="card-header">
                        Grow Tree
                    </div>
                    <div class="card-body">
                        <div>
                            <pre><code><?= $_SESSION['esql'] ?? '' ?></code></pre>
                        </div>
                        <form action="http://localhost/bit-php/001/028/edit.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">height</label>
                                <input type="text" name="height" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">ID</label>
                                <input type="text" name="id" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-outline-success m-3">Grow Tree</button>
                        </form>
                    </div>
                </div>
                <div class="card m-4">
                    <div class="card-header">
                        Cut Tree
                    </div>
                    <div class="card-body">
                        <div>
                            <pre><code><?= $_SESSION['dsql'] ?? '' ?></code></pre>
                        </div>
                        <form action="http://localhost/bit-php/001/028/delete.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">ID</label>
                                <input type="text" name="id" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-outline-danger m-3">Cut Tree</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card m-4">
                    <div class="card-header">
                        Trees
                    </div>
                    <div class="card-body">
                        <div>
                            <pre><code><?= $sql ?></code></pre>
                        </div>
                        <ul class="list-group">
                            <?php foreach ($trees as $tree) : ?>
                            <li class="list-group-item">
                                <b>ID: <?= $tree['id'] ?? '*' ?></b>
                                <h2 style="display: inline-block;"><?= $tree['title'] ?></h2>
                                <i><?= $tree['height'] ?? '*' ?>m.</i>
                                <u><?= $tree['type'] ?? '*'  ?></u>
                            </li>
                            <?php endforeach ?>
                        </ul>
                        <ul class="list-group mt-4">
                            <?php foreach ($group as $type) : ?>
                            <li class="list-group-item">
                                <b>TYPE: <?= $type['title'] ?? '*' ?></b>
                                <u><?= $type['count'] ?? '*'  ?>vnt</u>
                                <u><?= $type['sum'] ?? '*'  ?>m</u>
                            </li>
                            <?php endforeach ?>
                        </ul>
                        <h3 class="m-3">ALL: <?= $ag['all'] ?>vnt, AVG: <?= $ag['avg'] ?>m, SUM: <?= $ag['sum'] ?>m</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>