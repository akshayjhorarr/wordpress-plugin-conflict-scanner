<?php

if (!defined('ABSPATH')) {
    exit;
}

add_action('admin_menu', 'wpcs_add_admin_menu');

function wpcs_add_admin_menu() {

    add_menu_page(
        'Plugin Conflict Scanner',
        'Plugin Conflict Scanner',
        'manage_options',
        'wpcs-dashboard',
        'wpcs_dashboard_page',
        'dashicons-warning',
        33
    );
}

function wpcs_dashboard_page() {

    $active_plugins = get_option('active_plugins');

    $plugin_count = count($active_plugins);

    $woocommerce_active = in_array(
        'woocommerce/woocommerce.php',
        $active_plugins
    );

    $elementor_active = in_array(
        'elementor/elementor.php',
        $active_plugins
    );

?>

<div class="wrap">

    <h1>WordPress Plugin Conflict Scanner</h1>

    <table class="widefat striped" style="max-width: 900px;">

        <thead>
            <tr>
                <th>Check</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td>Total Active Plugins</td>
                <td><?php echo esc_html($plugin_count); ?></td>
            </tr>

            <tr>
                <td>WooCommerce Active</td>
                <td>
                    <?php echo $woocommerce_active ? 'Yes' : 'No'; ?>
                </td>
            </tr>

            <tr>
                <td>Elementor Active</td>
                <td>
                    <?php echo $elementor_active ? 'Yes' : 'No'; ?>
                </td>
            </tr>

            <tr>
                <td>Potential Conflict Risk</td>
                <td>
                    <?php
                    echo $plugin_count > 25
                        ? 'High Plugin Load'
                        : 'Normal';
                    ?>
                </td>
            </tr>

        </tbody>

    </table>

</div>

<?php
}