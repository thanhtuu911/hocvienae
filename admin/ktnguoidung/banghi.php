<?php
// require("../../model/database.php");
// require("../../model/nguoidung.php");
// require("../../model/banghi.php");
include("../inc/top.php");

// Khởi tạo đối tượng BANGHI để lấy dữ liệu logs
$bg = new BANGHI();
$logs = $bg->getAllLogs();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách logs</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Lịch sử truy cập</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Người dùng</th>
            <th>Hành động</th>
            <th>Thời gian</th>
        </tr>
        <?php foreach ($logs as $log): ?>
            <tr>
                <td><?php echo $log->getId(); ?></td>
                <td><?php echo $log->getNguoidungId(); ?></td>
                <td><?php echo $log->getAction(); ?></td>
                <td><?php echo date("d-m-Y  H:i:s", strtotime($log->getTimestamp())); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
<?php include("../inc/bottom.php"); ?>
