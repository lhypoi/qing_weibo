<?php

class longcontentControl extends baseControl{
    // 長文章頁面
    public function index() {
        if (isset($_SESSION['uid']) && $_SESSION['uid'] != 0) {
            $user = $this->model("user")->getUserLog($_SESSION['uid']);
            $this->assign('user_name', $user['user_name']);
            $this->assign('user_nickname', $user['user_nickname']);
            $this->assign('user_pic', $user['user_pic']);
        } else {
            $_SESSION['uid'] = 0;
        }
        $this->display("longcontent.html");
    }

    //发布長文章
    public function sendWeibo(){
        // 获取长文章数据
        $new_content['weibo_content'] =  $_POST['weibo_content'];
        $new_content['type'] = $_POST['type'];
        $new_content['create_time'] = time();
        $new_content['uid'] = $_SESSION['uid'];
        $error_array = $this->model('weibo')->setContent($new_content);

        if ($error_array['num'] > 0){
            // 更新标签数据
            $tagname_arr = array();
            $tagid_arr = array();
            if (!empty($_POST['tagname_arr'])) {
                $tagid_arr = $this->model('tag')->update($_POST['tagname_arr'], $error_array['id']);
                $tagname_arr = $_POST['tagname_arr'];
            }
            // 返回发布成功
            echo json_encode(
                array(
                    "status"=>1,
                    "msg"=>'发布成功',
                    "num"=>$error_array['num']
                    )
                );
        }else{
            echo json_encode(
                array(
                    "status"=>0,
                    "msg"=>'发布失败',
                    "error_info"=>$error_array['info'][2]
                    )
                );
        }
    }
}

?>