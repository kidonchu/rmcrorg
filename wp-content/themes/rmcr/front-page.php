<?php get_header(); ?>


<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		<li data-target="#carousel-example-generic" data-slide-to="3"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<div class="item active">
			<img src="http://placehold.it/1170x300" alt="">

			<div class="carousel-caption">
			</div>
		</div>
		<div class="item">
			<img src="http://placehold.it/1170x300" alt="">

			<div class="carousel-caption">
			</div>
		</div>
		<div class="item">
			<img src="http://placehold.it/1170x300" alt="">

			<div class="carousel-caption">
			</div>
		</div>
		<div class="item">
			<img src="http://placehold.it/1170x300" alt="">

			<div class="carousel-caption">
			</div>
		</div>
	</div>

	<!-- Controls -->
	<a class="left carousel-control" href="#carousel-example-generic" role="button"
	   data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
	</a>
	<a class="right carousel-control" href="#carousel-example-generic" role="button"
	   data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
	</a>
</div>

<div class="row">

	<div class="col-md-9">

		<?php if ( function_exists( 'rps_show' ) ) echo rps_show( $category_ids, $total_posts, $post_include_ids, $post_exclude_ids ); ?>

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
