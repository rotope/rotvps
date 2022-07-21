<?php
//about theme info
add_action( 'admin_menu', 'it_company_lite_gettingstarted' );
function it_company_lite_gettingstarted() {    	
	add_theme_page( esc_html__('About IT Company Lite', 'it-company-lite'), esc_html__('About IT Company Lite', 'it-company-lite'), 'edit_theme_options', 'it_company_lite_guide', 'it_company_lite_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function it_company_lite_admin_theme_style() {
   wp_enqueue_style('it-company-lite-custom-admin-style', get_template_directory_uri() . '/inc/getstart/getstart.css');
   wp_enqueue_script('it-company-lite-tabs', get_template_directory_uri() . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'it_company_lite_admin_theme_style');

//guidline for about theme
function it_company_lite_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'it-company-lite' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to IT Company Lite Theme', 'it-company-lite' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','it-company-lite'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">			
			<h4><?php esc_html_e('Buy VW IT Company at 20% Discount','it-company-lite'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','it-company-lite'); ?> ( <span><?php esc_html_e('vwpro20','it-company-lite'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( IT_COMPANY_LITE_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'it-company-lite' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
			<button class="tablinks" onclick="it_company_lite_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'it-company-lite' ); ?></button>
			<button class="tablinks" onclick="it_company_lite_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'it-company-lite' ); ?></button>
			<button class="tablinks" onclick="it_company_lite_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'it-company-lite' ); ?></button> 
		  	<button class="tablinks" onclick="it_company_lite_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'it-company-lite' ); ?></button>
		  	<button class="tablinks" onclick="it_company_lite_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'it-company-lite' ); ?></button>
		</div>
		
		<!-- Tab content -->
		<?php
			$it_company_lite_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$it_company_lite_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = IT_Company_Lite_Plugin_Activation_Settings::get_instance();
				$it_company_lite_actions = $plugin_ins->recommended_actions;
				?>
				<div class="it-company-lite-recommended-plugins">
				    <div class="it-company-lite-action-list">
				        <?php if ($it_company_lite_actions): foreach ($it_company_lite_actions as $key => $it_company_lite_actionValue): ?>
				                <div class="it-company-lite-action" id="<?php echo esc_attr($it_company_lite_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($it_company_lite_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($it_company_lite_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($it_company_lite_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','it-company-lite'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($it_company_lite_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'it-company-lite' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('IT Company Lite is a modern, stylish, resourceful and versatile WordPress theme for IT companies, corporates, tech start-ups, digital marketing agencies, entrepreneurs, small scale businesses, technology utilizing companies and businesses, online businesses, business ventures, software companies, web designing companies and similar businesses. This sophisticated theme has advanced technology and powerful features in its armoury to craft a superior quality theme in just about no time. It is responsive to give optimal viewing experience on mobiles, tablets and desktops of varying sizes. It loads on all browsers and can be translated into many different languages. Customization is the tool that gives full control over the theme to decide the look of your website and make it personalized. Customization can be done through theme customizer where you can change background, colour scheme, menu style, header and footer layout and so many other elements as well. IT Company Lite theme is optimized for speed and gives a good search engine result. Its clean and secure coding matches with WordPress standards and hence results in a bug-free website. It works seamlessly with WooCommerce plugin so you can start selling online. ','it-company-lite'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'it-company-lite' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'it-company-lite' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( IT_COMPANY_LITE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'it-company-lite' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'it-company-lite'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'it-company-lite'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'it-company-lite'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'it-company-lite'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'it-company-lite'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( IT_COMPANY_LITE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'it-company-lite'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'it-company-lite'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'it-company-lite'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( IT_COMPANY_LITE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'it-company-lite'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'it-company-lite' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','it-company-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=it_company_lite_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','it-company-lite'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=it_company_lite_topbar') ); ?>" target="_blank"><?php esc_html_e('Topbar Settings','it-company-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=it_company_lite_about_section') ); ?>" target="_blank"><?php esc_html_e('About Us','it-company-lite'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','it-company-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','it-company-lite'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=it_company_lite_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','it-company-lite'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=it_company_lite_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','it-company-lite'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=it_company_lite_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','it-company-lite'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=it_company_lite_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','it-company-lite'); ?></a>
								</div>
							</div>
						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','it-company-lite'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','it-company-lite'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','it-company-lite'); ?></span><?php esc_html_e(' Go to ','it-company-lite'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','it-company-lite'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','it-company-lite'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','it-company-lite'); ?></span><?php esc_html_e(' Go to ','it-company-lite'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','it-company-lite'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','it-company-lite'); ?></p>
	                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','it-company-lite'); ?> <a class="doc-links" href="https://www.vwthemesdemo.com/docs/free-vw-it-company/" target="_blank"><?php esc_html_e('Documentation','it-company-lite'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = IT_Company_Lite_Plugin_Activation_Settings::get_instance();
				$it_company_lite_actions = $plugin_ins->recommended_actions;
				?>
				<div class="it-company-lite-recommended-plugins">
				    <div class="it-company-lite-action-list">
				        <?php if ($it_company_lite_actions): foreach ($it_company_lite_actions as $key => $it_company_lite_actionValue): ?>
				                <div class="it-company-lite-action" id="<?php echo esc_attr($it_company_lite_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($it_company_lite_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($it_company_lite_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($it_company_lite_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','it-company-lite'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($it_company_lite_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'it-company-lite' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','it-company-lite'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','it-company-lite'); ?></span></b></p>
	              	<div class="it-company-lite-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','it-company-lite'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />	
	            </div>

	            <div class="block-pattern-link-customizer">
	              	<div class="link-customizer-with-block-pattern">
							<h3><?php esc_html_e( 'Link to customizer', 'it-company-lite' ); ?></h3>
							<hr class="h3hr">
							<div class="first-row">
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','it-company-lite'); ?></a>
									</div>
									<div class="row-box2">
										<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=it_company_lite_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','it-company-lite'); ?></a>
									</div>
								</div>
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','it-company-lite'); ?></a>
									</div>
									
									<div class="row-box2">
										<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=it_company_lite_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','it-company-lite'); ?></a>
									</div>
								</div>

								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=it_company_lite_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','it-company-lite'); ?></a>
									</div>
									 <div class="row-box2">
										<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=it_company_lite_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','it-company-lite'); ?></a>
									</div> 
								</div>
								
								<div class="row-box">
									<div class="row-box1">
										<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=it_company_lite_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','it-company-lite'); ?></a>
									</div>
									 <div class="row-box2">
										<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','it-company-lite'); ?></a>
									</div> 
								</div>
							</div>
					</div>	
				</div>			
	        </div>
		</div>	

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = IT_Company_Lite_Plugin_Activation_Settings::get_instance();
			$it_company_lite_actions = $plugin_ins->recommended_actions;
			?>
				<div class="it-company-lite-recommended-plugins">
				    <div class="it-company-lite-action-list">
				        <?php if ($it_company_lite_actions): foreach ($it_company_lite_actions as $key => $it_company_lite_actionValue): ?>
				                <div class="it-company-lite-action" id="<?php echo esc_attr($it_company_lite_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($it_company_lite_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($it_company_lite_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($it_company_lite_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'it-company-lite' ); ?></h3>
				<hr class="h3hr">
				<div class="it-company-lite-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','it-company-lite'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
					<h3><?php esc_html_e( 'Link to customizer', 'it-company-lite' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','it-company-lite'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-networking"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=it_company_lite_social_icon_settings') ); ?>" target="_blank"><?php esc_html_e('Social Icons','it-company-lite'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','it-company-lite'); ?></a>
							</div>
							
							<div class="row-box2">
								<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=it_company_lite_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','it-company-lite'); ?></a>
							</div>
						</div>

						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=it_company_lite_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','it-company-lite'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=it_company_lite_woocommerce_section') ); ?>" target="_blank"><?php esc_html_e('WooCommerce Layout','it-company-lite'); ?></a>
							</div> 
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=it_company_lite_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','it-company-lite'); ?></a>
							</div>
							 <div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','it-company-lite'); ?></a>
							</div> 
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		
		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'it-company-lite' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('This clean, elegant, dynamic, resourceful and powerful IT Company WordPress theme is a great aid for IT companies, tech start-ups, corporate giants, digital marketing agencies, web designing firms and similar technologically driven businesses and companies. It has endless potential to give the best professional look to your website without taking much of your efforts. Although the theme is capable in itself but if you want you can extend its functionality by tying it with third party plugins which work smoothly with it. It looks clean and crisp, thanks to its retina ready feature. This IT Company WP theme is so easy to use that even a novice with no coding skills can craft a great website out of it. And when you have fully explained documentation by your side, then you do not need to worry about setting up the website.','it-company-lite'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( IT_COMPANY_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'it-company-lite'); ?></a>
					<a href="<?php echo esc_url( IT_COMPANY_LITE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'it-company-lite'); ?></a>
					<a href="<?php echo esc_url( IT_COMPANY_LITE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'it-company-lite'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'it-company-lite' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'it-company-lite'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'it-company-lite'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'it-company-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'it-company-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'it-company-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'it-company-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'it-company-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'it-company-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'it-company-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'it-company-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'it-company-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'it-company-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'it-company-lite'); ?></td>
								<td class="table-img"><?php esc_html_e('12', 'it-company-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'it-company-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'it-company-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'it-company-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'it-company-lite'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'it-company-lite'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'it-company-lite'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'it-company-lite'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( IT_COMPANY_LITE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'it-company-lite'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'it-company-lite'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'it-company-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( IT_COMPANY_LITE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'it-company-lite'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'it-company-lite'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'it-company-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( IT_COMPANY_LITE_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'it-company-lite'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'it-company-lite'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'it-company-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( IT_COMPANY_LITE_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'it-company-lite'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'it-company-lite'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'it-company-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( IT_COMPANY_LITE_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','it-company-lite'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'it-company-lite'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'it-company-lite'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( IT_COMPANY_LITE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'it-company-lite'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>