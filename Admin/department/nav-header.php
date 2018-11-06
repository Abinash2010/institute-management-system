<header class="header fixed-top clearfix">

<div class="brand">
    <a href="index.php" class="logo">UNIVERSITY
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
    
        <li class="dropdown">
            <a data-toggle="dropdown" style="width: auto;" class="dropdown-toggle" href="#">
                
                <span class="username" >
                    <?php echo $temp; ?></span>
               
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="../profile.php"><i class=" fa fa-suitcase"></i>Profile</a></li>
                
                <li><a href="../logout.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
       
       
    </ul>
   
</div>
</header>