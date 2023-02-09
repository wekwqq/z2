<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $fio
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $admin
 *
 * @property Claim[] $claims
 */
class RegForm extends User
{
 public $confirm_password;
 public $agree;
 public function rules()
 {
    return [
        [['fio', 'login', 'email', 'password', 'confirm_password','agree'], 'required'],
        [['fio'], 'match', 'pattern'=>'/[А-Яёа-яё\s]{1,}/u','message'=>'Используйте русские буквы'],
        [['password'], 'match', 'pattern'=>'/^[A-Za-z0-9]{4,}/u', 'message'=>'Используйте минимум 4 латинских букв и цифр'],
        [['email'], 'email'],
        [['confirm_password'], 'compare','compareAttribute'=>'password'],
        [['login', 'email'], 'unique'],
        [['login'], 'match', 'pattern'=>'/^[A-Za-z]{3,}/u', 'message'=>'Используйте минимум 2 латинских буквы '],
        [['agree'], 'compare', 'compareValue'=>true,'message'=>''],
        [['admin'], 'integer'],
        [['fio', 'login', 'email', 'password'], 'string', 'max' => 200],
    

 ];
 }
 /**
 * {@inheritdoc}
 */
 public function attributeLabels()
 {

    return [
        //'id_user' => 'Id User',
        'fio' => 'ФИО',
        'login' => 'Логин',
        'email' => 'Почта',
        'password' => 'Пароль',
        'confirm_password' => 'Повторите пароль',
        'agree' => 'Согласие на обработку персональных данных',
        //'is_admin' => 'Is Admin',

 ];
 }
}
