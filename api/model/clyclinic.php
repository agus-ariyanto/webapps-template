<?php
/*
id|usr|nama|pwd|bidang_id|grup_id|unit_id|token|phone| 
 */
class ClyClinic extends Model{
    protected $alias='clinic';
    protected $columns=array(
        'nama'=>'VARCHAR(128)',
      
    );

    /*
    default untuk deployment hanya satu akun superadmin
    password admin = d033e22ae348aeb5660fc2140aec35850c4da997
    token = data user ldap login
    */

    	protected $firstdata=array(
            array(
                'id'=>'1',
                'nama'=>'CONTOH',
            ),
        );

}
