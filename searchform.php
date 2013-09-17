<form role="search" method="get" id="searchform" action="<?php echo esc_url( site_url( '/' ) ); ?>" >
    <input type="text" value="<?php  echo get_search_query();  ?>"  placeholder="<?php _e( 'Search Keyword','buddy-docs' );?>" name="s" id="s" class="search-terms"/>
    <input type="submit" id="searchsubmit" value=" " />
</form>