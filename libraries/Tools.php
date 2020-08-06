<?php

namespace libraries;

class Tools
{
    public static function redirect($loc) {
        header("Location: $loc");
    }

    public static function validate_data($data) {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
    }

    public static function validate_data_array($array) {
        foreach ($array as $key => $value){
            if (is_array($value)) {
                self::validate_data_array($value);
            } else {
                $array[$key] = self::validate_data($value);
            }
        }
        return $array;
    }

    public static function format_date($date){
        try {
            $new_date = new \DateTime($date);
            //date('Y-m-d', strtotime('+1 week'));
            return $new_date->format("d/m/Y");
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    public static function short_date($str_date, $separator = "-"){
        return date("Y{$separator}m{$separator}d", strtotime($str_date));
    }

    public static function text_shorten($text, $limit) {
        $text = $text . " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text,' '));
        $text = $text."...";
        return $text;
    }

    public static function array_to_object(&$array) {
        $array = json_decode(json_encode($array), false);
    }

    public static function check_user_active() {
        if (Session::is_set("user_name")){
            if (Session::is_set("last_active")) {
                $last_active = Session::get("last_active");
                if (time() - $last_active > 30 * 60) {
                    Session::destroy();
                    Session::set("logged_out", true);
                    self::redirect(BASE_URL . "login");
                } else {
                    Session::set("last_active", time());
                }
            }
        }
    }

    public static function goto_last_page() {
        if (Session::is_set("logged_out"))
            Tools::redirect($_SERVER['HTTP_REFERER']);
    }

    public static function set_errors($errors){
        if($errors != '')
            include INCL_DIR . 'alert.php';
    }

    public static function get_typed_value($name){
        return isset($_POST[$name]) ? $_POST[$name] : '';
    }

    public static function get_json($array) {
        return json_encode($array);
    }

    public static function html($str){
        if (is_array($str)){
            foreach ($str as $key => $item) {
                $str[$key] = self::html($item);
            }
            return $str;
        }
        return htmlspecialchars_decode(html_entity_decode($str));
    }

} // end of class Helper