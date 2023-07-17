<?php
class Login{
    function __construct(){
        global $prefix;
        $a=ucfirst(strtolower($prefix)).'Auth';
        $this->Model=new $a;
        $this->Params=new Params;
        $this->Data=array();
    }

    protected function Ok(){
        $token=$this->Data['token'];
        unset($this->Data['pwd']);
        unset($this->Data['token']);
        header('Content-Type: application/json');
        echo json_encode(array(
            'user'=>$this->Data,
            'token'=>$token,
        ));
        http_response_code(200);
    }

    
    protected function createToken(){
        global $jwt;
        unset($this->Data['pwd']);
        unset($this->Data['token']);
        $token=JWT::encode($this->Data,$jwt['key'],$jwt['alg']);
        $this->Model->colVal('token',$token);
        $this->Model->save($this->Data['id']);
        $this->Data=$this->Model->select($this->Data['id']);
    }

    protected function updateUser(){
        $this->Model->colVal('usr',$this->Params->key('username'));
        $this->Model->colVal('pwd',sha1($this->Params->key('password')));
        $this->Model->save($this->Data['id']);
        $this->Data=$this->Model->select($this->Data['id']);
        return $this->Data;
    }

    function index(){
        // kosong
        if(empty($this->Params->key('username'))|| empty($this->Params->key('password'))) return  http_response_code(403);

        // check database lokal
        $local=$this->local();

        // lokal nggak ada 
        if($local==0){
            echo json_encode(array(
                'error'=>1,
                'ermesg'=>'invalid username or password',
            ));
            http_response_code(200);
            return ;
        } 
        // login oke
        $this->Ok();
    }

     protected function local(){
        $this->Model->andWhere('usr',$this->Params->key('username'));
        $this->Model->limit(1);
        $res=$this->Model->select();
        // echo $this->Model->testQry();
        // tidak ada akun check LDAP
        if(empty(count($res))) return 0;

        $this->Data=$res[0];

        $pwd=sha1($this->Params->key('password'));

        if($this->Data['pwd']==$pwd){
            // bikin token bila tak punya token
            if(empty($this->Data['token']))  $this->createToken();
            return 1;
        }
        // password tidak cocok, check LDAP
        return 2;
     }


 

    // otentifikasi header bearer
    function check(){
        // return true;
        $header=getallheaders();
        if(empty($header['Authorization'] || $header['authorization'])) {
            http_response_code(403);
            return false;
        }

        if(empty($header['authorization'])){
            $token=str_replace('Bearer ','',$header['Authorization']);
        } else {
            $token=str_replace('Bearer ','',$header['authorization']);
        }

        $this->Model->andWhere('token',trim($token));
        $this->Model->limit(1);
        $res=$this->Model->select();
        if(empty(count($res))){
            http_response_code(403);
            return false;
        }
        return $res[0];
    }

}
