<form id="searchform" class="form-inline" method="get" action="<?php bloginfo( 'url' ); ?>/">
	<label class="hidden" for="s"><?php _e( 'Search:' ); ?></label>
	<div class="form-group">
		<div class="input-group">
			<input id="s" class="form-control" type="text" name="s" value="<?php the_search_query(); ?>" placeholder="Search" />
		</div>
	</div>
	<button id="searchsubmit" class="btn btn-default btn-search" type="submit">
		<span class="glyphicon glyphicon-search"></span>
	</button>
</form>
