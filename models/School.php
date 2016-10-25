<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "school".
 *
 * @property integer $sid
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
class School extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'school';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'addrpart', 'moopart', 'tmbpart', 'amppart', 'chwpart', 'postcode', 'phone', 'fax', 'website'], 'required'],
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
            'sid' => 'Sid',
            'name' => 'Name',
            'addrpart' => 'Addrpart',
            'moopart' => 'Moopart',
            'tmbpart' => 'Tmbpart',
            'amppart' => 'Amppart',
            'chwpart' => 'Chwpart',
            'postcode' => 'Postcode',
            'phone' => 'Phone',
            'fax' => 'Fax',
            'website' => 'Website',
        ];
    }
}
