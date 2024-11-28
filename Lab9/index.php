<?php
include 'dbconnection2.php';

$result = mysqli_query($conn, 'select * from books');
$xml = new DOMDocument("1.0", "utf-8");
$xml->formatOutput = true;
$books = $xml->createElement("books");
$xml->appendChild($books);

while ($row = mysqli_fetch_array($result)) {
    $book = $xml->createElement("book");
    $books->appendChild($book);
    $name = $xml->createElement("name", $row['name']);
    $book->appendChild($name);
    $price = $xml->createElement("price", $row['price']);
    $book->appendChild($price);
}

echo "<xmp>" . $xml->saveXML() . "</xmp>";
$xml->save("reports.xml");
