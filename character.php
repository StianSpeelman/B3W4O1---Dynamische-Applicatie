<?php
    require 'data/included/dbh.inc.php';

    $query = $conn->prepare("SELECT * FROM characters where id=:id");
    $query->execute(['id' => $_GET['id']]);
    $count = $query->fetch();
?>

<head>
    <meta charset="UTF-8">
    <title>Character - <?php echo $count["name"]; ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="resources/css/style.css" rel="stylesheet"/>
</head>
<body>
<header><h1><?php echo $count["name"]; ?></h1>
    <a class="backbutton" href="index.php"><i class="fas fa-long-arrow-alt-left"></i> Terug</a></header>
<div id="container">
    <div class="detail">
        <div class="left">
            <img class="avatar" src="resources/images/<?php echo $count["avatar"] ?>">
            <div class="stats" style="background-color: <?php echo $count["color"]; ?>">
                <ul class="fa-ul">
                    <li><span class="fa-li"><i class="fas fa-heart"></i></span> <?php echo $count["health"]; ?></li>
                    <li><span class="fa-li"><i class="fas fa-fist-raised"></i></span> <?php echo $count["attack"]; ?></li>
                    <li><span class="fa-li"><i class="fas fa-shield-alt"></i></span> <?php echo $count["defense"]; ?></li>
                </ul>
                <ul class="gear">
                    <li><b>Weapon</b>: <?php echo $count["weapon"]; ?></li>
                    <li><b>Armor</b>: <?php echo $count["armor"]; ?></li>
                </ul>
            </div>
        </div>
        <div class="right">
            <p>
                <?php echo $count["bio"]; ?>
            </p>
        </div>
        <div style="clear: both"></div>
    </div>
</div>
</body>
<?php
	require 'data/included/footer.php' 
?>
</html>