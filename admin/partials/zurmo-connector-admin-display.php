<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://newleafwebsolutions.com
 * @since      1.0.0
 *
 * @package    Zurmo_Connector
 * @subpackage Zurmo_Connector/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
<h2>Zurmo Connector</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'zurmo-connector' ); ?>
    <?php do_settings_sections( 'zurmo-connector' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">API URL</th>
        <td><input type="text" name="zurmo_url" value="<?php echo esc_attr( get_option('zurmo_url') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Username</th>
        <td><input type="text" name="zurmo_username" value="<?php echo esc_attr( get_option('zurmo_username') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Password</th>
        <td><input type="text" name="zurmo_password" value="<?php echo esc_attr( get_option('zurmo_password') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>