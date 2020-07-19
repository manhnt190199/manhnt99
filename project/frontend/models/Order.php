<?php
//models/Order.php
require_once 'models/Model.php';

class Order extends Model {
    public $fullname;
    public $address;
    public $mobile;
    public $email;
    public $note;
    public $price_total;
    public $payment_status;

    public function insert() {
        //tạo câu truy vấn
        $sql_insert = "INSERT INTO 
orders(`fullname`, `address`, `mobile`, `email`,
 `note`, `price_total`, `payment_status`) VALUES (:fullname,
 :address, :mobile, :email, :note, :price_total, :payment_status)";
        //cbi câu truy vấn
        $obj_insert = $this->connection->prepare($sql_insert);
        //tạo mảng để truyền các giá trị thật cho placeholder
        //trong câu truy vấn
        $arr_insert = [
          ':fullname' => $this->fullname,
          ':address' => $this->address,
          ':mobile' => $this->mobile,
          ':email' => $this->email,
          ':note' => $this->note,
          ':price_total' => $this->price_total,
          ':payment_status' => $this->payment_status,
        ];
        //thực thi truy vấn
        //thông thường khi gọi phương thức execute trên các truy vấn
        //insert, update, delete sẽ trả về true/false
        //tuy nhiên với đặc thù của CSDL hiện tại, thì sẽ cần
        //trả về id của chính order vừa insert
        //do có bảng order_details là bảng sẽ đc lưu tiếp theo
        //ngay sau khi lưu vào orders thành công, và bảng
        //order_details cần biết id của order vừa insert
        $obj_insert->execute($arr_insert);
        $order_id = $this->connection->lastInsertId();
        return $order_id;
    }
}