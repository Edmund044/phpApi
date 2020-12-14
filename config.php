<?php
class DbConfig 
{    
    private $_host = 'localhost';
    private $_username = 'root';
    private $_password = '';
    private $_database = 'sanabora';    
    public $connection;
    
    public $successCode = 200;
    public $errorCode = 402;
    public function __construct()
    {
      /*if ((isset($_SESSION["id"])) || (isset($_SESSION["biz_id"])) || (isset($_COOKIE["biz_id"])) || (isset($_COOKIE["id"]))) {}*/
          if (!isset($this->connection)) {
                
                $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
                
                if (!$this->connection) {
                    http_response_code($errorCode);
                    exit;
                }            
            }    
            
            return $this->connection;
      
     /* else{
        header("Location:userLogin.php");
      }*/
        
    }
//inserting data to the database
    public function post_data($query) 
    {
        $result = $this->connection->query($query);
        
        if ($result == false) {
            echo "UNSUCCESSFULL";
        } else {
            echo "SUCCESS";
        }        
    }
   public function read_products_data($sql){
    //execute sql statement
    $result = $this->connection->query($sql);
     if ($result == false) { 
            http_response_code($errorCode);
        } 
        
        //create array to hold individual rows
        $products=array();
        //pick each row
        $index = 0;
        $total = 0;
        while($row = $result->fetch_assoc()) {
         $products[$index]['product_id']=$row['product_id'];
         $products[$index]['media']=$row['media'];
         $products[$index]['pic1']=$row['pic1'];
         $products[$index]['pic2']=$row['pic2'];
         $products[$index]['pic3']=$row['pic3'];
         $products[$index]['pic4']=$row['pic4'];
         $products[$index]['product_name']=$row['product_name'];
         $products[$index]['colors']=$row['colors'];
         $products[$index]['price']=$row['price'];
         $products[$index]['currency']=$row['currency'];                                     
         $products[$index]['contacts']=$row['contacts'];                    
         $products[$index]['location']=$row['location'];
         $products[$index]['category']=$row['category'];
         $products[$index]['size']=$row['size']; 
         $products[$index]['length']=$row['length'];
         $products[$index]['width']=$row['width']; 
         $products[$index]['height']=$row['height'];
         $products[$index]['material']=$row['material'];
         $products[$index]['quantity']=$row['quantity'];
         $products[$index]['description']=$row['description'];
         $index++;
       }
       return $products;
        $this->connection->close();

   }
   public function read_orders_data($sql){
    //execute sql statement
    $result = $this->connection->query($sql);
     if ($result == false) { 
            http_response_code($errorCode);
        } 
        
        //create array to hold individual rows
        $orders=array();
        //pick each row
        $index = 0;
        while($row = $result->fetch_assoc()) {
          
         $orders[$index]['id']=$row['id'];
         $orders[$index]['productId']=$row['productId'];
         $orders[$index]['sanabora_user']=$row['sanabora_user'];
         $orders[$index]['sanabora_user_phone']=$row['sanabora_user_phone'];
         $orders[$index]['sanabora_user_email']=$row['sanabora_user_email'];
         $orders[$index]['influencerName']=$row['influencerName'];
         $orders[$index]['material']=$row['material']; 
         $orders[$index]['colors']=$row['colors']; 
         $orders[$index]['quantity']=$row['quantity'];                                  
         $orders[$index]['day']=$row['day'];                    
         $orders[$index]['month']=$row['month'];
         $orders[$index]['year']=$row['year'];
         $orders[$index]['time']=$row['time'];  
         $orders[$index]['date']=$row['date'];
         $orders[$index]['status']=$row['status'];
         $orders[$index]['invoiceId']=$row['invoiceId'];
         $index++;
       }
       return $orders;
        $this->connection->close();

   }
   public function read_influencers($sql){
      $influencers = [];
      $result =$this->connection->query($sql);
      $index = 0;

       while($row = $result->fetch_assoc()){
        $influencers[$index]['id'] = $row['id'];
        $influencers[$index]['adminId'] = $row['adminId'];
        $influencers[$index]['id'] = $row['id'];
        $influencers[$index]['adminId'] = $row['adminId'];
        $influencers[$index]['influencerName'] = $row['influencerName'];
        $influencers[$index]['percentOff'] = $row['percentOff'];
        $influencers[$index]['discountCode'] = $row['discountCode'];
        $influencers[$index]['day'] = $row['day'];
        $influencers[$index]['month']=$row['month'];
        $influencers[$index]['year']=$row['year'];
        $influencers[$index]['time']=$row['time'];  
        $influencers[$index]['date']=$row['date'];
        $index++;
       }
    return $influencers;

   }
    public function read_wishList($sql){
      $wishList = [];
      $result =$this->connection->query($sql);
      $index = 0;

       while($row = $result->fetch_assoc()){
        $wishList[$index]['id'] = $row['id'];
        $wishList[$index]['userId'] = $row['userId'];
        $wishList[$index]['productId'] = $row['productId'];
        $index++;
       }
    return $wishList;

   }
   public function read_questions($sql){
      $questions = [];
      $result =$this->connection->query($sql);
      $index = 0;

       while($row = $result->fetch_assoc()){
        $questions[$index]['id'] = $row['id'];
        $questions[$index]['userEmail'] = $row['userEmail'];
        $questions[$index]['userPhone'] = $row['userPhone'];
        $questions[$index]['question'] = $row['question'];
        $questions[$index]['day'] = $row['day'];
        $questions[$index]['month']=$row['month'];
        $questions[$index]['year']=$row['year'];
        $questions[$index]['time']=$row['time'];  
        $questions[$index]['date']=$row['date'];

        $index++;
       }
    return $questions;

   }
    public function read_faqs($sql){
      $faqs = [];
      $result =$this->connection->query($sql);
      $index = 0;

       while($row = $result->fetch_assoc()){
        $faqs[$index]['id'] = $row['id'];
        $faqs[$index]['question'] = $row['question'];
        $faqs[$index]['answer'] = $row['answer'];
        $faqs[$index]['day'] = $row['day'];
        $faqs[$index]['month']=$row['month'];
        $faqs[$index]['year']=$row['year'];
        $faqs[$index]['time']=$row['time'];  
        $faqs[$index]['date']=$row['date'];

        $index++;
       }
    return $faqs;

   }
    public function read_invoices($sql){
      $invoices = [];
      $result =$this->connection->query($sql);
      $index = 0;
       while($row = $result->fetch_assoc()){
        $invoices[$index]['id'] = $row['id'];
        $invoices[$index]['userId'] = $row['userId'];
        $invoices[$index]['promoCode'] = $row['promoCode'];
        $invoices[$index]['first'] = $row['first'];
        $invoices[$index]['last'] = $row['last'];
        $invoices[$index]['username'] = $row['username'];
        $invoices[$index]['email'] = $row['email'];
        $invoices[$index]['address'] = $row['address'];
        $invoices[$index]['contact'] = $row['contact'];
        $invoices[$index]['country'] = $row['country'];
        $invoices[$index]['city'] = $row['city'];
        $invoices[$index]['postal'] = $row['postal'];   
        $invoices[$index]['day'] = $row['day'];
        $invoices[$index]['month']=$row['month'];
        $invoices[$index]['year']=$row['year'];
        $invoices[$index]['time']=$row['time'];  
        $invoices[$index]['date']=$row['date'];
        $invoices[$index]['status']=$row['status'];
        $invoices[$index]['courier']=$row['courier'];
        $invoices[$index]['invoiceId']=$row['invoiceId'];

        $index++;
       }
    return $invoices;

   }

   public function read_receipts($sql){
      $receipts = [];
      $result =$this->connection->query($sql);
      $index = 0;
       while($row = $result->fetch_assoc()){
        $receipts[$index]['id'] = $row['id'];
        $receipts[$index]['invoice_id'] = $row['invoice_id'];
        $receipts[$index]['user_id'] = $row['user_id'];
        $receipts[$index]['transactionCode'] = $row['transactionCode'];
        $receipts[$index]['payment'] = $row['payment'];  
        $receipts[$index]['day'] = $row['day'];
        $receipts[$index]['month']=$row['month'];
        $receipts[$index]['year']=$row['year'];
        $receipts[$index]['time']=$row['time'];  
        $receipts[$index]['date']=$row['date'];
        $index++;
       }
    return $receipts;

   }
     public function update_data($sql){

        if ($this->connection->query($sql) === TRUE) {
            http_response_code($successCode);
        } else {
            http_response_code($errorCode);
            $this->connection->error;
        }

        $this->connection->close();
     }

     public function delete_data($sql){
                if ($this->connection->query($sql) === TRUE) {
           echo "DELETED SUCCESFULLY ";
        } else {
            echo "UNSUCCESSFULL";
            $this->connection->error;
        }

        $this->connection->close();
     }
}
?>
