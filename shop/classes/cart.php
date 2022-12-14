<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class cart
    {
        private $db;
        private $fm;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function add_to_cart($quantity, $id){
            $quantity = $this->fm->validation($quantity);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $id = mysqli_real_escape_string($this->db->link, $id);
            $sId = session_id();
            $query ="SELECT * FROM tbl_product WHERE productId = '$id'";
            $result = $this->db->select($query)->fetch_assoc();
            $image = $result["image"];
            $price = $result["price"];
            $productName = $result["productName"];
            
            // $check_cart = "SELECT * FROM tbl_cart WHERE productId = '$id' AND sId = '$sId'";
            
            // if($check_cart){
            //     $msg = "Product Already Added";
            //     return $msg;
            // }else{

            $query_insert = "INSERT INTO tbl_cart(productId, quantity, sId, image, price,productName) VALUES('$id',
            '$quantity','$sId','$image','$price','$productName')";
            $insert_cart = $this->db->insert($query_insert);
            if($result_cart){
                header('Location:cart.php');
            }else{
               header('Location:cart.php');
                }
            // }
        }
        public function get_product_cart(){
            $sId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_quantity_cart($quantity, $cartId){
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $cartId = mysqli_real_escape_string($this->db->link, $cartId);
            $query = "UPDATE tbl_cart SET 
                quantity = '$quantity'
                
                WHERE cartId ='$cartId'";
                $result = $this->db->update($query);
                if($result){
                    $msg = "<span class='success'>Product Quantity Updated Successfully</span>";
                    return $msg;
                }else{
                    $msg = "<span class='error'>Product Quantity Updated Not Successfully</span>";
                    return $msg;
                }
        }
        public function del_product_cart($cartid){
            $cartid = mysqli_real_escape_string($this->db->link, $cartid);
            $query = "DELETE FROM tbl_cart WHERE cartId = '$cartid'";
            $result = $this->db->delete($query);
            if($result){
                "<script type='text/javascript'>window.location.href = 'cart.php'</script>";
            }else{
                $msg = "<span class='error'>Product Deleted  Updated Not Successfully</span>";
                return $msg;
            }
        }
        public function check_cart(){
            $sId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function del_all_data_cart(){
            $sId = session_id();
            $query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
            $result = $this->db->select($query);
            return $result;
        }
    }

?>