<?php
class URL_Helper{
    //definisikan base url
    public static function getBaseUrl(){
        $base_url = $_ENV['base_url'];
        return $base_url;
    }
    //buat fungsi untuk membuat link
    public static function createLink($controller,$action,$params){
        $link = self::getBaseUrl()."index.php?mod=$controller&act=$action";
        if($params!=null){
            foreach($params as $key=>$value){
                $link.="&$key=$value";
            }
        }
        return $link;
    }
    //buat fungsi untuk redirect
    public static function redirect($controller,$action,$params){
        $link = self::createLink($controller,$action,$params);
        header("location:$link");
    }
}
?>