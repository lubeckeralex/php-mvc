<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $newsItem['title']?></title>
</head>
<body>
<div class="content">
    <h2 class="title"><?php echo $newsItem['title']?></h2>
    <strong><?php echo $newsItem['date']?></strong>
    <p><?php echo $newsItem['content']?></p>
</div>
    
</body>
</html>