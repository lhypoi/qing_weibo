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
            };

            $weibo_data[$key]['tag_data'] = $this->model('tag')->getTagbyWeiboid($value['id']);
        }
        $this->assign("weibo_data", $weibo_data);
        $this->display("index.html");
        print_r($weibo_data);
    }

    public function get() {
        $pageStart = $_POST['pageList'];
        $page = $pageStart.",10";
        $weibo_model = $this->model("weibo");
        $weibo_data = $weibo_model->getWeiboList($page);
        if(empty($weibo_data)) {
            returnjson(0, "无更多页面");
        }else{
            foreach ($weibo_data as $key => $value) {
                $weibo_data[$key]['user_data'] = $weibo_model->getWeiboUser($value['user_id']);
                $weibo_data[$key]['commet_data'] = $weibo_model->getWeiboComment($value['id']);
                foreach ($weibo_data[$key]['commet_data'] as $k => $v) {
                    $weibo_data[$key]['commet_data'][$k]['user_data'] = $weibo_model->getWeiboUser($v['user_id']);
                };
    
                $weibo_data[$key]['tag_data'] = $this->model('tag')->getTagbyWeiboid($value['id']);
    
            }
            $this->assign("weibo_data", $weibo_data);
            $html = $this->fetch("weibo_li.html");
            returnjson(1, "",$html,"",$weibo_data);
        }
    }
    //发布微博
    public function sendWeibo(){
        $new_content['weibo_content'] =  $_POST['weibo_content'];
        $new_content['type'] = $_POST['type'];
        $new_content['create_time'] = time();

        $new_content['uid'] = $_SESSION['uid'];
        // 保存这一条微博信息
        // 问题一：内容会被覆盖



        $error_array = $this->model('weibo')->setContent($new_content);

        if ($error_array['num'] > 0){

            $tagname_arr = array();
            $tagid_arr = array();
            if (!empty($_POST['tagname_arr'])) {
                $tagid_arr = $this->model('tag')->update($_POST['tagname_arr'], $error_array['id']);
                $tagname_arr = $_POST['tagname_arr'];
            }

            $weibo_model = $this->model("weibo");
            $weibo_data = $weibo_model->getWeiboList(1);
            foreach ($weibo_data as $key => $value) {
                $weibo_data[$key]['user_data'] = $weibo_model->getWeiboUser($value['user_id']);
                $weibo_data[$key]['commet_data'] = $weibo_model->getWeiboComment($value['id']);
                $weibo_data[$key]['tag_data'] = array('tagid_arr'=>$tagid_arr, 'tagname_arr'=>$tagname_arr);
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

    //删除微博
    public function delete()
    {
         // 获取微博id
         // 删除这条微博信息，删除它的评论。文件 unlink
         $weibo_id = $_POST['id'];
         $table='weibo_detail';

         // 查询评论表该微博是否有评论信息
         $commot_list = $this->model("comment")->getCommontByWid($weibo_id);

         if (!empty( $commot_list)) {
             foreach ($commot_list as $key => $value) {
                $this->model("comment")->delComment($value['id']);
             }
         }


         $this->model("weibo")->delInfo($table,$weibo_id);

         echo returnJson("1","删除成功");exit();
    }

    public function headSelect($value='')
    {
        $uid=$_POST['$user_id'];
        $weibo_model = $this->model("weibo");
        $weibo_data = $weibo_model->getLastInfo($uid);
        foreach ($weibo_data as $key => $value) {
            $weibo_data[$key]['time']=date('Y-m-d H:i:s',$weibo_data[$key]['create_time']);
        }
        echo json_encode($weibo_data);
    }
}

?>