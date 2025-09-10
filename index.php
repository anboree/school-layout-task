<?php
    include("connection.php");

    $query = "SELECT * FROM posts";
    $result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="grid-container">

        <div class="header">
            <h1 id="heading">Saldus tehnikuma programmētāji</h1>
        </div>

        <div class="options">
            <button class="button">Sākums</button>
            <button class="button"><a href="create_post.php" id="post-btn">Ielikt post</a></button>
            <button class="button">Uzdevumi</button>
            <button class="button">Kontakti</button>
        </div>

        <div class="main-block">
            <figure>
                <?php while($row = mysqli_fetch_assoc($result)) : ?>
                <div class="post">
                    <?php if (!empty($row['img'])): ?>
                        <img src="<?= ($row['img']) ?>" class="picture">
                    <?php endif; ?>
                    <figcaption><?=$row['date_posted']?></figcaption>
                    <h1><?=$row['title']?></h1>
                    <p><?=$row['content']?></p>
                </div>
                <?php endwhile; ?>
            </figure>
        </div>

        <div class="news-block">
            <h2>Jaunumi un paziņojumi</h2>
            <p>Pieraksties jaunumu saņemšanai un uzzini par jaunākajiem uzdevumiem, ieteikumiem un kursa aktualitātēm</p>
            <button class="button">Abonēt jaunumu vēstuli</button>
            <h2>Populārākie raksti</h2>
            <ol>
                <li><a href="index.html" class="news-link">Ievads HTML: pamatprincipi</a></li>
                <li><a href="index.html" class="news-link">CSS izkārtojuma pamati ar Grid un Flexbox</a></li>
                <li><a href="index.html" class="news-link">Padomi pieejamākam tīmeklim</a></li>
            </ol>
        </div>

        <div class="footer">
            <p>&copy; Dāvis Zaķis 2025</p>
        </div>
    </div>
</body>
</html>