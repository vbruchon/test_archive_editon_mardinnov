<?php

/**
 * Template Name: Page des catégories
 **/
?>

<title>Les Éditions</title>
<link rel="stylesheet" href="style.css">


	<?php get_header(); ?>
	<h1>Les Éditions</h1>

	<?php
	/*
 * @my_posts => Get the articles with the category "les-editions".
 */
	$cat_name = "les-editions";
	$tag = "edition-du-15-mars-2022";

	$size_img_couverture = [462, 480];
	$size_img_start_up = [120, 110];
	$my_posts = new WP_Query(array('post_type' => 'post', 'posts_per_page' => '150', 'category_name' => $cat_name));
	$my_posts_tag = new WP_Query(array('post_type' => 'post', 'posts_per_page' => '150', 'tag' => $tag));
	?>
	<div id="carte_Section">

		<?php
		if ($my_posts->have_posts()) :
			// Loops for print article one by one
			while ($my_posts->have_posts()) : $my_posts->the_post(); ?>
				<div class="carte">
					<?php global $post;
					$post_slug = $post->post_name;
					echo $post_slug;
					?>

					<div class="img_couverture">
						<?php the_post_thumbnail($size_img_couverture); ?>
					</div>

					<div class="title_carte">
						<?php the_title(); ?>
					</div>

					<?php if ($my_posts_tag->have_posts()) : ?>
						<?php if($post_slug === $tag) : ?>

						<div class="start-up_section">
							<?php while ($my_posts_tag->have_posts()) : $my_posts_tag->the_post(); ?>
								<!-- SI slug de l'edition est = au slug du tag afficher ca -->
								<div class="img_start-up">
									<?php the_post_thumbnail($size_img_start_up); ?>
								</div>

								<!-- SINON Rien afficher  -->
							<?php endwhile; ?>
						</div>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>

		<?php else : ?>
			<p>Aucun article n'a été trouvé.</p>
		<?php endif; ?>
	</div>
	<?php get_footer(); ?>