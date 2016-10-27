<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "program".
 *
 * @property integer $id
 * @property integer $org_id
 * @property string $datestart
 * @property string $dateend
 * @property string $note
 */
class Program extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'program';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['org_id'], 'integer'],
            [['datestart', 'dateend'], 'safe'],
            [['note'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'org_id' => 'หน่วยงาน',
            'datestart' => 'วันที่เริ่มต้น',
            'dateend' => 'วันที่สิ้นสุด',
            'note' => 'หมายเหตุ',
        ];
    }
}
