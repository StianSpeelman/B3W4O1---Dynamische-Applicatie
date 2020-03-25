<?php
	require 'data/included/dbh.inc.php';
?>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Test</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="resources/css/page.css">
</head>
<body>
	<header>
		<?php
		$query = $conn->prepare("SELECT count('id') AS total FROM characters");
			$query->execute();
			$result = $query->fetchall();
			foreach($result as $count){
				echo "alle ".$count['total']." characters uit de database";
			}
		?>
	</header>
	<div id="container">
	<?php
		$query = $conn->prepare("SELECT * FROM characters");
		$query->execute();
		$char = $query->fetchall();
		foreach($char as $count){
		?>	<a class="item" href="character.php?id=<?= $count["id"] ?>">
        <div class="left">
            <img class="avatar" src="resources/images/<?php echo $count["avatar"] ?>">
        </div>
        <div class="right">
            <h2><?php echo $count["name"]; ?></h2>
            <div class="stats">
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-heart"></i></span> <?php echo $count["health"] ?></li>
                    <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span> <?php echo $count["attack"] ?></li>
                    <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span> <?php echo $count["defense"] ?></li>
                </ul>
            </div>
        </div>
        <div class="detailButton"><i class="fas fa-search"></i> bekijk</div>
    </a>
    <?php
		}
	?>
	</div>
</body>
<?php
	require 'data/included/footer.php';
?>
</html>