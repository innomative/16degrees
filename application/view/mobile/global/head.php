<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=640, initial-scale=.5, maximum-scale=.5"/>
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>UGG Australia</title>
	<script src="js/jquery-1.9.1.js" type="text/javascript"></script>
    <script  type="text/javascript" src="js/uggProgram.js?v=548"></script>
	<script type="text/javascript" language="javascript" src="js/JIC.js?v=14"></script>
    <script type="text/javascript" src="js/flexslider/jquery.flexslider.js"></script>
    <script type="text/javascript" src="js/exif.js"></script>
    <script  type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript">
   	var new_eid = 0;
   	var share_pic = 'default_pic_mob_list.jpg';
   	var my_wid = '';
	var event_hash = '';
	var page = '<?=htmlspecialchars(strtolower($_GET['action']))?>';
	var share_type = 3;
	function getShareData(index,type) {
		var wid = '<?php if(isset($data['wid'])) {echo $data['wid'];}else{ ?>'+my_wid+'<?php } ?>';
		var eid = '<?php if(isset($data['eid'])) {echo $data['eid'];}else{ ?>'+new_eid+'<?php } ?>';
		var cpid = ugg.getCurrentPid();
		<?php if(empty($data['name'])) $data['name'] ='我'; ?>

		switch (page) {
			<?php
			if($data['event_notConfirmed']) {
			?>
			case 'eventdetail':
				share_pic = '<?php if(isset($data['e_m_pic'])) {echo $data['e_m_pic'].'_mob_list.jpg';}else{ ?>'+share_pic+'<?php } ?>';
			<?php
			}
			else {
			?>
			case 'index':
			<?php
			}
			?>
				if(index == 'url') {
					var eurl = '';

					if(eid != 0){
						eurl = '&eid='+eid+'&partyHash=<?php if(isset($data['partyHash'])) {echo $data['partyHash'];}else{ ?>'+event_hash<?php } ?>;
						share_type = 1;
						return "<?=MY_DOMAIN?>index.php?ctrl=page&action=inviteBack&fwid=<?=$data['wid']?>"+eurl;

					}else{
						 return "<?=MY_DOMAIN?>index.php?action=defaultShareBack&fwid=<?=$data['wid']?>";

					}

				} else if(index == 'title') {
					if(type=='msg') {
						if(eid == 0){
						 	// return "【晒温暖】晒出UGG好礼来！";
						 	return "畅游美国加州的机会，不可错过！";
						}
						// return "@<?=$data['name']?> 向你发起了一个UGG温暖邀请！";
						return "@<?=$data['name']?> 用UGG约会神器向你发起温暖邀约";
					}
					else {
						return "@<?=$data['name']?> 用UGG约会神器向你发起温暖邀约，快响应吧！";
					}
					// if(eid == 0){
					// 	return "【晒温暖】晒出UGG好礼来！";
					// }
					// return "@<?=$data['name']?> 发起了一个温暖约会，期待有你的加入！";
				}
				else if(index == 'desc') {
					if(eid == 0){
						// if (type == 'msg') {
      //                   	return "相聚有时，重逢不难，让我们见面吧！";
	     //                } else if (type == 'timeline') {
	     //                    return "【晒温暖】晒出UGG好礼来！让我们一起晒温暖吧！";
	     //                }
	     				if (type == 'msg') {
	                        return "参加UGG活动，就有机会畅游美国加州。";
	                    } else {
	                        return "快和@<?=$data['name']?>一起参与UGG活动，赢美国加州之旅！";
	                    }
					}
					// return "相聚有时，重逢不难，让我们见面吧！";
					if (type == 'msg') {
						return "小伙伴快响应吧！";
					} else if (type == 'timeline') {
						return "@<?=$data['name']?> 用UGG约会神器向你发起温暖邀约，小伙伴快响应吧！";
					}
				}
				else if (index == 'img') {
					return "<?=MY_DOMAIN?>received_pics/" + share_pic;
				}
				break;

			case 'gallery':

				if (index == 'url') {
					if (cpid) {
						share_type = 2;
						return "<?=MY_DOMAIN?>index.php?ctrl=page&action=shareBack&pid=" + cpid + "&fwid=<?=$data['wid']?>";
					} else {
						return "<?=MY_DOMAIN?>index.php?action=defaultShareBack";
					}

				} else if (index == 'title') {
					if (cpid) {
						//return "投票就得礼盒，@<?=$data['name']?> 已经投了，你还不快来！";
						if(type == "timeline"){
							return "UGG#晒温暖#，@<?=$data['name']?> 投票分享抢礼盒了，你还不来？";
						} else {
							return "UGG#晒温暖#，@<?=$data['name']?> 投票分享抢礼盒了，你还不来？";
						}

					} else {
						return "畅游美国加州的机会，不可错过！";
					}

				} else if (index == 'desc') {
					if (cpid) {
						if (type == 'msg') {
							//return "每次投票都能获UGG限定礼盒1个。参与活动，还有机会赢取美国加州之旅！";
							return "感动就投票，礼盒马上到！";
						} else if (type == 'timeline') {
							return "@<?=$data['name']?>投了这张照片一票。你也快来投票吧，每次投票都能获UGG限定礼盒1个。参与活动，还有机会赢取美国加州之旅！";
						}
					} else {
						if (type == 'msg') {
							return "参加UGG活动，就有机会畅游美国加州。";
						} else if (type == 'timeline') {
							return "快和@<?=$data['name']?>一起参与UGG活动，赢美国加州之旅！";
						}
					}

				} else if (index == 'img') {
					return "<?=MY_DOMAIN?>received_pics/" + ugg.getCurrentSharePic();

				}
				break;
			case 'giftwin':
			case 'couponwin':
			case 'submitmobile':
			case 'aftervote':
				<?php
				if ($data == 1 || isset($data['result'])) {
				?>
					if (index == 'url') {
						share_type = 4;
						return "<?=MY_DOMAIN?>index.php?ctrl=page&action=winShareBack&fwid=<?=$data['wid']?>";
					} else if (index == 'title') {
					    return "@<?=$data['name']?>刚中了一份UGG温暖好礼。奖品还有好多，你快来！";
					} else if (index == 'desc') {
						if (type == 'msg') {
							return "UGG奖品拿到你手软，还有机会畅游美国加州！";
						} else if (type == 'timeline') {
							return "@<?=$data['name']?> 刚得了一个UGG好礼，你也快来投票吧。参与活动，还有机会赢取美国加州之旅！";
						}
					} else if (index == 'img') {
	                    return "<?=MY_DOMAIN?>received_pics/" + share_pic;
					}
					break;
				<?php
				}
				?>

			default:
				//share_pic = '<?php if(count($data['e_pic'])>0) {echo $data['e_pic'][0];}else{ ?>'+share_pic+'<?php } ?>';
				//alert(share_pic);
				if (index == 'url') {
                    return "<?=MY_DOMAIN?>index.php?action=defaultShareBack&fwid=<?=$data['wid']?>";
                } else if (index == 'title') {
                    return "畅游美国加州的机会，不可错过！";
                } else if (index == 'desc') {
                    if (type == 'msg') {
                        return "参加UGG活动，就有机会畅游美国加州。";
                    } else if (type == 'timeline') {
                        return "快和@<?=$data['name']?>一起参与UGG活动，赢美国加州之旅！";
                    }
                } else if (index == 'img') {
                    return "<?=MY_DOMAIN?>received_pics/" + share_pic;
                }
		}
	}


	//prevent multiple calling of start
	var verticalDragEnabled = true;
	document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
		WeixinJSBridge.call('hideToolbar');
	});
    document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
        WeixinJSBridge.call('showOptionMenu');
    });

	var dataForWeixin = {
        appId: "",
        MsgImg: "<?=MY_DOMAIN?>received_pics/"+share_pic,
        TLImg: "",
        url: '',
        title: "# 相聚U时",
        desc: "# 相聚U时",
        fakeid: ""
    };
		(function(){
                var onBridgeReady = function(){

                    WeixinJSBridge.on('menu:share:appmessage', function(argv){
                        WeixinJSBridge.invoke('sendAppMessage', {
                            "appid": dataForWeixin.appId,
                            "img_url": getShareData('img', 'msg'),
                            "img_width": "120",
                            "img_height": "120",
                            "link": getShareData('url','msg'),
                            "desc": getShareData('desc','msg'),
                            "title": getShareData('title','msg')
                        }, function(res){
							if(res.err_msg == 'send_app_msg:confirm' || res.err_msg == 'send_app_msg:ok') {
								if(new_eid){
									$('#so').hide();
									$('#viewport').hide();
									$('#afterCreate').fadeIn(200);
									$(window).scrollTop(0);
								}
								if(page == 'gallery' || page == 'eventdetail') {
									//ugg.vote();
									ugg.hideOverlay('tosharetip');
								}
								ugg.wechat_share('<?=$data['wid']?>',share_type,2);
							}
                        });
                    });
                    WeixinJSBridge.on('menu:share:timeline', function(argv){
                        WeixinJSBridge.invoke('shareTimeline', {
                            "img_url": getShareData('img', 'msg'),
                            "img_width": "120",
                            "img_height": "120",
                            "link": getShareData('url','timeline'),
                            "desc": getShareData('title','timeline'),
                            "title": getShareData('title','timeline')
                        }, function(res){
							//(dataForWeixin.callback)();

							if(res.err_msg == 'share_timeline:ok') {
								ugg.wechat_share('<?=$data['wid']?>',share_type,1);
								if(new_eid){
									$('#so').hide();
									$('#viewport').hide();
									$('#afterCreate').fadeIn(200);
									$(window).scrollTop(0);
								}

								if(page == 'gallery' || page == 'eventdetail') {
									//ugg.vote();
									ugg.hideOverlay('tosharetip');
								}

							}
                        });
                    });

                };
                if (document.addEventListener) {
                    document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
                }
                else
                    if (document.attachEvent) {
                        document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
                        document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
                    }
            })();

	$(document).ready(function() {
		//dp.init();
		if(navigator.userAgent.indexOf('4.4.2') !=-1 || navigator.userAgent.indexOf('4.4.3') !=-1 || navigator.userAgent.indexOf('4.4.4') !=-1) {
			$('meta[name=viewport]').attr('content','width=640, user-scalable=no, target-densitydpi=device-dpi');
		}
	});
	var has_uplaoded =false;
	function inno_pre_view_pic(){
		$('.spinner').show();
		var pic_loader = document.getElementById('fileToUpload');
		var prePic = document.getElementById("new_pic");
		orgimg = pic_loader.files[0];

	    getRotationAngle(orgimg,function(imgblob,angle){
			//var img = document.createElement("img");
			var reader = new FileReader();
    			reader.onload = function(e) {prePic.src = e.target.result}; //write the blob convertet to a data url in the image-source
			reader.readAsDataURL(imgblob);
			//var canvas=document.getElementById("new_pic");
    		//var ctx=canvas.getContext("2d");
    		pic_angel = angle;
    		has_uplaoded =true;
			//img.onload = function(){ //you cant draw it directly because you have to wait until the image is loaded by the browser
				//drawRotatedResized(canvas,img,angle,575,267);
			$('.spinner').hide();
			//};
		});
	}

 	function inno_upload_pic(callback){

 		var prePic = document.getElementById("new_pic");

		if (prePic.src == "") {
            alert("必须先选一张照片噢！");
            return false;
        }

		var callback2 = function(compressed_src){
			jic.upload(compressed_src, 'index.php?action=previewPic', 'file', 'new.jpg',function (responseText){
				var res = jQuery.parseJSON(responseText);
				if(res.success ==true){
					$('#picName').val(res.data.pname);
					if (callback) {
		                callback();
		                return false;
		            }
				}else{
					alert('照片格式有误');
				}

			},function(){},function(evt){
				if($('.UPL').is(":hidden")){
					$('.UPL').show();
				}
			});

		}
		if(has_uplaoded){
 			var compressed_src = jic.compress(prePic,40,'new.jpg',callback2);
 		}else{
 			$('.UPL').hide();
 			$('#picName').val('default_pic');
 			callback();
 		}
		return false;
 	}
	setTimeout(function() {
		doTrackPage('antiBounce');
	},3000);
    </script>

    <link rel="stylesheet" href="css/flexslider.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css?v=2" type="text/css" />
    <style type="text/css">
	body { font-family: 微软雅黑 ;color: #fff;}
	.flex-direction-nav { display:block; }
	.flex-control-nav { bottom:300px }
	.flexslider { background:none  }
	#viewport { padding-bottom: 20px;width:640px; min-height: 990px; overflow:hidden; background-image: url('../mobile/images/ugg_bg.jpg');background-repeat:repeat-y}
	#explosion{width:620px; position:absolute; top:950px; left:300px;  display:none; z-index:10000;}

	.whiteBorder { -webkit-text-fill-color: black;-webkit-text-stroke-color: white;-webkit-text-stroke-width:2px;font-weight:bold; }

	.textfield {
		position: absolute;
	    height: 48px;
	    width: 510px;
	    border: 0px;
	    font-size: 38px;
	    background:none;
	}
	input[type="radio"]{ width: 45px;
					 height: 45px;
					 position:relative; z-index: 10;
					 opacity: 0; vertical-align: middle;left:92px;
				   }

	</style>
</head>

<body style="margin: 0px">
<div class="UPL">
	<div></div>
	正在上传图片<div class="ani_dot">...</div>
</div>
<div id="loading_mask" style="width:640px; height:1100px; z-index:100000; display:none;background-color:#000; position:fixed; top:0px; left:0px; color:#FFFFFF"><span style="position:absolute; display:block; top:450px; left:270px; font-size:24px;">Loading...</span></div>
