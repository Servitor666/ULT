<?php

class Product {
    
    private $db;
    
    private $sth;
    
    public function __construct($dbh) {
        $this->db = $dbh;
    }
    
    public function getAllProducts() {
        $sth = $this->db->prepare("SELECT * FROM product");
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }
    
    public function getSingleProduct($id) {
        $stmt = $this->db->prepare("SELECT * FROM product WHERE id=".$id." LIMIT 1"); 
        $stmt->execute(); 
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $row;
        
    }
    
    // DOBIJEM ID OD JEBENE PROMENLJIVE NA FRON ENDU TAJ ID UPOTREBIM OVDE PO TOM IDU UZMEM SLIKE
    
    public function getSinglePhoto($id){
        $stmt = $this->db->prepare("SELECT * FROM clothes_images WHERE product_id=".$id);
        
        $stmt->execute(); 
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        
     return $row['image_url'];
        
    }
    public function getAllPhotos($id) {
        
        $stmt = $this->db->prepare("SELECT * FROM clothes_images WHERE product_id=".$id);
        $stmt->execute();
        
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $row;
        
    }
}
?>
