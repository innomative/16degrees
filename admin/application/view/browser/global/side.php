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
           <a href="">
           <i class="icon-cogs"></i> 
           <span class="title">产品维护</span>
           <span class="selected "></span>
           </a>
           <ul class="sub-menu">
              <li class="<?php echo ($_SESSION['page_index']=='index')?'active':''; ?>">
                 <a href="index.php?action=index">
                 		酒品维护               
                 </a>
              </li>
               <li class="<?php echo ($_SESSION['page_index']=='wine_type')?'active':''; ?>">
                 <a href="index.php?action=wine_type">
                 		类别管理           
                 </a>
              </li>
           </ul>
        </li>
       
     <!-- END SIDEBAR MENU -->
</div> 