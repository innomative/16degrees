
<link href="assets/plugins/jcrop/css/jquery.Jcrop.min.css" rel="stylesheet"/>
<link href="assets/css/pages/image-crop.css" rel="stylesheet"/>
 <link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
<style>
	#preview-pane {
		display: block;
		position: relative;
		z-index: 2000;
		right: 0px;
		width: 235px;
		height:235px;
		padding: 6px;
		border: 1px rgba(0,0,0,.4) solid;
		background-color: white;
		-webkit-border-radius: 6px;
		-moz-border-radius: 6px;
		border-radius: 6px;
		-webkit-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
		-moz-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
		box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
	}
	#preview-pane .preview-container {
		width: 220px;
		height: 220px;
		overflow: hidden;
	}
</style>   
<div class="page-sidebar navbar-collapse collapse">
     
     <!-- BEGIN SIDEBAR MENU -->        
     <ul class="page-sidebar-menu">
        <li>
           <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
           <div class="sidebar-toggler hidden-phone"></div>
           <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        </li>
        <li>
           <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
           <form class="sidebar-search" action="" method="POST">
              <div class="form-container">
                 <div class="input-box">
                    <a href="javascript:;" class="remove"></a>
                    <input type="text" placeholder="Search..."/>
                    <input type="button" class="submit" value=" "/>
                 </div>
              </div>
           </form>
           <!-- END RESPONSIVE QUICK SEARCH FORM -->
        </li>
        
        <li class="start active ">
           <a href="index.php?action=editCakes">
           <i class="icon-cogs"></i> 
           <span class="title">产品维护</span>
           <span class="selected "></span>
           </a>
           <ul class="sub-menu">
              <li class="active">
                 <a href="index.php?action=index">
                 		蛋糕维护                 
                 </a>
              </li>
              <li >
                 <a href="index.php?action=team">
                 		团队信息维护
                 </a>
              </li>
           </ul>
        </li>
       
     <!-- END SIDEBAR MENU -->
