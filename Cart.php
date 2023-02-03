<?php

    require_once "Medicine.php";
    require_once "Products.php";

    class Cart extends Medicine{

        private $cartItems = array();

        //----------------------------

        function addToCart($item){
            $this->cartItems[] = $item;
        }

        function viewCart(){
            $arrCartItems = $this->cartItems;

                foreach ($arrCartItems as $key => $item){
                    
                    echo '
                    
                    <ul>
                        <li>Name:' . $item->getName() . '</li>
                        <li>Description:' . $item->getDescription() . '</li>
                        <li>Price:' . number_format($item->getName(), 2) . '</li>
                        <li>Dose:' . $item->getDose() . '</li>
                        <li>Type:' . $item->getType() . '</li>
                        <li>Expiration Date:' . $item->getExpirationDate() . '</li>
                        <li>SRP:' . $item->computeSRP() . '</li>
                    </ul>
                    <hr>';
                }
        }

        function computeTotal(){
            $total = 0;

                foreach($this->cartItems as $key => $item){
                    $total += $item->computeSRP();
                }
                echo '<b>Total Cart Amout: </b> ₱ ' . number_format($total,2);
        }
    }
?>