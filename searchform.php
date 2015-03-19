<form action="/" method="get">
	<fieldset>
		<input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
		<input type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/img/search.png" class="search-button"/>
	</fieldset>
</form>