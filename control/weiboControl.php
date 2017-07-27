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
}

?>