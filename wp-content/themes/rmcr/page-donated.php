<?php get_header(); ?>

<div class="row">

	<div class="col-md-9">

		<?php if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
		} ?>

		<div id="primary" class="content-area">

			<main id="main" class="site-main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<!-- entry-header -->
						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header>

						<div class="entry-content">
							<p>
								<img class="img-right pull-right" src="http://local.rmcr.org/wp-content/uploads/2014/06/Clover_2-e1404098824923.jpg" alt=""/>
								Rocky Mountain Cocker Rescue, Inc. has many ways for you to partner with us to care for our
								beautiful dogs or contribute towards making a difference in the life of a Cocker Spaniel.
								Some of our needs are food, feeding bowls, top quality veterinary care, grooming, toys,
								leashes and bedding.
							</p>

							<p>
								Safely make a tax-deductible donation to Rocky Msountain Cocker Rescue online with
								your major credit card by clicking on the Donate button below (your personal
								information will be secure*).
							</p>


							<?php echo Paypal_payment_accept(); ?>

							<h2 class="entry-sub-title">Donate By Check</h2>

							<p>
								Payable to Rocky Mountain Cocker Rescue <br/>
								Mail to:
							</p>
							<p>
								<strong>Rocky Mountain Cocker Rescue, Inc.</strong><br/>
								<strong> PO Box 482</strong><br/>
								<strong> Parker, CO 80134</strong>
							</p>

							<h2 class="entry-sub-title">Donate Items</h2>

							<p>
								Our foster homes can always use items such as dog beds, food/water bowls,
								blankets, collars, leashes, etc. If you would like to contribute new or
								gently used condition items, please
								<a title="Cocker Spaniel Rescue" href="http://rockymountaincockerrescue.org/contact-us/" target="_self">Contact Us</a>.
							</p>

							<p>
								Shop: Please visit our online <a title="Cocker Spaniel merchandise" href="http://rockymountaincockerrescue.org/rmcr-store/" target="_self">RMCR Store</a>. All
								proceeds benefit the Cocker Spaniels in our care.
							</p>

							<span style="color: #663399;"><strong>Donate</strong></span> using <a href="https://www.coloradogives.org/RockyMountainCockerRescue/overview">Colorado Gives</a>.

							Visit our <a title="Friends of Cocker Spaniels" href="http://rockymountaincockerrescue.org/friends-of-rmcr/" target="_self">Friends</a> page
							to see some truly dedicated groups who have already made a commitment to Rocky Mountain
							Cocker Rescue, Inc.!
							<p style="text-align: center;"><strong>Thank you for your many years of support!</strong>
							</p>

							<p style="text-align: center;"> <a
									href="http://rockymountaincockerrescue.org/2014-donors/ ?">2014 Donors</a>,  <a
									href="http://rockymountaincockerrescue.org/2013-donors/ ?">2013 Donors</a>,  <a
									href="http://rockymountaincockerrescue.org/2012-donors/">2012 Donors</a>,
								<a href="http://rockymountaincockerrescue.org/2011-donors/">2011 Donors</a>,  <a
									href="http://rockymountaincockerrescue.org/2010-donors/">2010 Donors</a>,  <a
									href="http://rockymountaincockerrescue.org/2009-donors/ ">2009 Donors</a>!</p>
							&nbsp;

							<em>Rocky Mountain Cocker Rescue in Colorado is a 501(c)(3) nonprofit organization which
								relies entirely on the support of the community to help fund our work. All gifts,
								monetary or otherwise, are tax deductible as allowed by law. </em>

							<em>*It is RMCR's policy to never sell, rent, or trade our supporters' information with any
								other organization. Donor names, addresses, emails, phone numbers, gift amounts, and of
								course financial information are for RMCR purposes only.</em>
						</div>

						<!-- entry footer -->
						<footer class="entry-footer">
							<?php edit_post_link( __( 'Edit', 'rmcr' ), '<span class="edit-link">', '</span>' ); ?>
						</footer>

					</article><!-- #post-## -->

				<?php endwhile; ?>

			</main>

		</div><!-- #primary -->

	</div>

	<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>
