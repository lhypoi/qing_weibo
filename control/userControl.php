<?php 

class userControl extends baseControl{
    public function reg() {
        $exist = $this->model("user")->getUserExist($_POST['user_name']);
        if($exist) {
            returnjson(0, "该用户已存在");
        }else {
            $result = $this->model("user")->reg($_POST);
            if($result['code'] == '00000') {
                $uid = $result['id'];
                $_SESSION['uid'] =$uid;
                returnjson(1, "注册成功","","",$uid);
            } else {
                returnjson(1, "注册失败");
            }
        }
    }
    
    public function log() {
        $username = $_POST['user_name'];
        $pwd = $_POST['user_pwd'];
        $result = $this->model("user")->getUserInfo($username, $pwd);
        if($result) {
            $uid = $result[0]['id'];
            $_SESSION['uid'] =$uid;
            returnjson(1, "登录成功", "", "", $uid);
        } else {
            returnjson(0, "登录失败");
        }
    }
    
    public function logout() {
        unset($_SESSION['uid']);
        returnjson(1, '退出用户成功');
    }
    
    public function check() {
        $id = $_POST['id'];
        $_SESSION['uid'] =$id;
        $result = $this->model("user")->getUserLog($id);
        $this->assign("item", $result);
        $html = $this->fetch("login_state.html");
        returnjson(1, "", $html);
    }
}

?>