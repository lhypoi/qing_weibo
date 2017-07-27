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
<<<<<<< HEAD

    //添加内容
    public function setContent($new_content){
         $weibo_content=$new_content['weibo_content'];
        $type=$new_content['type'];
        $create_time=$new_content['create_time'];

        $uid = $new_content['uid'];
        // mysql添加
        $insert_sql = "insert into weibo_detail (weibo_content,create_time,type,user_id) values ('$weibo_content',$create_time,'$type',$uid)";

        // 执行一条语句
        $num = $this->exec($insert_sql);
        return  array(
            'num' => $num,
            'id' => $this->getInsertId()
        );
    }
=======
    
    
>>>>>>> 350b8448e8ac326ee6eb75fc2ca7780d1ee1c901
}

?>