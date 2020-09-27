<?php 
$amount = 0; if(!empty($_REQUEST['amount'])){$amount = $_REQUEST['amount'];}
$project = (0.25 * $amount);
$utility = (0.25 * $amount);
$seeding = (0.12 * $amount);
$faf = (0.18 * $amount);
$reserve = (0.20 * $amount);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Disburse :: <?php echo '₦'.number_format($amount);?></title>
	<style type="text/css">
		body {line-height: 1.5; color: purple;}
		h1, h2 {line-height: 1; margin: 0 auto; }
		h1 {font-size: 1.7em; margin-bottom: 10px;}
		h2 {font-size: 1em; text-transform: uppercase; padding: 5px; background: purple; color: white; font-family: "Trebuchet MS", sans-serif;}
		.box {padding:5px; border: 1px solid purple; margin: 0 auto 12px;}
	</style>
</head>
<body>
	<?php
		echo '<h1>INCOME: ₦'.number_format($amount).'</h1>';

	echo '<h2>1. project - ₦'.number_format($project).'</h2>';
	echo '<div class="box">';
	echo 'Cost: ₦'.number_format((0.15 * $amount)).'<br>';
	echo 'Salary: ₦'.number_format((0.05 * $amount)).'<br>';
	echo 'Call/SMS: ₦'.number_format((0.0125 * $amount)).'<br>';
	echo 'Data: ₦'.number_format((0.0125 * $amount)).'<br>';
	echo 'General ISP: ₦'.number_format((0.025 * $amount)).'<br>';
	echo '</div>';

	echo '<h2>2. utility - ₦'.number_format($utility).'</h2>';
	echo '<div class="box">';
	echo 'Feeding: ₦'.number_format((0.1 * $amount)).'<br>';
	echo 'Rent: ₦'.number_format((0.125 * $amount)).'<br>';
	echo 'Clothing: ₦'.number_format((0.025 * $amount)).'<br>';
	echo 'Miscellaneous: ₦'.number_format((0.05 * $amount)).'<br>';
	echo '</div>';

	echo '<h2>3. seeding - ₦'.number_format($seeding).'</h2>';
	echo '<div class="box">';
	echo 'Offering: ₦'.number_format((0.01 * $amount)).'<br>';
	echo 'De Paul: ₦'.number_format((0.01 * $amount)).'<br>';
	echo 'Tithe: ₦'.number_format((0.1 * $amount)).'<br>';
	echo '</div>';

	echo '<h2>4. FAF - ₦'.number_format($faf).'</h2>';
	echo '<div class="box">';
	echo 'Family: ₦'.number_format((0.16 * $amount)).'<br>';
	echo 'Friends: ₦'.number_format((0.02 * $amount)).'<br>';
	echo '</div>';

	echo '<h2>5. reserve - ₦'.number_format($reserve).'</h2>';
	echo '<div class="box">';
	echo 'Savings: ₦'.number_format((0.15 * $amount)).'<br>';
	echo 'Fixed: ₦'.number_format((0.04 * $amount)).'<br>';
	echo 'Insurance: ₦'.number_format((0.01 * $amount)).'<br>';
	echo '</div>';
?>
</body>
</html>