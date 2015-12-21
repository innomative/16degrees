<?php

class WineController extends IController {

		public function saveAction(){
			
			$cid = intval($_POST['wid']);
			$name = $_POST['name_cn'];
			$name_en = $_POST['name_en'];
			$type = $_POST['type'];
			$price = $_POST['price'];
			$desc = $_POST['desc'];
			$year = $_POST['years'];
			$active = (isset($_POST['active']) && $_POST['active']=='on')?1:0;
			if($cid){
				$sql = "Update 
							`product` 
						set 
							`name_cn`='".ms($name)."',
							`name_en`='".ms($name_en)."',
							`price`='".intval($price)."',
							`years`=".intval($year).",
							`desc`='".ms($desc)."',
							`type`=".intval($type).",
							`active`=".intval($active).",
							`modify_time`=".time()." 
						where 
							`id`=".ms($cid);
			}else{
				
				$sql = "Insert into
							 `product` (
							 		`name_cn`,
							 		`name_en`,
							 		`price`,
							 		`years`,
							 		`desc`,
							 		`type`,
							 		`active`,
							 		`modify_time`) 
						Values(
							'".ms($name)."',
							'".ms($name_en)."',
							'".ms($price)."',
							'".ms($year)."',
							'".ms($desc)."',
							'".ms($type)."',
							'".ms($active)."',
							".time()."
						)";
				
			}
			if(DB::query($sql) && !$cid){
				$b_id = DB::lastInsertID();
				
			}else if(DB::query($sql) && $cid){
				$b_id = $cid;
			}
			if(!empty($_FILES)){
				$order = 1;
				foreach ($_FILES as $i => $v) {
					
					if(!$v['error']){
						$handle1 = new upload($v);
						if ($handle1->uploaded) {
						  $handle1->file_name_body_pre   = '16du_';
						  $handle1->file_new_name_body   = $b_id.'_'.$order;
						  //$handle1->file_new_name_ext  = 'png';
						  $handle1->file_overwrite = true;
						  $handle1->file_max_size = '40480000';
						 // $handle1->image_convert = 'png';
						  //$handle1->png_compression = 5;			 
						  $handle1->process(PRODUCT_SRC.$b_id.'/');
						  if ($handle1->processed) {
						  	$sql="Update `product` set `src".$order."` = '".$handle1->file_dst_name."' where `id`=".$b_id;
						    DB::query($sql);
						    $handle1->clean();
						  } else {
						    //echo 'error : ' . $handle1->error;
						  }
						  $order++;
						}
					}
				}
			}
			$res = new ResultObj(true,'','保存成功');
            echo $res->toJson();exit;
		}

		public function getWineAction(){
			$wid = $_POST['wineID'];
			$sql = 'Select * from `product` where `id`='.ms($wid);
			$wine = DB::execute($sql);
			$res = new ResultObj(true,$wine,'');
			echo $res->toJson();
            exit;
		}
		
}

