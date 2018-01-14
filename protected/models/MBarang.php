<?php

/**
 * This is the model class for table "m_barang".
 *
 * The followings are the available columns in table 'm_barang':
 * @property integer $id
 * @property string $barcode
 * @property string $no_isbn
 * @property string $judul
 * @property string $penyusun
 * @property integer $jumlah_stok
 * @property string $harga_beli
 * @property string $harga_jual
 * @property integer $penerbit_id
 * @property integer $golongan_id
 * @property integer $supplier_id
 * @property string $create_time
 * @property string $update_time
 * @property integer $create_login
 * @property integer $update_login
 * @property string $kode_rak
 * @property double $diskon
 * @property string $edisi
 * @property integer $jilid
 * @property integer $tahun
 * @property string $cover
 *
 * The followings are the available model relations:
 * @property MGolongan $golongan
 * @property MPenerbit $penerbit
 * @property MSupplier $supplier
 */
class MBarang extends CActiveRecord
{
        public $global_search;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MBarang the static model class
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
		return 'm_barang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('judul', 'required'),
                        array('jumlah_stok, penerbit_id, golongan_id, supplier_id, create_login, update_login, jilid, tahun', 'numerical', 'integerOnly'=>true),
                        array('diskon', 'numerical'),
                        array('barcode, no_isbn, penyusun, kode_rak, edisi', 'length', 'max'=>100),
                        array('cover', 'length', 'max'=>50),
                        array('harga_beli, harga_jual, create_time, update_time', 'safe'),
                        // The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, barcode, no_isbn, judul, penyusun, jumlah_stok, harga_beli, harga_jual, penerbit_id, golongan_id, supplier_id, create_time, update_time, create_login, update_login, kode_rak, diskon, edisi, jilid, tahun, cover', 'safe', 'on'=>'search'),
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
                        'golongan' => array(self::BELONGS_TO, 'MGolongan', 'golongan_id'),
                        'penerbit' => array(self::BELONGS_TO, 'MPenerbit', 'penerbit_id'),
                        'supplier' => array(self::BELONGS_TO, 'MSupplier', 'supplier_id'),
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
                    'barcode' => 'Barcode',
                    'no_isbn' => 'No Isbn',
                    'judul' => 'Judul',
                    'penyusun' => 'Penyusun',
                    'jumlah_stok' => 'Jumlah Stok',
                    'harga_beli' => 'Harga Beli',
                    'harga_jual' => 'Harga Jual',
                    'penerbit_id' => 'Penerbit',
                    'golongan_id' => 'Golongan',
                    'supplier_id' => 'Supplier',
                    'create_time' => 'Create Time',
                    'update_time' => 'Update Time',
                    'create_login' => 'Create Login',
                    'update_login' => 'Update Login',
                    'kode_rak' => 'Kode Rak',
                    'diskon' => 'Diskon',
                    'edisi' => 'Edisi',
                    'jilid' => 'Jilid',
                    'tahun' => 'Tahun',
                    'cover' => 'Cover',
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
		$criteria->compare('LOWER(barcode)',strtolower($this->barcode),true);
		$criteria->compare('LOWER(no_isbn)',strtolower($this->no_isbn),true);
		$criteria->compare('LOWER(judul)',strtolower($this->judul),true);
		$criteria->compare('LOWER(penyusun)',strtolower($this->penyusun),true);
		$criteria->compare('jumlah_stok',$this->jumlah_stok);
		$criteria->compare('LOWER(harga_beli)',strtolower($this->harga_beli),true);
		$criteria->compare('LOWER(harga_jual)',strtolower($this->harga_jual),true);
		$criteria->compare('penerbit_id',$this->penerbit_id);
		$criteria->compare('golongan_id',$this->golongan_id);
		$criteria->compare('supplier_id',$this->supplier_id);
		$criteria->compare('LOWER(create_time)',strtolower($this->create_time),true);
		$criteria->compare('LOWER(update_time)',strtolower($this->update_time),true);
		$criteria->compare('create_login',$this->create_login);
		$criteria->compare('update_login',$this->update_login);
		$criteria->compare('LOWER(kode_rak)',strtolower($this->kode_rak),true);
		$criteria->compare('diskon',$this->diskon);
		$criteria->compare('LOWER(edisi)',strtolower($this->edisi),true);
		$criteria->compare('jilid',$this->jilid);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('LOWER(cover)',strtolower($this->cover),true);

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

            $criteria->compare('LOWER(judul)',strtolower($params),true,'OR');
            $criteria->compare('LOWER(barcode)',strtolower($params),true,'OR');
            $criteria->compare('LOWER(no_isbn)',strtolower($params),true,'OR');
            $criteria->compare('LOWER(penyusun)',strtolower($params),true,'OR');
            $criteria->compare('LOWER(kode_rak)',strtolower($params),true,'OR');
            $criteria->compare('LOWER(cover)',strtolower($params),true,'OR');
            $criteria->compare('LOWER(diskon)',strtolower($params),true,'OR');
            $criteria->compare('LOWER(edisi)',strtolower($params),true,'OR');
            $criteria->addCondition('jumlah_stok',$params,true,'OR');
            $criteria->addCondition('harga_beli',$params,true,'OR');
            $criteria->addCondition('harga_jual',$params,true,'OR');
            $criteria->addCondition('penerbit_id',$params,true,'OR');
            $criteria->addCondition('golongan_id',$params,true,'OR');
            $criteria->addCondition('supplier_id',$params,true,'OR');
            $criteria->addCondition('jilid',$params,true,'OR');
            $criteria->addCondition('tahun',$params,true,'OR');

            $models = MBarang::model()->findAll($criteria);

            return $models;
        }
        
	public function exportList()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
            
		$criteria=$this->criteriaSearch();
                $criteria->limit=100;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}