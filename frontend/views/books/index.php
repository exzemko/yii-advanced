<?php
session_start();

use app\models\Book;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Book';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php if (isset($_SESSION['username']) && $_SESSION['username'] === 'admin') {
        $aa = '{update} {delete}';

    }
    else $aa = ''; ?>
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'title',
            'author',
            'created_at',
            [
                'class' => 'yii\grid\ActionColumn', 'template' => $aa,
                'urlCreator' => function ($action, Book $model, $key, $index, $column) {
                    //var_dump($action);
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
