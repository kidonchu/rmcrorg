<?php
/**
 * @package rmcr
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

		<h1 class="entry-title">
			<?php the_field( 'name' ) ?>
		</h1>

	</header>
	<!-- .entry-header -->

	<div class="entry-content">

		<div class="row">

			<div class="col-md-6">
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
							<img src="<?php the_field( 'photo1' ) ?>" alt="">

							<div class="carousel-caption">
							</div>
						</div>
						<div class="item">
							<img src="<?php the_field( 'photo2' ) ?>" alt="...">

							<div class="carousel-caption">
							</div>
						</div>
						<div class="item">
							<img src="<?php the_field( 'photo3' ) ?>" alt="...">

							<div class="carousel-caption">
							</div>
						</div>
						<div class="item">
							<img src="<?php the_field( 'photo4' ) ?>" alt="...">

							<div class="carousel-caption">
							</div>
						</div>
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div>

			</div>

			<div class="col-md-6">

				<h2 class="entry-subtitle">Description</h2>

				<dl class="dl-horizontal">
					<dt>Status:</dt>
					<dd><?php echo apply_filters( 'convert_status', get_field( 'status' ) ); ?></dd>
					<dt>RMCR ID:</dt>
					<dd><?php the_field( 'rmcr_id' ); ?></dd>
					<dt>Gender:</dt>
					<dd><?php the_field( 'gender' ); ?></dd>
					<dt>Age:</dt>
					<dd><?php echo apply_filters( 'convert_age', get_field( 'age' ) ); ?></dd>
					<dt>Adoption Fee:</dt>
					<dd>&dollar;<?php the_field( 'adoption_fee' ); ?></dd>
					<dt>Not Good With:</dt>
					<dd><?php the_field( 'not_good_with' ); ?></dd>
				</dl>

				<h2 class="entry-subtitle">Interested in <?php the_field( 'name' ) ?>?</h2>

				<a href="#">Adopt Me</a>
			</div>

		</div>

		<h2 class="entry-subtitle">About <?php the_field( 'name' ); ?></h2>

		<p><?php the_field( 'description' ); ?></p>

		<p>
			We reserve the right to refuse an adoption to any person for the well-being of the dog.
		</p>

		<p>
			Prior to adoption, <?php the_field( 'name' ); ?> will be micro-chipped, neutured and up-to-date on his
			shots. If you would like to meet Emmitt to see if he is a good fit for your home, please fill out an
			Adoption Application Online. Emmitt's adoption fee is $<?php the_field( 'adoption_fee' ); ?>.
		</p>


		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'rmcr' ),
			'after'  => '</div>',
		) );
		?>
	</div>
	<!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'rmcr' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
	<!-- .entry-footer -->

</article><!-- #post-## -->
