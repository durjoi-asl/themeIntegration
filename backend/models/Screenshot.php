<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "screenshot".
 *
 * @property int $id
 * @property string $img
 */
class Screenshot extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'screenshot';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img'], 'required'],
            [['img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Img',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ScreenshotQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ScreenshotQuery(get_called_class());
    }
}
