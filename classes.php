<?php


class Register {
    private $option_group;
    private $option_name;

    function register() {}

    function get_option_group() {
        return $this->$option_group;
    }
    function set_option_group($option_group_register) {
        return $this -> $option_group = $option_group_register;
    }
    function get_option_name() {
        return $this->$option_name;
    }
    function set_option_name($option_name_register) {
        return $this -> option_name = $option_name_register;
    }
}


class Setting {
    private $id;
    private $title;
    private $callback;
    private $page;

    function Setting() {}


    function get_id() {
        return $this->$id;
    }
    function set_id($id_setting) {
        return $this -> id = $id_setting;
    }
    function get_title() {
        return $this->$title;
    }
    function set_title($title_setting) {
        return $this -> title = $title_setting;
    }
    function get_callback() {
        return $this->$callback;
    }
    function set_callback($callback_setting) {
        return $this -> callback = $callback_setting;
    }
    function get_page() {
        return $this->$page;
    }
    function set_page($page_setting) {
        return $this -> page = $page_setting;
    }
}


class Field {
    private $id;
    private $title;
    private $callback;
    private $page;
    private $section;

    function Field() {}

    function get_id() {
        return $this->$id;
    }
    function set_id($id_field) {
        return $this -> id = $id_field;
    }
    function get_title() {
        return $this->$title;
    }
    function set_title($title_field) {
        return $this -> title = $title_field;
    }
    function get_callback() {
        return $this->$callback;
    }
    function set_callback($callback_field) {
        return $this -> callback = $callback_field;
    }
    function get_page() {
        return $this->$page;
    }
    function set_page($page_field) {
        return $this -> page = $page_field;
    }
    function get_section() {
        return $this->section;
    }
    function set_section($section_field) {
        return $this -> section = $section_field;
    }
}


?>