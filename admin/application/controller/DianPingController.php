<?php

class DianPingController extends iController {

		public function findPlaceAction(){

			//示例请求参数
			$params = array('format'=>'json','city'=>$_GET['city'],'sort'=>'2','page'=>1,'category'=>'美食','limit'=>'20','keyword'=>$_GET['keyword']);

			//按照参数名排序
			ksort($params);
			//print($params);

			//连接待加密的字符串
			$codes = DP_AKEY;

			//请求的URL参数
			$queryString = '';

			while (list($key, $val) = each($params))
			{
			  $codes .=($key.$val);
			  $queryString .=('&'.$key.'='.urlencode($val));
			}

			$codes .=DP_SKEY;
			//print($codes);

			$sign = strtoupper(sha1($codes));

			$url= 'http://api.dianping.com/v1/business/find_businesses'.'?appkey='.DP_AKEY.'&sign='.$sign.$queryString;

			$curl = curl_init();

			// 设置你要访问的URL
			curl_setopt($curl, CURLOPT_URL, $url);

			// 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

			curl_setopt($curl, CURLOPT_ENCODING, 'UTF-8');

			// 运行cURL，请求API
			$data = json_decode(curl_exec($curl), true);

			// 关闭URL请求
			curl_close($curl);

			$locations = array();

			if($data['count'] > 0) {
				foreach($data['businesses'] as $location) {
					$locations[] = array('name'=>$location['name'].' '.$location['branch_name'], 'address'=>$location['address'],'url'=>$location['business_url'],'business_id'=>$location['business_id']);
				}
			}

			$returnValue = new ResultObj(true,$locations,'');
			echo $returnValue->toJson();
		}
		
}

