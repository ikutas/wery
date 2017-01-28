<?php get_header(); ?>
	<div id="content">
		<div id="inner-content" class="wrap cf">
				<main id="main" class="index__main m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<?php
					$postTitle = get_the_title();
					$thumbUrl = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' )["0"];
					foreach ((get_the_category()) as $cat) {
					    $postCatId = $cat->cat_ID;
					    break;
					}
					$categoryLink = get_category_link($postCatId);
					?>

					<div id="post-<?php the_ID(); ?>" <?php post_class(['cf','index__main__post']); ?>>
						<a class="index__main__post__thumb" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" style="background-image: url('<?php echo $thumbUrl;?>')">
							<?php echo $postTitle; ?>
						</a>
						<a class="index__main__post__title" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
							<h3 class="h2 entry-title">
									<?php the_title(); ?>
							</h3>
						</a>
						<p class="byline entry-meta vcard index__main__post__date">
                 <time class="updated entry-time" datetime="<?php echo get_the_time('Y-m-d') ?>" itemprop="datePublished"><?php echo get_the_time('Y/m/d') ?></time>
						</p>
						<a class="index__main__post__category" href="<?php echo $categoryLink; ?>" title="<?php echo $cat->cat_name; ?>">
							<?php echo $cat->cat_name; ?>
						</a>
						<div class="index__main__post__tagBox">
							<?php the_tags('', ''); ?>
						</div>
					</div>

					<?php endwhile; ?>
							<?php bones_page_navi(); ?>
					<?php else : ?>
						<div id="post-not-found" class="hentry cf index__main__post">
							<h3 class="h2 entry-title">
									page not found.
							</h3>
						</duv>
					<?php endif; ?>
				</main>
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>
