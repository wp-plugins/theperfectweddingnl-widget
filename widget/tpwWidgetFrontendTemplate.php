<div class="widget_tpw_rating_wrap" itemscope itemtype="http://schema.org/LocalBusiness">
	<?php echo $widgetCode; ?>
    <?php if ($ratingsCount > 0) { ?>
        <p style="margin:0;padding:0;text-align:center;">
            <small>
                <span itemprop="name"><?php echo $companyName; ?></span>
                <span itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                    <meta itemprop="sameAs" content="<?php echo $profileUrl; ?>" />
                    <meta itemprop="worstRating" content="1">
                    <meta itemprop="bestRating" content="10">
                    <span itemprop="ratingValue"><?php echo $averageRating; ?></span>
                    <?php _e( 'out of', 'tpwratingwidget' ); ?>
                    <span itemprop="ratingCount"><?php echo $ratingsCount; ?></span>
                    <?php _e( 'reviews', 'tpwratingwidget' ); ?>
                </span>
            </small>
        </p>
    <?php } ?>
</div>