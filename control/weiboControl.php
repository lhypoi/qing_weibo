<?php

class weiboControl extends baseControl{
    //首页获取
    public function index() {
        if (isset($_SESSION['uid']) && $_SESSION['uid'] != 0) {
            $user = $this->model("user")->getUserLog($_SESSION['uid']);
            $this->assign('user_name', $user['user_name']);
            $this->assign('user_nickname', $user['user_nickname']);
            $this->assign('user_pic', $user['user_pic']);
            switch ($user['auth']) {
                case 1:
                    ;
                break;
                case 2:
                    ;
                break;
                case 3:
                    $_SESSION['admin'] = $user['user_name'];
                break;
                default:
                    ;
                break;
            }
        } else {
            $_SESSION['uid'] = 0;
        }

        $weibo_model = $this->model("weibo");
        $weibo_data = $weibo_model->getWeiboList();
        foreach ($weibo_data as $key => $value) {
            $weibo_data[$key]['user_data'] = $weibo_model->getWeiboUser($value['user_id']);
            $weibo_data[$key]['commet_data'] = $weibo_model->getWeiboCommentTotal($value['id']);
            $weibo_data[$key]['tag_data'] = $this->model('tag')->getTagbyWeiboid($value['id']);
        }
        $this->assign("weibo_data", $weibo_data);
        $this->display("index.html");
    }

    //异步加载获取
    public function get() {
        $pageStart = $_POST['pageList'];
        $page_mark = $_POST['page_mark'];
        $id = $_POST['id'];
        $page = $pageStart.",10";
        $weibo_model = $this->model("weibo");
        $weibo_data = array();
        $weibo_id = array();
        if($page_mark == 'index') {
            $weibo_data = $weibo_model->getWeiboList($page);
        } elseif ($page_mark == 'tag') {
            $weibo_id = $weibo_model->getWeiboListById($id, $page);
            foreach ($weibo_id as $key => $value) {
                $result = $weibo_model->getWeiboListByTag($value['weibo_id']);
                foreach ($result as $k => $v) {
                    $weibo_data.array_push($weibo_data, $v);
                }
            }
        }
        if(empty($weibo_data)) {
            returnjson(0, "无更多页面","","",$weibo_id);
        }else{
            foreach ($weibo_data as $key => $value) {
                $weibo_data[$key]['user_data'] = $weibo_model->getWeiboUser($value['user_id']);
                $weibo_data[$key]['commet_data'] = $weibo_model->getWeiboCommentTotal($value['id']);
                $weibo_data[$key]['tag_data'] = $this->model('tag')->getTagbyWeiboid($value['id']);
            }
            $this->assign("weibo_data", $weibo_data);
            $html = $this->fetch("weibo_li.html");
            returnjson(1, "",$html,"",$page);
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
        $new_content['music'] = isset($_POST['music_file']) ? $_POST['music_file'] : '';

        if (isset($_FILES['pic_file'])) {
            $pic = "public/img/".$_SESSION['uid'].'_'.$new_content['create_time'].".jpg";
            move_uploaded_file($_FILES['pic_file']['tmp_name'], $pic);
            $new_content['pic'] = $pic;
        } else {
            $new_content['pic'] = '';
        }

        if (isset($_FILES['video_file'])) {
            $video = "public/video/".$_SESSION['uid'].'_'.$new_content['create_time'].".mp4";
            move_uploaded_file($_FILES['video_file']['tmp_name'], $video);
            $new_content['video'] = $video;
        } else {
            $new_content['video'] = '';
        }

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
                $weibo_data[$key]['commet_data'] = $weibo_model->getWeiboCommentTotal($value['id']);
                $weibo_data[$key]['tag_data'] = array('tagid_arr'=>$tagid_arr, 'tagname_arr'=>$tagname_arr);
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
             foreach ($commot_list as $key=>$value) {
                $this->model("comment")->delComment($value['id']);
             }
         }
         //查询是否有标签，有则删除
         $tag_list=$this->model("tag")->getTagbyWeiboid($weibo_id);
         if(!empty($tag_list)){
            foreach ($tag_list as $key=>$value) {
                $this->model("tag")->delTag($weibo_id);
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

    // public function tagSelect($value='')
    // {
    //     # code...
    // }

    public function editWeibo()
    {
        $result = $this->model('weibo')->edit();
        if ($result == 1) {
            returnjson('1','编辑成功');
        } else {
            returnjson('0','编辑失败');
        }
    }

    // 信息采集
    // http://localhost/20170718/lesson9/index.php?control=weibo&action=caiji
    public function caiji()
    {
        // 执行node文件
        exec("node bin/caiji.js");
        // 获取采集信息
        $caijiData = file_get_contents('caiji.json');
        $caijiData = json_decode($caijiData, true);
        // 更新到数据库中
        $weibo_model = $this->model("weibo");
        $user_model = $this->model("user");
        $new_content = array();
        foreach ($caijiData as $key => $value) {
            // 用户id随机从数据库中获取
            $new_content['uid'] = $this->model('user')->getRandomId();
            $new_content['weibo_content'] = $value['caiji_txt'];
            $new_content['type'] = 'short_content';
            $new_content['create_time'] = time();
            $this->model('weibo')->setContent($new_content);
            echo "正插入第".$key."条微博<br>";
        }
    }
}

?>