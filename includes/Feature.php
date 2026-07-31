<?php
declare(strict_types=1);
namespace SangPortfolio;
if (! defined('ABSPATH')) { exit; }
final class WpPluginBoilerplateModernFeature {
    private const OPTION = 'wp_plugin_boilerplate_modern_enabled';
    private const SLUG = 'wp-plugin-boilerplate-modern';
    private const TITLE = 'Modern WordPress Plugin Boilerplate';
    public function register(): void {
        add_action('admin_init', [$this, 'registerSettings']);
        add_action('admin_menu', [$this, 'registerPage']);
        if (Support::enabled(self::OPTION)) { $this->registerFeature(); }
    }
    public function registerSettings(): void { register_setting(self::SLUG, self::OPTION, ['sanitize_callback' => static fn($value): string => empty($value) ? '0' : '1']); }
    public function registerPage(): void { add_options_page(self::TITLE, self::TITLE, 'manage_options', self::SLUG, [$this, 'renderPage']); }
    public function renderPage(): void { if (! current_user_can('manage_options')) { return; } echo '<div class="wrap"><h1>' . esc_html(self::TITLE) . '</h1><form method="post" action="options.php">'; settings_fields(self::SLUG); echo '<label><input type="checkbox" name="' . esc_attr(self::OPTION) . '" value="1" ' . checked(Support::enabled(self::OPTION), true, false) . '> ' . esc_html__('Enable feature', 'sang-portfolio') . '</label>'; submit_button(); echo '</form></div>'; }
    private function registerFeature(): void { add_action('init', [$this, 'registerContentType']); }
    public function registerContentType(): void { register_post_type('sang_client_note', ['label' => __('Client Notes', 'sang-portfolio'), 'public' => false, 'show_ui' => true, 'supports' => ['title', 'editor'], 'show_in_rest' => true]); }
}
