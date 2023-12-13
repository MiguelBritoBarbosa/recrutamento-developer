<?php
get_header();
$botao = 'Continue lendo';

$args = array(
    'category_name' => 'blog',
    'post_type' => 'post',
    'meta_query' => array(
        array(
            'key' => 'status',
            'value' => 'free',
            'compare' => '=',
        ),
    ),
    'date_query' => array(
        array(
            'after' => '2019-09-10',
            'before' => '2019-09-20',
            'inclusive' => true,
        ),
    ),
);

$query = new WP_Query($args);
?>
<div class="container-page">
	<div class="header-page" style="background: url('<?php bloginfo('template_url'); ?>/src/images/bg-blog.jpg') no-repeat center center;background-size: cover;">
		<div class="center">
			<img src="<?php bloginfo('template_url'); ?>/src/images/icone-blog.png">
			<h1 class="title">Blog</h1>
		</div>
	</div>
	<div class="content-page">
		<div class="center-small">
			<div class="top-itens">
				<div class="center-small">
					<div class="col">
						<?php
							if ($query->have_posts()) :
								$query->the_post();
							?>
							<div class="item">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
									<img src="./wp-content/themes/recrutamento-developer/src/images/no-thumb-post-big.jpg">
								</a>
								<div class="wrapper">
									<div class="category">
										<?php echo get_the_category_list(', '); ?>
									</div>
									<div class="text">
										<h2 class="title">
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
										</h2>
										<div class="text-mobile">
											<p><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></p>
										</div>
										<a href="<?php the_permalink(); ?>" class="link-more" title="Continue lendo <?php the_title(); ?>">Continue lendo</a>
									</div>
								</div>
							</div>
						<?php
							endif;
						?>
				</div>

					<div class="col">
						<?php
							rewind_posts();
							if ($query->have_posts()) :
								$query->next_post();
								$counter = 0;
								while ($query->have_posts() && $counter < 2) : $query->the_post();
						?>
								<div class="item item-small">
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<img src="./wp-content/themes/recrutamento-developer/src/images/no-thumb-post-small.jpg">
									</a>
									<div class="wrapper">
										<div class="category">
											<?php echo get_the_category_list(', '); ?>
										</div>
										<div class="text">
											<h2 class="title">
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
											</h2>
											<div class="text-mobile">
												<p><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></p>
											</div>
											<a href="<?php the_permalink(); ?>" class="link-more" title="Continue lendo <?php the_title(); ?>">Continue lendo</a>
										</div>
									</div>
								</div>
						<?php
								$counter++;
							endwhile;
						endif;
						?>
					</div>
				</div>
			</div>

			<div class="itens-post">
				<?php
						if ($query->have_posts()) :
							while ($query->have_posts()) : $query->the_post();
						?>
							<div class="item">
								<div class="wrapper">
									<div class="image">
										<img src="./wp-content/themes/recrutamento-developer/src/images/no-thumb-post-small.jpg">
									</div>
									<div class="text">
										<h2>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
										</h2>
										<span class="icons-post icon-date">
											<i class="icon-calendar"></i><?php the_date(); ?>
										</span>
										<a href="<?php the_permalink(); ?>" class="icons-post icon-coment-count">
											<i class="icon-comment-alt"></i><?php get_comments_number(); ?>
										</a>
										<p><?php the_excerpt(); ?></p>
										<a class="link-more" href="<?php the_permalink(); ?>" title="novo teste de conteúdo">Continue lendo</a>
									</div>
								</div>
							</div>
				<?php
					endwhile;
						wp_reset_postdata();
							else :
								echo 'Nenhum post encontrado';
							endif;
				?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
