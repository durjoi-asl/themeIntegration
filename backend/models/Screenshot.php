<?php

namespace backend\models;

use Yii;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "screenshot".
 *
 * @property int $id
 * @property string $img
 */
class Screenshot extends \yii\db\ActiveRecord
{
    public $image;
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

    public function save($runValidation = true, $attributeNames = null) {

      $file = Yii::getAlias('@backend/web/storage/screenshot/'.uniqid().'.png');

      $this->img = $file;
      $saved = parent::save($runValidation, $attributeNames);
      if(!$saved) {
        return false;
      }

      $data = $this->base64ToImage($this->image, $file);

      if(!is_dir(dirname($file))){
        FileHelper::createDirectory(dirname($file));
      }

      file_put_contents($file, $data);

      return true;
    }

    public function base64ToImage($img, $file) {
      $img = str_replace('data:image/png;base64,', '', $img);
      $img = str_replace(' ', '+', $img);
      $data = base64_decode($img);

      return $data;
    }
}
