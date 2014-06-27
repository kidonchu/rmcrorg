<?php
/**
 * @package rmcr
 * Template name: Dogs Grid
 */

get_header(); ?>

<div class="row">

	<div class="col-xs-9">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php if(have_posts()) : the_post(); ?>
					<?php $status = get_option('status') ?>
					<header class="entry-header">
						<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
					</header><!-- .entry-header -->
					<div class="entry-content">
						<?php the_content() ?>
					</div><!-- .entry-content -->
				<?php endif; ?>

				<?php $wp_query = new WP_Query(array('post_type' => 'dog', 'posts_per_page' => -1)); ?>
				<?php if ($wp_query->have_posts()) : ?>

					<div class="row">

						<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

							<div class="col-xs-3">
								<?php get_template_part('content', 'page-dog'); ?>
							</div>

						<?php endwhile; ?>

					</div>

				<?php else : ?>

					<?php get_template_part('content', 'none'); ?>

				<?php endif; ?>

			</main>
			<!-- #main -->
		</div><!-- #primary -->

	</div>

	<div class="col-xs-3">
		<?php get_sidebar(); ?>
	</div>

</div>

<?php get_footer(); ?>
