<?php 

class user extends pdoClass{
    //获取用户信息
    public function getUserInfo($username, $pwd) {
        return $this->find("SELECT * FROM weibo_user WHERE user_name=$username AND user_pwd=$pwd");
    }
}

?>