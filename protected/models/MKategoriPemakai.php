<?php

/**
 * This is the model class for table "m_kategori_pemakai".
 *
 * The followings are the available columns in table 'm_kategori_pemakai':
 * @property integer $id
 * @property string $nama
 * @property string $keterangan
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_login
 * @property integer $update_login
 * @property boolean $is_aktif
 *
 * The followings are the available model relations:
 * @property UserPemakai[] $userPemakais
 */
class MKategoriPemakai extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return KategoriPemakai the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_kategori_pemakai';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
					array('id', 'required'),
					array('id, create_login, update_login', 'numerical', 'integerOnly'=>true),
					array('nama', 'length', 'max'=>100),
					array('keterangan, create_time, update_time, is_aktif', 'safe'),
					// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, keterangan, create_time, update_time, create_login, update_login, is_aktif', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
					'userPemakais' => array(self::HAS_MANY, 'UserPemakai', 'kategori_pemakai_id'),
				);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
					'id' => 'ID',
					'nama' => 'Nama',
					'keterangan' => 'Keterangan',
					'create_time' => 'Create Time',
					'update_time' => 'Update Time',
					'create_login' => 'Create Login',
					'update_login' => 'Update Login',
					'is_aktif' => 'Is Aktif',
				);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CdbCriteria that can return criterias.
	 */
	public function criteriaSearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

				$criteria->compare('id',$this->id);
		$criteria->compare('LOWER(nama)',strtolower($this->nama),true);
		$criteria->compare('LOWER(keterangan)',strtolower($this->keterangan),true);
		$criteria->compare('LOWER(create_time)',strtolower($this->create_time),true);
		$criteria->compare('LOWER(update_time)',strtolower($this->update_time),true);
		$criteria->compare('create_login',$this->create_login);
		$criteria->compare('update_login',$this->update_login);
		$criteria->compare('is_aktif',$this->is_aktif);

		return $criteria;
	}
        
        
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=$this->criteriaSearch();
                $criteria->limit=10;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
	public function searchPrint()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=$this->criteriaSearch();
		$criteria->limit=-1; 

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>false,
		));
	}
}