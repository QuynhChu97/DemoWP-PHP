<?php
namespace ExtendBuilder;
function wp_colibri_v1_get_all_menus()
{

    $menus_names = [];
    $menus = wp_get_nav_menus();
    foreach ($menus as $menu) {
        $obj = new \stdClass;
        foreach (get_object_vars($menu) as $key => $value) {
            $obj->$key = $value;
        }
//        $obj->name = $menu->name;
        $menus_names[] = $obj;
    }

    return $menus_names;
}

add_action('rest_api_init', function () {
    register_rest_route('colibri/v1', '/menus', array(
        'methods'  => 'GET',
        'callback' => '\ExtendBuilder\wp_colibri_v1_get_all_menus',
    ));
});
