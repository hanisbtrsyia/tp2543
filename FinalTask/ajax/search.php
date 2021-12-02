<?php
header("Content-Type: application/json;Charset=UTF-8");
require '../database.php';

$Json = array();

if (isset($_GET['search'])) {
    $search = htmlspecialchars($_GET['search']);
    $data = explode(" ", $search);

    // 0 - name
    // 1 - price
    // 2 - brand

    $name = (isset($data[0]) ? $data[0] : '');
    $price = (isset($data[1]) ? $data[1] : '');
    $categoryid = (isset($data[2]) ? $data[2] : '');

    try {
        $stmt = $db->prepare("SELECT * FROM `tbl_products_a175218_pt2` WHERE FLD_PRODUCT_NAME LIKE ? OR FLD_PRICE LIKE ? OR FLD_CATEGORY_ID LIKE ?");
        $stmt->execute(["%{$search}%","%{$search}%", "%{$search}%"]);
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $Json = array('status' => 200, 'data' => $res);
    } catch (PDOException $e) {
        $Json = array('status' => 400, 'data' => $e->getMessage());
    }

}

if (isset($Json))
    echo json_encode($Json);