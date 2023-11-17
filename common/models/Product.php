<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property int $price
 * @property string $description
 */
class Product extends \yii\db\ActiveRecord

{
    public $imageFiles;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'price', 'description'], 'required'],
            [['category_id', 'price'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpeg, jpg', 'maxFiles'=>4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'name' => 'Name',
            'price' => 'Price',
            'description' => 'Description',
        ];
    }


    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
               $filename = md5(time()) . $file->basename;
                $file->saveAs('uploads/' . $filename . '.' . $file->extension);
            $photo = new ProductImage();
            $photo->product_id = $this->id;
            $photo->link = $filename . '.' . $file->extension;
            $photo->save();
        }
        return true;
    } else {
        return false;
        }
    }

    public function getImages()
    {
        return $this->hasMany(ProductImage::class, ['product_id'=>'id']);
    }

    public function getImage()
    {
        return $this->hasOne(ProductImage::class, ['product_id'=>'id']);
    }
}
