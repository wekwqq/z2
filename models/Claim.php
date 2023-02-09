<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "claim".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $time
 * @property int $iduser
 * @property int $idcategory
 * @property string $status
 * @property string $photobef
 * @property string $photoaft
 *
 * @property Category $idcategory0
 * @property User $iduser0
 */
class Claim extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'claim';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'iduser', 'idcategory', 'photobef', 'photoaft'], 'required'],
            [['time'], 'safe'],
            [['iduser', 'idcategory'], 'integer'],
            [['status'], 'string'],
            [['name', 'description', 'photobef', 'photoaft'], 'string', 'max' => 255],
            [['idcategory'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['idcategory' => 'id']],
            [['iduser'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['iduser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'time' => 'Time',
            'iduser' => 'Iduser',
            'idcategory' => 'Idcategory',
            'status' => 'Status',
            'photobef' => 'Photobef',
            'photoaft' => 'Photoaft',
        ];
    }

    /**
     * Gets query for [[Idcategory0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdcategory0()
    {
        return $this->hasOne(Category::class, ['id' => 'idcategory']);
    }

    /**
     * Gets query for [[Iduser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIduser0()
    {
        return $this->hasOne(User::class, ['id' => 'iduser']);
    }
}
