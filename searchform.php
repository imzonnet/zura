<?php
/**
 * Template for displaying search forms in ZuraVN.Com
 *
 * @package Zura
 * @subpackage ZuraHotel
 * @since ZuraVN.Com 1.0
 */
?>

<div class="zura-search-area">
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" id="s" name="s" value="" placeholder="Enter your search" class="form-control" required="required">
	<label class="search-submit">
		<input type="submit" id="searchsubmit" value="">
	</label>
	<input type="hidden" value="en" name="lang">
</form>
</div>