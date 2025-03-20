<?php 

/*
 * Plugin Name:       Word Count Plugin
 * Plugin URI:        https://github.com/faisalahammed044274
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Md Faisal Ahammed
 * Author URI:        https://github.com/faisalahammed044274
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       word-count
 * Domain Path:       /languages
 */

    // function wordcount_activation_hook(){
    //         // Add your code here
    // }

    // register_activation_hook(__FILE__, 'wordcount_activation_hook');


    // function wordcount_deactivation_hook(){
    //     // Add your code here
    // }
    // register_deactivation_hook(__FILE__, 'wordcount_deactivation_hook');


    function wordcount_load_textdomain(){
        load_plugin_textdomain('word-count', false, dirname(__FILE__).'/languages');
    }
    add_action('plugins_loaded', 'wordcount_load_textdomain');

    function wordcount_count_words($content){
        $stripped_content = strip_tags($content);
        $wordn = str_word_count($stripped_content);
        $label = __('Total Number of Words', 'word-count');
        $label = apply_filters('wordcount_heading', $label);
        $tag = apply_filters('wordcount_tag', 'h2');
        $content .= sprintf('<%s>%s: %s</%s>', $tag, $label, $wordn, $tag);
        return $content;
    }
    add_filter('the_content', 'wordcount_count_words');