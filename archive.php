<?php/** * The template for displaying Archive pages. * * @package cwp */get_header(); ?>			<h1>				<?php					if ( is_day() ) :						printf( __( 'Daily Archives: %s', 'metrox' ), get_the_date() );					elseif ( is_month() ) :						printf( __( 'Monthly Archives: %s', 'metrox' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'metrox' ) ) );					elseif ( is_year() ) :						printf( __( 'Yearly Archives: %s', 'metrox' ), get_the_date( _x( 'Y', 'yearly archives date format', 'metrox' ) ) );					else :						single_cat_title();					endif;				?>			</h1>		</div><!--/topside-->		<div id="content">			<?php if ( have_posts() ) : ?>			<?php /* The loop */ ?>			<?php while ( have_posts() ) : the_post(); ?>				<?php get_template_part( 'content', get_post_format() ); ?>			<?php endwhile; ?>			<?php cwp_pagination(); ?>			<?php else : ?>				<?php get_template_part( 'content', 'none' ); ?>			<?php endif; ?>		</div><!-- /content --><?php get_footer(); ?>