<?php 

class user extends pdoClass{
    //获取用户信息
    public function getUserInfo($username, $pwd) {
        return $this->find("SELECT * FROM weibo_user WHERE user_name=$username AND user_pwd=$pwd");
    }
    
    //获取登陆状态用户的信息
    public function getUserLog($session_id) {
        return $this->find("SELECT * FROM weibo_user WHERE id=$session_id");
    }
    
    //查找用户是否存在
    public function getUserExist($username) {
        return $this->find("SELECT id FROM weibo_user WHERE user_name=$username");
    }
    
    //注册添加信息
    public function reg($info) {
        return $this->addInfo("weibo_user", $info);
    }
    
}

?>