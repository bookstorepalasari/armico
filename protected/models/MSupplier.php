<?php

/**
 * This is the model class for table "m_supplier".
 *
 * The followings are the available columns in table 'm_supplier':
 * @property integer $id
 * @property string $kode
 * @property string $nama
 * @property string $alamat
 * @property string $email
 * @property string $rekening
 * @property string $keterangan
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_login
 * @property integer $update_login
 * @property string $telepon
 * @property string $kontak
 *
 * The followings are the available model relations:
 * @property MBarang[] $mBarangs
 */
class MSupplier extends CActiveRecord
{
        public $global_search;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MSupplier the static model class
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
		return 'm_supplier';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    array('nama', 'required'),
                    array('create_login, update_login', 'numerical', 'integerOnly'=>true),
                    array('kode, nama, email, rekening', 'length', 'max'=>100),
                    array('telepon, kontak', 'length', 'max'=>50),
                    array('alamat, keterangan, create_time, update_time', 'safe'),
                    // The following rule is used by search().
                    // Please remove those attributes that should not be searched.
                    array('id, kode, nama, alamat, email, rekening, keterangan, create_time, update_time, create_login, update_login, telepon, kontak', 'safe', 'on'=>'search'),
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
                        'mBarangs' => array(self::HAS_MANY, 'MBarang', 'supplier_id'),
                        'userPemakai' => array(self::BELONGS_TO, 'UserPemakai', 'create_login'),
                    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
                        'id' => 'ID',
                        'kode' => 'Kode',
                        'nama' => 'Nama',
                        'alamat' => 'Alamat',
                        'email' => 'Email',
                        'rekening' => 'Rekening',
                        'keterangan' => 'Keterangan',
                        'create_time' => 'Create Time',
                        'update_time' => 'Update Time',
                        'create_login' => 'Create Login',
                        'update_login' => 'Update Login',
                        'telepon' => 'Telepon',
                        'kontak' => 'Kontak',
                        'global_search' => 'Pencarian'  
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
		$criteria->compare('LOWER(kode)',strtolower($this->kode),true);
		$criteria->compare('LOWER(nama)',strtolower($this->nama),true);
		$criteria->compare('LOWER(alamat)',strtolower($this->alamat),true);
		$criteria->compare('LOWER(email)',strtolower($this->email),true);
		$criteria->compare('LOWER(rekening)',strtolower($this->rekening),true);
		$criteria->compare('LOWER(keterangan)',strtolower($this->keterangan),true);
		$criteria->compare('create_login',$this->create_login);
		$criteria->compare('update_login',$this->update_login);
		$criteria->compare('LOWER(telepon)',strtolower($this->telepon),true);
		$criteria->compare('LOWER(kontak)',strtolower($this->kontak),true);

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
        
        public function globalSearch($params){
            
		$criteria=new CDbCriteria;
            
		$criteria->compare('LOWER(nama)',strtolower($params),true,'OR');
		$criteria->compare('LOWER(kode)',strtolower($params),true,'OR');
		$criteria->compare('LOWER(alamat)',strtolower($params),true,'OR');
		$criteria->compare('LOWER(telepon)',strtolower($params),true,'OR');
		$criteria->compare('LOWER(keterangan)',strtolower($params),true,'OR');
		$criteria->compare('LOWER(kontak)',strtolower($params),true,'OR');
		$criteria->compare('LOWER(rekening)',strtolower($params),true,'OR');
		$criteria->compare('LOWER(email)',strtolower($params),true,'OR');
                $models = MSupplier::model()->findAll($criteria);
                
                return $models;
        }
}