<?php
/*
 * Auteur: Ianis POURU
 * Date: 2022-29-04
 * Description: contient les fonctions principales de l'application
*/

/*connexion à la base de données*/
$url = 'mysql:host=localhost;dbname=books;charset=utf8';
$username = 'root';
$password = 'root';
$db = new PDO($url, $username, $password);

/*fonction qui permet d'afficher la table books */
function GetBooks()
{
    global $db;
    $query = "SELECT * FROM books";
    $statement = $db->prepare($query);
    $statement->execute();
    $books = $statement->fetchAll();
    $statement->closeCursor();
    return $books;
}

/*fonction qui permet d'ajouter un livre dans la table books */
function AddBook($name, $author, $year, $summary)
{
    global $db;
    $query = "INSERT INTO books (name, author, year, summary) VALUES (:name, :author, :year, :summary)";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':author', $author);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':summary', $summary);
    $statement->execute();
    $statement->closeCursor();
    header('Location: /../books/views/books.php');
}

/*fonction qui permet de suprimer un livre dans la table books */
function DeleteBook($id)
{
    global $db;
    $query = "DELETE FROM books WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
    header('Location: /../books/views/books.php');
}

/*fonction qui permet de modifier un livre dans la table books */
function UpdateBook($id, $name, $author, $year, $summary)
{
    global $db;
    $query = "UPDATE books SET name = :name, author = :author, year = :year, summary = :summary WHERE id = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':author', $author);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':summary', $summary);
    $statement->execute();
    $statement->closeCursor();
    header('Location: /../books/views/books.php');
}
