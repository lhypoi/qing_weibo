<?php 

class commentControl extends baseControl{
    
    //发布评论
    public function add() {
        $comment_data['commet_time'] = time();
        $comment_data['user_id']  = $_SESSION['uid'];
        $comment_data['commet_content'] = $_POST['commet_content'];
        $comment_data['weibo_id'] = $_POST['weibo_id'];
        $new_comment[0] = $this->model('comment')->addComment($comment_data);
        $this->assign("item",$new_comment);
        $html = $this->fetch("commet_li.html");
        returnjson(1,"",$html,"",$new_comment);
    }
    
    //删除评论
    public function del() {
        $result = $this->model('comment')->delComment($_POST['comment_id']);
        if ($result > 0) {
            returnjson(1,'评论删除成功');
        }
    }
    
    //获取评论
    public function getComment() {
        $article_id = $_POST['article_id'];
        $result = $this->model("comment")->getComment($article_id);
        $this->assign("item", $result);
        $html = $this->fetch("commet_li.html");
        returnjson(1,'评论查询成功',$html,"",$result);
    }
}

?>