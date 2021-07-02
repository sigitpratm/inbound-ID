<?php
$arguments  = [
		// card-default
		'class'     => 'card-default',
		'position' => 'top',
		'author_image' => 'top',
		'author_name' => 'Jhon Doe',
		'post_date' => date("d M, Y"),
		'thumbnail' => 'https://getuikit.com/docs/images/light.jpg',
		'title'     => 'Default Title',
		'excerpt'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.',
		'url'   => '#',
];

/** @var $args */
$args = wp_parse_args( $args, $arguments  );

?>
<?php if (esc_html( $args['position'] ) === 'left'):?>
	<article class="uk-card uk-grid-collapse uk-child-width-1-2@s uk-margin <?php echo esc_html( $args['class'] ); ?> card-default-<?php echo esc_html( $args['position'] ); ?>" uk-grid>
		<div class="uk-card-media-left uk-cover-container">
			<a href="<?php echo esc_html( $args['url'] ); ?>" class="uk-card-image">
				<img uk-img data-src="<?php echo esc_html( $args['thumbnail'] ); ?>" alt=""/>
			</a>
		</div>
		<div>
			<div class="uk-card-body">
				<h3 class="uk-card-title"><a href="<?php echo esc_html( $args['url'] ); ?>" title="<?php echo esc_html( $args['title'] ); ?>"><?php echo esc_html( $args['title'] ); ?></a> </h3>
				<p><?php echo esc_html( $args['excerpt'] ); ?></p>
			</div>
			<div class="uk-card-footer">
				<div class="uk-card-footer__meta uk-flex">
					<a href="" class="card-meta__avatar">
						<img data-src="https://lh3.googleusercontent.com/proxy/Ndllf2M9ooCWhC2DzuV8GtsZYFuvxG4LxVbm-f8hPfHGG981Rwnc-W5PL2_Q0PPsTvZgdTpLW052P6VKegzX3nLvVQJESKu9Um662N_ETWsHPMKoKb_GvzOpTg" uk-img/>
					</a>
					<div class="card-meta__content">
						<a href="#" class="card-meta__content-author"><?php echo esc_html( $args['author_name'] ); ?></a>
						<span class="card-meta__content-posted"><?php echo esc_html( $args['post_date'] ); ?></span>
					</div>
				</div>
			</div>
		</div>

	</article>
<?php else:?>
	<article id="post-<?= get_the_ID() ?>" class="uk-card <?php echo esc_html( $args['class'] ); ?>">
		<div class="uk-card-media-top">
			<a href="<?php echo esc_html( $args['url'] ); ?>" class="uk-card-image">
				<img uk-img data-src="<?php echo esc_html( $args['thumbnail'] ); ?>" alt=""/>
			</a>
		</div>
		<div class="uk-card-body">
			<h3 class="uk-card-title"><a href="<?php echo esc_html( $args['url'] ); ?>" title="<?php echo esc_html( $args['title'] ); ?>"><?php echo esc_html( $args['title'] ); ?></a> </h3>
		</div>
		<div class="uk-card-footer">
			<div class="uk-card-footer__meta uk-flex">
				<a href="" class="card-meta__avatar">
					<img data-src="https://lh3.googleusercontent.com/proxy/Ndllf2M9ooCWhC2DzuV8GtsZYFuvxG4LxVbm-f8hPfHGG981Rwnc-W5PL2_Q0PPsTvZgdTpLW052P6VKegzX3nLvVQJESKu9Um662N_ETWsHPMKoKb_GvzOpTg" uk-img/>
				</a>
				<div class="card-meta__content">
					<a href="#" class="card-meta__content-author"><?php echo esc_html( $args['author_name'] ); ?></a>
					<span class="card-meta__content-posted"><?php echo esc_html( $args['post_date'] ); ?></span>
				</div>
			</div>
		</div>
	</article>
<?php endif;?>




