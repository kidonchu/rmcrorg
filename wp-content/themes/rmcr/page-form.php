<?php
/**
 * Template Name: Form Page
 * The Template for forms
 *
 * @package rmcr
 */
?>

<?php get_header(); ?>

<div class="row">

	<div class="col-xs-9">

		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : the_post(); ?>

				<?php if ( function_exists( 'yoast_breadcrumb' ) ) {
					yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
				} ?>


				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>

				<?php $form_url = get_post_meta( get_the_ID(), 'form_url', true ); ?>
				<iframe id="rmcr-form" src="<?php echo $form_url; ?>" frameborder="0"></iframe>
<!--				<iframe id="rmcr-form" width="100%" height="1000px" src="http://rockymountaincockerrescue.org/FORMfields/forms/rmcr_adoption_application.php"></iframe>-->

			<?php endif; ?>

		</main>

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
