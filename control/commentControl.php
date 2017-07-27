<?php

    /**
    *
    */
    class commentControl extends baseControl
    {
        public function add()
        {
            $comment_data['commet_time'] = time();
            $comment_data['user_id']  = $_SESSION['uid'];
            $comment_data['commet_content'] = $_POST['commet_content'];
            $comment_data['weibo_id'] = $_POST['weibo_id'];

            $id = $this->model('comment')->addComment($comment_data);
        }
    }

 ?>