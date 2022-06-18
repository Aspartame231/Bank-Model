<!DOCTYPE html>
<html>

<head>
       
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Atlantic Management Services</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom Fonts from Google -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    
  <style>
    table,
    th,
    td {
      border: 1px solid black;
      width: 60%;
      color:white;
    }
    th{
      background-color: forestgreen;
    }
    .rmv{
      background-color: orangered;
    }
    
   .Submit{
    background-color: orangered;
}
label{
  color:white;
}
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
 <!-- Navigation -->
 <nav id="siteNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                	<span class="glyphicon glyphicon-fire"></span> 
                	ATLANTIC MANAGEMENT SERVICES
                </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="About.html">About</a>
                    </li>
                    
					
                    <li>
                        <a href="Contact.html">Contact</a>
                    </li>
                </ul>
                
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <center>
                
                    </div><br>
                    <table class="table table-hover">
    <tr>
      <th>Employee Name</th>
      <th>Employee ID</th>
      <th>Department</th>
      <th>Salary</th>
      <th>Remove</th>
    </tr>
                    
                    <?php
    $ename = $_GET['name'];
    $eid = $_GET['id'];
    $dept = $_GET['dept'];
    $salary = $_GET['salary'];
    $con = mysqli_connect("localhost", "root", "", "amogham");
    $sql = "insert into employee values('$ename','$eid','$dept','$salary')";
    $result = mysqli_query($con, $sql);
    $sql1 = "SELECT * FROM employee";
    $res1 = $con->query($sql1);
    if ($res1->num_rows > 0) {
      while ($row = $res1->fetch_assoc()) {
        echo "<tr><td>" . $row['Name'] . "</td><td>" . $row['Employee_id'] . "</td><td>" . $row['Department'] . "</td><td>" . $row['Salary'] . "</td><td><input type='button' value='Remove' class='rmv'></td></tr>";
      }
      echo "</table>";
    }
    
    
    mysqli_close($con);
    ?>
    
    
    <br>
    <script>
      
      $(document).ready(function() {
          $("#add").on('click', function() {
          var name = document.getElementById("name").value;
          var id = document.getElementById("id").value;
          var dept = document.getElementById("dept").value;
          var salary =  document.getElementById("salary").value;
          $("table").append("<tr><td>" + name + "</td><td>" + id + "</td><td>" + dept + "</td><td>" + salary + "</td><td><input type='button' value='Remove' class='rmv' ></td></tr>");
         
          
          });
        
        $("body").on("click", ".rmv", function() {
          $(this).closest("tr").remove();
          
         
         
        });
        $("th").each(function(column){
        $(this).data("type", $(this).attr("class"));
        $(this).click(function() {
          var records = $("table").find("tbody > tr");
          records.sort(function(a, b) {

            var type = $(this).data("type");
            var v1 = $(a).children("td").eq(column).text();
            var v2 = $(b).children("td").eq(column).text();
            if (type == "num") {
              v1 *= 1;
              v2 *= 2;
            }
            return (v1 < v2) ? -1 : (v1 > v2 ? 1 : 0)

          });
          $.each(records, function(index, row) {
            $("tbody").append(row);

          });
        });
      });
    });
    </script>
    
   </center>
                
                
            </div>
        </div>
    </header>
   
</body>

</html>
