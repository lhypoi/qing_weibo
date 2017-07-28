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
            $sql = 'select t.id,t.name from tag t inner join tag_relationship r on r.weibo_id = '.$weibo_id.' and r.tag_id = t.id';
            $result = $this->select($sql);
            $tagid_arr = array();
            $tagname_arr = array();
            foreach ($result as $value) {
               $tagid_arr[] = $value['id'];
               $tagname_arr[] = $value['name'];
            }
            return $tag_data = array('tagid_arr'=>$tagid_arr, 'tagname_arr'=>$tagname_arr);
        }
    }
 ?>