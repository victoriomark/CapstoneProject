<?phpinclude_once './config.php';global $conn;// Query the database$result = $conn->query("SELECT * FROM product");if (!$result) {    // If the query fails, send back an error response    echo json_encode(['success' => false, 'message' => 'Database query failed: ' . $conn->error]);    exit();}$product = [];while ($row = $result->fetch_assoc()) {    $product[] = $row;}// Ensure no additional output before sending JSONheader('Content-Type: application/json');echo json_encode($product);