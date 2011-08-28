<?php

/**
 * This is the model class for table "places".
 *
 * The followings are the available columns in table 'places':
 * @property integer $id
 * @property integer $use_id
 * @property string $desc
 * @property string $creat_date
 * @property string $title
 * @property string $lon
 * @property string $lat
 */
class Places extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return places the static model class
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
		return 'places';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('use_id, desc, creat_date, title, lon, lat', 'required'),
			array('use_id', 'numerical', 'integerOnly'=>true),
			array('title, lon, lat', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, use_id, desc, creat_date, title, lon, lat', 'safe', 'on'=>'search'),
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
			'use' => array(self::BELONGS_TO, 'Users', 'use_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'use_id' => 'Use',
			'desc' => 'Desc',
			'creat_date' => 'Creat Date',
			'title' => 'Title',
			'lon' => 'Lon',
			'lat' => 'Lat',
		);
	}

    public function searchNearBy($lon, $lat, $radius) {
        $sql = 'SELECT `id`, lon, lat, ((ACOS(SIN('. $lat .' * PI() / 180) * SIN(lat * PI() / 180) + COS(' . $lat . ' * PI() / 180) * COS(lat * PI() / 180) * COS((' . $lon . ' - lon) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS `distance` FROM `'. $this->tableName() .'` HAVING `distance`<=' . $radius . ' ORDER BY `distance` ASC';
        return $this->dbConnection->createCommand($sql)->queryAll();
    }

    public function last($limit = 10)
    {
        $this->getDbCriteria()->mergeWith(array(
            'select' => '*',
            'order' => 'creat_date DESC',
            'limit' => $limit,
        ));
        return $this;
    }

    public function my($userId, $limit = 10)
    {
        $this->getDbCriteria()->mergeWith(array(
            'select' => '*',
            'order' => 'creat_date DESC',
            'limit' => $limit,
            'condition' => 'use_id = ' .$userId,
        ));
        var_dump($this->getDbCriteria());
        return $this;
    }



	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('use_id',$this->use_id);

		$criteria->compare('desc',$this->desc,true);

		$criteria->compare('creat_date',$this->creat_date,true);

		$criteria->compare('title',$this->title,true);

		$criteria->compare('lon',$this->lon,true);

		$criteria->compare('lat',$this->lat,true);

		return new CActiveDataProvider('places', array(
			'criteria'=>$criteria,
		));
	}
}
