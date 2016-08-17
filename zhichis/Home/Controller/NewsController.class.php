<?php
	namespace Home\Controller;
	use Think\Controller;
class NewsController extends Controller {

	public function _initialize(){
            if(!isset($_SESSION['user_id'])){
                 //$this -> redirect(GROUP_NAME."/")
                 $this->redirect(Home."/index/index");            
            }
    }

    public function news_a(){
    	$this -> display();
    }

    public function news_b(){
    	$this -> display();
    }

}