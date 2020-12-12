<?php


class Auction extends Database
{
    protected $table = "auction";

    public function offer($data)
    {
        $this->query("INSERT INTO auction(buyer_id, seller_id, name, bid_price)
                        VALUES (:buyer_id, :seller_id, :name, :bid_price)");
        $this->bind(":buyer_id", $data['buyer_id']);
        $this->bind(":seller_id", $data['seller_id']);
        $this->bind(":name", $data['name']);
        $this->bind(":bid_price", $data['bid_price']);
        $this->execute();
    }

    public function offerFromUser($seller_id)
    {
        $this->query("SELECT * FROM auction WHERE seller_id = :seller_id");
        $this->bind(":seller_id", $seller_id);
        return $this->resultSet();
    }

    public function biggestOfferPrice($name)
    {
        $this->query("SELECT * FROM auction WHERE name =:name ORDER BY bid_price DESC");
        $this->bind(":name", $name);
        return $this->single();
    }

    public function deleteFromAuction($name)
    {
        $this->query("DELETE FROM auction WHERE name = :name");
        $this->bind(":name",$name);
        $this->execute();
    }


    public function deleteSubject($name)
    {
        $this->query("DELETE FROM auction WHERE name = :name");
        $this->bind(":name",$name);
        $this->execute();
    }

}