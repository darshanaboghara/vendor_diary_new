<div class="news-carousel news-carousel-4">
	<div class="container">
			<?php if( $title ) : ?><div class="section-heading"><?php echo esc_html( $title ); ?></div><?php endif; ?>
			<div class="news-carousel-inside">
			<div id="owl-news-c-4" class="owl-carousel" >
			<?php while( $query->have_posts() ) : $query->the_post(); ?> 
				<div class="item four-single">

					<div class="news-carousel-content">
						<h4 class="slider-news-title"><a href="<?php the_permalink(); ?>" class="heading-title"><?php the_title(); ?></a></h4>
						<small><?php echo get_the_date(); ?></small>
						<p><?php the_excerpt();?></p>
					</div>

					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
					<?php if( ! empty( $image ) ) : ?>
						<a href="<?php the_permalink(); ?>" class="feature-image">
							<img src="<?php echo esc_url( $image[0] ); ?>" class="img-responsive">
						</a>
					<?php endif; ?>	
					
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
				
			</div>
			</div>
	</div>
</div>