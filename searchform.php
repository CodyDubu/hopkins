<form role="search" method="get" class="search-form row no-gutters" action="<?php echo home_url( '/' ); ?>">
    <label class="col-md-8 col-sm-8">
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
    <input type="submit" class="search-submit col-md-4 col-sm-4"
        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>