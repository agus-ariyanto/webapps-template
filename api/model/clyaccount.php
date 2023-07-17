<?php

class ClyAccount extends ClyAuth{

    protected $alias='account';
    protected $columns=array(
        'usr'=>'VARCHAR(128)',
        'nama'=>'VARCHAR(128)',
        'grup_id'=>'INT',
        'clinic_id'=>'INT',
    );
    public $join='clinic,grup';
}
