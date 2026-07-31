<?php
/**
 * Plugin Name: Modern WordPress Plugin Boilerplate
 * Description: A clean, object-oriented WordPress plugin boilerplate for client-specific functionality.
 * Version: 0.1.0
 * Author: Sang Huynh Xuan
 * License: GPL-2.0-or-later
 */

declare(strict_types=1);

namespace SangPortfolio;

if (! defined('ABSPATH')) {
    exit;
}

final class WpPluginBoilerplateModernPlugin {
    public function __construct() {
        add_action('init', [$this, 'bootstrap']);
    }

    public function bootstrap(): void {
        do_action('sang_portfolio_wp_plugin_boilerplate_modern_ready');
    }
}

new WpPluginBoilerplateModernPlugin();
