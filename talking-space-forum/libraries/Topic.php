<?php
class Topic
{
    //init DB Variable
    private $db;

    /*
     * Constructor
     */
    public function __construct()
    {
        $this->db = new Database();
    }

    /*
     * Get All Topics
     */
    public function getAllTopics()
    {
        $this->db->query("SELECT topics.*, users.username, users.avatar, categories.category_name FROM topics
                                INNER JOIN users
                                ON topics.user_id = users.id
                                INNER JOIN categories
                                ON topics.category_id = categories.id
                                ORDER BY create_date DESC 
                                ");
        //Assign Result Set
        $results = $this->db->resultSet();
        return $results;
    }

    /*
     * Get total # of Topics
     */
    public function getTotalTopics()
    {
        $this->db->query("SELECT * FROM topics");
        //Assign Result Set
        $rows = $this->db->resultSet();
        return $this->db->rowCount();
    }

    /*
     * Get total # of Categories
     */
    public function getTotalCategories()
    {
        $this->db->query("SELECT * FROM categories");
        //Assign Result Set
        $rows = $this->db->resultSet();
        return $this->db->rowCount();
    }

    /*
     *Get the # of Replies by Topic
     */
    function replyCount($topic_id)
    {
        $db = new Database();
        $db->query("SELECT * FROM replies WHERE topic_id= :topic_id");
        $db->bind(':topic_id', $topic_id);
        //Assign Rows
        $rows = $db->resultSet();
        //Get Count
        return $db->rowCount();
    }
}
?>