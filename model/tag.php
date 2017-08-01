<?php
    /**
    *
    */
class tag extends pdoClass
{
    public function update($tagname_arr=array(), $weibo_id)
    {
        $tagid_arr = array();
        foreach ($tagname_arr as $value) {
            $sql = 'select * from tag where name = \''.$value.'\'';
            $num = $this->select($sql);
            if (count($num) == 0) {
                $result = $this->addInfo('tag', array('name'=>$value));
                $tagid_arr[] = $result['id'];
            } else {
                $result = $this->getInfo('tag', 'name = \''.$value.'\'', 'id');
                $tagid_arr[] = $result['0']['id'];
            }
        };
        foreach ($tagid_arr as $value) {
            $this->addInfo('tag_relationship', array('weibo_id'=>$weibo_id, 'tag_id'=>$value));
        }
        return $tagid_arr;
    }

    public function getTagbyWeiboid($weibo_id)
    {
        $sql = "select t.id,t.name from tag t inner join tag_relationship r on r.weibo_id = ".$weibo_id." and r.tag_id = t.id";
        $result = $this->select($sql);
        $tagid_arr = array();
        $tagname_arr = array();
        foreach ($result as $value) {
           $tagid_arr[] = $value['id'];
           $tagname_arr[] = $value['name'];
        }
        return $tag_data = array('tagid_arr'=>$tagid_arr, 'tagname_arr'=>$tagname_arr);
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
    // 删除标签
    public function getIdInRelation($weibo_id)
    {
        $sql = "select r.id from tag_relationship r inner join tag t on r.weibo_id = ".$weibo_id." and r.tag_id = t.id";
        return $result = $this->select($sql);
    }
    public function delTag($id) {
        $result = $this->delInfo('tag_relationship', $id);
        return $result;
    }
}
 ?>