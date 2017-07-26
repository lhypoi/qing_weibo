<?php 

class userControl extends baseControl{
    public function reg() {
        $_POST['date'] = time();
        $exist = $this->model("user")->find("SELECT username FROM weibo_user WHERE username='{$_POST['username']}'");
        if($exist) {
            echo json_encode(
                array(
                    "status" => 0,
                    "msg" => "该用户已存在"
                )
            );
        }else {
            $result = $this->model("user")->addInfo("weibo_user", $_POST);
            if($result['code'] == '00000') {
                $_SESSION['user'] = $_POST['username'];
                echo json_encode(
                    array(
                        "status" => 1,
                        "msg" => "注册成功",
                    )
                );
            } else {
                echo json_encode(
                    array(
                        "status" => 0,
                        "msg" => "注册失败"
                    )
                );
            }
        }
    }
}

?>