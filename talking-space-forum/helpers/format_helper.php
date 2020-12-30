<?php

    /*
     * URL Format
     */
    function urlFormat($str){
        //Strip out all the white spaces
        $str = preg_replace('/\s*/','',$str);
        //Convert the string to all lowercase
        $str = strtolower($str);
        //URL Encode
        $str = urlencode($str);
        return $str;
    }

    /*
     * Format The Date
     */
    function formatDate($date){
        return date('F j, Y, g:i a',strtotime($date));
    }

    /*
     * Shorten the Text
     */
    function shortenText($text,$chars=450){
        $text = $text . " ";
        $text = substr($text,0 ,$chars);
        $text = substr($text,0 ,strrpos($text,' '));
        $text = $text. "...";
        return $text;
    }

    /*
     * Add class name active if category is active
     */
    function is_active($category){
        if (isset($_GET['category'])){
            if ($_GET['category'] ==$category){
                return 'active';
            }else{
                return '';
            }
        }else{
            if ($category == null){
                return 'active';
            }
        }
    }



?>