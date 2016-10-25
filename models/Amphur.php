<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "amphur".
 *
 * @property string $amphur_code
 * @property string $amphur_name
 * @property string $amphur_pre
 * @property integer $geo_id
 * @property integer $province_id
 */
class Amphur extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'amphur';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amphur_code', 'amphur_name', 'amphur_pre'], 'required'],
            [['geo_id', 'province_id'], 'integer'],
            [['amphur_code'], 'string', 'max' => 4],
            [['amphur_name'], 'string', 'max' => 150],
            [['amphur_pre'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'amphur_code' => 'Amphur Code',
            'amphur_name' => 'Amphur Name',
            'amphur_pre' => 'Amphur Pre',
            'geo_id' => 'Geo ID',
            'province_id' => 'Province ID',
        ];
    }
}
