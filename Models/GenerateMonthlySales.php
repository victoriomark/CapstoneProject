<?phpinclude_once '../config.php';global $conn;$result = $conn->query("SELECT    months.month AS sale_month,    COALESCE(SUM(s.sale_amount), 0) AS total_salesFROM    (SELECT 1 AS month UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL     SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL     SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL     SELECT 10 UNION ALL SELECT 11 UNION ALL SELECT 12) AS months        LEFT JOIN    sales s ON months.month = MONTH(s.Sales_date)        AND s.Sales_date IS NOT NULL        AND s.sale_amount > 0GROUP BY    months.monthORDER BY    months.month;");     $data = [];    while ($row = $result->fetch_assoc()){    $data[] = $row;    }    echo json_encode($data);