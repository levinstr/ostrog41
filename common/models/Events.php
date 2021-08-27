<?php

namespace common\models;

use Yii;
use yii\imagine\Image;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property string $title Заголовок
 * @property string $introtext Вводный текст
 * @property string $fulltext Полный текст
 * @property string|null $images Изображения
 * @property int|null $start Дата начала
 * @property int|null $end Дата окончания
 * @property int $ordering Порядок
 */
class Events extends \yii\db\ActiveRecord
{
    public $files;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'introtext', 'start'], 'required'],
            [['introtext', 'fulltext', 'images'], 'string'],
            [['ordering'], 'integer'],
            [['start'], 'datetime', 'format' => 'php:d.m.Y', 'timestampAttribute' => 'start'],
            [['end'], 'datetime', 'format' => 'php:d.m.Y', 'timestampAttribute' => 'end'],
            [['title'], 'string', 'max' => 255],
            ['files', 'image',
                'extensions' => ['jpg', 'jpeg', 'png', 'gif'],
                'checkExtensionByMimeType' => true,
                'maxSize' => 1024000, // 500 килобайт = 500 * 1024 байта = 512 000 байт
                'tooBig' => 'Не больше 1Мб',
                'maxFiles' => 50
            ]
        ];
    }


    public function upload()
    {
        if ($this->validate()) {
            $images = array();
            $path = '@frontend/web/uploads/images/';
            foreach ($this->files as $file) {
                $image = $this->randomFileName($file->extension);
                array_push($images, $image);
                $file->saveAs($path . $image, false);
                Image::resize($path . $image, 800, 800)
                    ->save(Yii::getAlias($path . $image), ['quality' => 80]);
                Image::resize($path . $image, 250, 250)
                    ->save(Yii::getAlias($path . 'thumb-' . $image), ['quality' => 80]);
            }
            return $images;
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
            'introtext' => 'Вводный текст',
            'fulltext' => 'Полный текст',
            'images' => 'Изображения',
            'start' => 'Дата начала',
            'end' => 'Дата окончания',
            'ordering' => 'Порядок',
            'files' => 'Изображения',
        ];
    }
}
