<?php/** * The template for displaying Tag pages. * * @package cwp */get_header(); ?>			<h1>				<?php printf( __( 'Tag Archives: %s', 'cwp' ), single_tag_title( '', false ) ); ?>				<?php if ( tag_description() ) : ?>					<span><?php echo tag_description(); ?></span>				<?php endif; ?>			</h1>					</div><!--/topside-->		<div id="content">			<?php if ( have_posts() ) : ?>			<?php /* The loop */ ?>			<?php while ( have_posts() ) : the_post(); ?>				<?php get_template_part( 'content', get_post_format() ); ?>			<?php endwhile; ?>			<?php cwp_pagination(); ?>			<?php else : ?>				<?php get_template_part( 'content', 'none' ); ?>			<?php endif; ?>		</div><!-- /content --><?php get_footer(); ?>