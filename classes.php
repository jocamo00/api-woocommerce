<?php


class Menu {
    private $page_title;
    private $menu_title;
    private $capability;
    private $menu_slug;
    private $function;

    function Menu() {}

    function get_page_title() {
        return $this->$page_title;
    }
    function set_page_title($page_title_menu) {
        return $this -> page_title = $page_title_menu;
    }
    function get_menu_title() {
        return $this->$menu_title;
    }
    function set_menu_title($menu_title_menu) {
        return $this -> menu_title = $menu_title_menu;
    }
    function get_capability() {
        return $this->$capability;
    }
    function set_capability($capability_menu) {
        return $this -> capability = $capability_menu;
    }
    function get_menu_slug() {
        return $this->$menu_slug;
    }
    function set_menu_slug($menu_slug_menu) {
        return $this -> menu_slug = $menu_slug_menu;
    }
    function get_function() {
        return $this->$function;
    }
    function set_function($function_menu) {
        return $this -> function = $function_menu;
    }
}


class Register {
    private $option_group;
    private $option_name;

    function register() {}

    function get_option_group() {
        return $this->$option_group;
    }
    function set_option_group($option_group_register) {
        return $this -> option_group = $option_group_register;
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
        return $this->$section;
    }
    function set_section($section_field) {
        return $this -> section = $section_field;
    }
}


?>