<?php

class UserController extends Controller
{

    protected $model = false;

    public function init()
    {
        $this->model = $this->getUsersModel();
    }

    public function actionLogin($name, $pass)
    {
        $identity = new UserIdentity($name, $pass);
        $identity->authenticate();
        switch ($identity->errorCode) {
            case UserIdentity::ERROR_NONE:
                Yii::app()->user->login($identity, 3600*24*7);
                echo 'login: ' . $identity->getId();
                break;
            case UserIdentity::ERROR_USERNAME_INVALID:
                echo "invalid user name!";
                break;
            case UserIdentity::ERROR_PASSWORD_INVALID:
                echo "invalid password!";
                break;
            default:
                echo "fail!";
                break;
        }
    }

    public function actionLogout()
    {
           Yii::app()->user->logout();
    }
    
    public function actionRegister($name, $pass, $email)
    {
        //$model=new users;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'register-form' || isset($_GET['ajax']) && $_GET['ajax'] === 'register-form') {
            $this->model->_new = true;
            $this->model->name = $name;
            $this->model->pass = $pass;
            $this->model->email = $email;
            $this->model->creat_date = date('Y-m-d', time());

//            var_dump($this->model);
            if ($this->model->validate()) {
                var_dump($this->model->save());
                echo "success";
            } else {
                echo "unsuccess";
            }
        }
    }

    protected function getUsersModel()
    {
        return Users::model();
    }

}
