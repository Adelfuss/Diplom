<?php


class MapController
{

    public function actionIndex()
    {
        require_once ROOT . '/views/map/index.php';
        return true;
    }

    public function actionGet()
    {
        $sql = "SELECT coordinates FROM location ORDER BY id DESC LIMIT 1";
        $pdo = Db::getConnection();
        $result = $pdo->query($sql);
        $result = $result->fetch();
        header("Content-Type: application/json");
        echo $result['coordinates'];
        return true;
    }
}