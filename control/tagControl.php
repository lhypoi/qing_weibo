<?php 

class tagControl extends baseControl {
    //获取与标签相关的微博
    public function info() {
        $id = $_GET['id'];
        $model = $this->model("tag");
        $weibo_id = $model->getWeiboListById($id);
        $weibo_data = array();
        foreach ($weibo_id as $key => $value) {
            $result = $model->getWeiboListByTag($value['weibo_id']);
            foreach ($result as $k => $v) {
                $weibo_data.array_push($weibo_data, $v);
            }
        }
        foreach ($weibo_data as $key => $value) {
            $weibo_data[$key]['user_data'] = $model->getWeiboUser($value['user_id']);
            $weibo_data[$key]['commet_data'] = $model->getWeiboCommentTotal($value['id']);
            $weibo_data[$key]['tag_data'] = $this->model('tag')->getTagbyWeiboid($value['id']);
        
        } 
        $this->assign("weibo_data", $weibo_data);
        $this->display("tag.html");
    }
    
    //选取标签的最近三条微博
    public function tagSelect() {
        $id = $_POST['tag_id'];
        $model = $this->model("tag");
        $weibo_id = $model->getWeiboListById($id);
        foreach ($weibo_id as $key => $value) {
            $result = $model->getWeiboListByTag($value['weibo_id'], "0,3");
        }
        returnjson(1, "","","",$result);
    }
}

?>