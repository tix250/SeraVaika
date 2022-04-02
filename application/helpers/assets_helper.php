<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    if ( ! function_exists('site_url_spx'))
    {
        function site_url_spx($uri = '', $protocol = NULL)
        {
            return get_instance()->config->site_url("index.php/".$uri, $protocol);
        }
    }
    if ( ! function_exists('css_url')){
        function css_url($lien){
            return site_url("assets/css/".$lien);
        }
    }

    if ( ! function_exists('fonts_url')){
        function fonts_url($lien){
            return site_url("assets/fonts/".$lien);
        }
    }

    if ( ! function_exists('images_url')){
        function images_url($lien){
            return site_url("assets/images/".$lien);
        }
    }

    if ( ! function_exists('js_url')){
        function js_url($lien){
            return site_url("assets/js/".$lien);
        }
    }
    if ( ! function_exists('angular_url')){
        function angular_url($lien){
            return site_url("assets/angular/".$lien);
        }
    }
    if ( ! function_exists('icon_url')){
        function icon_url($lien){
            return site_url("assets/icon/css/".$lien);
        }
    }
    if ( ! function_exists('isActive'))
    {
        function isActive($view,$where)
        {
            if(strtoupper($view)==strtoupper($where.'.php')) {
                return 'active';
            }
            else {
                return 'none';
            }
        }
    }
?>    