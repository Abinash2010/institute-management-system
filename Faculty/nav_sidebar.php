<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="index.php">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                 <li>
            <?php        echo '<a class="active" href="faculty/faculty.php?dept='.$data->Dept_id.'">'; ?>
                        <i class="fa "></i>
                        <span>Faculty</span>
                    </a>
                </li>
                 <li>
             <?php       echo '<a class="active" href="student/student.php?dept='.$data->Dept_id.'">'; ?>
                        <i class="fa "></i>
                        <span>Student</span>
                    </a>
                </li>
                 <li>
                  <?php echo '<a class="active" href="department/department.php?dept='.$data->Dept_id.'">'; ?>
                        <i class="fa "></i>
                        <span>Department</span>
                    </a>
                </li>
                <li>
                <?php  echo '<a class="active" href="subject/subject.php?dept='.$data->Dept_id.'">'; ?>
                        <i class="fa "></i>
                        <span>Subject</span>
                    </a>
                </li>
                <li>
                     <?php  echo '<a class="active" href="result/result.php?dept='.$data->Dept_id.'">'; ?>
                        <i class="fa "></i>
                        <span>Result</span>
                    </a>
                </li>
                <li>
                     <?php  echo '<a class="active" href="attendence/attendence.php?dept='.$data->Dept_id.'">'; ?>
                        <i class="fa "></i>
                        <span>Attendence</span>
                    </a>
                </li>
                <li>
                     <?php  echo '<a class="active" href="assignment/assignment.php?dept='.$data->Dept_id.'">'; ?>
                        <i class="fa "></i>
                        <span>Assignment</span>
                    </a>
                </li>
                    <li>
                     <?php  echo '<a class="active" href="notification/notification.php?dept='.$data->Dept_id.'">'; ?>
                        <i class="fa "></i>
                        <span>Notification</span>
                    </a>
                </li>
                 

               
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>