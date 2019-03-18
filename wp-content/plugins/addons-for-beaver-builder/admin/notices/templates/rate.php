<?php defined( 'ABSPATH' ) or exit; ?>

<div class="notice notice-info labb-notice-rate labb-no-image">

	<div class="labb-notice-rate-content">

		<p><?php _e( 'Hello!', 'livemesh-bb-addons' ); ?> <?php _e( 'I see that you have the plugin <strong>Addons for Beaver Builder by Livemesh</strong> installed for some time now.', 'livemesh-bb-addons' ); ?></p>
        <p><?php _e( 'If you like this plugin, please write a few words about it at wordpress.org or social media. Your opinion will help others discover our plugin.', 'livemesh-bb-addons' ); ?></p>
        <p><?php _e( 'Thank you!', 'livemesh-bb-addons' ); ?></p>

		<p class="labb-notice-rate-actions">
			<a href="<?php echo $this->get_dismiss_link(); ?>" class="button button-primary" onclick="window.open('https://wordpress.org/support/plugin/addons-for-beaver-builder/reviews/?rate=5&filter=5#new-post');"><?php _e( 'Rate plugin', 'livemesh-bb-addons' ); ?></a>
			<a href="<?php echo $this->get_dismiss_link( true ); ?>"><?php _e( 'Remind me later', 'livemesh-bb-addons' ); ?></a>
			<a href="<?php echo $this->get_dismiss_link(); ?>" class="labb-notice-rate-dismiss"><?php _e( 'Dismiss', 'livemesh-bb-addons' ); ?></a>
		</p>

	</div>

</div>

<style>
	.labb-notice-rate {
		position: relative;
		padding: 15px 20px;
	}
	.labb-notice-rate .avatar {
		position: absolute;
		left: 20px;
		top: 20px;
		border-radius: 50%;
	}
	.labb-notice-rate-content {
		margin: 0 80px;
	}
    .labb-no-image .labb-notice-rate-content {
        margin-left: 0;
        }
	p.labb-notice-rate-actions {
		margin-top: 15px;
	}
	p.labb-notice-rate-actions a {
		vertical-align: middle !important;
	}
	p.labb-notice-rate-actions a + a {
		margin-left: 20px;
	}
	.labb-notice-rate-dismiss {
		position: absolute;
		top: 15px;
		right: 10px;
		padding: 10px 15px 10px 21px;
		font-size: 13px;
		line-height: 1.23076923;
		text-decoration: none;
	}
	.labb-notice-rate-dismiss:before {
		position: absolute;
		top: 8px;
		left: 0;
		margin: 0;
		-webkit-transition: all .1s ease-in-out;
		transition: all .1s ease-in-out;
		background: 0 0;
		color: #b4b9be;
		content: "\f153";
		display: block;
		font: 400 16px / 20px dashicons;
		height: 20px;
		text-align: center;
		width: 20px;
	}
	.labb-notice-rate-dismiss:hover:before {
		color: #c00;
	}
</style>
