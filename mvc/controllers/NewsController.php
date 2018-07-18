<?php

include_once ROOT . '/models/News.php';

class NewsController
{
    public function actionIndex()
    {
        //Die Liste mit Nachrichten

        $newsList = array();
        $newsList = News::getNewsList();

        require_once(ROOT . '/views/news/index.php');

        return true;
    }

    public function actionView($id)
    {
        if($id)
        {
            $newsItem = News::getNewsItemById($id);
            
            require_once(ROOT . '/views/news/view.php');
        }

        return true;
    }
}