<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?= $user!=NULL ? $user->full_name : "Unauthorized Access";?></p>
            </div>
          </div>
          <ul class="sidebar-menu">
            <li class="header">NAVIGATION</li>
            <? if($user->role == 2) {?>
            <li>
              <a href="/dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-users"></i> <span>Cusomter Management</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/customers">Customers</a></li>
                <li><a href="#">Customers in arrears</a></li>
                <li><a href="/customer/add">Add Customers</a></li>
              </ul>
            </li>
            <li>
              <a href="/requests">
                <i class="fa fa-comments"></i> <span>Complaints &amp; Requests</span>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i><span>Billing</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/bill/current">View Current Bill</a></li>
                <li><a href="/bill/past">View past bills</a></li>
              </ul>
            </li>
          <?}?>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
