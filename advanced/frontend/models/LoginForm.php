<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $phone;
}