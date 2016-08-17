<?php
	namespace Admin\Controller;
	use Think\Controller;

	/**
	* 新闻动态，护理知识管理
	*/
	class ContentController extends Controller
	{

		/**
		 *新闻动态---------------------------------------------------------------------------------------------------------------------------------
		 */
		//查询所有新闻动态，并进行分页
		public function newslist(){

			$list = M('news');
			//查询新闻总数
			$count = $list -> count();
			$p = getpage($count,5);
			//查询新闻信息
			$rs = $list -> field('id,title,content,edit_time,readnum')
					-> limit($p->firstRow, $p->listRows)
					-> select();		
			// 赋值数据集	
			$this -> assign('select', $rs);

			//赋值分页输出
	        $this -> assign('page', $p->show());
			$this -> display();
		}

		//添加新闻列表
		public function addnews()
		{
			if (IS_POST) {
				$list = D('news');

				$title = $_POST['title'];
				echo $title;
				$editor = $_POST['myEditor'];
				print_r($editor);

				$data = array('title' => $title,'content' => $editor, 'edit_time' => date("Y-m-d H:i:s"));

				$rs = $list -> data($data) -> add();

				if ($rs) {
					$this->success('提交成功!', U('content/newslist'), 3);
				}else{
					$this->error('提交失败！');
				}
			}else{
				$this -> display();	
			}
			
		}

		//修改前绑定参数
		public function savenews()
		{
			$data = M('news');

			$id = $_GET['id'];

			$this -> assign('list',$data -> find($id));

			$this -> display();
		}

		//修改
		public function updata()
		{
			$list = D('news');

			$id = $_POST['contentid'];
			$title = $_POST['title'];
			$editor = $_POST['myEditor'];
			echo $id."================";
			$data = array('title' => $title,'content' => $editor,'edit_time' => date("Y-m-d H:i:s"));

			$wh = array('id' => $id);
			$rs = $list -> where($wh) -> setField($data);
			echo $list -> getlastsql();
				if ($rs == true) {
					$this->success('提交成功！', U('content/contentlist'), 3);
				}else{
					$this->error('提交失败！');
				}
		}

		//删除
		public function delContent()
		{
			$list = D('news');

			$id = $_GET['id'];

			$wh = array('id' => $id);

			$rs = $list -> where($wh) -> delete();

			if ($rs) {
				$this->success('删除成功！', U('content/newslist'), 3);
			}else{
				$this->error('删除失败');
			}
		}

		/**
		 * 护理知识---------------------------------------------------------------------------------------------------------------------------------
		 */
		

		//查询所有护理知识，并进行分页
		public function essaylist(){
			$list = M('essay');
			//查询护理知识总数
			$count = $list -> count();
			$p = getpage($count,5);
			//查询护理知识信息
			$rs = $list -> field('id,title,content,edit_time')
					-> limit($p->firstRow, $p->listRows)
					-> select();		

			// 赋值数据集	
			$this -> assign('select', $rs);

			//赋值分页输出
	        $this -> assign('page', $p->show());
			
			$this -> display();
		}

		//添加
		public function addessay()
		{
			if (IS_POST) {
				$list = D('essay');

				$title = $_POST['title'];
				echo $title;
				$editor = $_POST['myEditor'];
				print_r($editor);

				$data = array('title' => $title,'content' => $editor, 'edit_time' => date("Y-m-d H:i:s"));

				$rs = $list -> data($data) -> add();

				if ($rs) {
					$this->success('提交成功！', U('content/essaylist'), 3);
				}else{
					$this->error('提交失败！');
				}
			}else{
				$this -> display();	
			}
			
		}


		//修改绑定参数
		public function saveessay()
		{
			$data = M('essay');

			$id = $_GET['id'];

			$this -> assign('list',$data -> find($id));

			$this -> display();
		}

		//修改
		public function upessay()
		{
			$list = D('essay');

			$id = $_POST['contentid'];
			$title = $_POST['title'];
			$editor = $_POST['myEditor'];
			$data = array('title' => $title,'content' => $editor,'edit_time' => date("Y-m-d H:i:s"));

			$wh = array('id' => $id);
			$rs = $list -> where($wh) -> setField($data);
			if ($rs == true) {
				$this->success('提交成功！', U('content/essaylist'), 3);
			}else{
				$this->error('提交失败！');
			}
		}

		//删除
		public function delessay()
		{
			$list = D('essay');

			$id = $_GET['id'];

			$wh = array('id' => $id);

			$rs = $list -> where($wh) -> delete();

			if ($rs) {
				$this->success('删除成功！', U('content/essaylist'), 3);
			}else{
				$this->error('删除失败');
			}
		}
	}