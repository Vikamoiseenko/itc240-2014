<li><a href="?show=next">Query 1</a></li>
<li><a href="?show=query">Query 2</a></li>
<li><a href="?show=quer">Query 3</a></li>

<?php
foreach($mysql as $row) {
if ($show == "next") {
include("next.php");
} else if ($show == "query"){ 
include("query.php");
} else if($show == "quer"){
include("query2.php");
}
}
?>