</div>   
<div class="page-content">
         <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->               
         <div class="row">
			<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				 <h3 class="page-title">
                  <?php echo ($data['cake'])?'编辑蛋糕':'添加蛋糕';?>
               </h3>
               <ul class="page-breadcrumb breadcrumb">
                  <li>
                     <i class="icon-home"></i>
                     <a href="index.php?action=index">首页</a> 
                     <i class="icon-angle-right"></i>
                  </li>
                  <li>
                     <a href="#">蛋糕维护</a>
                     <i class="icon-angle-right"></i>
                  </li>
                  <li><a href="#"> <?php echo ($data['cake'])?'编辑蛋糕':'添加蛋糕';?></a></li>
			<!-- END PAGE TITLE & BREADCRUMB-->
			</div>
			</div>
         
         
         
         <!-- /.modal -->
         <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
         <!-- BEGIN STYLE CUSTOMIZER -->
         
         <div class="row">
            <div class="col-md-12">
               <!-- BEGIN VALIDATION STATES-->
               <div class="portlet box yellow">
                  <div class="portlet-title">
                     <div class="caption"><i class="icon-reorder"></i>蛋糕属性</div>
                     <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                        <a href="#portlet-config" data-toggle="modal" class="config"></a>
                        <a href="javascript:;" class="reload"></a>
                        <!--<a href="javascript:;" class="remove"></a>-->
                     </div>
                  </div>
                  <div class="portlet-body">
                     
                     <!-- BEGIN FORM-->
                     <form action="index.php?action=addCake" id="form_sample_1" class="form-horizontal" method="post" enctype="multipart/form-data">
                     	<div class="tabbable-custom nav-justified">
                        <ul class="nav nav-tabs nav-justified">
                           <li class="active"><a href="#tab_1_1_1" data-toggle="tab">基本信息</a></li>
                           <li><a href="#tab_1_1_2" data-toggle="tab">剪裁蛋糕小图</a></li>
                           <li><a href="#tab_1_1_3" data-toggle="tab">剪裁蛋糕大图</a></li>
                        </ul>
                       
	                        <div class="tab-content">
		                           <div class="tab-pane active" id="tab_1_1_1">
			                           <div class="alert alert-danger display-hide">
			                              <button class="close" data-dismiss="alert"></button>
			                              You have some form errors. Please check below.
			                           </div>
			                           <div class="alert alert-success display-hide">
			                              <button class="close" data-dismiss="alert"></button>
			                              Your form validation is successful!
			                           </div>
			                           <div class="form-group">
			                              <label class="control-label col-md-3">名称<span class="required">*</span></label>
			                              <div class="col-md-4">
			                                 <input type="text" name="name" data-required="1" class="form-control" value="<?php echo ($data['cake'])?$data['cake']['name']:'';?>"/>
			                              </div>
			                           </div>
			                           <div class="form-group">
			                              <label class="control-label col-md-3">英文名<span class="required">*</span></label>
			                              <div class="col-md-4">
			                                 <input name="name_en" type="text" class="form-control" value="<?php echo ($data['cake'])?$data['cake']['name_en']:'';?>"/>
			                              </div>
			                           </div>
			                           <div class="form-group">
			                              <label class="control-label col-md-3">价格<span class="required">*</span></label>
			                              <div class="col-md-4">
			                                 <input name="price" type="text" class="form-control" value="<?php echo ($data['cake'])?$data['cake']['price']:'';?>"/>
			                                <!-- <span class="help-block">e.g: http://www.demo.com or http://demo.com</span>-->
			                              </div>
			                           </div>
			                           <div class="form-group">
			                              <label class="control-label col-md-3">描述<span class="required">*</span></label>
			                              <div class="col-md-4">
			                                 <input name="desc" type="text" class="form-control" value="<?php echo ($data['cake'])?$data['cake']['desc']:'';?>"/>
			                                <!-- <span class="help-block">e.g: http://www.demo.com or http://demo.com</span>-->
			                              </div>
			                           </div>
			                           <div class="form-group">
			                              <label class="control-label col-md-3">顺序<span class="required">*</span></label>
			                              <div class="col-md-4">
			                                 <input name="order" type="text" class="form-control" value="<?php echo ($data['cake'])?$data['cake']['sort_order']:'';?>"/>
			                              </div>
			                           </div>
			                           <div class="form-group" >
			                              <label class="control-label col-md-3">是否出售中<span class="required">*</span></label>
			                              <div class="col-md-4">
			                                 <div class="radio-list">
			                                    <label class="radio-inline">
			                                    <input type="radio" name="sell" value="1" <?= ($data['cake']['sell'])?checked:'';?>/>
			                                    Yes
			                                    </label>
			                                    <label class="radio-inline">
			                                    <input type="radio" name="sell" value="0" <?= ($data['cake']['sell']==0)?checked:'';?>/>
			                                    No
			                                    </label> 
			                                    <div id="form_2_membership_error"></div>
			                                 </div>
			                              </div>
			                           </div>
			                           <div class="form-group last">
			                              <label class="control-label col-md-3">上传产品预览图<span class="required">*</span></label>
			                              <div class="col-md-9">
			                                 <div class="fileupload fileupload-new" data-provides="fileupload">
			                                    <div class="fileupload-new thumbnail" style="width: 160px; height: 160px;">
			                                       <img src="<?= ($data['cake']['src'])?'../images/bread/'.$data['cake']['src']:'../images/icon/no_img.gif';?>" alt="" />
			                                    </div>
			                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
			                                    <div>
			                                       <span class="btn default btn-file">
			                                       <span class="fileupload-new"><i class="icon-paper-clip"></i> 选择图片</span>
			                                       <span class="fileupload-exists"><i class="icon-undo"></i> 更改</span>
			                                       <input type="file" class="default" name="small_pic"/>
			                                       </span>
			                                       <a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> 删除</a>
			                                    </div>
			                                    <div class="alert alert-warning " style="width: 310px;margin-top: 16px;">
						                        	<strong>注意!</strong> 预览图长宽比例必须是1:1.
						                      	</div>
			                                 </div>
			                              </div>
			                           </div>
			                           <div class="form-group last">
			                              <label class="control-label col-md-3">上传产品大图<span class="required">*</span></label>
			                              <div class="col-md-9">
			                                 <div class="fileupload fileupload-new" data-provides="fileupload">
			                                    <div class="fileupload-new thumbnail" style="width: 300px;">
			                                       <img src="<?= ($data['cake']['src'])?'../images/bread/b'.$data['cake']['src']:'../images/icon/no_img.gif';?>" alt="" />
			                                    </div>
			                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
			                                    <div>
			                                       <span class="btn default btn-file">
			                                       <span class="fileupload-new"><i class="icon-paper-clip"></i> 选择图片</span>
			                                       <span class="fileupload-exists"><i class="icon-undo"></i> 更改</span>
			                                       <input type="file" class="default" name="big_pic"/>
			                                       </span>
			                                       <a href="#" class="btn red fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> 删除</a>
			                                    </div>
			                                    <div class="alert alert-warning " style="width: 310px;margin-top: 16px;">
						                        	 <strong>注意!</strong> 产品大图 长：1006像素  高 642像素.
						                      	</div>
			                                   
			                                 </div>
			                              </div>
			                           </div>
			                       </div>
			                       <div class="tab-pane" id="tab_1_1_2">
		                              	<div class="row">
				                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				                              <img src="<?= ($data['cake']['src'])?'../images/bread/'.$data['cake']['src']:'../images/icon/no_img.gif';?>" id="demo3" alt="Jcrop Example" />
				                           </div>
				                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="">
				                              <div id="preview-pane">
				                                 <div class="preview-container">
				                                    <img src="<?= ($data['cake']['src'])?'../images/bread/'.$data['cake']['src']:'../images/icon/no_img.gif';?>" class="jcrop-preview" alt="Preview"/>
				                                 </div>
				                                 
				                              </div>
				                              <div class="alert alert-warning " style="width: 310px;margin-top: 16px;">
						                         <strong>提示!</strong> 上方显示区域将作为首页产品列表预览图.
						                      </div>
				                           </div>
				                        </div>
		                           </div>
		                           <div class="tab-pane" id="tab_1_1_3">
		                              
		                           </div>
	                        </div>
                        
                        <input type="hidden" value="<?=($_GET['id'])?$_GET['id']:0; ?>" name="cid"/>
                        <div class="form-actions fluid">
                           <div class="col-md-offset-3 col-md-9">
                              <button type="submit" class="btn green">提交</button>
                            <!--  <button type="button" class="btn default">Cancel</button>-->
                              <a href="index.php?action=index" class="btn default">取消</a>                              
                           </div>
                        </div>
                     </form>
                     <!-- END FORM-->
                  </div>
                   </div>
               </div>
               <!-- END VALIDATION STATES-->
            </div>
         </div>
     </div>
      
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
   <script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>    
   <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   <script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
   <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
   <script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>  
   <script src="assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
   <script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
   <!-- END CORE PLUGINS -->
   <!-- BEGIN PAGE LEVEL PLUGINS -->
   <script type="text/javascript" src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>
   <script type="text/javascript" src="assets/plugins/jquery-validation/dist/additional-methods.min.js"></script>
   <script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
   <script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script> 
   <script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
   <script type="text/javascript" src="assets/plugins/ckeditor/ckeditor.js"></script>
   <!-- END PAGE LEVEL PLUGINS -->
   <!-- BEGIN PAGE LEVEL SCRIPTS -->
   <script src="assets/scripts/app.js"></script>
   <script src="assets/scripts/form-validation.js"></script>
   <script src="assets/plugins/jcrop/js/jquery.color.js"></script>
   <script src="assets/plugins/jcrop/js/jquery.Jcrop.min.js"></script>
   <script type="text/javascript" src="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>   
   <script>
      jQuery(document).ready(function() {       
         App.init();
         //FormValidation.init();
         var form1 = $('#form_sample_1');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    name: {
                        minlength: 2,
                        required: true
                    },
                    name_en: {
                        required: true,
                        minlength: 2,
                        //email: true
                    },
                    price: {
                        required: true,
                        number: true
                    },
                    order: {
                        required: true,
                        number: true
                    },
                    
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    App.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                	
                    //success1.show();
                    error1.hide();
                    form.submit();
                }
            });
        
         var demo3 = function() {
        // Create variables (in this scope) to hold the API and image size
		        var jcrop_api,
		            boundx,
		            boundy,
		            // Grab some information about the preview pane
		            $preview = $('#preview-pane'),
		            $pcnt = $('#preview-pane .preview-container'),
		            $pimg = $('#preview-pane .preview-container img'),
		
		            xsize = $pcnt.width(),
		            ysize = $pcnt.height();
		        	
		            console.log('init',[xsize,ysize]);
		
		        $('#demo3').Jcrop({
		          boxWidth:500,
		          onChange: updatePreview,
		          onSelect: updatePreview,
		          aspectRatio: xsize / ysize
		        },function(){
		          // Use the API to get the real image size
		          var bounds = this.getBounds();
		          boundx = bounds[0];
		          boundy = bounds[1];
		          // Store the API in the jcrop_api variable
		          jcrop_api = this;
		          // Move the preview into the jcrop container for css positioning
		          //$preview.appendTo(jcrop_api.ui.holder);
		        });
		
		        function updatePreview(c)
		        {
		          if (parseInt(c.w) > 0)
		          {
		            var rx = xsize / c.w;
		            var ry = ysize / c.h;
		
		            $pimg.css({
		              width: Math.round(rx * boundx) + 'px',
		              height: Math.round(ry * boundy) + 'px',
		              marginLeft: '-' + Math.round(rx * c.x) + 'px',
		              marginTop: '-' + Math.round(ry * c.y) + 'px'
		            });
		          }
		        };
		    }
		   demo3(); 
		   
      });
   </script>