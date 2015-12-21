
<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-toastr/toastr.min.css" />   
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
              <li >
                 <a href="index.php?action=index">
                 		蛋糕维护                 
                 </a>
              </li>
              <li class="active">
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
			团队管理
			</h3>
			<ul class="page-breadcrumb breadcrumb">
			<li class="btn-group">
			                    <button type="button" class="btn blue dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
			                        <span>Actions</span> <i class="icon-angle-down"></i>
			                    </button>
			                    <ul class="dropdown-menu pull-right" role="menu">
			                        <li><a href="#">Action</a></li>
			                        <li><a href="#">Another action</a></li>
			                        <li><a href="#">Something else here</a></li>
			                        <li class="divider"></li>
			                        <li><a href="#">Separated link</a></li>
			                    </ul>
			                </li>    
			 
			<li>
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
                     <div class="caption"><i class="icon-globe"></i>成员列表</div>
                     <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                        <a href="#portlet-config" data-toggle="modal" class="config"></a>
                        <a href="javascript:;" class="reload"></a>
                        <!--<a href="javascript:;" class="remove"></a>-->
                     </div>
                  </div>
                  <div class="portlet-body">
                     <div class="table-toolbar">
                        
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
                              <th>Name</th>
                              <th >Title</th>
                              <th >Edition Time</th>
                              
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach($data['team'] as $i=>$v){ ?>
                           <tr class="odd gradeX">
                              <td><a href="index.php?action=editTeam&id=<?=$v['id'];?>">编辑</a></td>
                              <td><?=$v['name'];?></td>
                              <td ><?=$v['title'];?></td>
                              <td class="center"><?=date('Y-m-d H:m',$v['creation_time']);?></td>
                             
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
   <script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
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
         $('#sample_1').dataTable({
                "aoColumns": [
                  { "bSortable": false },
                  null,
                  null,
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
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    },
                    "sInfo": "显示 _START_ 至 _END_ 总共 _TOTAL_ 条记录",
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            });
         <?php if($_SESSION['msg']){ ?>
         	
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
			toastr['success']("<?php echo $_SESSION['msg'];?>", "提示信息");
         <?php unset($_SESSION['msg']);}?>
      });
   </script>