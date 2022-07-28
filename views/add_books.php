<?php
/*
* Auteur: Ianis POURU
* Date: 2022-29-04
* Description: affiche la page qui permet l'ajout d'un livre dans la table books
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
    <title>add_book</title>
</head>
<!--navbar simple de 3 élémennts : "home","books","add books"-->
<nav>
    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="books.php">Books</a></li>
        <li><a href="add_books.php">Edit books</a></li>
    </ul>
</nav>

<body>
    <!--Formulaire qui permet d’ajouter un livre dans la table books grace a la fonction AddBook-->


    <?php
    if (isset($_POST['name']) && isset($_POST['author']) && isset($_POST['year']) && isset($_POST['summary'])) {
        $name = $_POST['name'];
        $author = $_POST['author'];
        $year = $_POST['year'];
        $summary = $_POST['summary'];
        AddBook($name, $author, $year, $summary);
    }
    
    ?>
    <form action="add_books.php" method="post">
        <p>Ajouter un livre : </p>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <label for="author">Author</label>
        <input type="text" name="author" id="author">
        <label for="year">Year</label>
        <input type="text" name="year" id="year">
        <label for="summary">Summary</label>
        <input type="text" name="summary" id="summary">
        <input type="submit" value="Add">
    </form>

    <!--Formulaire qui permet de supprimer un livre dans la table books grace a la fonction DeleteBook-->

    <?php
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        DeleteBook($id);
    }
    ?>
    <form action="add_books.php" method="post">
        <p>Supprimer un livre : </p>
        <label for="id">Id</label>
        <input type="text" name="id" id="id">
        <input type="submit" value="Delete">
    </form>

    <!--Formulaire qui permet de modifier un livre dans la table books grace a la fonction UpdateBook-->

    <?php
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['author']) && isset($_POST['year']) && isset($_POST['summary'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $author = $_POST['author'];
        $year = $_POST['year'];
        $summary = $_POST['summary'];
        UpdateBook($id, $name, $author, $year, $summary);
    }
    ?>
    <form action="add_books.php" method="post">
        <p>Modifier un livre : </p>
        <label for="id">Id</label>
        <input type="text" name="id" id="id">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <label for="author">Author</label>
        <input type="text" name="author" id="author">
        <label for="year">Year</label>
        <input type="text" name="year" id="year">
        <label for="summary">Summary</label>
        <input type="text" name="summary" id="summary">
        <input type="submit" value="Update">
    </form>

    <!--afficher la table books de la base de donnés books par une requete sql-->

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