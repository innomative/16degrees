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
			类别管理
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
         
         <div class="row">
            <div class="col-md-12">
               <!-- BEGIN EXAMPLE TABLE PORTLET-->
               <div class="portlet box light-grey">
                  <div class="portlet-title">
                     <div class="caption"><i class="icon-globe"></i>类别列表</div>
                     <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                        <a href="javascript:;" class="reload"></a>
                        <!--<a href="javascript:;" class="remove"></a>-->
                     </div>
                  </div>
                  <div class="portlet-body">
                     <div class="table-toolbar">
                        <div class="btn-group">
                           <button id="sample_editable_1_new" class="btn green">
                         	新增类别<i class="icon-plus"></i>
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
                     <table class="table table-striped table-bordered table-hover" id="m_table_k">
                        <thead>
                           <tr>
                              <th class="col-md-10">类名</th>
                              <th class="col-md-2">&nbsp;</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach($data['wine_list'] as $i=>$v){ ?>
                           <tr class="odd gradeX" wine-id="<?=$v['id'];?>">
                              <td class="col-md-10"><?=$v['type'];?></td>
                              <td class="col-md-2"><?=$v['type'];?></td>
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

   <script type="text/javascript" src="assets/plugins/data-tables/jquery.dataTables.js"></script>
   <script type="text/javascript" src="assets/plugins/data-tables/DT_bootstrap.js"></script>
   <script type="text/javascript" src="assets/plugins/bootstrap-toastr/toastr.min.js"></script>

   <!-- END PAGE LEVEL PLUGINS -->
   <!-- BEGIN PAGE LEVEL SCRIPTS -->
   
   <script src="assets/scripts/app.js"></script>
   <script src="assets/scripts/table-managed.js"></script>     
   <script>
      jQuery(document).ready(function() {       
         App.init();
         if (!jQuery().dataTable) {
					return;
				}
				// begin first table
				var oTable = $('#m_table_k').dataTable({
					"aoColumns": [
						{
							"bSortable": false
						},
					  	null,
						
					],
					"aLengthMenu": [
						[5, 15, 20, -1],
						[5, 15, 20, "All"] // change per page values here
					],
					// set the initial value
					"iDisplayLength": 5,
					"sPaginationType": "bootstrap",
					"oLanguage": {
						"sLengthMenu": "_MENU_ 记录",
						"oPaginate": {
							"sPrevious": "",
							"sNext": ""
						},
						"sInfo": "显示 _START_ 至 _END_ 总共 _TOTAL_ 条记录",
						"sInfoEmpty": "显示 0 至 0 总共 0 条记录",
						"sEmptyTable": "暂无记录",
						"sSearch": "搜索:",
						"sZeroRecords": "未查询到相关记录",
						"sInfoFiltered": "(从 _MAX_ 条记录中筛选)"
					},
					"aoColumnDefs": [{
							'bSortable': false,
							'aTargets': [0]
						}
					]
				});
         
      });
   </script>