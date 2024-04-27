<?php
require_once("../../model/nguoidung.php");
class BANGHI
{
    private $id;
    private $nguoidung_id;
    private $action;
    private $timestamp;

    // Getter và Setter cho id
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter và Setter cho nguoidung_id
    public function getNguoidungId()
    {
        return $this->nguoidung_id;
    }

    public function setNguoidungId($nguoidung_id)
    {
        $this->nguoidung_id = $nguoidung_id;
    }

    // Getter và Setter cho action
    public function getAction()
    {
        return $this->action;
    }

    public function setAction($action)
    {
        $this->action = $action;
    }

    // Getter và Setter cho timestamp
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }


    // Phương thức để thêm bản ghi vào bảng banghi
    public function logAction($userId, $action)
    {
        $dbcon = DATABASE::connect();
        $timestamp = date("Y-m-d H:i:s");

        try {
            $sql = "INSERT INTO banghi (nguoidung_id, action, timestamp) VALUES (?, ?, ?)";
            $stmt = $dbcon->prepare($sql);
            $stmt->execute([$userId, $action, $timestamp]);
        } catch (Exception $e) {
            // Xử lý ngoại lệ ở đây
            echo "Lỗi: " . $e->getMessage();
        }
    }
    // Phương thức để thực hiện việc ghi logs khi người dùng đăng nhập
    public function logLogin($userId)
    {
        // Đầu tiên, bạn cần lấy người dùng hiện tại từ $userId
        $currentUser = new NGUOIDUNG();
        $user = $currentUser->laythongtinnguoidungByID($userId);

        // Sau đó, ghi logs với người dùng hiện tại
        $this->logAction($user['id'], 'Đăng nhập');
    }

    // Phương thức để thực hiện việc ghi logs khi người dùng đăng xuất
    public function logLogout($userId)
    {
        // Tương tự, lấy thông tin người dùng hiện tại
        $currentUser = new NGUOIDUNG();
        $user = $currentUser->laythongtinnguoidungByID($userId);

        // Ghi logs với người dùng hiện tại
        $this->logAction($user['id'], 'Đăng xuất');
    }

    public function getAllLogs()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT b.id, n.hoten, b.action, b.timestamp 
            FROM banghi b
            INNER JOIN nguoidung n ON b.nguoidung_id = n.id";
            $stmt = $dbcon->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $logs = array();

            foreach ($result as $row) {
                $log = new BANGHI();
                $log->setId($row['id']);
                $log->setNguoidungId($row['hoten']);
                $log->setAction($row['action']);
                $log->setTimestamp($row['timestamp']);
                $logs[] = $log;
            }

            return $logs;
        } catch (Exception $e) {
            // Xử lý ngoại lệ ở đây
            echo "Lỗi: " . $e->getMessage();
            return array();
        }
    }
}
