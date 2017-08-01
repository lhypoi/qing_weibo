<?php

class user extends pdoClass{
    //获取用户信息
    public function getUserInfo($username, $pwd) {
        return $this->find("SELECT * FROM weibo_user WHERE user_name='$username' AND user_pwd='$pwd'");
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

    // 编辑头像
    public function edit_pic($user_pic)
    {
        return $this->updateInfo('weibo_user', $user_pic, array('id'=>$_SESSION['uid']));
    }

    // 随机返回已存在的一个ID
    public function getRandomId()
    {
        $result = $this->select('select id from weibo_user order by rand() limit 1');
        return $result[0]['id'];
    }
}

?>