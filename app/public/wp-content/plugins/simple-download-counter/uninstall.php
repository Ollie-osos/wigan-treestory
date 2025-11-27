<?php // Uninstall SAC Pro

if (!defined('ABSPATH') && !defined('WP_UNINSTALL_PLUGIN')) exit();

delete_option('download_counter_options');
delete_option('simple-download-counter-dismiss-notice');

flush_rewrite_rules();

// the sdc_download post type is not removed on uninstall.