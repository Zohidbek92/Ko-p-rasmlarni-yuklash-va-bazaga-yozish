<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "rasmlar".
 *
 * @property int $id
 * @property int $product_id
 * @property string $rasm
 * @property string $sana
 */
class Rasmlar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rasmlar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'rasm'], 'required'],
            [['product_id'], 'integer'],
            [['sana'], 'safe'],
            [['rasm'], 'file', 'extensions' => 'png, jpg, gif', 'maxFiles' => 5, 'skipOnEmpty' => false],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Mahsulotni tanlang'),
            'rasm' => Yii::t('app', 'Rasmlar yuklash'),
            'sana' => Yii::t('app', 'Sana'),
        ];
    }
}
