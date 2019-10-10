<?php

//fetch_comment.php

$connect = new PDO('mysql:host=localhost;dbname=testing', 'root', '');

$query = "
SELECT * FROM tbl_comment  
ORDER BY comment_id DESC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{
 $output .= '
 <div class="panel panel-default">
  <div class="panel-heading">Отзыв оставил(а) <b>'.$row["comment_sender_name"].'</b> в <i>'.$row["date"].'</i></div>
  <div class="panel-body">'.$row["comment"].'</div>
 </div>
 ';
}

echo $output;


?>