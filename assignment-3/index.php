<?php
$page_title = "Assignment-3";
include("header.php");
?>

<?php
$food = [
["title" => "Olivier", "Description" => "Russian Olivier salad, diced potatoes, vegetables, eggs, and ham with a mayonnaise dressing.", "cooking time" => "60 min"],
["title" => "Pelmeni", "Description" => "Dumplings consisting of a meat filling wrapped in thin, pasta dough.", "cooking time" => "90 min"],
["title" => "Shashlik", "Description" => "Marinated lamb on skewers, similar to Shish kebab. Meat and fat pieces are often alternated. Variants may use meat and such vegetables as bell pepper, onion, mushroom and tomato.", "cooking time" => "45 min"],
["title" => "Vinegret", "Description" => "Diced boiled vegetables (beet roots, potatoes, carrots), chopped onions, and sauerkraut and/or pickled cucumbers. Other ingredients, such as green peas or beans, are sometimes also added. Dressed with vinaigrette or simply with sunflower or other vegetable oil", "cooking time" => "60 min"],
["title" => "Blini", "Description" => "A thin pancake, typically lacking a leavening agent, similar to crepes", "cooking time" => "30 min"],
["title" => "Gulyas", "Description" => "A meat soup or stew with noodles and vegetables, in particular potatoes, seasoned with paprika and other spices.", "cooking time" => "30 min"],

];

$show = "all";
if (isset($_REQUEST["show"])) {
$show = $_REQUEST["show"];
}

include("page.php");
?>
<?php
include("footer.php");
?>