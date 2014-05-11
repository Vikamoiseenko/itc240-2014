<li><a href="?show=v">Query 1</a></li>
<li><a href="?show=query">Query 2</a></li>
<li><a href="?show=quer">Query 3</a></li>

<?php
foreach($mysql as $row) {
if ($show == "v") {
include("next.php");
} else if{ include("query.php");
} else if{ include("query2.php");
}
?>

