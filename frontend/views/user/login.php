<?php
session_start();

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\forms\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-login']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>


            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Login', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
            </div>
            <br>


            <?php ActiveForm::end(); ?>

            <a href="signup">
                <?= Html::button('Register', ['class' => 'btn btn-primary']) ?>
            </a>
        </div>
    </div>
</div>