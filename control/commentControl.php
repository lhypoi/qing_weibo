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

            $new_comment = $this->model('comment')->addComment($comment_data);
            $this->assign("commet_data", $new_comment['comment_data']);
            $this->assign("user_data",$new_comment['user_data']);
            $html = $this->fetch("commet_li.html");
            returnjson(1,'微博发布成功',$html);
        }
    }

 ?>