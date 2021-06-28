<?php

class Category
{

    private $db;

    public function __construct()
    {
        $this->db = new Databases;
    }

    public function addCategory($title)
    {
        $this->db->query("INSERT INTO categories(category) VALUES(?)");
        $this->db->bind(1, $title);
        if ($this->db->execute()) {
            return true;
        }
        return false;
    }

    public function loadCategories()
    {
        $this->db->query("SELECT * FROM categories ORDER BY id DESC");
        $data = $this->db->resultset();
        if ($this->db->rowCount() > 0) {
            return $data;
        }
        return false;
    }

    public function check($category)
    {
        $this->db->query("SELECT * FROM posts WHERE category=?");
        $this->db->bind(1, $category);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return true;
        }
        return false;
    }

    public function removeCategory($id)
    {
        if ($this->check($id)) {
            return false;
        } else {
            $this->db->query("DELETE FROM categories WHERE category=?");
            $this->db->bind(1, $id);
            if ($this->db->execute()) {
                return true;
            }
            return false;
        }
    }
}
