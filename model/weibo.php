<?php 

class weibo extends pdoClass{
    //获取微博列表
    public function getWeiboList($page="0,10") {
        $sql = "SELECT * FROM weibo_detail ORDER BY id DESC LIMIT $page";
        return $this->select($sql);
    }
    
    //获取用户信息
    public function getWeiboUser($user_id) {
        $sql = "SELECT * FROM weibo_user WHERE id=$user_id";
        return $this->find($sql);
    }
    
    //获取评论
    public function getWeiboComment($weibo_id) {
        $sql = "SELECT * FROM weibo_commet WHERE weibo_id=$weibo_id ORDER BY id DESC";
        return $this->select($sql);
    }
}

?>