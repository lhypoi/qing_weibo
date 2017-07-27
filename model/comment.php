<?php 

class comment extends pdoClass{
    protected $table_name = "weibo_commet";
    
    public function addComment($comment_data) {
        $result  = $this->addInfo('weibo_commet', $comment_data);
        $id = $result['id'];
        if ($id > 0) {
            $sql = "SELECT 
                        commet.id, 
                        commet.commet_content, 
                        commet.commet_time, 
                        commet.weibo_id, 
                        commet.user_id, 
                        user.user_name, 
                        user.user_nickname, 
                        user.user_pic
                    FROM 
                        weibo_commet commet 
                    INNER JOIN 
                        weibo_user user 
                    ON (commet.user_id=user.id AND commet.id=$id)";
            return $this->find($sql);
        }
    }
    
    public function delComment($comment_id) {
        $result = $this->delInfo('weibo_commet', $comment_id);
        return $result;
    }
    
    public function getComment($weibo_id) {
        $sql = "SELECT 
                    commet.id, 
                    commet.commet_content, 
                    commet.commet_time, 
                    commet.weibo_id, 
                    commet.user_id, 
                    user.user_name, 
                    user.user_nickname, 
                    user.user_pic
                 FROM 
                    weibo_commet commet 
                INNER JOIN 
                    weibo_user user 
                ON (commet.user_id=user.id AND commet.weibo_id=$weibo_id) 
                ORDER BY commet.id DESC";
        return $this->select($sql);
    }
}

?>