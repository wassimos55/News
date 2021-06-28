<?php

class Posts
{
    public static $pageno;
    public $totalPages;
    private $db;

    public function __construct()
    {
        $this->db = new Databases;
    }

    public function addPost(array $data)
    {
        $this->db->query("INSERT INTO posts 
                            (title, content, category, tags, image, author, status , slug)
                            VALUES(?,?,?,?,?,?,?,?)");

        for ($i = 0; $i < count($data); $i++) {
            $this->db->bind(($i + 1), $data[$i]);
        }

        if ($this->db->execute()) {
            return true;
        }
        return false;
    }


    public function loadPosts()
    {
        $conn = mysqli_connect("localhost", "root", "2178056cletus", "blogging_system");
        $recordPerPage = 5;
        $offset = (Posts::$pageno - 1) * $recordPerPage;
        $totalpages = "SELECT COUNT(*) FROM posts WHERE status=true ORDER BY id DESC";
        $result = mysqli_query($conn, $totalpages);
        $totalRows = mysqli_fetch_array($result)[0];
        $this->totalPages = ceil($totalRows / $recordPerPage);

        // get records from db
        $this->db->query("SELECT * FROM posts WHERE status = true ORDER BY id DESC LIMIT $offset, $recordPerPage");
        $data = $this->db->resultset();
        if ($this->db->rowCount() > 0) {
            return $data;
        }
        return false;
    }

    public function deletePost($id, $image)
    {
        $this->db->query("DELETE FROM posts WHERE id=?");
        $this->db->bind(1, $id);
        if ($this->db->execute()) {
            unlink($image);
            return true;
        }
        return false;
    }
}
