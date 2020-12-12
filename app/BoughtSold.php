<?php





class BoughtSold extends Database
{
    protected $table = "bought_sold_subject";


    public function buys($buyer_id, $seller_id, $name, $final_price)
    {
        $this->query("INSERT INTO bought_sold_subjects (buyer_id, seller_id, name, final_price)
                        VALUES (:buyer_id, :seller_id, :name, :final_price)");
        $this->bind(":buyer_id", $buyer_id);
        $this->bind(":seller_id", $seller_id);
        $this->bind(":name", $name);
        $this->bind(":final_price", $final_price);
        $this->execute();
    }


    public function buyer($buyer_id)
    {
        $this->query("SELECT * FROM bought_sold_subjects WHERE buyer_id = :buyer_id");
        $this->bind(":buyer_id", $buyer_id);
        return $this->resultSet();
    }

    public function seller($seller_id)
    {
        $this->query("SELECT * FROM bought_sold_subjects WHERE seller_id = :seller_id");
        $this->bind(":seller_id", $seller_id);
        return $this->resultSet();
    }

}