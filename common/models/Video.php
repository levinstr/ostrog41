<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property int $id
 * @property string $url URL видео
 * @property string $description Описание
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'description'], 'required'],
            [['url', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'URL видео',
            'description' => 'Описание',
        ];
    }
}
