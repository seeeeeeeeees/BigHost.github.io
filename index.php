<?php

// Ваш токен для доступа к Google API
$token = "AIzaSyB_OLgCu8gCg8Ju-dwUW8GkQpty1vVgWQk";

function searchBooks($query, $token) {
    $url = "https://www.googleapis.com/books/v1/volumes?q=" . urlencode($query) . "&key=" . $token;
    $response = file_get_contents($url);
    $data = json_decode($response, true);
    return $data["items"];
}

function readBook($bookId, $token) {
    $url = "https://www.googleapis.com/books/v1/volumes/" . $bookId . "?key=" . $token;
    $response = file_get_contents($url);
    $data = json_decode($response, true);
    // Здесь можно добавить код для отображения содержимого книги
}

// Пример использования функций
$query = "программирование";
$books = searchBooks($query, $token);

foreach ($books as $book) {
    $bookId = $book["id"];
    readBook($bookId, $token);
}
?>
