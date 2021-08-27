<?php

namespace common\models;

use Yii;
use yii\imagine\Image;

/**
 * This is the model class for table "routers".
 *
 * @property int $id
 * @property string $title Заголовок
 * @property string $introtext Вступительный текст
 * @property string $fulltext Полный текст
 * @property int|null $created Дата создания
 * @property string $photo Изображение
 * @property int $status Статус
 * @property int $ordering Порядок
 */
class Routers extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'routers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'introtext', 'fulltext'], 'required'],
            [['created'], 'datetime', 'format' => 'php:d.m.Y', 'timestampAttribute' => 'created'],
            [['status', 'ordering'], 'integer'],
            [['introtext', 'fulltext', 'photo'], 'string'],
            [['title'], 'string', 'max' => 255],
            ['file', 'image',
                'extensions' => ['jpg', 'jpeg', 'png', 'gif'],
                'checkExtensionByMimeType' => true,
                'maxSize' => 512000, // 500 килобайт = 500 * 1024 байта = 512 000 байт
                'tooBig' => 'Не больше 500KB'
            ],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $path = '@frontend/web/uploads/images/routers/';

            $photo = $this->randomFileName($this->file->extension);
            $this->file->saveAs($path . $photo, false);
            Image::resize($path . $photo, 600, 600)
                ->save(Yii::getAlias($path . $photo), ['quality' => 80]);

            return $photo;
        } else {
            return false;
        }
    }

    private function randomFileName($extension = false)
    {
        $extension = $extension ? '.' . $extension : '';
        do {
            $name = md5(microtime() . rand(0, 1000));
            $file = $name . $extension;
        } while (file_exists($file));
        return $file;
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'introtext' => 'Вступительный текст',
            'fulltext' => 'Полный текст',
            'created' => 'Дата создания',
            'photo' => 'Изображение',
            'status' => 'Статус',
            'ordering' => 'Порядок',
            'file' => 'Изображение',
        ];
    }
}
