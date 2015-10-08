<?php

class NurserAR extends BaseActiveRecord {

    /**
     * @return CDbConnection the database connection used for this class
     */
    public function getDbConnection() {
        return Yii::app()->mamadb;
    }

}
