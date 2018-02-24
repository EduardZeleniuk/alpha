<?php

function render_header($user_params = [])
{
	$params = [
		'title' => PROJECT_TITLE,
		'is_home' => false,
		'menu_active_item' => 'home'
	];
	$params = array_merge($params, $user_params);

	include PATH_PARTIALS . 'header.php';
}

function render_footer()
{
	include PATH_PARTIALS . 'footer.php';
}

function render_menu()
{
	global $db;
	ini_set('display_errors', '1');
	error_reporting(E_ALL);

	$sql = '
		SELECT * 
		FROM `menu_items`
		ORDER BY `ord` ASC
	';	
	$result = mysqli_query($db, $sql);

	$items = [];
	while($row = mysqli_fetch_assoc($result))
	{
		$items[$row['id']] = $row;
	}

	$result = build_menu_items($items);
	
}

function build_menu_items($items, $parent_id = 0)
{
	$return = [];

	foreach($items as $id => $item)
	{
		if($item['parent_id'] == $parent_id)
		{
			$has_children = false;
			foreach($items as $child_item)
			{
				if($id == (int)$child_item['parent_id'])
				{
					$has_children = true;
					break;
				}
			}

			if($has_children)
				$item['children'] = build_menu_items($items, $id);

			$return[] = $item;
		}
	}

	return $return;
}

render_menu(); 




function render_items()
{
	global $db, $lang;
	ini_set('display_errors', '1');
	error_reporting(E_ALL);

	$sql = "
		SELECT  *, title_{$lang} AS title, text_{$lang} AS text
		FROM `items`
		ORDER BY `ord` ASC
	";	
	// 	echo '<pre>';
	// var_dump( $sql);
	// echo '</pre>';
	// exit;

	$result = mysqli_query($db, $sql);

	

	$items = [];
	$count = 0;
	while($row = mysqli_fetch_assoc($result))
	{
		// $items[$row['id']] = $row;
// 		echo '<pre>';
// 	var_dump( $row);
// 	echo '</pre>';
// exit;
			    if($count % 2 == 0){
						echo	'<div class="features-row">';
			    }
										
		echo '<section>
						<span class="icon major ' . $row['img'] . '"></span>
						<h3>'. $row['title'] .'</h3>
						<p>'. $row['text'] .'</p>
					</section>';


					if(!($count % 2 == 0)){
						echo '</div>';
					}

		$count++;			
	}

}

