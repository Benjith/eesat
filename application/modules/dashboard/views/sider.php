 <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4">Mark Stephen</h1>
              <p>Web Designer</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
<!--            <li class="active"> <a href="index.html"><i class="icon-home"></i>Home</a></li>-->
            <li><a href="<?php echo site_url('school');?>" aria-expanded="false" data-toggle=""> <i class="fa fa-university"></i>SCHOOL</a>
             <!--  <ul id="dashvariants" class="collapse list-unstyled">
                <li><a href="">Add New</a></li>
                
              </ul> -->
            </li>
            <li> <a href="<?php echo site_url('exam'); ?>" aria-expanded="false" data-toggle=""> <i class="fa fa-list-ol"></i>EXAM</a>
            <ul id="dashvariants" class="collapse list-unstyled">
                <li><a href="#">Add New</a></li>
                
              </ul>
            </li>
            <li> <a href="<?php echo site_url('students/student');?>" aria-expanded="false" data-toggle=""> <i class="fa fa-graduation-cap"></i>STUDENTS  </a>
           <!--  <ul id="dashvariants" class="collapse list-unstyled">
                <li><a href="#">Add New</a></li>
                
              </ul> -->
            </li>
            <li> <a href="#result_list" aria-expanded="false" data-toggle="collapse" > <i class="fa fa-trophy"></i>RESULT </a>
            <ul id="result_list" class="collapse list-unstyled">
                <li><a href="<?php echo site_url('result');?>">Set Result</a></li>
                <li><a href="<?php echo site_url('result/download');?>">Download</a></li>
                
              </ul>
            </li>
            
          </ul>
        </nav>
        