<?php 

class pdoClass {
    
    public $pdo;
    
    function __construct($dbhost, $dbuser, $dbpwd) {
        $this->pdo = new PDO($dbhost, $dbuser, $dbpwd);
    }
    
    function exec($sql)
    {
         $num = $this->pdo->exec($sql);

         if( $this->pdo->errorCode() != "00000"){
            if ($this->debug == true) {
                var_dump($this->pdo->errorInfo());
            }else{
                return $this->pdo->errorInfo();
            }
         }else{
                return $num;
         }
    }

    function getInfo($table, $condition, $selectFields='*', $order='') {
        $sql = "SELECT $selectFields FROM $table WHERE $condition $order";
        $pdoStream = $this->pdo->prepare($sql);
        $pdoStream->execute();
        return $pdoStream->fetchAll();
    }
    
    function getInsertId()
    {
         return $this->pdo->lastInsertId();
    }

    function select($sql) {
        $pstate = $this->pdo->prepare($sql);
        $pstate->execute();
        return $pstate->fetchAll();
    }
    
    function find($sql) {
        $pstate = $this->pdo->prepare($sql);
        $pstate->execute();
        return $pstate->fetch();
    }
    
    function addInfo($table, $info=array()) {
        unset($info['type']);
        $k_str = implode(',', array_keys($info));
        $v_data = array_values($info);
        $v_str = "";
        $split_char = "";
        foreach ($v_data as $key => $value) {
            if (is_string($value)) {
                $v_str.=$split_char."'".$value."'";
            }else {
                $v_str.=$split_char.$value;
            }
            $split_char = ",";
        }
        $this->pdo->exec("INSERT INTO $table ($k_str) VALUES ($v_str)");
        return array(
            'code' => $this->pdo->errorCode(),
            'info' => $this->pdo->errorInfo(),
            'id' => $this->pdo->lastInsertId()
        );
    }
    
    function delInfo($table, $id) {
        $sql = "DELETE FROM $table WHERE id=$id";
        return $this->pdo->exec($sql);
    }
    
    function updateInfo($table, $data=array(), $con=array()) {
        $updateStr = '';
        $split_char = '';
        foreach ($data as $key => $value) {
            $updateStr.= $split_char.$key.'='."'".$value."'";
            $split_char = ',';
        }
        $conStr = '';
        $split_char = '';
        foreach ($con as $key => $value) {
            $conStr.=$split_char.$key.'='.$value;
            $split_char = ',';
        }
        return $this->pdo->exec("UPDATE $table SET $updateStr WHERE $conStr");
    }
}

?>