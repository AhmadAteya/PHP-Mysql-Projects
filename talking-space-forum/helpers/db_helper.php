<?php
    /*
     *Get the # of Replies by Topic
     */
    function replyCount($topic_id){
        $db = new Database();
        $db->query("SELECT * FROM replies WHERE topic_id= :topic_id");
        $db->bind(':topic_id',$topic_id);
        //Assign Rows
        $rows = $db->resultSet();
        //Get Count
        return $db->rowCount();
    }

    /*
     *Get All Categories
     */
    function getCategories(){
        $db = new Database();
        $db->query("SELECT * FROM categories");

        //Assign the results
        $results = $db->resultSet();
        return $results;
    }
