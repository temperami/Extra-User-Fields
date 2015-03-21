<?php

// Display Fields 
add_action( 'show_user_profile', 'fdt_add_custom_user_fields' );
add_action( 'edit_user_profile', 'fdt_add_custom_user_fields' );
 
function add_custom_user_fields() {
    ?>
 
<h3>Extra profile information</h3>
<table class="form-table">
<tr>
	<th><label for="vendor_region">Region</label></th>
 
	<td>
		<input type="text" name="vendor_region" id="vendor_region" value="<?php echo esc_attr(get_user_meta( get_current_user_id(), 'vendor_region', true )); ?>" class="regular-text" /><br />
		<p class="description">Fill in the region where the vendor is located.</p>
	</td>
</tr>

</table>
 
    <?php
  }
 
add_action( 'wc_product_vendor_admin_after_commission_due', 'pv_admin_user_info' );
function pv_admin_user_info( $user ) {
?>
  <tr>
    <th><label for="vendor_region">The region</label></th>
    <td><input type="text" name="oras_rest" id="oras_rest" value="<?php echo esc_attr(get_user_meta( $user->ID, 'oras_rest', true )); ?>" class="regular-text"></td>
  </tr>
 
<?php
}
 
// Save fields
add_action( 'personal_options_update', 'save_vendor_region' );
add_action( 'edit_user_profile_update', 'save_vendor_region' );
 
function save_vendor_region( $user_id )
{
  if ( isset( $_POST['vendor_region'] ) ) {
    update_user_meta( $user_id, 'vendor_region', sanitize_text_field($_POST['vendor_region'] ));
  }
}

?>
