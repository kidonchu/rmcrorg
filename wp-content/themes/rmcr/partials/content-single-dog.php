<?php
/**
 * @package rmcr
 */
?>

<?php 
$dog = new RMCR_Dog();
$name = $dog->get_data('name');
$status = $dog->get_status_label();
$rmcr_id = $dog->get_data('rmcr_id');
$not_good_with = $dog->get_not_good_with_translated();
$age = $dog->get_age_translated();
$adoption_fee = $dog->get_data('adoption_fee');
$description = $dog->get_data('description');
$short_description = $dog->get_data('short_description');
$adopt_link = $dog->get_adopt_link();
$gender = $dog->get_data('gender');
$photo1 = $dog->get_data('photo1');
$photo2 = $dog->get_data('photo2');
$photo3 = $dog->get_data('photo3');
$photo4 = $dog->get_data('photo4');
?>
<?php if ( $dog->has_required_fields() ) : ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">

			<h1 class="entry-title">
				<?php echo $name ?>
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
							<?php if($photo1) : ?>
								<div class="item active">
									<img src="<?php echo $photo1 ?>" alt="">

									<div class="carousel-caption">
									</div>
								</div>
							<?php endif; ?>
							<?php if($photo2) : ?>
								<div class="item">
									<img src="<?php echo $photo2 ?>" alt="...">

									<div class="carousel-caption">
									</div>
								</div>
							<?php endif; ?>
							<?php if($photo3) : ?>
								<div class="item">
									<img src="<?php echo $photo3 ?>" alt="...">

									<div class="carousel-caption">
									</div>
								</div>
							<?php endif; ?>
							<?php if($photo4) : ?>
								<div class="item">
									<img src="<?php echo $photo4 ?>" alt="...">

									<div class="carousel-caption">
									</div>
								</div>
							<?php endif; ?>
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
						<dd><?php echo $status; ?></dd>
						<dt>RMCR ID:</dt>
						<dd><?php echo $rmcr_id; ?></dd>
						<dt>Gender:</dt>
						<dd><?php echo $gender; ?></dd>
						<dt>Age:</dt>
						<dd><?php echo $age; ?></dd>
						<dt>Adoption Fee:</dt>
						<dd>&dollar;<?php echo $adoption_fee; ?></dd>
						<dt>Not Good With:</dt>
						<dd><?php echo $not_good_with; ?></dd>
					</dl>

					<?php echo $adopt_link ?>

				</div>

			</div>

			<h2 class="entry-subtitle">About <?php echo $name; ?></h2>

			<p><?php echo $description; ?></p>

			<p>
				We reserve the right to refuse an adoption to any person for the well-being of the dog.
			</p>

			<p>
				Prior to adoption, <?php echo $name; ?> will be micro-chipped, neutered, and
				up-to-date on <?php echo ( $gender == 'Male' ) ? 'his' : 'her'; ?> shots.
				If you would like to meet <?php echo $name; ?> to see
				if <?php echo ( $gender == 'Male' ) ? 'he' : 'she'; ?>
				is a good fit for your home, please fill out an <a href="#">Adoption Application</a> online.
				<?php echo $name; ?>'s adoption fee is
				$<?php echo $adoption_fee; ?>.
			</p>

			<?php echo $adopt_link; ?>

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

<?php else: ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<h1>Sorry, this dog does not exist</h1>

	</article><!-- #post-## -->

<?php endif; ?>

