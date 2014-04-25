<?php

$books = [
["title" => "Dune", "author" => "Duma"],
["title" => "Anna Karenina", "author" => "Tolstoy"],
["title" => "War and Peace", "author" => "Tolstoy"],
];
$books[] = ["title" => "M is for Murder", "author" => "Grafton"];

$show = "all";
if (isset($_REQUEST["show"])) {
$show = $_REQUEST["show"];
}

shuffle($books);

$filled = array_fill(0, 10, "Hello");
print_r($filled);

include("page.php");
