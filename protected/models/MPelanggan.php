<?php

/**
 * This is the model class for table "m_pelanggan".
 *
 * The followings are the available columns in table 'm_pelanggan':
 * @property integer $id
 * @property string $nama
 * @property string $alamat
 * @property string $keterangan
 * @property integer $rating_transaksi
 * @property integer $rating_akumulasi
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_login
 * @property integer $update_login
 * @property string $kode
 * @property string $telepon
 */
class MPelanggan extends CActiveRecord
{
        public $global_search;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MPelanggan the static model class
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
		return 'm_pelanggan';
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
                        array('rating_transaksi, rating_akumulasi, create_login, update_login', 'numerical', 'integerOnly'=>true),
                        array('nama, kode', 'length', 'max'=>100),
                        array('telepon', 'length', 'max'=>50),
                        array('alamat, keterangan, create_time, update_time', 'safe'),
                        // The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, alamat, keterangan, rating_transaksi, rating_akumulasi, create_time, update_time, create_login, update_login, kode, telepon', 'safe', 'on'=>'search'),
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
                                'nama' => 'Nama',
                                'alamat' => 'Alamat',
                                'keterangan' => 'Keterangan',
                                'rating_transaksi' => 'Rating Transaksi',
                                'rating_akumulasi' => 'Rating Akumulasi',
                                'create_time' => 'Create Time',
                                'update_time' => 'Update Time',
                                'create_login' => 'Create Login',
                                'update_login' => 'Update Login',
                                'kode' => 'Kode',
                                'telepon' => 'Telepon',
                                'global_search' => 'Pencarian'  
                        );
	}
        
	public function criteriaSearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

                $criteria->compare('id',$this->id);
		$criteria->compare('LOWER(nama)',strtolower($this->nama),true);
		$criteria->compare('LOWER(alamat)',strtolower($this->alamat),true);
		$criteria->compare('LOWER(keterangan)',strtolower($this->keterangan),true);
		$criteria->compare('rating_transaksi',$this->rating_transaksi);
		$criteria->compare('rating_akumulasi',$this->rating_akumulasi);
		$criteria->compare('create_login',$this->create_login);
		$criteria->compare('update_login',$this->update_login);
		$criteria->compare('LOWER(kode)',strtolower($this->kode),true);
		$criteria->compare('LOWER(telepon)',strtolower($this->telepon),true);

		return $criteria;
	}
        
	public function search()
	{
            
		$criteria=$this->criteriaSearch();
                $criteria->limit=10;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
	public function searchPrint()
	{

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
                $models = MPelanggan::model()->findAll($criteria);
                
                return $models;
        }
}