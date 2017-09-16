<section class="container front-con">
	<div class="row">
		<div class="col-md-7 email-wrap">
			<div class="broch container">
				<div class="row no-gutters">
					<div class="col-md-3">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/logo.png" class="img-fluid" alt="<?php bloginfo('name'); ?>" />
					</div>
					<div class="col-md-9">
						<h3>Subscribe to our mailing list for the latest news and upcoming events....</h3>
					</div>
				</div>
				<?php echo do_shortcode('[mc4wp_form id="11855"]'); ?>
			</div>
		</div>
		<div class="col-md-5">
			<div class="content-wrap" id="contentWrap">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</section>
<section>
	<div id="bubbleSection">
		<div class="divisions-container column force">
			<div class="division-set force">
				<svg aria-labelledby="title" role="img"><title id="title">MCEH projects</title>
					<line x1="50%" y1="50%" x2="90%" y2="40%" stroke="white" stroke-width="2" style="stroke-dasharray: none; stroke-dashoffset: 0px;"></line>
					<line x1="50%" y1="50%" x2="6%" y2="17%" stroke="white" stroke-width="2" style="stroke-dasharray: none; stroke-dashoffset: 0px;"></line>
					<line x1="50%" y1="50%" x2="20%" y2="90%" stroke="white" stroke-width="2" style="stroke-dasharray: none; stroke-dashoffset: 0px;"></line>
					<line x1="50%" y1="50%" x2="76%" y2="78%" stroke="white" stroke-width="2" style="stroke-dasharray: none; stroke-dashoffset: 0px;"></line>
					<line x1="50%" y1="50%" x2="80%" y2="11%" stroke="white" stroke-width="2" style="stroke-dasharray: none; stroke-dashoffset: 0px;"></line>
				</svg>
				<div class="jhu division bubble column shrink" style="top: 50%; left: 50%;" role="button">
					<div class="logo-wrap-jhu">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/logo.png" class="img-fluid" alt="<?php bloginfo('name'); ?>" />
					</div>
				</div>
				<a href="<?= esc_url(home_url('/')); ?>research-innovation/research-areas/">
					<button class="division bubble button column bubble-3 grow" style="top: 40%; left: 90%;">
						<span class="text" style="color: rgb(255, 255, 255);">Systems
						<span class="text-desc">Systems Modeling and Optimization develops models of the complex interactions of patients and caregivers, and produces solutions that transform data into information that provides evidence, reduces time and waste for patients and providers, and informs organizational strategies and policy-making.</span>
						</span>		
					</button>
				</a>
				<a href="<?= esc_url(home_url('/')); ?>research-innovation/research-areas/">
					<button class="division bubble button column bubble-4 grow" style="top: 90%; left: 20%;">
						<span class="text" style="color: rgb(255, 255, 255);">Tech/devices					
						<span class="text-desc">Medical procedures increasingly rely on a three-way partnership between physicians, information, and teaching to enable accurate and cost-effective diagnosis, treatment, and follow-up for patients. The goal of the Malone Center’s Technology and Devices thrust is to develop and deploy technology and systems to provide the critical interface between the “virtual reality” of information about patients and the “physical reality” of patients and caregivers.</span>
						</span>
					</button>
				</a>
				<a href="<?= esc_url(home_url('/')); ?>research-innovation/research-areas/">
					<button class="division bubble button column bubble-6 grow" style="top: 17%; left: 6%;">
						<span class="text" style="color: rgb(255, 255, 255);">Data analytics
						<span class="text-desc">Data Analytics will develop and deploy measurement technologies, new methods to structure and mine data, and pioneer new tools for analytics and machine learning to advance decision support, prediction, and process modeling for healthcare.</span>
						</span>
					</button>
				</a>
				<a href="<?= esc_url(home_url('/')); ?>research-innovation/submit-a-research-idea/">
					<button class="division bubble button column bubble-9 grow" style="top: 78%; left: 76%;">
						<span class="text" style="color: rgb(255, 255, 255);">Submit a Research Idea</span>
					</button>
				</a>
				<a href="<?= esc_url(home_url('/')); ?>research-innovation/research-areas/">
					<button class="division bubble button column bubble-10 grow" style="top: 11%; left: 80%;">
						<span class="text" style="color: rgb(255, 255, 255);">user-centered design
						<span class="text-desc">The User-Centered Design thrust applies cutting edge design and evaluation methodologies to create tools that address the needs of end-user while accounting for the unique aspects of the problem space.</span>
						</span>
					</button>
				</a>
			</div>
		</div>
	</div>
