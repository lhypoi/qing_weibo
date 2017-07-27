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

    public function sendWeibo(){
        $new_content['weibo_content'] =  $_POST['weibo_content'];
        $new_content['type'] = $_POST['type'];
        $new_content['create_time'] = time();

        $new_content['uid'] = $_SESSION['uid'];
        // 保存这一条微博信息
        // 问题一：内容会被覆盖
        
        
        $error_array = $this->model('weibo')->setContent($new_content);

        if ($error_array['num'] >0){
            
            $this->assign("uid",$_SESSION['uid']);
            $this->assign("user_info",$_SESSION['user_info']);


            $new_content['id'] = $error_array['id'];
            $this->assign("weibo_data",$new_content);

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