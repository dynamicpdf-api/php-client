<?php
    class InvoiceData
    {
       public function __construct()
       {
        $this->Order11077 =new Order();
        $this->Order11077->OrderID = 11077;
        $this->Order11077->OrderDate =date_create("2019-01-06");
        $this->Order11077->CustomerID = "RATTC";
        $this->Order11077->ShippedDate = date_create("2019-01-30");
        $this->Order11077->ShipperName = "United Package";
        $this->Order11077->ShipTo = "Rattlesnake Canyon Grocery\n2817 Milton Dr.\nAlbuquerque, NM 87110\nUSA";
        $this->Order11077->BillTo = "Rattlesnake Canyon Grocery\n2817 Milton Dr.\nAlbuquerque, NM 87110\nUSA";
        $this->Order11077->Freight = 8.53;
        $this->Order11077->OrderDetails = array (
                new OrderDetail (  2,  24,  "Chang", 19 ),
                new OrderDetail (  3,  4,  "Aniseed Syrup", 10 ),
                new OrderDetail (  4,  1,  "Chef Anton's Cajun Seasoning", 22 ),
                new OrderDetail (  6,  1,  "Grandma's Boysenberry Spread", 25 ),
                new OrderDetail (  7,  1,  "Uncle Bob's Organic Dried Pears", 30 ),
                new OrderDetail (  8,  2,  "Northwoods Cranberry Sauce", 40 ),
                new OrderDetail (  10,  1,  "Ikura", 31 ),
                new OrderDetail (  12,  2,  "Queso Manchego La Pastora", 38 ),
                new OrderDetail (  13,  4,  "Konbu", 6 ),
                new OrderDetail (  14,  1,  "Tofu", 23.25 ),
                new OrderDetail (  16,  2,  "Pavlova", 17.45 ),
                new OrderDetail (  20,  1,  "Sir Rodney's Marmalade", 81 ),
                new OrderDetail (  23,  2,  "Tunnbröd", 9 ),
                new OrderDetail (  32,  1,  "Mascarpone Fabioli", 32 ),
                new OrderDetail (  39,  2,  "Chartreuse verte", 18 ),
                new OrderDetail (  41,  3,  "Jack's New England Clam Chowder", 9.65 ),
                new OrderDetail (  46,  3,  "Spegesild", 12 ),
                new OrderDetail (  52,  2,  "Filo Mix", 7 ),
                new OrderDetail (  55,  2,  "Pâté chinois", 24 ),
                new OrderDetail (  60,  2,  "Camembert Pierrot", 34 ),
                new OrderDetail (  64,  2,  "Wimmers gute Semmelknödel", 33.25 ),
                new OrderDetail (  66,  1,  "Louisiana Hot Spiced Okra", 17 ),
                new OrderDetail (  73,  2,  "Röd Kaviar", 15 ),
                new OrderDetail (  75,  4,  "Rhönbräu Klosterbier", 7.75 ),
                new OrderDetail (  77,  2,  "Original Frankfurter grüne Soße", 13 )
        );
        

       }

        public   $Order11077;
        
      
       
    }

    class Order
    {
        public  $OrderID;
        public  $OrderDate;
        public  $CustomerID;
        public  $ShippedDate;
        public  $ShipperName;
        public  $ShipTo;
        public  $BillTo;
        public  $Freight;
        public  $OrderDetails;
    }
    class OrderDetail
    {
        public function __construct(int $ProductID,int $Quantity,string $ProductName, float $UnitPrice)
        {
            $this->ProductID =$ProductID;
            $this->Quantity =$Quantity;
            $this->ProductName =$ProductName;
            $this->UnitPrice = $UnitPrice;
        }
        public  $ProductID;
        public  $Quantity;
        public  $ProductName;
        public  $UnitPrice;
    }
?>