</section>
<section class="feeds container">
<ul class="nav tab-navs row no-gutters" id="myTab" role="tablist">
  <li class="nav-item col-md-4">
	<a class="nav-link page-scroll" href="#research" role="tab" data-key="research">
		<img src="<?php bloginfo('template_url'); ?>/assets/images/research.jpg" class="img-fluid" alt="Research" />
		<span>Research</span>
	</a>
  </li>
  <li class="nav-item col-md-4">
	<a class="nav-link active-box" href="#news" role="tab" data-key="news">
		<img src="<?php bloginfo('template_url'); ?>/assets/images/news.jpg" class="img-fluid" alt="News" />
		<span>News &amp; Events</span>
	</a>
  </li>
  <li class="nav-item col-md-4">
	<a class="nav-link" href="#announc" role="tab" data-key="announc">
		<img src="<?php bloginfo('template_url'); ?>/assets/images/announcement.jpg" class="img-fluid" alt="Announcements" />
		<span>Announcements</span>
	</a>
  </li>
</ul>
<div class="tab-content">
  <div class="tab-pane" id="research" role="tabpanel">
   	<?php $catquery = new WP_Query( 'cat=3&posts_per_page=3' ); ?>
		<div class="container">
			<div class="row">
				<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
					<div class="col-md-4">
					<div class="thumb">
				        <?php if ( get_the_post_thumbnail($_post->ID) != '' ) { ?>
					        <a href="<?php the_permalink() ?>">
								<?php echo get_the_post_thumbnail( $_post->ID, 'full', array( 'class' => 'img-fluid' )); ?>
							</a>
						 <?php } else { ?>
				        	<a href="<?php the_permalink(); ?>"> <?php echo '<img src="' . catch_that_image() . '" class="img-fluid" />' ?> </a>
				        <?php } ?>
				    </div>
					<h3><a href="<?php the_permalink() ?>" rel="bookmark"><span><?php the_title(); ?></span></a></h3>
					<p><?php the_author(); ?> | <em><?php echo get_post_meta(get_the_ID(), 'Publication', true); ?></em></p>
					</div>
				<?php endwhile; ?>
			</div> 
		</div>
	<?php wp_reset_postdata(); ?>	
  </div>
  <div class="tab-pane" style="display: block;" id="news" role="tabpanel">
  	<?php $catquery = new WP_Query( 'cat=4&posts_per_page=3' ); ?>
		<div class="container">
			<div class="row">
				<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
					<div class="col-md-4">
					<div class="thumb">
				        <?php if ( get_the_post_thumbnail($_post->ID) != '' ) { ?>
					        <a href="<?php the_permalink() ?>">
								<?php echo get_the_post_thumbnail( $_post->ID, 'full', array( 'class' => 'img-fluid' )); ?>
							</a>
						 <?php } else { ?>
				        	<a href="<?php the_permalink(); ?>"> <?php echo '<img src="' . catch_that_image() . '" class="img-fluid" />' ?> </a>
				        <?php } ?>
				    </div>
					<h3><a href="<?php the_permalink() ?>" rel="bookmark"><span><?php the_title(); ?></span></a></h3>
					<p><?php the_author(); ?> | <em><?php echo get_post_meta(get_the_ID(), 'Publication', true); ?></em></p>
					</div>
				<?php endwhile; ?>
			</div> 
		</div>
	<?php wp_reset_postdata(); ?>
  </div>
  <div class="tab-pane" id="announc" role="tabpanel">
  	<?php $catquery = new WP_Query( 'cat=5&posts_per_page=3' ); ?>
		<div class="container">
			<div class="row">
				<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
					<div class="col-md-4">
					<div class="thumb">
				        <?php if ( get_the_post_thumbnail($_post->ID) != '' ) { ?>
					        <a href="<?php the_permalink() ?>">
								<?php echo get_the_post_thumbnail( $_post->ID, 'full', array( 'class' => 'img-fluid' )); ?>
							</a>
						 <?php } else { ?>
				        	<a href="<?php the_permalink(); ?>"> <?php echo '<img src="' . catch_that_image() . '" class="img-fluid" />' ?> </a>
				        <?php } ?>
				    </div>
					<h3><a href="<?php the_permalink() ?>" rel="bookmark"><span><?php the_title(); ?></span></a></h3>
					<p><?php the_author(); ?> | <em><?php echo get_post_meta(get_the_ID(), 'Publication', true); ?></em></p>
					</div>
				<?php endwhile; ?>
			</div> 
		</div>
	<?php wp_reset_postdata(); ?>  	
  </div>
</div>
</section>
