
<?php
include 'database.php';
?>
<?php
class product {
    private $db;

    public function __construct() 
    {
        $this->db = new Database();
    }

    public function show_cartegory() {
        $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_brand() {
        // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query = "SELECT tbl_brand.*, tbl_cartegory.cartegory_name
        FROM tbl_brand INNER JOIN tbl_cartegory ON tbl_brand.cartegory_id = tbl_cartegory.cartegory_id
        ORDER BY tbl_brand.brand_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function  insert_product() {
// hàm định nghĩa biến
        $product_name = $_POST['product_name'];
        $cartegory_id = $_POST['cartegory_id'];
        $brand_id = $_POST['brand_id'];
        $product_price = $_POST['product_price'];
        $product_price_new = $_POST['product_price_new'];
        $product_desc = $_POST['product_desc'];
        $product_img = $_FILES['product_img'].['name'];
        
        // đổ ảnh đã upload vào folder uploads
        move_uploaded_file($_FILES['product_img'].['tmp_name'],"uploads/".$_FILES['product_img'].['name']);


// hàm biến 
        $query = "INSERT INTO tbl_product (
        product_name,
        cartegory_id,
        brand_id,
        product_price,
        product_price_new,
        product_desc,
        product_img)
        VALUES (
        '$product_name',
        '$cartegory_id',
        '$brand_id',
        '$product_price',
        '$product_price_new',
        '$product_desc',
        '$product_img')";
        $result = $this->db->insert($query);
        // header('location:brandlist.php');
        return $result;
    }


























// định nghĩa hàm

   

public function get_brand($brand_id) {
    $query = "SELECT * FROM tbl_brand WHERE brand_id = '$brand_id'";
    $result = $this->db->select($query);
    return $result;
}

public function update_brand($cartegory_id,$brand_name,$brand_id){
    $query = "UPDATE tbl_brand SET brand_name = '$brand_name',cartegory_id ='$cartegory_id' WHERE brand_id = '$brand_id'";
    $result = $this->db->select($query);
    header('location:brandlist.php');
    return $result;
}

public function delete_brand($brand_id) {
    $query = "DELETE FROM tbl_brand WHERE brand_id = '$brand_id'";
    $result = $this->db->delete($query);
    header('location:brandlist.php');
    return $result;
}


}

?>
