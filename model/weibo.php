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
    public function getWeiboCommentTotal($weibo_id) {
        $sql = "SELECT count(*) FROM weibo_commet WHERE weibo_id=$weibo_id";
        $result = $this->find($sql);
        return $result[0];
    }

    //添加内容
    public function setContent($new_content){
        $weibo_content=$new_content['weibo_content'];
        $type=$new_content['type'];
        $create_time=$new_content['create_time'];

        $uid = $new_content['uid'];

        $pic = empty($new_content['pic']) ? '' : $new_content['pic'];
        $music = empty($new_content['music']) ? '' : $new_content['music'];
        $video = empty($new_content['video']) ? '' : $new_content['video'];
        // mysql添加
        $insert_sql = "insert into weibo_detail (weibo_content,create_time,type,user_id,pic,music,video) values ('$weibo_content',$create_time,'$type',$uid,'$pic','$music','$video')";

        // 执行一条语句
        $num = $this->exec($insert_sql);
        return  array(
            'num' => $num,
            'id' => $this->getInsertId()
        );
    }


    public function getLastInfo($uid)
    {

        $sql ="select * from weibo_detail where user_id=$uid order by id desc limit 3";

        return $this->select($sql);
    }

    public function getCommontByWid($weibo_id)
    {
        $result = $this->select('select * form weibo_commet where weibo_id = $weibo_id');
        return $result;
    }

    public function edit()
    {
        $create_time = time();
        $result = $this->updateInfo('weibo_detail', array('weibo_content'=>$_POST['weibo_content'],'create_time'=>$create_time), array('id'=>$_POST['id']));
        return $result;

    }

    //通过标签ID获取微博ID
    public function getWeiboListById($id, $page="0,10") {
        $sql = "SELECT weibo_id FROM tag_relationship WHERE tag_id = $id ORDER BY id DESC LIMIT $page";
        return $this->select($sql);
    }

    //获取相关微博列表
    public function getWeiboListByTag($weibo_id) {
        $sql = "SELECT * FROM weibo_detail WHERE id = $weibo_id";
        return $this->select($sql);
    }

    // 根据用户id获取用户的微博数据
    public function getWeiboByUser($user_id, $page="0,10")
    {
        $sql = "select * from weibo_detail where user_id = $user_id order by id desc limit $page";
        return $this->select($sql);
    }

    // 根据用户id获取用户的微博id
    public function getWeiboidByUser($user_id, $page="0,10")
    {
        $sql = "select weibo_id from weibo_detail where user_id = $user_id order by id desc limit $page";
        return $this->select($sql);
    }
}

?>