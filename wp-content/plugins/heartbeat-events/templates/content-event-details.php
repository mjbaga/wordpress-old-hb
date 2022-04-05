<main id="main" class="main">
	<?php if($event->banner): ?>
	    <div class="landing-banner thin">
	        <div>
	            <div class="landing-banner__item">
	                <img src="<?php print $event->banner['url']; ?>" class="background__img" alt="banner">
	            </div>
	        </div>
	    </div>
	<?php endif; ?>
	<?php 
		if( !empty($event->breadcrumbs) ) {
			print $event->breadcrumbs; 
		}
	?>
	<div class="article-share">
	    <div class="article-share-icons">
	        <span class="title">Share</span>
	        <a href="#" class="addthis_button_facebook">
	            <i class="icon icon-facebook"></i>
	            <span class="vh">Facebook</span>
	        </a>
	        <a href="#" class="addthis_button_twitter">
	            <i class="icon icon-twitter"></i>
	            <span class="vh">Twitter</span>
	        </a>
	        <a href="#" class="addthis_button_whatsapp">
	            <i class="icon icon-whatsapp"></i>
	            <span class="vh">Whatsapp</span>
	        </a>
	            <a href="#" class="addthis_button_email">
	            <i class="icon icon-envelope"></i><span class="vh">Email</span>
	        </a>
	    </div>
	</div>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-593773e786a11709"></script>
	<section>
		<div class="container">
		  	<article itemscope itemtype="http://schema.org/Event" class="article">
		    	<h1 itemprop="name" class="article__title"><?php print $event->title ?></h1>
			    <div class="article__info">
			    	<span class="date">
			    		<i class="icon icon-clock"></i>
			    		<span itemprop="startDate" content="<?php print $event->meta_start_date; ?>" class="start">
			    			<span class="title">Start:</span>
			    			<span class="content"><?php print $event->start_date; ?></span>
			    		</span>
			    		<span itemprop="endDate" content="<?php print $event->meta_end_date; ?>" class="start">
			    			<span class="title">End:</span>
			    			<span class="content"><?php print $event->end_date; ?></span>
			    		</span>
			    	</span>
			    	<?php if($event->venue): ?>
				    	<span itemprop="location" itemscope itemtype="http://schema.org/Place" class="venue">
				    		<i class="icon icon-location"></i>
				    		<span class="title">Venue:</span><span itemprop="name" class="content"><?php print $event->venue ?></span>
				    	</span>
			    	<?php endif; ?>
			    </div>
		    	<div itemprop="description" class="article__body rte">
		    		<img src="<?php print $event->image_url ?>" alt="<?php print $event->image_alt ?>">
		      		<?php print $event->content; ?>
		      		<?php if($event->sign_up_link): ?>
			      		<a href="<?php print $event->sign_up_link ?>" class="signup-btn btn btn--arrow btn--border-red" target="_blank">
		            		<i class="icon icon-edit"></i>Sign Up
		            	</a>
	            	<?php endif; ?>
	            	<?php if($event->ical_link): ?>
			      		<a href="<?php print $event->ical_link ?>" class="ical-btn btn">
			      			Download iCal Card
			      			<i class="icon icon-chevron-right"></i>
			      		</a>
			      	<?php endif; ?>
		    	</div>
		  	</article>
		</div>
	</section>
	<?php 
	    if( !empty( $event->upcoming_events ) ) {
	        print $event->upcoming_events;
	    }
	?>
	<?php 
	    if( !empty( $event->recent_news ) ) {
	        print $event->recent_news;
	    }
	?>
</main>