<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="../index.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <?php  echo '<a class="active" href="faculty.php?dept='.$id.'">'; ?>
                        <i class="fa "></i>
                        <span>Faculty</span>
                    </a>
                </li>
                 <li>
                    <?php  echo'<a class="active" href="../student/student.php?dept='.$id.'">'; ?>
                        <i class="fa "></i>
                        <span>STUDENT</span>
                    </a>
                </li>
                 <li>
                    <?php  echo'<a class="active" href="../department/department.php?dept='.$id.'">'; ?>
                        <i class="fa "></i>
                        <span>Department</span>
                    </a>
                </li>
                <li>
                    <?php  echo'<a class="active" href="../subject/subject.php?dept='.$id.'">'; ?>
                        <i class="fa "></i>
                        <span>Subject</span>
                    </a>
                </li>
                <li>
                   <?php  echo' <a class="active" href="../result/result.php?dept='.$id.'">'; ?>
                        <i class="fa "></i>
                        <span>Result</span>
                    </a>
                </li>
                <li>
                    <?php  echo'<a class="active" href="../attendence/attendence.php?dept='.$id.'">'; ?>
                        <i class="fa "></i>
                        <span>Attendence</span>
                    </a>
                </li>
                <li>
                  <?php  echo'<a class="active" href="../assignment/assignment.php?dept='.$id.'">'; ?>
                        <i class="fa "></i>
                        <span>Assignment</span>
                    </a>
                </li>
                <li>
                  <?php  echo'<a class="active" href="../notification/notification.php?dept='.$id.'">'; ?>
                        <i class="fa "></i>
                        <span>Notification</span>
                    </a>
                </li>
                 
                 
               
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>