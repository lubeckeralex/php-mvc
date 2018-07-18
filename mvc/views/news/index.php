<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/template/css/style.css">
    <title>News Index</title>
</head>
<body>
<div id="content">

<?php foreach($newsList as $newsItem):?>
    <div class="post">
        <h2 class="title"><a href="/news/<?php echo $newsItem['id'];?>"><?php echo $newsItem['title'];?></a></h2>
        <p class="byline"><?php echo $newsItem['date'];?></p>
        <div class="entry">
            <p><?php echo $newsItem['short_content'];?></p>
        </div>
        <div class="meta">
        <p class="links"><a href="/news/<?php echo $newsItem['id'];?>" class="comments">Read more</a></p>
        </div>
    </div>
<?php endforeach;?>
</div>
    
</body>
</html>