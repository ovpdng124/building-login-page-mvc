<?php

class Product
{
    private $name, $price, $image, $id;
    public static $count = 1;

    public function __construct($name, $price, $image, $id)
    {
        $this->name = $name;
        $this->price = $price;
        $this->image = $image;
        $this->id = $id;
        self::$count++;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public static function getCount(): int
    {
        return self::$count;
    }

    /**
     * @param int $count
     */
    public static function setCount(int $count)
    {
        self::$count = $count;
    }


    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

}

class ProductDB
{

    public static function productsDB()
    {
        return isset($_SESSION['product']) ? $_SESSION['product'] : array();
    }

    public static function create_products($name, $price, $image)
    {
        $products = self::productsDB();
        $bool = true;
        foreach ($products as $item) {
            if ($item['name'] == $name) {
                $bool = false;
                break;
            }
        }
        if ($bool) {
            $new_product = array(
                'name' => $name,
                'price' => $price,
                'image' => $image,
            );
            $products[] = $new_product;
            $_SESSION['product'] = $products;
        }
    }

    public static function get_all_products()
    {
        $products = self::productsDB();
        $list_products = array();
        foreach ($products as $key => $item) {
            $id = Product::getCount();
            $product = new Product($item['name'], $item['price'], $item['image'], $id++);
            $list_products[] = $product;
        }
        return $list_products;
    }

    public static function get_info_products($id)
    {
        $list_products = self::get_all_products();
        foreach ($list_products as $item) {
            if (($item->getId() - count($list_products)) == $id)
                $products = $item;
        }
        return $products;
    }

    public static function cartDB()
    {
        $null_cart = array(
            'id' => null,
            'username' => null,
            'name' => null,
            'quantity' => null,
            'price' => null,
            'image' => null,
            'total' => null
        );
        $_SESSION['cart'][] = $null_cart;
        return $_SESSION['cart'];
    }

    public static function add_cart($id, $quantity, $userName)
    {
        $products = self::get_info_products($id);

        $cart = self::cartDB();
        $new_cart = array(
            'id' => $id,
            'username' => $userName,
            'name' => $products->getName(),
            'quantity' => $quantity,
            'price' => $products->getPrice(),
            'image' => $products->getImage(),
            'total' => $quantity * $products->getPrice()
        );
        $cart[] = $new_cart;
        $_SESSION['cart'] = $cart;
    }

    public static function merge_cart($id, $quantity)
    {
        $cart = self::cartDB();
        foreach ($cart as $key => $item) {
            if ($item['id'] == $id) {
                unset($cart[$key]);
                $merge_cart = array(
                    'id' => $item['id'],
                    'username' => $item['username'],
                    'name' => $item['name'],
                    'quantity' => $item['quantity'] + $quantity,
                    'price' => $item['price'],
                    'image' => $item['image'],
                    'total' => ($item['quantity'] + $quantity) * $item['price']
                );
                $cart[] = $merge_cart;
            }
        }
        $_SESSION['cart'] = $cart;
    }

    public static function delete_cart($id)
    {
        $cart = self::cartDB();
        foreach ($cart as $key => $item) {
            if ($item['id'] == $id) {
                unset($cart[$key]);
                break;
            }
        }
        $_SESSION['cart'] = $cart;
    }

    public static function destroy_cart()
    {
        unset($_SESSION['cart']);
    }
}