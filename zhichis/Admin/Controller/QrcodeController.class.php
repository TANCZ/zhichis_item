<?php
	namespace Admin\Controller;
	use Think\Controller;

	/**
	* 生成二维码Thinkphp/Extend/vendor/phpqrcode
	*/
	class qrcodeController extends Controller
	{
		//生成二维码
		public function setqrcode()
		{
			if (IS_POST) {
				$url = $_POST['url'];	//URL二维码参数
				$begin = $_POST['begin'];
				$end = $_POST['end'];
				//循环生成10个二维码
				for ($i=$begin; $i<$end; $i+=1){
					$only = md5($i);
				    $data = $url;
					$filename = $i.".png";
					$logo = ADMIN_IMG_URL."logo.jpg";
					$this -> qrcode($data,$filename,false,false,10,'L',2,true);
					$qrcode = D('qrcode');
					$only = md5($i);
					$list = array('code_name' => $filename,'code_url' => $data,'code_only' => $only, 'code_state' => '0');
					$rs = $qrcode -> add($list);
					if ($rs) {
						$this -> success('YES!');
					}else{
						$this -> error('no!');
					}
				}
			}else{
				$this -> display();
			}
		}

		 /* @param $data 二维码包含的文字内容
		 * @param $filename 保存二维码输出的文件名称，*.png
		 * @param bool $picPath 二维码输出的路径
		 * @param bool $logo 二维码中包含的LOGO图片路径
		 * @param string $size 二维码的大小
		 * @param string $level 二维码编码纠错级别：L、M、Q、H
		 * @param int $padding 二维码边框的间距
		 * @param bool $saveandprint 是否保存到文件并在浏览器直接输出，true:同时保存和输出，false:只保存文件
		 * return string
		 */
		function qrcode($data,$filename,$picPath=false,$logo=false,$size='4',$level='L',$padding=2,$saveandprint=false){
		    vendor("phpqrcode.phpqrcode");//引入工具包
		    // 下面注释了把二维码图片保存到本地的代码,如果要保存图片,用$fileName替换第二个参数false
		    $path = $picPath?$picPath:SITE_PATH."\\Uploads\\Picture\\QRcode"; //图片输出路径
		    mkdir($path);
		    //在二维码上面添加LOGO
		    if(empty($logo) || $logo=== false) { //不包含LOGO
		        if ($filename==false) {
		            \QRcode::png($data, false, $level, $size, $padding, $saveandprint); //直接输出到浏览器，不含LOGO
		        }else{
		            $filename=$path.'/'.$filename; //合成路径
		            \QRcode::png($data, $filename, $level, $size, $padding, $saveandprint); //直接输出到浏览器，不含LOGO
		        }
		    }else { //包含LOGO
		        if ($filename==false){
		            //$filename=tempnam('','').'.png';//生成临时文件
		           die('参数错误');
		        }else {
		            //生成二维码,保存到文件
		            $filename = $path . '\\' . $filename; //合成路径
		        }
		        \QRcode::png($data, $filename, $level, $size, $padding);
		        $QR = imagecreatefromstring(file_get_contents($filename));
		        $logo = imagecreatefromstring(file_get_contents($logo));
		        $QR_width = imagesx($QR);
		        $QR_height = imagesy($QR);
		        $logo_width = imagesx($logo);
		        $logo_height = imagesy($logo);
		        $logo_qr_width = $QR_width / 5;
		        $scale = $logo_width / $logo_qr_width;
		        $logo_qr_height = $logo_height / $scale;
		        $from_width = ($QR_width - $logo_qr_width) / 2;
		        imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
		        if ($filename === false) {
		            Header("Content-type: image/png");
		            imagepng($QR);
		        } else {
		            if ($saveandprint === true) {
		                imagepng($QR, $filename);
		                header("Content-type: image/png");//输出到浏览器
		                imagepng($QR);
		            } else {
		                imagepng($QR, $filename);
		            }
		        }
		    }
		    return $filename;
		}

		//生成兑换码
		public function redeemcode()
		{
			if (IS_POST) {
				$Red = D('Redeemcode');

				$proid = $_POST['proid'];
				$Number = $_POST['num'];

				
				for ($i=0; $i < $Number; $i++) { 
					$code = $this -> randCode(8,3);
					$data = array('pro_id' => $proid,'order_number' => '','red_code' => $code,'red_isuse' => '0');
					$rs = $Red -> data($data) -> add();
					if ($rs) {
						$this -> success('生成兑换码成功!');
					}else{
						$this -> error('生成兑换码失败!');
					}
				}

			}else{
				$this -> display();
			}
		}

		/**
		 * /
		 * @param  integer $length [要生成的随机字符串长度]
		 * @param  integer $type   [随机码类型：0，数字+大小写字母；1，数字；2，小写字母；3，大写字母；4，特殊字符；-1，数字+大小写字母+特殊字符]
		 * @return [type]          [返回生成的随即字符]
		 */
		function randCode($length = 5, $type = 0) {
		    $arr = array(1 => "0123456789", 2 => "abcdefghijklmnopqrstuvwxyz", 3 => "ABCDEFGHIJKLMNOPQRSTUVWXYZ", 4 => "~@#$%^&*(){}[]|");
		    if ($type == 0) {
		        array_pop($arr);
		        $string = implode("", $arr);
		    } elseif ($type == "-1") {
		        $string = implode("", $arr);
		    } else {
		        $string = $arr[$type];
		    }
		    $count = strlen($string) - 1;
		    $code = '';
		    for ($i = 0; $i < $length; $i++) {
		        $code .= $string[rand(0, $count)];
		    }
		    return $code;
		}
	}