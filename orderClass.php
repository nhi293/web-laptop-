<?php 
include "database.php";

class orderClass {
    public $Database;

    public function __construct() {
        $this->Database = new Database;  // Assuming this initializes the database connection
    }

    // Select all orders
    public function select_order_All() {
        $sql = "SELECT * FROM donhang"; // Ensure table name is correct
        $result = $this->Database->selectAll($sql); // Assuming selectAll returns a list of results
        return $result;
    }

    // Select a specific order by its ID
    public function select_order($id) {
        // Using prepared statement to prevent SQL injection
        $sql = "SELECT * FROM donhang WHERE ma_donhang = ?";
        $stmt = $this->Database->conn->prepare($sql);
        $stmt->bind_param("i", $id); // 'i' for integer type
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Check if the query returns any results
        if ($result->num_rows === 0) {
            return null; // Return null if no order is found
        }

        return $result->fetch_assoc(); // Return the result as an associative array
    }

    // Update the order status
    public function update_OrderStatus($order_id, $new_status) {
        // Ensure table name is consistent
        $query = "UPDATE donhang SET trang_thai = ? WHERE ma_donhang = ?";
        
        // Use prepared statements to prevent SQL injection
        $stmt = $this->Database->conn->prepare($query);
        $stmt->bind_param("si", $new_status, $order_id); // 's' for string (new_status) and 'i' for integer (order_id)
        
        if ($stmt->execute()) {
            $stmt->close();  // Close the statement after execution
            return true; // Successfully updated
        }
        $stmt->close();  // Close the statement in case of failure
        return false; // Failed to update
    }

    public function getOrderItems($order_id) {
        // Truy vấn lấy chi tiết sản phẩm của đơn hàng từ bảng chitiet_donhang
        $query = "SELECT * FROM chitiet_donhang WHERE ma_donhang = ?";
        $stmt = $this->Database->conn->prepare($query);
        $stmt->bind_param("i", $order_id); // Liên kết mã đơn hàng với câu truy vấn
        $stmt->execute();
    
        $result = $stmt->get_result(); // Lấy kết quả truy vấn
        $items = $result->fetch_all(MYSQLI_ASSOC); // Lấy tất cả sản phẩm theo mã đơn hàng
    
        $stmt->close(); // Đóng kết nối sau khi hoàn thành
        return $items; // Trả về kết quả
    }
    
    

}
?>
