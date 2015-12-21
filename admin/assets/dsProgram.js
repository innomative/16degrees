/*
 * Copyright © 2014 Innomative China
 * http://www.innomative.com
 * All rights reserved.
 */
 //Prevent IE errors


var isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
var isChrome = !!window.chrome && !isOpera;

function DegreesCommonClass() {

	var self = this;
	

	this.apiPath = '';
	this.page = 1;
	this.pageSize = 20;
	this.shining = function(com){
		var self = this;
		 $('#'+com).fadeTo(700,1,function(){
			  $('#'+com).fadeTo(700,0.3,function(){
				  dC.shining(com);
			  });
		 });
	};
	this.chMenu = function(num){
		$('.tNavItem').removeClass('bottom_line');
		$('#tm'+num).addClass('bottom_line');
	};
	this.getThumbBlock = function(w){
		return '<li>'
					+'<div>'
						+'<img src="images/products/'+w.src+'C.jpg" onclick="dC.showBD('+w.id+');"/>'
						+'<p class="w_name">'+w.name_cn+'</p>'
						+'<img src="images/products/show_detal_icon.jpg" class="showDetail" onclick="dC.showBD('+w.id+');"/>'
					+'</div>'
				+'</li>';
	};
	this.showMoreProduct = function(type){
		var me = this;
		this.comRun('page/showmoreProduct',{type:type,page:this.page,pageSize:this.pageSize},function(data){
			if(data.length > 1){
				$.each(data,function(i,v){
					var pw = me.getThumbBlock(v);
					$('.wine_list_container').append($(pw));
				});
				me.page++;
			}
			if(data.length < 1){
				$('.product_show_more_'+type).hide();
			}
		});
	};
	this.jumpTo = function(sec){
		this.hideOverLay();
		switch(sec){
			case 1:
				
				//console.log($("#DS_KV").height());
				window.location.href='index.php';
				
			break;
			case 2:
				window.location.href='index.php?action=announcement';
				
			break;
			case 3:
				window.location.href='index.php?action=recruit';
				
			break;
			case 4:
				console.log($(".footer").offset());
				$(window).scrollTop($(".footer").offset().top);
			default:
			break;
		}
	};
	this.showBD = function(pid){
		var me = this;
		
		//if(!this.smallDetailSlider){
			
		//}
		this.comRun('page/showProductDetails',{pid:pid},function(data){
			me.showOverLay('product');
			if(!me.productBigPicContainer){
				me.productBigPicContainer = $('<div class="flexslider bd_pics" id="bd_pics">' 
											+'<ul class="slides pdbp">'
												+'<li>'
													+'<img class="wbp wbpf" src="images/products/'+data.src+'.JPG";/>'
												+'</li>'
												+'<li>'
													+'<img class="wbp wbpb" src="images/products/'+data.src+'B.JPG";/>'
												+'</li>'
											+'</ul>'
									+'</div>');
				$('.product_overLay').find('.innerLay').prepend(me.productBigPicContainer);
			}
									
			
			
			me.smallSlider = $('#bd_pics').flexslider({
					animation:'fade',
					controlNav: true,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
					directionNav: true,
					prevText: "",           //String: Set the text for the "previous" directionNav item
		  			nextText: "",
		  			animationLoop: true, 
		  			slideshow:false,
			});
					
			
		});
			
		
	};
	this.showHeader = function(){
		$('.topNavBar').show();
	},
	this.hideHeader = function(){
		$('.topNavBar').hide();
	},
	this.showOverLay = function(title,callback){
		$('.'+title+'_overLay').fadeIn(500);
		if($.isFunction(callback)){
			callback();
		}
	};
	
	this.hideOverLay = function(){
		var me = this;
		$('.overLay').hide();
		if(me.smallSlider){
			me.smallSlider= null;
			me.productBigPicContainer = null;
			$('.bd_pics').remove();
		}
		
	};
	
	this.showToastr = function(msg,type,callback){
		var way = {
			1:{
				'type' : 'success',
				'title' : '提示信息'
			},
			2:{
				'type' : 'error',
				'title' : '错误信息'
			}
		};
		toastr.options = {
			  "closeButton": true,
			  "debug": false,
			  "positionClass": "toast-top-center",
			  "onclick": null,
			  "showDuration": "1000",
			  "hideDuration": "1000",
			  "timeOut": "5000",
			  "extendedTimeOut": "1000",
			  "hideEasing": "linear",
			  "showMethod": "fadeIn",
			  "hideMethod": "fadeOut"
		};
		toastr[way[type]['type']](msg, way[type]['title']);

		if ($.isFunction(callback)) {
			setTimeout(function(){callback();},1000);
		}
	};

	this.comRun = function (API, data, callback,isForm) {
		var me = this;
		if (!data) data = {};
		var api_s = API.split('/');
		var path = this.apiPath + 'index.php?ctrl=' + api_s[0] + '&action=' + api_s[1];
		var ajax_opt = {
			type: "POST",
			url: path,
			data: data,
			dataType: "json",
			error: function (jqXHR, textStatus, errorThrown) {
				console.log('ApiError : '+textStatus);
				alert('连接超时，请重新提交');
				$('.ajax-login').modal('hide');
			},
			success: function (result, textStatus, jqXHR) {
				//me.hideNotification();
				if (result) {
					if (!callback) {
						return false;
					}
					callback(result);
				}
			}
		};
		if(isForm){
			ajax_opt['processData'] = false;
			ajax_opt['contentType'] = false;
		}
		$.ajax(ajax_opt);
		return false;
	};

	

	this.setCookie = function (c_name,value,expiredays) {

		var exdate=new Date();
		exdate.setDate(exdate.getDate()+expiredays);
		document.cookie=c_name+ "=" +escape(value)+((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
	};

	this.getCookie = function(c_name)
	{
		if (document.cookie.length>0){
		  	c_start=document.cookie.indexOf(c_name + "=");
		 	if (c_start!=-1){
				c_start=c_start + c_name.length+1;
				c_end=document.cookie.indexOf(";",c_start);
				if (c_end==-1) c_end=document.cookie.length;
				return unescape(document.cookie.substring(c_start,c_end));
			}
		}
		return "";
	};
	this.submit_form = function(form,type){
		
		var formData = new FormData($('.'+form)[0]);
		switch (type){
			case 1 : ctrl = '';
			break;
			case 2 : ctrl = 'wine';
				formData.append('desc',CKEDITOR.instances.desc.getData());
			break;
			case 3 : ctrl = '';
			break;
			default : ctrl = '';
			break;
		}
		$('.ajax-login').modal('show');
		//var formData = $('.fd_news_form').serialize();
		//console.log(formData);
		dC.comRun(ctrl+'/save',formData,function(res){
			
			if(res.success == true){
				dC.showToastr('保存成功',1,function(){
					window.location.reload();
				});
			}else{
				dC.showToastr('保存失败',2);
			}
			$('.ajax-login').modal('hide');
		},true);
	};

	
	this.showModal = function(tpl,callback){
		 var me = this;
		 $(tpl).modal('show').on('shown', function () {

        	if ($.isFunction(callback)) {
				callback();
			}
		 });
	};
	this.getProductImage = function(name,id){
		//console.log(window.location);
		 if(!name){
		 	return 'images/no_img.gif';
		 }
		 return window.location.origin+'/images/wine/'+id+'/'+name;
	};
	this.getWineManagerMentModalTpl = function(id){
		var me = this;

		return   [
	                // tabindex is required for focus
                '<div id="dg_eidt_panel" class="modal fade" tabindex="-1" data-width="960" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">',
                  '<div class="modal-header">',
                    '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>',
                    '<h5 class="modal-title">'+((id)?'编辑':'添加')+'</h5>',
                  '</div>',
                  '<div class="modal-body">',
                    '<div class="row">',
						'<div class="col-md-12">',
							'<form action="" id="form_sample_1" class="form-horizontal dg_wine_form" method="post" enctype="multipart/form-data">',
								'<input name="wid" type="hidden" class="du_wine_id" value="'+((id)?id:'')+'"/>',
								'<div class="tabbable-custom nav-justified">',
									'<div class="tab-pane active" id="">',
										'<div class="form-group">',
											'<label class="control-label col-md-3">酒名<span class="required">*</span></label>',
											'<div class="col-md-6">',
												'<input type="text" name="name_cn" data-required="1"  class=" form-control du_wine_name_cn" value=""/>',
											'</div>',
										'</div>',
										'<div class="form-group">',
											'<label class="control-label col-md-3">外文名<span class="required">*</span></label>',
											'<div class="col-md-6">',
												'<input type="text" name="name_en" data-required="1"  class=" form-control du_wine_name_en" value=""/>',
											'</div>',
										'</div>',
										
										'<div class="form-group">',
			                              '<label  class="col-md-3 control-label">类别<span class="required">*</span></label>',
			                              '<div class="col-md-6">',
			                                 '<select  class="form-control du_wine_type" name="type" >',
			                                    '<option value=1>洋酒</option>',
			                                    '<option value=2>红酒</option>',
			                                    '<option value=3>啤酒</option>',
			                                    '<option value=4>黄酒</option>',
			                                    '<option value=5>气泡酒</option>',
			                                 '</select>',
			                              '</div>',
			                            '</div>',
			                            '<div class="form-group">',
											'<label class="control-label col-md-3">价格<span class="required">*</span></label>',
											'<div class="col-md-3">',
												'<input type="text" name="price" data-required="1"  class=" form-control du_wine_price" value=""/>',
											'</div>',
										'</div>',
										'<div class="form-group">',
											'<label class="control-label col-md-3">年份<span class="required">*</span></label>',
											'<div class="col-md-3">',
												'<input type="text" name="years" data-required="1"  class=" form-control du_wine_year" value=""/>',
											'</div>',
										'</div>',
										'<div class="form-group last">',
											'<label class="control-label col-md-3">上传酒图<span class="required">*</span></label>',
											'<div class="col-md-3">',
												'<div class="fileupload fileupload-new" data-provides="fileupload">',
													'<div class="fileupload-new thumbnail" style="width: 150px;">',
														'<img src="images/no_img.gif" alt="" class="small_prev_img du_wine_src1"/>',
													'</div>',
													'<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>',
													'<div>',
														'<span class="btn default btn-file">',
															'<span class="fileupload-new"><i class="icon-paper-clip"></i> 选择图片</span>',
															'<span class="fileupload-exists"><i class="icon-undo"></i> 更改</span>',
															'<input type="file" class="default" name="winPic_1"/>',
														'</span>',
														'<a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> 删除</a>',
													'</div>',
												'</div>',
											'</div>',
											'<div class="col-md-3">',
												'<div class="fileupload fileupload-new" data-provides="fileupload">',
													'<div class="fileupload-new thumbnail" style="width: 150px;">',
														'<img src="images/no_img.gif" alt="" class="small_prev_img du_wine_src2"/>',
													'</div>',
													'<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>',
													'<div>',
														'<span class="btn default btn-file">',
															'<span class="fileupload-new"><i class="icon-paper-clip"></i> 选择图片</span>',
															'<span class="fileupload-exists"><i class="icon-undo"></i> 更改</span>',
															'<input type="file" class="default" name="winPic_2"/>',
														'</span>',
														'<a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> 删除</a>',
													'</div>',
												'</div>',
											'</div>',
										'</div>',
										'<div class="form-group last">',
											'<label class="control-label col-md-3"></label>',
											'<div class="col-md-3">',
												'<div class="fileupload fileupload-new" data-provides="fileupload">',
													'<div class="fileupload-new thumbnail" style="width: 150px;">',
														'<img src="images/no_img.gif" alt="" class="small_prev_img du_wine_src3"/>',
													'</div>',
													'<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>',
													'<div>',
														'<span class="btn default btn-file">',
															'<span class="fileupload-new"><i class="icon-paper-clip"></i> 选择图片</span>',
															'<span class="fileupload-exists"><i class="icon-undo"></i> 更改</span>',
															'<input type="file" class="default" name="winPic_3"/>',
														'</span>',
														'<a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> 删除</a>',
													'</div>',
												'</div>',
											'</div>',
											'<div class="col-md-3">',
												'<div class="fileupload fileupload-new" data-provides="fileupload">',
													'<div class="fileupload-new thumbnail" style="width: 150px;">',
														'<img src="images/no_img.gif" alt="" class="small_prev_img du_wine_src4"/>',
													'</div>',
													'<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>',
													'<div>',
														'<span class="btn default btn-file">',
															'<span class="fileupload-new"><i class="icon-paper-clip"></i> 选择图片</span>',
															'<span class="fileupload-exists"><i class="icon-undo"></i> 更改</span>',
															'<input type="file" class="default" name="winPic_4"/>',
														'</span>',
														'<a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> 删除</a>',
													'</div>',
												'</div>',
											'</div>',
										'</div>',
										'<div class="form-group">',
			                              '<label class="control-label col-md-3">详细介绍<span class="required">*</span></label>',
			                              '<div class="col-md-9">',
			                                 '<textarea class="ckeditor form-control du_wine_desc" name="desc" id="desc" rows="6" data-error-container="#editor2_error"></textarea>',
			                                 '<div id="editor2_error"></div>',
			                              '</div>',
			                            '</div>',
										'<div class="form-group">',
			                              '<label class="control-label col-md-3">是否展示</label>',
			                              '<div class="col-md-9">',
			                                 '<div class="make-switch has-switch" data-on="primary" data-off="info">',
			                                    '<input type="checkbox" name="active" checked class="toggle du_wine_show" id="isShow"/>',
			                                 '</div>',
			                              '</div>',
			                            '</div>',
										'<div class="modal-footer form-actions">',
											'<a href="#" data-dismiss="modal" class="btn btn-default">关闭</a>',
								            '<button type="button" class="btn blue pull-right" onclick="dC.submit_form(\'dg_wine_form\',2);" >',
								            '保存',
								            '</button> ',
								         '</div>',
									'</div>',
								'</form>',
							'</div>',
						'</div>',
					'</div>',
                  '</div>',
                '</div>'
              ].join('');
	};
};

var dC = new DegreesCommonClass();
