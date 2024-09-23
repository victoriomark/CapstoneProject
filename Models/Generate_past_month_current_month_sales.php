<?phpinclude_once  '../config.php';global $conn;$BranchName = $_POST['Branch'];$Query = "SELECT    branch,    SUM(CASE            WHEN YEAR(Sales_date) = YEAR(CURDATE())                AND MONTH(Sales_date) = MONTH(CURDATE())                THEN sale_amount            ELSE 0        END) AS sales_this_month,    SUM(CASE            WHEN YEAR(Sales_date) = YEAR(CURDATE())                AND MONTH(Sales_date) = MONTH(DATE_SUB(CURDATE(), INTERVAL 1 MONTH))                THEN sale_amount            ELSE 0        END) AS sales_last_month,    SUM(CASE            WHEN YEAR(Sales_date) = YEAR(CURDATE())                THEN sale_amount            ELSE 0        END) AS sales_this_yearFROM salesWHERE branch = ?GROUP BY branch;";$stmt = $conn->prepare($Query);$stmt->bind_param('s',$BranchName);$stmt->execute();$result = $stmt->get_result();$data = [];if ($result->num_rows > 0){    while ($row =$result->fetch_assoc()){        ?>        <!-- card -->        <div class="card text-muted">            <div class="card-body text-muted">                <div>                    <h5 class="card-title">Sales this Month</h5>                    <h3 >₱<?= number_format($row['sales_this_month']) ?></h3>                </div>            </div>        </div>        <!-- card -->        <div class="card text-muted">            <div class="card-body">                <div>                    <h5 class="card-title">Sales Last Month</h5>                    <h3> ₱<?=number_format($row['sales_last_month']) ?></h3>                </div>            </div>        </div>        <!-- card -->        <div class="card text-muted">            <div class="card-body">                <div>                    <h5 class="card-title">Sales this Year</h5>                    <h3>₱<?= number_format($row['sales_this_year']) ?></h3>                </div>            </div>        </div>        <?php    }}else{    echo "<div class='alert alert-danger'>     <h4 class='alert-heading'>No Results Found!</h4>    <p>It looks like there are no results for the selected branch. Please choose a different branch and try again.</p></div>";}$stmt->close();$conn->close();