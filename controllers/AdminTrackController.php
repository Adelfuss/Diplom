<?php


class AdminTrackController extends AdminBase
{
    public function actionIndex()
    {
        require_once ROOT. '/views/admin_track/index.php';
        return true;
    }

    public function actionAdd()
    {
        $jsonArray = ['geometry' =>
            [
                'coordinates' => [$_POST['longitude'], $_POST['latitude']],
                'type' => 'Point'
            ],
            'type' => 'Feature'
        ];
        $jsonString = json_encode($jsonArray);
        $sqlQuery = "INSERT INTO location (coordinates) VALUES ('$jsonString')";
        $pdo = Db::getConnection();
        $pdo->query($sqlQuery);
        return true;
    }
}