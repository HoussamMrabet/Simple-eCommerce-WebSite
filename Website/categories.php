<?php 
	session_start();
	include 'init.php';
?>

<div class="container">
		<?php
		if (isset($_GET['pageid']) && is_numeric($_GET['pageid'])) {
			$category = intval($_GET['pageid']);
			$allItems = getAllFrom("*", "items", "where Cat_ID = {$category}", "AND Approve = 1", "Item_ID");
			function getSingleValue($con, $sql, $parameters){
				$q = $con->prepare($sql);
				$q->execute($parameters);
				return $q->fetchColumn();
			}
			$myCategory = getSingleValue($con, "SELECT Name FROM categories WHERE id=?", [$category]);
			echo '<h1 class="text-center">'.$myCategory.'</h1>';
			echo '<div class="row">';
			foreach ($allItems as $item) {
						echo '<div class="col-sm-6 col-md-3">';
							echo '<div class="thumbnail item-box">';
								echo '<span class="price-tag">$' . $item['Price'] . '</span>';
								if (empty($item['picture'])) {
									echo "<img style='width:250px;height:300px' src='admin/uploads/default.png' alt='' />";
								} else {
									echo "<img style='width:250px;height:300px' src='admin/uploads/items/" . $item['picture'] . "' alt='' />";
								}
								echo '<div class="caption">';
									echo '<h3><a href="items.php?itemid='. $item['Item_ID'] .'">' . $item['Name'] .'</a></h3>';
									echo "<p style='overflow-wrap: normal;overflow: hidden;'>". $item['Description'] . '</p>';
									echo '<div class="date">' . $item['Add_Date'] . '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
			}
			echo '</div>';
		} else {
			echo 'You Must Add Page ID';
		}
		?>
</div>

<?php include $tpl . 'footer.php'; ?>