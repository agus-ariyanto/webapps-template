<?php
/*
id|usr|nama|pwd|bidang_id|grup_id|unit_id|token|phone| 
 */
class EpAuth extends Model{
    protected $alias='auth';
    protected $columns=array(
        'usr'=>'VARCHAR(128)',
        'nama'=>'VARCHAR(128)',
        'pwd'=>'VARCHAR(128)',
        'grup_id'=>'INT',
        'bidang_id'=>'INT DEFAULT 0',
        'unit_id'=>'INT DEFAULT 0',
        'token'=>'TEXT',
        'phone'=>'VARCHAR(16)',
        'banned'=>'INT DEFAULT 0',
        'sbu_id'=>'INT',
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
                'bidang_id'=>'1',
    		),
        );

}
