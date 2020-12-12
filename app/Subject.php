<?php

class Subject extends Database
{
    protected $table = "subjects";


    public function createOffer($data)
    {


        $this->query("INSERT INTO subjects(seller_id, name, description, starting_price, image,
                    category, method_of_payment, delivery, duration)
                    VALUES(:seller_id, :name, :description, :starting_price, :image
                , :category, :method_of_payment, :delivery, :duration)");

        $this->bind(":seller_id", $data['seller_id']);
        $this->bind(':name', $data['name']);
        $this->bind(':description', $data['description']);
        $this->bind(':starting_price', $data['starting_price']);
        $this->bind(':image', $data['image']);
        $this->bind(':category', $data['category']);
        $this->bind(':method_of_payment', $data['method_of_payment']);
        $this->bind(':delivery', $data['delivery']);
        $this->bind(':duration', $data['duration']);
        $this->execute();

    }


    public function subjectsOfProfile($seller_id)
    {
        $this->query("SELECT * FROM subjects WHERE seller_id = :seller_id");
        $this->bind(":seller_id", $seller_id);
        return $this->resultSet();
    }


    public function search($text)
    {
        $this->query("SELECT * from subjects WHERE name LIKE '%$text%' ");
        return $this->resultSet();
    }


    public function subjectsFromCategory($id)
    {
        $this->query("SELECT * FROM subjects WHERE category = :id");
        $this->bind(":id", $id);
        return $this->resultSet();
    }

    public function deleteSubject($name)
    {
        $this->query("DELETE FROM subjects WHERE name = :name");
        $this->bind(":name",$name);
        $this->execute();
    }



}