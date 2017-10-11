<?php

/**
 * This is the model class for table "user_pemakai".
 *
 * The followings are the available columns in table 'user_pemakai':
 * @property integer $id
 * @property integer $kategori_pemakai_id
 * @property string $nama_pemakai
 * @property string $kata_kunci
 * @property string $tgl_register
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_login
 * @property integer $update_login
 * @property string $last_login
 * @property boolean $is_aktif
 *
 * The followings are the available model relations:
 * @property MKategoriPemakai $kategoriPemakai
 */
class UserPemakai extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserPemakai the static model class
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
		return 'user_pemakai';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
					array('nama_pemakai, kata_kunci', 'required'),
					array('create_login, update_login', 'numerical', 'integerOnly'=>true),
					array('nama_pemakai', 'length', 'max'=>50),
					array('kata_kunci', 'length', 'max'=>100),
					array('tgl_register, create_time, update_time, last_login, is_aktif', 'safe'),
					// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kategori_pemakai_id, nama_pemakai, kata_kunci, tgl_register, create_time, update_time, create_login, update_login, last_login, is_aktif', 'safe', 'on'=>'search'),
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
					'kategoriPemakai' => array(self::BELONGS_TO, 'MKategoriPemakai', 'kategori_pemakai_id'),
				);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
					'id' => 'ID',
					'kategori_pemakai_id' => 'Kategori Pemakai',
					'nama_pemakai' => 'Nama Pemakai',
					'kata_kunci' => 'Kata Kunci',
					'tgl_register' => 'Tgl Register',
					'create_time' => 'Create Time',
					'update_time' => 'Update Time',
					'create_login' => 'Create Login',
					'update_login' => 'Update Login',
					'last_login' => 'Last Login',
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
		$criteria->compare('kategori_pemakai_id',$this->kategori_pemakai_id);
		$criteria->compare('LOWER(nama_pemakai)',strtolower($this->nama_pemakai),true);
		$criteria->compare('LOWER(kata_kunci)',strtolower($this->kata_kunci),true);
		$criteria->compare('LOWER(tgl_register)',strtolower($this->tgl_register),true);
		$criteria->compare('LOWER(create_time)',strtolower($this->create_time),true);
		$criteria->compare('LOWER(update_time)',strtolower($this->update_time),true);
		$criteria->compare('create_login',$this->create_login);
		$criteria->compare('update_login',$this->update_login);
		$criteria->compare('LOWER(last_login)',strtolower($this->last_login),true);
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