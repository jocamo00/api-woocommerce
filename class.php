<?php


class Register {

    var $option_group;
    var $option_name;

    function register() {}

    function set_option_group($option_group_register) {
        return $this -> option_group = $option_group_register;
    }
    function set_option_name($option_name_register) {
        return $this -> option_name = $option_name_register;
    }
}


class Setting {

    var $id;
    var $title;
    var $callback;
    var $page;

    function Setting() {}

    function set_id($id_setting) {
        return $this -> id = $id_setting;
    }
    function set_title($title_setting) {
        return $this -> title = $title_setting;
    }
    function set_callback($callback_setting) {
        return $this -> callback = $callback_setting;
    }
    function set_page($page_setting) {
        return $this -> page = $page_setting;
    }
}


class Field {

    var $id;
    var $title;
    var $callback;
    var $page;
    var $section;

    function Field() {}

    function set_id($id_field) {
        return $this -> id = $id_field;
    }
    function set_title($title_field) {
        return $this -> title = $title_field;
    }
    function set_callback($callback_field) {
        return $this -> callback = $callback_field;
    }
    function set_page($page_field) {
        return $this -> page = $page_field;
    }
    function set_section($section_field) {
        return $this -> section = $section_field;
    }
}


?>