    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid homes">
    <!-- <a class="navbar-brand" href="#"><span class="homes">Student Management System</span></a> -->
   <img src="/photo.png" alt="" srcset="sms_image.png" style="height:50px">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 homes">
        

      
      
      <!-- <form class="d-flex"> -->
        <?php
          
        include('database_connection.php');
        $user_dd=-11;
        $user1=false;
        if(isset($_SESSION["t_log"]))
        {
          $user1=true;
          echo '
          <li class="nav-item">
        <a class="nav-link "  aria-current="page" href="d2.php">Home</a>
      </li>     
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Manage
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
       
        <li><a class="dropdown-item" href="t_student.php">Student</a></li>
       
        
        
        </ul>
        </li><li class="nav-item">
          <a class="nav-link" target="_blank" aria-current="page"  href="http://127.0.0.1:8000/dashboard/">Tutoring</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="msg.php">Chat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="resource.php">Share</a>
        </li>
        ';
        $user_dd=1;
        $username='T : '.$_SESSION['t_name'];
      }
      
      else if(isset($_SESSION["s_log"]))
      {
        $user_dd=2;
        $user1=true;
        echo '
        <li class="nav-item">
        <a class="nav-link "  aria-current="page" href="d2.php">Home</a>
      </li>
      
        <li class="nav-item">
        <a class="nav-link " target="_blank" aria-current="page" href="http://127.0.0.1:8000/dashboard/">Tutoring</a>
        </li>
        <li class="nav-item">
                
        <a class="nav-link "  aria-current="page" href="quizh.html">Take a test</a>
         </li>
        <li class="nav-item">
        <a class="nav-link " aria-current="page" href="msg.php">Chat</a>
        </li>
        <li class="nav-item">
        <a class="nav-link " aria-current="page" href="resource.php">Share</a>
        </li>
        ';
        $username='S : '.$_SESSION['s_name'];
        
      }
      else if((isset($_SESSION["a_log"])) ||(isset($_SESSION["s_log"])))
      {  
        
        $user1=true;
        echo '
        <li class="nav-item">
        <a class="nav-link "  aria-current="page" href="dashboard.php">Dashboard</a>
      </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Manage
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
        if(isset($_SESSION["a_log"])||isset($_SESSION["s_log"]))
        {
          
          echo '
        <li><a class="dropdown-item" href="student.php">Student</a></li>
        ';
        }
        echo '
        <li><a class="dropdown-item" href="teacher.php">Teacher</a></li>
        <li><a class="dropdown-item" href="class.php">Class</a></li>
        </ul>
        </li>
        <li class="nav-item">
        <a class="nav-link " target="_blank" aria-current="page"  href="http://127.0.0.1:8000/dashboard/">Tutoring </a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Chat
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
        $q1 = "SELECT * FROM `class` ORDER BY `name` ASC";
        $query1 = mysqli_query($conn, $q1);
        while ($result = mysqli_fetch_array($query1))
        {$id=$result['id'];
          $in=$result['name'];
          echo'<li><a class="dropdown-item" href="msg.php?class='.$id.'">'.$in.'</a></li>';
        }
        echo' </ul>
        </li>
        
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Resource
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
        // $q1 = "SELECT * FROM `class`";
        $q1 = "SELECT * FROM `class` ORDER BY `name` ASC";
        $query1 = mysqli_query($conn, $q1);
        while ($result = mysqli_fetch_array($query1))
        {$id=$result['id'];
          $in=$result['name'];
          echo'<li><a class="dropdown-item" href="resource.php?class='.$id.'">'.$in.'</a></li>';
        }
        echo '
        
        
        </ul>

  </li>
  <li class="nav-item">
        <a class="nav-link " aria-current="page" href="importfile.php">Import File</a>
        </li>
        
  ';
  
  $username='A : '.$_SESSION['a_name'];
  $user_dd=0;
}

echo'</ul>';
if ($user1==true) {
  echo '<span style="color: #fbff00;
  font-family: cursive;
  font-size: 22px;
       padding-right: 9px;">'.$username.'</span><a href="logout.php" class="btn btn-outline-warning" style="margin-left: 10px;" >Log Out</a>';
       # code...
      }else {
        echo'<a href="index.php" class="btn btn-outline-primary" style="margin-left: 10px;">LogIn</a>';
      }
        ?>
      <!-- </form> -->
    </div>
  </div>
</nav>
