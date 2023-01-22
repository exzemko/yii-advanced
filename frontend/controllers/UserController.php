<?php


namespace frontend\controllers;
session_start();

use frontend\models\forms\LoginForm;
use frontend\models\forms\SignupForm;
use Yii;

class UserController extends \yii\web\Controller
{
    public function actionLogin()
    {

        $model = new LoginForm();
        if($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->session->setFlash('success', 'Добро пожаловать');
            return $this->redirect('/');
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Пользователь зарегистрирован');
            return $this->redirect('login');

        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        session_destroy();
        return $this->redirect('/');
    }

}
