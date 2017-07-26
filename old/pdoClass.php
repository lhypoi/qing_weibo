<?php
/**
*
*/
class pdoClass
{
    public $link;
    public $debug=false;

    function __construct($dbhost,$db_user,$db_pwd,$debug= false){
        $this->debug = $debug;
        $this->link = new PDO($dbhost,$db_user,$db_pwd);
    }

    public function addInfo($table,$addData=array()){
        $col_str =  implode(",", array_keys($addData));
        $val_data = array_values($addData);
        $val_str = "";
        $douhao = "";
        foreach ($val_data as $key => $value) {
             if(is_string($value)){
                $val_str.=$douhao."'".$value."'";
             }else{
                $val_str.=$douhao.$value;
             }
             $douhao =",";
        }
        $this->link->exec("insert into $table ($col_str) values($val_str)");
        if ($this->link->errorCode() == '00000'){
            return $this->link->lastInsertId();
        } else {
            return $this->link->errorInfo();
        }
    }
}
 ?>