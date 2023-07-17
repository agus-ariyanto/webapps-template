<?php
/*
id|usr|nama|pwd|bidang_id|grup_id|unit_id|token|phone| 
 */
class ClyGrup extends Model{
    protected $alias='grup';
    protected $columns=array(
        'nama'=>'VARCHAR(128)',
        'deskripsi'=>'VARCHAR(128)',
    );

    /*
    default untuk deployment hanya satu akun superadmin
    password admin = d033e22ae348aeb5660fc2140aec35850c4da997
    token = data user ldap login
    */

    	protected $firstdata=array(
            array(
                'id'=>'1',
                'nama'=>'ADMIN',
                'deskripsi'=>'Untuk Manajemen Akun',
            ),
           array(
                'id'=>'2',
                'nama'=>'OFFICE',
                'deskripsi'=>'Untuk Pendaftaran',
            ),
                array(
                'id'=>'3',
                'nama'=>'POLI',
                'deskripsi'=>'Untuk Rekam Medis',
            ),
                array(
                'id'=>'4',
                'nama'=>'APOTEKER',
                'deskripsi'=>'Untuk Resep',
            ),
        );

}
