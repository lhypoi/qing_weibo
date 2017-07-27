<?php
    /**
    *
    */
    class comment extends pdoClass
    {
        protected $table_name = "weibo_commet";

        public function addComment($comment_data)
        {
            $id  = $this->addInfo($comment_data);
            if ($id > 0) {
                $comment_data = getInfo('weibo_commet','id='.$id);
                $user_data = getInfo('weibo_user','id='.$commet_data[0]['user_id']);

                $this->smarty->assign("commet_data", $commet_data[0]);
                $this->smarty->assign("user_data",$user_data[0]);
                $html = $this->smarty->fetch("commet_li.html");
                returnjson(1,'微博发布成功',$html);
            }
        }
    }
 ?>