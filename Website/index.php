<?php
	ob_start();
	session_start();
	$pageTitle = 'Homepage';
	include 'init.php';
?>
<div style="padding-top:50px;" class="container">
	<div class="row">
		<?php
			$allItems = getAllFrom('*', 'items', 'where Approve = 1', '', 'Item_ID');
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
		?>
	</div>
</div>
<?php
	include $tpl . 'footer.php'; 
	ob_end_flush();
?>