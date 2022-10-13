	<?php
/**
 * Template Name: Page des catégories
 **/

$cat_name = "les-editions";
$tag = "edition-du-15-mars-2022";

$size_img_couverture = [462, 480];
$size_img_start_up = [120, 110];

$articles_categorie = get_posts(array('post_type' => 'post', 'posts_per_page' => '150', 'category_name' => $cat_name));
$articles_etiquette = get_posts(array('post_type' => 'post', 'posts_per_page' => '150', 'tag' => $tag));
var_dump($articles_categorie);

get_header();


?>
<div id="carte_Section">

	<?php foreach ($articles_categorie as $article_categorie) {?>
		<div class="carte">

			<div class="img_couverture">
				<?php $article_categorie?>
			</div>

			<div class="title_carte">
				<?php the_post_thumbnail($size_img_couverture)?>
			</div>
			
			<?php if (0 < count($articles_etiquette)) {?>
				<div class="start-up_section">

					<?php foreach ($articles_etiquette as $article_etiquette) {?>
					
						<!-- SI slug de l'edition est = au slug du tag afficher ca -->
						
						<?php if ($article_etiquette->post_name === $article_categorie->post_name) {?>
							
							<div class="img_start-up">
								<?php // ?>
							</div>

						<?php }?>
						
					<?php }?>
					
				</div>
			<?php }?>
		</div>
	<?php }?>

</div>
<?php

get_footer();