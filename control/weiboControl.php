<?php 

class weiboControl extends baseControl{
    public function index() {
        if (isset($_SESSION['uid']) && $_SESSION['uid'] != 0) {
            $user = $this->model("user")->getUserLog($_SESSION['uid']);
            $this->assign('user_name', $user['user_name']);
            $this->assign('user_nickname', $user['user_nickname']);
            $this->assign('user_pic', $user['user_pic']);
        } else {
            $_SESSION['uid'] = 0;
        }
        
        $weibo_model = $this->model("weibo");
        $weibo_data = $weibo_model->getWeiboList();
        foreach ($weibo_data as $key => $value) {
            $weibo_data[$key]['user_data'] = $weibo_model->getWeiboUser($value['user_id']);
            $weibo_data[$key]['commet_data'] = $weibo_model->getWeiboComment($value['id']);
            foreach ($weibo_data[$key]['commet_data'] as $k => $v) {
                $weibo_data[$key]['commet_data'][$k]['user_data'] = $weibo_model->getWeiboUser($v['user_id']);
            }
        }
        $this->assign("weibo_data", $weibo_data);
        $this->display("index.html");
    }
    
    public function get() {
        $pageStart = $_POST['pageList'];
        $page = $pageStart.",10";
        $weibo_model = $this->model("weibo");
        $weibo_data = $weibo_model->getWeiboList($page);
        foreach ($weibo_data as $key => $value) {
            $weibo_data[$key]['user_data'] = $weibo_model->getWeiboUser($value['user_id']);
            $weibo_data[$key]['commet_data'] = $weibo_model->getWeiboComment($value['id']);
            foreach ($weibo_data[$key]['commet_data'] as $k => $v) {
                $weibo_data[$key]['commet_data'][$k]['user_data'] = $weibo_model->getWeiboUser($v['user_id']);
            }
        }
        $this->assign("weibo_data", $weibo_data);
        $html = $this->fetch("weibo_li.html");
        returnjson(1, "",$html,"",$weibo_data);
    }

    public function sendWeibo(){
        $new_content['weibo_content'] =  $_POST['weibo_content'];
        $new_content['type'] = $_POST['type'];
        $new_content['create_time'] = time();

        $new_content['uid'] = $_SESSION['uid'];
        // 保存这一条微博信息
        // 问题一：内容会被覆盖
        
        
        $error_array = $this->model('weibo')->setContent($new_content);

        if ($error_array['num'] > 0){
            
            $weibo_model = $this->model("weibo");
            $weibo_data = $weibo_model->getWeiboList(1);
            foreach ($weibo_data as $key => $value) {
                $weibo_data[$key]['user_data'] = $weibo_model->getWeiboUser($value['user_id']);
                $weibo_data[$key]['commet_data'] = $weibo_model->getWeiboComment($value['id']);
                foreach ($weibo_data[$key]['commet_data'] as $k => $v) {
                    $weibo_data[$key]['commet_data'][$k]['user_data'] = $weibo_model->getWeiboUser($v['user_id']);
                }
            }
            $this->assign("weibo_data", $weibo_data);

            // html编码统一返回null
            $html = $this->fetch("weibo_li.html");

            echo json_encode(
                array(
                    "status"=>1,
                    "msg"=>'发布成功',
                    "html"=>$html,
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