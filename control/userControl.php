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
            $uid = $result['id'];
            $_SESSION['uid'] = $uid;

            returnjson(1, "登录成功", "", "", $uid);
        } else {
            returnjson(0, "登录失败");
        }
    }

    public function logout() {
        unset($_SESSION['uid']);
        unset($_SESSION['admin']);
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

    public function edit()
    {
        $create_time = time();
        $user_pic = "public/img/user/".$_SESSION['uid'].'_'.$create_time.".jpg";
        move_uploaded_file($_FILES['user_pic']['tmp_name'], $user_pic);

        $result = $this->model('user')->edit_pic(array('user_pic'=>$user_pic));

        if ($result == 1) {
            returnjson(1, "更换头像成功");
        }
    }

    // 用户主页
    // http://localhost/20170718/lesson9/index.php?control=user&action=home&id=12
    public function home()
    {
        $weibo = $this->model('weibo');
        $tag = $this->model('tag');
        $weibo_data = $weibo->getWeiboByUser($_REQUEST['id']);

        foreach ($weibo_data as $key => $value) {
            $weibo_data[$key]['user_data'] = $tag->getWeiboUser($value['user_id']);
            $weibo_data[$key]['commet_data'] = $tag->getWeiboCommentTotal($value['id']);
            $weibo_data[$key]['tag_data'] = $tag->getTagbyWeiboid($value['id']);
        }

        $this->assign("weibo_data", $weibo_data);
        $this->display("personal.html");
    }
    
    //获取相册
    public function getPhoto() {
        $pageStart = $_POST['photoList'];
        $uid = $_SESSION['uid'];
        $page = $pageStart.",9";
        $weibo_model = $this->model("weibo");
        $photo_list = $weibo_model->getPhotoList($uid, $page);
        if(empty($photo_list)) {
            returnjson(0, "无更多页面");
        }else {
            $this->assign("photo_list", $photo_list);
            $html = $this->fetch("photo_li.html");
            returnjson(1, "获取相册成功", $html, "", $photo_list);
        }
    }
    
    //获取个人信息
    public function getUserInfo() {
        $result = $this->model("user")->getUserLog($_SESSION['uid']);
        $this->assign("item", $result);
        $html = $this->fetch("user_manage.html");
        returnjson(1, "获取信息成功", $html);
    }
}

?>