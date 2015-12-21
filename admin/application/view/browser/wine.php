<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
<link href="assets/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-toastr/toastr.min.css" /> 
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-switch/static/stylesheets/bootstrap-switch-metro.css"/>  
  
<div class="page-content">
         <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->               
         <div class="row">
			<div class="col-md-12">
			<!-- BEGIN PAGE TITLE & BREADCRUMB-->
			<h3 class="page-title">
			酒品管理
			</h3>
			<ul class="page-breadcrumb breadcrumb">
			
			<i class="icon-home"></i>
			<a href="index.php?action=index">首页</a> 
			
			<i class="icon-angle-right"></i>
			</li>
			<li><a href="#"></a></li>
			
			                
			</ul>
			<!-- END PAGE TITLE & BREADCRUMB-->
			</div>
			</div>
         
         
         <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                     <h4 class="modal-title">Modal title</h4>
                  </div>
                  <div class="modal-body">
                     Widget settings form goes here
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn blue">Save changes</button>
                     <button type="button" class="btn default" data-dismiss="modal">Close</button>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- /.modal -->
         <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
         <!-- BEGIN STYLE CUSTOMIZER -->
         
         <div class="row">
            <div class="col-md-12">
               <!-- BEGIN EXAMPLE TABLE PORTLET-->
               <div class="portlet box light-grey">
                  <div class="portlet-title">
                     <div class="caption"><i class="icon-globe"></i>酒品列表</div>
                     <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                        <a href="javascript:;" class="reload"></a>
                        <!--<a href="javascript:;" class="remove"></a>-->
                     </div>
                  </div>
                  <div class="portlet-body">
                     <div class="table-toolbar">
                        <div class="btn-group">
                           <button id="sample_editable_1_new" class="btn green" onclick="dC.showModal(dC.getWineManagerMentModalTpl(),function(){$('.make-switch')['bootstrapSwitch']();CKEDITOR.replace('desc',{});
				            	});">
                           新增酒品 <i class="icon-plus"></i>
                           </button>
                        </div>
                        <!--
                        <div class="btn-group pull-right">
                           <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                           </button>
                           <ul class="dropdown-menu pull-right">
                              <li><a href="#">Print</a></li>
                              <li><a href="#">Save as PDF</a></li>
                              <li><a href="#">Export to Excel</a></li>
                           </ul>
                        </div>
                        -->
                     </div>
                     <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                           <tr>
                              <th>&nbsp;</th>
                              <th>酒名</th>
                              <th>外文名</th>
                              <th>价格</th>
                              <th >年份</th>
                              <th >类别</th>
                              <th >是否展示</th>
                              <th >修改时间</th>
                              
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach($data['wine_list'] as $i=>$v){ ?>
                           <tr class="odd gradeX" wine-id="<?=$v['id'];?>">
                              <td><a href="javascript:void(0);" class="edit">编辑</a></td>
                              <td><?=$v['name_cn'];?></td>
                              <td><?=$v['name_en'];?></td>
                              <td ><?=$v['price'];?></td>
                              <td ><?=$v['years'];?></td>
                              <td ><?=$v['type'];?></td>
                              <td ><?php echo ($v['active'])?'<span class="label label-sm label-success">已上架</span>':'<span class="label label-sm label-danger">已下架</span>';?></td>
                           	  <td class="center"><?=date('Y-m-d H:m',$v['modify_time']);?></td>	
                           </tr>
						  <?php }  ?> 
                        </tbody>
                     </table>
                  </div>
               </div>
               <!-- END EXAMPLE TABLE PORTLET-->
            </div>
         </div>
     </div>
      

   <!-- END CORE PLUGINS -->
   <!-- BEGIN PAGE LEVEL PLUGINS -->
   <script src="assets/scripts/form-validation.js"></script>
   <script type="text/javascript" src="assets/plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
   <script type="text/javascript" src="assets/plugins/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="assets/plugins/data-tables/DT_bootstrap.js"></script>
   <script type="text/javascript" src="assets/plugins/bootstrap-toastr/toastr.min.js"></script>
   <script type="text/javascript" src="assets/plugins/ckeditor/ckeditor.js"></script> 
   <script src="assets/plugins/bootstrap-switch/static/js/bootstrap-switch.js" type="text/javascript" ></script>
   <!-- END PAGE LEVEL PLUGINS -->
   <!-- BEGIN PAGE LEVEL SCRIPTS -->
   
   <script src="assets/scripts/app.js"></script>
   <script src="assets/scripts/table-managed.js"></script>     
   <script>
      jQuery(document).ready(function() {       
         App.init();
         TableManaged.init();
         
         $('#sample_1 a.edit').on('click', function (e) {
			e.preventDefault();
			/* Get the row as a parent of the link that was clicked on */
			var nRow = $(this).parents('tr')[0];
			dC.comRun('wine/getWine', {
				wineID: parseInt($(nRow).attr('wine-id'))
			}, function (res) {
				if (res.success == true) {
					var data = res.data;
					console.log(data);
		            var wine_modal = dC.getWineManagerMentModalTpl(data.id);
		            dC.showModal(wine_modal,function(){
		            	
		            	$('.du_wine_name_cn').val(data.name_cn);
		            	$('.du_wine_name_en').val(data.name_en);
		            	$('.du_wine_type').val(data.type);
		            	$('.du_wine_price').val(data.price);
		            	$('.du_wine_year').val(data.years);
		            	$('.du_wine_src1').attr('src',dC.getProductImage(data.src1,data.id));
		            	$('.du_wine_src2').attr('src',dC.getProductImage(data.src2,data.id));
		            	$('.du_wine_src3').attr('src',dC.getProductImage(data.src3,data.id));
		            	$('.du_wine_src4').attr('src',dC.getProductImage(data.src4,data.id));
		            	$('.du_wine_show').prop("checked",(data.active==1)?true:false);
		            	CKEDITOR.replace('desc',{})
		            	$('.make-switch')['bootstrapSwitch']();
		            	$('#desc').val(data.desc);
						
		            });

		            //me.showModal(image_modal);

				}
			});

		});
         
      });
   </script>