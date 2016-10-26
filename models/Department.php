<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property integer $depart_id
 * @property string $name
 * @property string $addrpart
 * @property string $moopart
 * @property string $tmbpart
 * @property string $amppart
 * @property string $chwpart
 * @property string $postcode
 * @property string $phone
 * @property string $fax
 * @property string $website
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['name', 'addrpart', 'moopart', 'tmbpart', 'amppart', 'chwpart', 'postcode', 'phone', 'fax', 'website'], 'required'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 200],
            [['addrpart', 'phone', 'fax'], 'string', 'max' => 50],
            [['moopart'], 'string', 'max' => 3],
            [['tmbpart'], 'string', 'max' => 6],
            [['amppart'], 'string', 'max' => 4],
            [['chwpart'], 'string', 'max' => 2],
            [['postcode'], 'string', 'max' => 5],
            [['website'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'depart_id' => 'ID',
            'name' => 'ชื่อหน่วยงาน',
            'addrpart' => 'ที่อยู่',
            'moopart' => 'หมู่',
            'tmbpart' => 'ตำบล',
            'amppart' => 'อำเภอ',
            'chwpart' => 'จังหวัด',
            'postcode' => 'รหัสไปรษณีย์',
            'phone' => 'โทรศัพท์',
            'fax' => 'โทรสาร',
            'website' => 'เว็บไซต์',
        ];
    }
    
    /**
    * @return \yii\db\ActiveQuery
    */
    public function getProvince()
    {
        return $this->hasOne(Province::className(), ['province_code' => 'chwpart']);
    }
    
    public function getAmphur()
    {
        return $this->hasOne(Amphur::className(), ['amphur_code' => 'amppart']);
    }
    
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['district_code' => 'tmbpart']);
    }
}
