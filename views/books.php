<?php
/*
* Auteur: Ianis POURU
* Date: 2022-29-04
* Description: affiche la liste des livres de la tabe books
*/
require __DIR__ . "/../models/model.php";
$books = GetBooks();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
</head>
<!--navbar simple de 3 élémennts : "home","books","add books"-->
<nav>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="books.php">Books</a></li>
        <li><a href="add_books.php">Edit books</a></li>
    </ul>
</nav>
<!--afficher la table books de la base de donnés books par une requete sql-->

<body>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Author</th>
                <th>Year</th>
                <th>Summary</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book) : ?>
            <tr>
                <td><?= $book['id'] ?></td>
                <td><?= $book['name'] ?></td>
                <td><?= $book['author'] ?></td>
                <td><?= $book['year'] ?></td>
                <td><?= $book['summary'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>