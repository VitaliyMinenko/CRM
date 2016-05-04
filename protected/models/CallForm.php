<?php

class CallForm extends CFormModel
{
    public $coment;

  
    public function rules()
    {
        return array(
            array('coment', 'required'),
        );
    }
  
    public function attributeLabels()
    {
        return array(
            'coment'=>'Результат звонка',
        );
    }
}