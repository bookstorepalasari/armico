<?php

/**
 * This is the model class for table "history_barcode".
 *
 * The followings are the available columns in table 'history_barcode':
 * @property integer $id
 * @property string $barcode
 * @property string $judul_buku
 * @property string $harga_jual
 * @property string $edisi
 * @property integer $tahun
 * @property integer $penerbit_id
 * @property string $nama_toko
 * @property string $no_isbn
 * @property string $panjang
 * @property string $lebar
 *
 * The followings are the available model relations:
 * @property MPenerbit $penerbit
 */
class HistoryBarcode extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HistoryBarcode the static model class
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
            return 'history_barcode';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
                array('barcode, judul_buku, harga_jual, penerbit_id, nama_toko, panjang, lebar', 'required'),
                array('panjang, lebar', 'numerical'),
                array('id, tahun, penerbit_id', 'numerical', 'integerOnly'=>true),
                array('barcode, judul_buku, edisi, nama_toko, no_isbn', 'length', 'max'=>100),
                // The following rule is used by search().
                // Please remove those attributes that should not be searched.
                array('id, barcode, judul_buku, harga_jual, edisi, tahun, penerbit_id, nama_toko, no_isbn, panjang, lebar', 'safe', 'on'=>'search'),
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
                        'penerbit' => array(self::BELONGS_TO, 'MPenerbit', 'penerbit_id'),
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
                        'judul_buku' => 'Judul Buku',
                        'harga_jual' => 'Harga Jual',
                        'edisi' => 'Edisi',
                        'tahun' => 'Tahun',
                        'penerbit_id' => 'Penerbit',
                        'nama_toko' => 'Toko',
                        'no_isbn' => 'ISBN',
                        'panjang' => 'Panjang',
                        'lebar' => 'Lebar'
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
		$criteria->compare('LOWER(judul_buku)',strtolower($this->judul_buku),true);
		$criteria->compare('LOWER(harga_jual)',strtolower($this->harga_jual),true);
		$criteria->compare('LOWER(edisi)',strtolower($this->edisi),true);
		$criteria->compare('tahun',$this->tahun);
		$criteria->compare('penerbit_id',$this->penerbit_id);
		$criteria->compare('LOWER(nama_toko)',strtolower($this->nama_toko),true);
		$criteria->compare('LOWER(no_isbn)',strtolower($this->no_isbn),true);
		$criteria->compare('panjang',$this->panjang,true);
		$criteria->compare('lebar',$this->lebar,true);

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
        
        public function barcodeData($id){
            
            $criteria=new CDbCriteria;
            if($id)$criteria->addCondition('id ='.$id);
            $modBarcode = HistoryBarcode::model()->find($criteria);

            return $modBarcode;
        }
}