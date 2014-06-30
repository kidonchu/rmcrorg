<?php
/**
 * @package rmcr
 */
?>

<?php $dog = new RMCR_Dog(); ?>
<?php if ( $dog->getData( 'name' ) ) : ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">

			<h1 class="entry-title">
				<?php echo $dog->getData( 'name' ) ?>
			</h1>

		</header>
		<!-- .entry-header -->

		<div class="entry-content">

			<div class="row">

				<div class="col-md-6">
					<div id="carousel-example-generic" class="carousel slide dog-carousel" data-ride="carousel">
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
								<img src="<?php echo $dog->getData( 'photo1' ) ?>" alt="">

								<div class="carousel-caption">
								</div>
							</div>
							<div class="item">
								<img src="<?php echo $dog->getData( 'photo2' ) ?>" alt="...">

								<div class="carousel-caption">
								</div>
							</div>
							<div class="item">
								<img src="<?php echo $dog->getData( 'photo3' ) ?>" alt="...">

								<div class="carousel-caption">
								</div>
							</div>
							<div class="item">
								<img src="<?php echo $dog->getData( 'photo4' ) ?>" alt="...">

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

				</div>

				<div class="col-md-6">

					<h2 class="entry-subtitle">Description</h2>

					<dl class="dl-horizontal">
						<dt>Status:</dt>
						<dd><?php echo $dog->getStatusLabel(); ?></dd>
						<dt>RMCR ID:</dt>
						<dd><?php echo $dog->getData( 'rmcr_id' ); ?></dd>
						<dt>Gender:</dt>
						<dd><?php echo $dog->getData( 'gender' ); ?></dd>
						<dt>Age:</dt>
						<dd><?php echo $dog->getAgeTranslated(); ?></dd>
						<dt>Adoption Fee:</dt>
						<dd>&dollar;<?php echo $dog->getData( 'adoption_fee' ); ?></dd>
						<dt>Not Good With:</dt>
						<dd><?php echo $dog->getNotGoodWithTranslated(); ?></dd>
					</dl>

					<?php echo $dog->getAdoptLink() ?>

				</div>

			</div>

			<h2 class="entry-subtitle">About <?php echo $dog->getData( 'name' ); ?></h2>

			<p><?php echo $dog->getData( 'description' ); ?></p>

			<p>
				We reserve the right to refuse an adoption to any person for the well-being of the dog.
			</p>

			<p>
				Prior to adoption, <?php echo $dog->getData( 'name' ); ?> will be micro-chipped, neutered, and
				up-to-date on <?php echo ( $dog->getData( 'gender' ) == 'Male' ) ? 'his' : 'her'; ?> shots.
				If you would like to meet <?php echo $dog->getData( 'name' ); ?> to see
				if <?php echo ( $dog->getData( 'gender' ) == 'Male' ) ? 'he' : 'she'; ?>
				is a good fit for your home, please fill out an <a href="#">Adoption Application</a> online.
				<?php echo $dog->getData( 'name' ); ?>'s adoption fee is
				$<?php echo $dog->getData( 'adoption_fee' ); ?>.
			</p>

			<?php echo $dog->getAdoptLink() ?>

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

<?php endif; ?>

