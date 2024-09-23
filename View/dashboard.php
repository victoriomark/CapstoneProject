<?php
session_start();
if (!$_SESSION['admin']){
    header('Location: ./admin_login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

<!-- ------------------------------------------------------------ -->
 <!-- chart cdn -->
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- cdn for fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
 <!-- cdn for icons -->
 <script src="https://kit.fontawesome.com/d4532539ca.js" crossorigin="anonymous"></script>
 <!-- CSS -->
  <link rel="stylesheet" href="../style.css" >
<!-- bootstrap cdn -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--    CDN FOR AJAX-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- ------------------------------------------------------------ -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- ------------------------------------------------------------ -->

</head>
<body >

    <!-- Side bar -->
     <section id="side_bar" class="p-2 text-light">
     <div style="background-color: #04aa6d" class="d-flex rounded-circle p-2 flex-column align-items-center">
        <img src="../Assets/capstone_logo.jpg" alt="img">
     </div>

     <ul id="con_li">
        <li>
            <a href="./dashboard.php">
                <i class="fa-solid fa-gauge"></i>
               <span> Dashboard</span>
            </a>
        </li>
        <li >
            <a href="./Products.php">
                <i class="fa-solid fa-circle-dollar-to-slot"></i>
                <span>Products</span>
            </a>
        </li>
        <li>
            <a href="./Manage_Employee.php">
                <i class="fa-solid fa-users"></i>
                <span>User Management</span>
            </a>
        </li>
        <li>
            <a href="./Branches.php">
                <i class="fa-solid fa-location-dot"></i>
                <span>Branches</span>
            </a>
        </li>

         <li>
            <a href="./EmployeeSales.php">
                <i class="fa-solid fa-coins"></i>
                <span>Employee Sales</span>
            </a>
        </li>

          <li>
            <a href="./Sales_Report.php">
                <i class="fa-solid fa-chart-line"></i>
                <span>Sells Report</span>
            </a>
        </li>


        <li id="logout" class="col-6 text-light p-2 text-center">
            <a href="../Auth/logout_admin.php">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span> 
            </a>
        </li>
     </ul>
     </section>

    <!-- Content Area -->
     <main id="content_area" class="container-fluid">
        <header class="d-flex justify-content-between align-items-center p-2">
          <!-- burger icons -->
           <button type="button" class="btn" id="burger">
            <i  class="fa-solid fa-bars"></i>
           </button>
           <!-- search bar -->
        </header>
<!--Main container-->
   <div   class="container-fluid">

       <section id="box_container" class="container-fluid row gap-3 p-4">
           <!-- card -->
           <div style="background-color: #202940" class="card col-lg-3 text-light border-0">
               <div class="card-body d-flex justify-content-around align-items-center ">
                   <div>
                       <h6 style="color:#ffffff;" class="card-title fw-bold">SALES</h6>
                       <?php
                       include_once '../config.php';
                       global $conn;
                        $result = $conn->query("SELECT SUM(sales.sale_amount) AS Total_sales FROM sales");
                        while ($sales = $result->fetch_assoc()){
                            ?>
                            <h4  style="color:#ffffff;">₱<?= number_format($sales['Total_sales']) ?></h4>
                       <?php
                        }
                       ?>

                   </div>
                   <i class="fa-solid text-light fs-2 fa-coins"></i>
               </div>
               <div class="card-footer border-0 bg-transparent">
                   <a style="color: #04aa6d" href="#" class="">View</a>
               </div>
           </div>

           <!-- card -->
           <div style="background-color: #202940" class="card col-lg-3 text-light border-0">
               <div class="card-body d-flex justify-content-around align-items-center ">
                   <div>
                       <h6 class="card-title fw-bold">EMPLOYEE</h6>
                       <?php
                       $result = $conn->query("SELECT COUNT(*) AS TotalEmployee From employee");
                       while ($employee = $result->fetch_assoc()){
                           ?>
                           <h4  style="color:#ffffff;"><?= number_format($employee['TotalEmployee']) ?></h4>
                           <?php
                       }
                       ?>

                   </div>
                   <i class="fa-solid  text-light  fa-users fs-2"></i>
               </div>
               <div class="card-footer border-0 bg-transparent">
                   <a style="color: #04aa6d" href="./Manage_Employee.php" >View</a>
               </div>
           </div>

           <!-- card -->
           <div style="background-color: #202940" class="card col-lg-3 text-light border-0">
               <div class="card-body d-flex justify-content-around align-items-center ">
                   <div>
                       <h6 class="card-title fw-bold">PRODUCT</h6>
                       <?php
                       $result = $conn->query("SELECT COUNT(*) AS TotalProduct From product");
                       while ($Product = $result->fetch_assoc()){
                           ?>
                           <h4  style="color:#ffffff;"><?= number_format($Product['TotalProduct']) ?></h4>
                           <?php
                       }
                       ?>

                   </div>
                   <i class="fa-solid  text-light  fs-2 fa-circle-dollar-to-slot"></i>
               </div>
               <div class="card-footer border-0 bg-transparent">
                   <a style="color: #04aa6d" href="#" >View</a>
               </div>
           </div>


           <!-- card -->
           <div style="background-color: #202940" class="card col-lg-3 text-light border-0">
               <div class="card-body d-flex justify-content-around align-items-center ">
                   <div>
                           <h6 class="card-title fw-bold">LOW STACK ALERT</h6>
                       <?php
                       $result = $conn->query("SELECT COUNT(*) AS lowStack From product where current_stack <= 30");
                       while ($lowStack = $result->fetch_assoc()){
                           ?>
                           <h4  style="color:#ffffff;"><?= number_format($lowStack['lowStack']) ?></h4>
                           <?php
                       }
                       ?>

                   </div>
                   <i class="fa-solid fs-2 text-light fa-triangle-exclamation"></i>
               </div>
               <div class="card-footer border-0 bg-transparent">
                   <a style="color: #04aa6d" href="./LowStacks_List.php" >View</a>
               </div>
           </div>
       </section>

       <!--  container for monthly sale for branch-->
                    <div class="card">
                    <div class="card-body d-lg-flex gap-3">

                        <!-- for chart -->
                        <div class="card col-lg-6 col-sm-12">
                            <canvas id="myChart"></canvas>
                        </div>

                        <section class="container-fluid card p-2">
                            <div>
                                <!--  Display the list branches-->
                                <select id="Select_monthly_and_yearSales" class="form-select" aria-label="Default select example">
                                    <option>Select Branch</option>
                                    <?php

                                    $result = $conn->query("SELECT * FROM brance");
                                    while ($branch = $result->fetch_assoc()){
                                        ?>
                                        <option value="<?=$branch['Branch_Name'] ?>"><?=$branch['Branch_Name'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <?php
                            $branchName = "Tondo";
                            $Query = "
                            SELECT
                                   branch,
                                   MONTH(CURDATE()) AS current_month_number, -- Display current month number
                                   SUM(CASE
                                           WHEN YEAR(Sales_date) = YEAR(CURDATE())
                                               AND MONTH(Sales_date) = MONTH(CURDATE())
                                               THEN sale_amount
                                           ELSE 0
                                       END) AS sales_this_month,

                                   MONTH(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)) AS last_month_number, -- Display last month number
                                   SUM(CASE
                                           WHEN YEAR(Sales_date) = YEAR(CURDATE())
                                               AND MONTH(Sales_date) = MONTH(DATE_SUB(CURDATE(), INTERVAL 1 MONTH))
                                               THEN sale_amount
                                           ELSE 0
                                       END) AS sales_last_month,

                                   SUM(CASE
                                           WHEN YEAR(Sales_date) = YEAR(CURDATE())
                                               THEN sale_amount
                                           ELSE 0
                                       END) AS sales_this_year
                               FROM sales
                               WHERE branch = ?
                               GROUP BY branch;
                            ";


                            $stmt = $conn->prepare($Query);
                            $stmt->bind_param('s',$branchName);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            while ($row = $result->fetch_assoc()){
                                ?>
                                   <div id="container_box_" class="container-fluid mt-2 d-flex flex-column gap-2">
<!--                                        card-->
                                       <div  class="card ">
                                           <div class="card-body text-muted">
                                               <div>
                                                   <h5 class="card-title">Sales this Month</h5>
                                                   <h3 >₱<?= number_format($row['sales_this_month']) ?></h3>
                                               </div>
                                           </div>
                                       </div>

<!--                                        card-->
                                       <div  class="card">
                                           <div class="card-body text-muted">
                                               <div>
                                                   <h5 class="card-title">Sales Last Month</h5>
                                                   <h3> ₱<?=number_format($row['sales_last_month']) ?></h3>
                                               </div>
                                           </div>
                                       </div>

<!--                                        card-->
                                       <div  class="card">
                                           <div class="card-body text-muted">
                                               <div>
                                                   <h5 class="card-title">Sales this Year</h5>
                                                   <h3>₱<?=number_format($row['sales_this_year']) ?></h3>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                <?php

                                $stmt->close();
                                $conn->close();

                            }
                            ?>
                        </section>
                    </div>
                        <div class="container-fluid">
                            <div class="d-flex gap-2 p-2">
                                <label for="year">
                                    Year
                                    <input id="year" class="form-control" type="number" min="1900" max="2099" step="1" value="2024" />
                                </label>
                               <label for="Date">
                                   Month
                                    <input id="date" class="form-control" type="number" min="1" max="2099" step="1" value="9" />
                                </label>
                                <div class="mt-4">
                                    <button id="btn_sub" style="background-color: #202940; color: white" class="btn">Submit</button>
                                </div>
                            </div>
                            <div id="Table_container">
                                <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading">Hello!</h4>
                                    <p>Select a month and year to view the best-selling product of the month.</p>
                                    <hr>
                                    <p class="mb-0">Choose your desired time frame to get started.</p>
                                </div>
                                </div>
                            </div>
                       </div>
                </div>
             </main>
     <script>

         fetch('../Models/GenerateMonthlySales.php')
             .then(res => res.json())
             .then(data =>{

                 const labels = data.map(row => getMonthName(row.sale_month));
                 const ctx = document.getElementById('myChart');
                 new Chart(ctx, {
                     type: 'bar',
                     data: {
                         labels: labels,
                         datasets: [{
                             label: 'Sales of the Month',
                             data: data.map(sale => sale.total_sales),
                             borderWidth: 4,
                             backgroundColor: '#04aa6d',
                             font: {
                                 size: 30
                             }
                         }]
                     },
                     options: {
                         devicePixelRatio: false,
                         scales: {
                             y: {
                                 beginAtZero: true
                             }
                         }
                     }
                 });
             })

         // Helper function to convert month number to name
         function getMonthName(monthNumber) {
             const monthNames = ["January", "February", "March", "April", "May", "June",
                 "July", "August", "September", "October", "November", "December"];
             return monthNames[monthNumber - 1];
         }

      </script>

<!-- ------------------------------------------------------------ -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="../MainJs/dashboard.js"></script>
</body>
</html>