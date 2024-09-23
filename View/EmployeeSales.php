<!doctype html><html lang="en"><head>    <meta charset="UTF-8">    <meta name="viewport"          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">    <meta http-equiv="X-UA-Compatible" content="ie=edge">    <title>Employee Sales</title>    <?php    // including the Database Connection    include_once '../includes/cdn.php';    include_once '../config.php';    ?></head><body><main class="mt-3">    <header class="d-flex justify-content-between align-items-center p-5">        <form id="form_employeeSales" action="../Models/Generate_total_sold_by_selected_employee.php" method="post" class="d-flex gap-4">            <a href="./dashboard.php">                <i style="color: #04aa6d" class="fa-solid fs-1 fa-circle-chevron-left"></i>            </a>           <div>               <label for="StartDate">                   <input class="form-control" id="StartDate" type="date">               </label>           </div>            <div>               <label for="StartDate">                   <input class="form-control" id="EndDate" type="date">               </label>           </div>            <button  style="background-color: #202940" class="btn text-light" type="submit">submit</button>        </form>   <div>   </div>    </header></main><div class="container-fluid mt-2">    <table id="example" class="table table-responsive table-transparent">        <thead >        <tr>            <th>Name</th>            <th>Branch</th>            <th>Product</th>            <th>Quantity Sold</th>        </tr>        </thead>        <tbody id="Table_body">        <!-- Your table data goes here -->        </tbody>    </table></div><script>    $(document).ready(function() {        $('#example').DataTable();    });</script><script src="../MainJs/Generate_total_sold_by_selected_employee.js"></script></body></html>