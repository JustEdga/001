<h1>Naujas Grybas</h1>

<form action="<?= URL ?>update/<?= $grybas['id'] ?>" method="post">

    <div>Pavadinimas<input type="text" name="title" value="<?= $grybas['title'] ?>"></div>
    <div>Spalva<input type="text" name="color"  value="<?= $grybas['color'] ?>"></div>
    <div>Svoris<input type="text" name="weight"  value="<?= $grybas['weight'] ?>"></div>

    <button type="submit">Taip</button>

</form>