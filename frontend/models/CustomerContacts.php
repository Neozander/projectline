<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_contacts".
 *
 * @property integer $idcustomer_contacts
 * @property integer $customer_id
 * @property string $contact_name
 * @property string $contact_phone
 * @property string $contact_email
 * @property string $contact_skype
 *
 * @property Customer $customer
 */
class CustomerContacts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_contacts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'contact_name'], 'required'],
            [['customer_id'], 'integer'],
            [['contact_name'], 'string', 'max' => 128],
            [['contact_phone'], 'string', 'max' => 16],
            [['contact_email'], 'string', 'max' => 255],
            [['contact_skype'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcustomer_contacts' => 'Idcustomer Contacts',
            'customer_id' => 'Customer ID',
            'contact_name' => 'Contact Name',
            'contact_phone' => 'Contact Phone',
            'contact_email' => 'Contact Email',
            'contact_skype' => 'Contact Skype',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['idcustomer' => 'customer_id']);
    }
}
