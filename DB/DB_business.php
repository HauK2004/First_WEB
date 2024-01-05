<?php 
// Thư Viện Xử Lý Database
class DB_driver
{
    // Biến lưu trữ kết nối
    public $__conn;
     
    // Hàm Kết Nối
    function connect()
    {
        // Nếu chưa kết nối thì thực hiện kết nối
        if (!$this->__conn){
            // Kết nối
            $this->__conn = mysqli_connect('localhost', 'root', '', 'web_ck') or die ('Lỗi kết nối');
 
            // Xử lý truy vấn UTF8 để tránh lỗi font
            mysqli_query($this->__conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
        }
    }
 
    // Hàm Ngắt Kết Nối
    function dis_connect(){
        // Nếu đang kết nối thì ngắt
        if ($this->__conn){
            mysqli_close($this->__conn);
        }
    }
    // Hàm lấy danh sách
    function get_list($sql)
    {
        // Kết nối
        $this->connect();
         
        $result = mysqli_query($this->__conn, $sql);
 
        if (!$result){
            die ('Câu truy vấn bị sai 123');
        }
        return $result;
    }
    // Hàm Insert
    function insert($sql)
    {
        $this->connect();
        return mysqli_query($this->__conn, $sql);
    }
    // Hàm delete
    function remove($table, $condition) {
        // Kết nối
        $this->connect();
        
        // Delete
        $sql = "DELETE FROM $table WHERE $condition;";
        
        return mysqli_query($this->__conn, $sql);
    }
    function update($table,$value,$condition){
        // Kết nối
        $this->connect();
    
        $sql="UPDATE $table
        SET $value 
        WHERE $condition";
        return mysqli_query($this->__conn, $sql);
    }
    function query($sql){
        // Kết nối
        $this->connect();
        return mysqli_query($this->__conn, $sql);
    }
}
?>