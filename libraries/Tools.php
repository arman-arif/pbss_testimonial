<?php

namespace libraries;

use NumberFormatter;

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

    public static function long_date($str_date){
        return date("D, d M, Y", strtotime($str_date));
    }

    public static function long_datetime($str_date){
        return date("D, h:i A, d M, Y", strtotime($str_date));
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

    public static function date_in_words($str_date){
        //(PHP 5 >= 5.3.0, PHP 7, PECL intl >= 1.0.0) required
        $fmtYear = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        $fmtDay = new NumberFormatter("en", NumberFormatter::SPELLOUT);
        $fmtDay->setTextAttribute(NumberFormatter::DEFAULT_RULESET,"%spellout-ordinal");

        $date = strtotime($str_date);
        $day = date('d', $date);
        $year = date('Y', $date);

        $day_in_word = ucwords(strtolower($fmtDay->format($day)));
        $month_in_word = ucwords(strtolower(date('F', $date)));
        $year_in_word = ucwords(strtolower($fmtYear->format($year)));

        $final_words = $day_in_word . PHP_EOL;
        $final_words .= $month_in_word . PHP_EOL;
        $final_words .= $year_in_word;

        return $final_words;
    }

} // end of class Helper