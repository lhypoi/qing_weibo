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
        $commentStart = '';
        $comment = '';
        $result = array();
        if(isset($_POST['commentList'])) {
            $commentStart = $_POST['commentList'];
            $comment = $commentStart.",5";
            $result = $this->model("comment")->getComment($article_id, $comment);
            $this->assign("page", 1);
        } else {
            $result = $this->model("comment")->getComment($article_id);
            $this->assign("page", (int)$_POST['commet']+1);
        }
        $num = $this->model("comment")->getTotalComment($article_id);
        if(count($result) < 5 || $commentStart + 5 >= $num[0]) {
            $this->assign("more", 0);
        } else {
            $this->assign("more", 1);
        }
        $this->assign("item", $result);
        $html = $this->fetch("commet_li.html");
        returnjson(1,'评论查询成功',$html,"",$commentStart);
    }
}

?>