<?php
/*
id|usr|nama|pwd|bidang_id|grup_id|unit_id|token|phone| 
 */
class ClyAuth extends Model{
    protected $alias='auth';
    protected $columns=array(
        'usr'=>'VARCHAR(128)',
        'nama'=>'VARCHAR(128)',
        'pwd'=>'VARCHAR(128)',
        'grup_id'=>'INT',
        'token'=>'TEXT',
        'clinic_id'=>'INT',
    );

    /*
    default untuk deployment hanya satu akun superadmin
    password admin = d033e22ae348aeb5660fc2140aec35850c4da997
    token = data user ldap login
    */

    	protected $firstdata=array(
            array(
                'id'=>'1',
    		'usr'=>'admin',
                'nama'=>'admin',
                'pwd'=>'d033e22ae348aeb5660fc2140aec35850c4da997',
                'grup_id'=>'1',
                'clinic_id'=>'1',
    		),
           array(
                'id'=>'2',
    		'usr'=>'office',
                'nama'=>'office',
                'pwd'=>'d033e22ae348aeb5660fc2140aec35850c4da997',
                'grup_id'=>'2',
                'clinic_id'=>'1',
    		),     
          array(
                'id'=>'3',
    		'usr'=>'poli',
                'nama'=>'poli',
                'pwd'=>'d033e22ae348aeb5660fc2140aec35850c4da997',
                'grup_id'=>'3',
                'clinic_id'=>'1',
    		),  
          array(
                'id'=>'4',
    		'usr'=>'apotek',
                'nama'=>'apotek',
                'pwd'=>'d033e22ae348aeb5660fc2140aec35850c4da997',
                'grup_id'=>'4',
                'clinic_id'=>'1',
    		),      
        );

}
