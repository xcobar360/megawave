<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="shop-box">
    	<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
            <div class="post-meta sticky-posts">
            <?php $sticky_post_text = (function_exists('ot_get_option'))? ot_get_option( 'sticky_post_text', 'Featured' ) : 'Featured';?>
            <div class="sticky-content"><?php printf( '<span class="sticky-post">%s</span>', $sticky_post_text ); ?></div>
            </div>
		<?php endif; ?>
        <div class="blog-title">
            <?php the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
        </div><!-- end blog-title -->
        <div class="meta">
		<?php
		$categories_list = get_the_category_list( esc_html_x( ', ', 'Used between list items, there is a comma.', 'gocourier' ) );
		if ( $categories_list && gocourier_categorized_blog() ): ?>
		<?php printf( '<span>%1$s </span>%2$s</span>', esc_html__( 'In : ', 'gocourier' ), $categories_list ); ?>
		<?php
		endif;
		?>
        <span><?php echo esc_html__('Comments : ', 'gocourier'); ?><?php comments_number( '0', '1', '%' ); ?></span>
        <span><?php echo esc_html__('Author : ', 'gocourier'); ?><a href="<?php echo esc_url( get_author_posts_url(get_the_author_meta( 'ID' ))); ?>"><?php echo get_the_author_meta('display_name'); ?></a></span>
        <span><?php echo esc_html__('Date : ', 'gocourier'); ?><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_date( 'd M Y' ); ?></a></span>
        </div><!-- end meta -->
        <div class="shop-image entry entry-blog">
        	<?php
			$source_name = get_post_meta( get_the_ID(), '_format_quote_source_name', true );
			$source_url = get_post_meta( get_the_ID(), '_format_quote_source_url', true );
			$source_title = get_post_meta( get_the_ID(), '_format_quote_source_title', true );
			$source_date = get_post_meta( get_the_ID(), '_format_quote_source_date', true );
			if( $source_title != '' ):
			?>
            <blockquote class="quotepost">
                <p><a href="<?php echo (is_single())? esc_url($source_url) : esc_url(get_permalink()); ?>"><?php echo esc_html($source_name); ?></a></p>
                <footer><?php echo esc_html__('Someone famous in', 'gocourier'); ?><cite title="<?php echo esc_attr($source_title); ?>"><?php echo esc_html($source_title); ?></cite>
                <p><?php echo esc_html($source_date); ?></p>
                </footer>
            </blockquote>			
			<?php endif; ?>
            <?php gocourier_post_thumb( 1000, 600 ); ?>
        </div>
        
        <?php if ( is_search()) : ?>
            <div class="blog-desc-small"><?php the_excerpt(); ?></div>
        <?php else : ?>
            <div class="blog-desc-small">
            <?php the_content(sprintf(esc_html__( 'Read More', 'gocourier' ) ) ); ?>
            </div>
        <?php endif; ?>
        <?php if(is_single()): ?>
        <?php
		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'gocourier' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'gocourier' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
        <div class="edit_post_link">
			<?php edit_post_link( esc_html__( 'Edit', 'gocourier' ), '<span class="edit-link">', '</span>' ); ?>
        </div>
        
        <?php
		$tags_list = get_the_tag_list( '<ul class="single-blog-tags"><li>' .esc_html__('Tags:', 'gocourier') .'</li><li>','</li><li>','</li></ul>');
		if ( $tags_list ): ?>
			<div class="blog-tags">
				<?php echo wp_kses( 
				  $tags_list, 
				  // Only allow ul, li tags
				  array(
					'ul' => array(
					  'class' => array()
					),
					'li' => array(
					  'class' => array()
					),
					'a' => array(
					  'href' => array()
					),
				  )
				); ?>
			</div> 
		<?php 
		endif;
		?>
            
        <?php endif; ?>
            
    </div><!-- end blog-wrap -->
</div>