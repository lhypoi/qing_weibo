<?php
    /**
    *
    */
    class comment extends pdoClass
    {
        protected $table_name = "weibo_commet";

        public function addComment($comment_data)
        {
            $result  = $this->addInfo('weibo_commet', $comment_data);
            $id = $result['id'];
            if ($id > 0) {
                $comment_data = $this->getInfo('weibo_commet','id='.$id);
                $user_data = $this->getInfo('weibo_user','id='.$comment_data[0]['user_id']);
                return array('comment_data'=>$comment_data[0], 'user_data'=>$user_data[0]);
            }
        }
    }
 ?>