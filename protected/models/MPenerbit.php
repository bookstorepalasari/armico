<?php

/**
 * This is the model class for table "m_penerbit".
 *
 * The followings are the available columns in table 'm_penerbit':
 * @property integer $id
 * @property string $penerbit
 *
 * The followings are the available model relations:
 * @property MBarang[] $mBarangs
 */
class MPenerbit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MPenerbit the static model class
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
		return 'm_penerbit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
					array('penerbit', 'required'),
					array('penerbit', 'length', 'max'=>100),
					// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, penerbit', 'safe', 'on'=>'search'),
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
					'mBarangs' => array(self::HAS_MANY, 'MBarang', 'penerbit_id'),
				);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
					'id' => 'ID',
					'penerbit' => 'Penerbit',
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
		$criteria->compare('LOWER(penerbit)',strtolower($this->penerbit),true);

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

        $criteria->compare('LOWER(penerbit)', strtolower($params),true,'OR');        
        $models = MPenerbit::model()->findAll($criteria);

        return $models;
	}
}