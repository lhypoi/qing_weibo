<?php 

class weiboControl extends baseControl{
    public function index() {
        $weibo_data = $this->model("weibo")->getWeiboList();
        foreach ($weibo_data as $key => $value) {
            $weibo_data[$key]['user_data'] = $this->model("weibo")->getWeiboUser($value['user_id']);
            $weibo_data[$key]['commet_data'] = $this->model("weibo")->getWeiboComment($value['id']);
            foreach ($weibo_data[$key]['commet_data'] as $k => $v) {
                $weibo_data[$key]['commet_data'][$k]['user_data'] = $this->model("weibo")->getWeiboUser($v['user_id']);
            }
        }
        $this->assign("weibo_data", $weibo_data);
        $this->display("index.html");
        print_r($weibo_data);
    }
}

?>