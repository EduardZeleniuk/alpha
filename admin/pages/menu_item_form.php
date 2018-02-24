<?php
render_header([
	'is_home' => true
]);

$id = (int) (($_GET['id']) ?? 0);
$action = $_GET['action'] ?? false;

if($action == "save"){
  $parent_id = (int) $_POST['parent_id'];
  $title = (string) $_POST['title'];
  $link = (string) $_POST['link'];
  $ord = (int) $_POST['ord'];

  if(strlen($title) > 250) 
    die('Too long value of Title');
  elseif(strlen($link) > 500) 
    die('Too long value of Title');
  else {
    $sql = "
      UPDATE `menu_items`
      SET 
        `parent_id` = '{$parent_id}',
        `title` = '{$title}',
        `link` = '{$link}',
        `ord` = '{$ord}'
      WHERE `id` = '{$id}'  
    ";

    echo '<pre>';
    var_dump($sql);
    echo '</pre>';

    $result = mysqli_query($db, $sql);
  }
}

if($id){


   $sql = "
    SELECT * FROM `menu_items`
    WHERE `id` = '{$id}'
    LIMIT 1    
    ";
    $result = mysqli_query($db, $sql); 
    $row = mysqli_fetch_assoc($result);
    
    if(is_null($row))
        die('Unknown ID');

$hendler = 'index.php?page=menu_item_form&id='.$row['id'].'&action=save';

} else {
    $hendler = 'index.php?page=menu_item_form&action=save';
    $row=[
    'parant_id' => '',
    'title' => '',
    'link' => '',
    'ord' => ''
    ];
}



?>
<form method="post" action="<?=$hendler?>">
    <input type="number" name="parent_id" placeholder="Parent ID" value= "<?=$row['parent_id']?>">
    <input type="text" name="title" placeholder="Title" value= "<?=$row['title']?>">
    <input type="text" name="link" placeholder="Link" value= "<?=$row['link']?>">
    <input type="number" name="ord" placeholder="Order" value= "<?=$row['ord']?>">
    <button type="submit">Сохранить</button>
</form>

<?php
render_footer();
?>