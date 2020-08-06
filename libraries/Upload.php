<?php
namespace libraries;

class Upload
{
    public function uploadImage($data, $key, $path="images"){
        $file_name = $data[$key]['name'];
        $directory = UPL_DIR;
        $tmp = explode('.',$file_name);
        $ext = end($tmp);
        $unique_name = $path . '_';
        $unique_name .= substr(md5(time()),0,6) . '_';
        $unique_name .= substr(md5(rand()),0,3) . '_';
        $unique_name .= substr(md5($file_name),0,6) .'.'.$ext;

        $file_size = $data[$key]['size'];
        $upload_file = $directory . $path . "/" . $unique_name;
        $file_type = $data[$key]['type'];
        $tmp_file = $data[$key]['tmp_name'];

        if (empty($file_name)){
            Session::set('err_msg', "No image is selected");
        } else {
            if ($file_type == "image/jpeg" || $file_type == "image/png"){
                if($file_size > 5242880){
                    Session::set('err_msg', "File is too large");
                } else {
                    if (file_exists($upload_file)){
                        Session::set('err_msg', "File already exists");
                    } else {
                        if (move_uploaded_file($tmp_file, $upload_file)){
                            return $unique_name;
                        }
                    }
                }
            } else {
                Session::set('err_msg', "Invalid file format");
            }
        }
        return false;
    }

    public function uploadFile($data, $key, $path="docs"){
        $file_name = $data[$key]['name'];
        $directory = UPL_DIR;
        $tmp = explode('.', $file_name);
        $ext = end($tmp);
        $unique_name = $path . '_';
        $unique_name .= substr(md5(time()),0,6) . '_';
        $unique_name .= substr(md5(rand()),0,6) . '_';
        $unique_name .= substr(md5($file_name),0,12) .'.'.$ext;

        $file_size = $data[$key]['size'];
        $upload_file = $directory . $path . "/" . $unique_name;
        $tmp_file = $data[$key]['tmp_name'];

        if (empty($file_name)){
            Session::set('err_msg', "No file is selected");
        } else {
            if($file_size > 5242880){
                Session::set('err_msg', "File is too large");
            } else {
                if (file_exists($upload_file)){
                    Session::set('err_msg', "File already exists");
                } else {
                    if (move_uploaded_file($tmp_file, $upload_file)){
                        return $unique_name;
                    }
                }
            }
        }
        return false;
    }

    public function uploadCSV($key){
        $file_name = $_FILES[$key]['name'];
        $directory = UPL_DIR . "CSV" . D_S;
        $tmp = explode('.', $file_name);
        $ext = end($tmp);
        $unique_name = date("Ymd") . '_' . time() . '_';
        $unique_name .= substr(md5(rand()),0,6) . '.' . $ext;

        $file_size = $_FILES[$key]['size'];
        $upload_file = $directory . $unique_name;
        $tmp_csv = $_FILES[$key]['tmp_name'];

        $csv_mime_types = [
            'text/csv',
            'text/plain',
            'application/csv',
            'text/comma-separated-values',
            'application/excel',
            'application/vnd.ms-excel',
            'application/vnd.msexcel',
            'text/anytext',
            'application/octet-stream',
            'application/txt',
        ];

        if (empty($file_name)){
            Session::set('err_msg', "No file is selected");
        } else {
            if($file_size > 5242880){
                Session::set('err_msg', "File is too large");
            } elseif (!in_array($_FILES[$key]['type'], $csv_mime_types)){
                Session::set('err_msg', "Invalid file format");
            } else {
                if (file_exists($upload_file)){
                    Session::set('err_msg', "File already exists");
                } else {
                    if (move_uploaded_file($tmp_csv, $upload_file)){
                        return $unique_name;
                    }
                }
            }
        }
        return false;
    }

    public function isCSV( $file ) {
        $csv_mime_types = [
            'text/csv',
            'text/plain',
            'application/csv',
            'text/comma-separated-values',
            'application/excel',
            'application/vnd.ms-excel',
            'application/vnd.msexcel',
            'text/anytext',
            'application/octet-stream',
            'application/txt',
        ];
        $finfo = finfo_open( FILEINFO_MIME_TYPE );
        $mime_type = finfo_file( $finfo, $file );

        return in_array( $mime_type, $csv_mime_types );
    }

}