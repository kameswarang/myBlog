<?php
include('database.php');

class CMS {
    private $usr, $pwd, $dsn;
    //private $dsn = 'mysql:host=35.244.56.200;port=3306;dbname=myBlogDB';

    private $db;

    function __construct() {
        $url = getenv("CLEARDB_DATABASE_URL");
        $p = "/(:?\/+)|:|@|\?/";
        $r = preg_split($p, $url);
        
        $provider = $r[0];
        $host = $r[3];
        $dbname = $r[4];
       
        $this->usr = $r[1];
        $this->pwd = $r[2];
        $this->dsn = $provider . ":host=" . $host . ";port=3306;dbname=" . $dbname;
        
        try {
            $this->db = new Database($this->dsn, $this->usr, $this->pwd);
        }
        catch(Exception $e) {
            logError($e);
        }
    }

    public function getAllPosts() {
        try{
            //return $this->db->PQuery('SELECT * FROM `pages', [], PDO::FETCH_ASSOC);
            return $this->db->PQuery("SELECT `p`.*, `u`.`name` AS `authorName` FROM `pages` AS `p`, `users` AS `u` WHERE `p`.`author`=`u`.`id` ORDER BY `created` DESC", [], PDO::FETCH_ASSOC);
        }
        catch(Exception $e) {
            logError($e);
            return null;
        }
    }
    
    public function getPostBySlug($slug) {
        try {
            return $this->db->PQuery("SELECT `p`.*, `u`.`name` AS `authorName` FROM `pages` AS `p`, `users` AS `u` WHERE `p`.`slug`=? AND `p`.`author`=`u`.`id`", [$slug], PDO::FETCH_ASSOC)[0];
        }
        catch(Exception $e) {
            logError($e);
            return null;
        }
    }
    
    public function addPost($newPost) {
        try {
            return $this->db->PQuery('INSERT INTO `pages` (`label`, `title`, `topic`, `slug`, `body`, `author`) VALUES (:label, :title, :topic, :slug, :body, :author)', $newPost, 0);
        }
        catch(Exception $e) {
            $pattern = preg_quote("~SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry~");
            if(preg_match($pattern, $e->getMessage())) {
                throw new Exception('slug exists');
            }
            logError($e);
            return null;
        }
    }
    
    public function updatePost($update) {
        try {
            return $this->db->PQuery('UPDATE `pages` SET `label`=:label, `title`=:title, `topic`=:topic, `body`=:body, `slug`=:updatedSlug, `updated`=CURRENT_TIMESTAMP WHERE `slug`=:slug', $update, 0);
        }
        catch(Exception $e) {
            $pattern = preg_quote("~SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry~");
            if(preg_match($pattern, $e->getMessage())) {
                throw new Exception('slug exists');
            }
            logError($e);
            return null;
        }
    }
    
    public function deletePost($post) {
        try {
            return $this->db->PQuery('DELETE FROM `pages` WHERE `id`=:id', $post, 0);
        }
        catch(Exception $e) {
            logError($e);
            return null;
        }
    }
    
    public function addUser($newUser) {
        try {
            return $this->db->PQuery('INSERT INTO `users` (`name`, `username`, `password`) VALUES (:name, :username, :password)', $newUser, 0);
        }
        catch(Exception $e) {
            $pattern = preg_quote("~SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry~");
            if(preg_match($pattern, $e->getMessage())) {
                throw new Exception('username exists');
            }
            else {
                logError($e);
            }
            return null;
        }
    }
    
    public function getUserByName($user) {
        try {
            return $this->db->PQuery("SELECT `id`, `username`, `name`, `password` FROM `users` WHERE `username`=:username", $user, PDO::FETCH_ASSOC)[0];
        }
        catch(Exception $e) {
            logError($e);
            return null;
        }
    }
    
    public function getAllAuthors() {
        try {
            return $this->db->PQuery("SELECT `name` FROM users", [], PDO::FETCH_ASSOC);
        }
        catch(Exception $e) {
            logError($e);
            return null;
        }
    }
    
    public function getPostsByAuthor($author) {
        try {
            return $this->db->PQuery("SELECT `p`.*, `u`.`name` AS `authorName` FROM `pages` AS `p`, `users` AS `u` WHERE `p`.`author`=`u`.`id` AND `u`.`name`=? ORDER BY `created` DESC", [$author]);
        }
        catch(Exception $e) {
            logError($e);
            return null;
        }
    }
    
    public function getAllTopics() {
        try {
            return $this->db->PQuery("SELECT `topic` FROM `pages` GROUP BY `topic`");
        }
        catch(Exception $e) {
            logError($e);
            return null;
        }
    }
    
    public function getPostsByTopic($topic) {
        try {
            return $this->db->PQuery("SELECT * FROM `pages` WHERE `topic`=?", [$topic]);
        }
        catch(Exception $e) {
            logError($e);
            return null;
        }
    }
}   
?>