<?php
// Tabbed content for ofeerings CPT
?>
		<!-- BEGIN of post content -->
		<section class="section-top">
			<div class="wrapper">
				<div class="content_buttons">
					<button class="copy" aria-label="Link copied"><i class="fas fa-link"></i><span class="copied">Copied</span></button>
					<button class="cloud" onclick="window.print()"><i class="fas fa-print"></i></button>
				</div>
			</div>
		</section>
		<!-- END of post content -->

        <?php
        	// Section Content
        	if('' !== get_post()->post_content){
				?>
				<section class="new-tabsaccordions tab-top" style="padding-bottom: 50px;">
					<div class="wrapper">
						<div class="top-content">
							<div class="row">
								<div class="medium-12 columns">
									<?php echo do_shortcode(get_the_content()); ?>
								</div>
							</div>
						</div>
					</div>
				</section>
				<?php
			}

			$tabs_group = get_field('tabs_content') ? get_field('tabs_content') : '';
			if($tabs_group){
				if( have_rows('tabs_content') ): while ( have_rows('tabs_content') ) : the_row();
					$number_tabs = 0;
					if( have_rows('tabs') ): while ( have_rows('tabs') ) : the_row();
						$number_tabs++;
					endwhile; endif;
					?>

					<?php if ($number_tabs != 0): ?>
					<section class="new-tabsaccordions">
						<div class="wrapper">

							<div class="row">
								<div class="medium-12 columns">
									<div class="container-tbs-s <?php echo $num_tabs = ($number_tabs == 1) ? 'one-tab' : 'tabs' ?>">
										<?php if ($number_tabs > 1): ?>
											<div class="tabs_info_offerring">
												<div class="row-hss">
												<button class="btn_responsive_tabs" >
							                        <i class="fa fa-bars"></i>
							                    </button>
												<ul class="tabs_offerings">
												<?php
												$counter = 0;
												$counter_tabscontent = 0;
											    if( have_rows('tabs') ): while ( have_rows('tabs') ) : the_row();
											    	$counter++;
											    	?>
											    	<li onclick="opentTab(event, 'tab-<?php echo $counter; ?>')" class="tablinks tab-<?php echo $counter; ?> <?php if($counter == 1) echo 'active'; ?>">
						                            	<i class="<?php echo get_sub_field('tab_menu_icon'); ?>" style="margin-right:10px;"></i>
											    		<span><?php echo get_sub_field('main_title'); ?></span>
											    	</li>
											    	<?php
											    endwhile; endif;
											    ?>
											    </ul>
						                        <ul class="tabs_offerings-mobile" style="display:none;">
												<?php
												$counter = 0;
												$counter_tabscontent = 0;
											    if( have_rows('tabs') ): while ( have_rows('tabs') ) : the_row();
											    	$counter++;
											    	?>
											    	<li onclick="opentTab(event, 'tab-<?php echo $counter; ?>')" class="tablinks tab-<?php echo $counter; ?> <?php if($counter == 1) echo 'active'; ?>">
														<span><?php echo get_sub_field('main_title'); ?></span>
											    	</li>
											    	<?php
											    endwhile; endif;
											    ?>
												</ul>
												<!-- /.tabs_offerings-mobile not used -->
											    </div>
										    </div>
										<?php endif ?>
									</div>
								    <?php
								    if( have_rows('tabs') ): while ( have_rows('tabs') ) : the_row();
								    	$counter_tabscontent++;
								    	?>
								    	<div class="tabcontent" id="tab-<?php echo $counter_tabscontent; ?>" style="<?php if($counter_tabscontent == 1) echo 'display:block;'; ?>">

											<?php 
											$title_tab = get_sub_field('main_title') ? get_sub_field('main_title') : '';
								    		if ($title_tab != ''): ?>
								    			<h2><?php echo $title_tab; ?></h2>
								    		<?php endif ?>
								    		<?php
							                $count = count(get_sub_field('tab_content'));   
							                $expand_value = ($count == 1) ? 'false' : 'true' ;
							                ?>
								    		<?php
								    		if( have_rows('tab_content') ):
								    			?>
								    			<div class="sup-accordion resources">
													<div class="row column">
														<div class="sup-accordion-head">
															<button class="sup-accordion-button collapse" data-expand="<?php echo $expand_value ?>"><?php _e( ($count == 1)? 'Collapse all' : 'Expand all') ?></button>
														</div>

														<ul class="accordion sup-accordion__body " data-accordion data-multi-expand="true" data-allow-all-closed="true">
										    			<?php
										    			$i = 0;
										    			while ( have_rows('tab_content') ) : the_row();
										    				$i++;
										    				?>
										    				<li class="accordion-item <?php echo $count==1 ? 'is-active' : '';?>
																			<?php echo $i%2 ? 'is-even' : '';?> " data-accordion-item>
																<a href="#" class="accordion-title"><?php echo $title_item = (get_sub_field('accordion_title') == "") ? '&nbsp;' : get_sub_field('accordion_title'); ?></a>
																<div class="accordion-content" data-tab-content <?php echo $count==1 ? 'accordion-content--active' : '';?>>
																	<?php echo get_sub_field('accordion_content'); ?>
																</div>
															</li>
										    				<?php
										    			endwhile;
										    			?>
										    			</ul>
										    		</div>
										    	</div>
										    <?php
								    		endif;
								    		?>
								    	</div>
								    	<script type="text/javascript">
								    		function opentTab(evt, cityName) {
								              var i, tabcontent, tablinks;
								              tabcontent = document.getElementsByClassName("tabcontent");
								              for (i = 0; i < tabcontent.length; i++) {
								                tabcontent[i].style.display = "none";
								              }
								              tablinks = document.getElementsByClassName("tablinks");
								              for (i = 0; i < tablinks.length; i++) {
								                tablinks[i].className = tablinks[i].className.replace(" active", "");
								              }
								              document.getElementById(cityName).style.display = "block";
								              evt.currentTarget.className += " active";
								            }
								            jQuery(document).ready(function(){
								            	jQuery('.sup-accordion-head .expand').on('click', function(e){
								            		e.preventDefault();
								            		jQuery(this).parent().parent().find('.sup-accordion__body .accordion-item').addClass('is-active');
								            		jQuery(this).parent().parent().find('.sup-accordion__body .accordion-item .accordion-content').show(300);
								            	});
								            	jQuery('.sup-accordion-head .collapse').on('click', function(e){
								            		e.preventDefault();
								            		jQuery(this).parent().parent().find('.sup-accordion__body .accordion-item').removeClass('is-active');
								            		jQuery(this).parent().parent().find('.sup-accordion__body .accordion-item .accordion-content').hide(300);
								            	});
								            });
								    	</script>
								    	<?php
								    endwhile; endif;
								    ?>
								</div>
							</div>
						</div> <!-- /. wrapper -->
					</section>
					<?php endif ?>
					<script type="text/javascript">
                    jQuery(document).ready(function(){
							var hash2 = location.hash.substr(1);
							console.log(hash2);
							if (hash2 == 'tab-1') {
	                        	jQuery('ul.tabs_offerings li:nth-child(1)')[0].click();
	                        }
	                        if (hash2 == 'tab-2') {
	                        	jQuery('ul.tabs_offerings li:nth-child(2)')[0].click();
	                        }
	                        if (hash2 == 'tab-3') {
	                        	jQuery('ul.tabs_offerings li:nth-child(3)')[0].click();
	                        }
	                        if (hash2 == 'tab-4') {
	                        	jQuery('ul.tabs_offerings li:nth-child(4)')[0].click();
	                        }
						});
						jQuery('#ubermenu-main-2-header-menu .tab-navigation-top a span').on('click', function(e){
	                        var link_c = jQuery(this).parent();
	                        var href = jQuery(this).parent().attr('href');
	                        var hash = href.substr(href.indexOf("#"));
	                        //console.log(hash);
	                        if (hash == '#tab-1') {
	                        	jQuery('ul.tabs_offerings li:nth-child(1)')[0].click();
	                        }
	                        if (hash == '#tab-2') {
	                        	jQuery('ul.tabs_offerings li:nth-child(2)')[0].click();
	                        }
	                        if (hash == '#tab-3') {
	                        	jQuery('ul.tabs_offerings li:nth-child(3)')[0].click();
	                        }
	                        if (hash == '#tab-4') {
	                        	jQuery('ul.tabs_offerings li:nth-child(4)')[0].click();
	                        }
	                    });
                    	jQuery(".tabs_offerings-mobile").on('click', '.tablinks',function(e){
		                	e.preventDefault();
		                    jQuery(".tabs_offerings-mobile").slideToggle();
		                });
		                jQuery(".tabs_info_offerring").on('click', 'button.btn_responsive_tabs.actived', function(e){
		            		e.preventDefault();
		                    jQuery(".tabs_offerings-mobile").slideToggle();
		                });

		                var $text_origin = jQuery('.tab-1').html();
						var $text_second = 'Outsourcing';
						var isContains = jQuery('.tab-1').html().indexOf($text_second) > -1;

						if (jQuery(window).width() < 768) {
							if (isContains) {
								jQuery('.tab-1 span').html($text_second);
							}
							jQuery(".btn_responsive_tabs").addClass('actived');
							jQuery('.tabs_offerings').addClass('actived');
							/*jQuery(".tabs_info_offerring").on('click', 'button.btn_responsive_tabs.actived', function(e){
			            		e.preventDefault();
			                    jQuery(".tabs_offerings").slideToggle();
			                });
			                jQuery(".tabs_offerings.actived").on('click', '.tablinks',function(e){
			                	e.preventDefault();
			                    jQuery(".tabs_offerings").slideToggle();
			                });*/
						}else{
							if (isContains) {
								jQuery('.tab-1').html($text_origin);
							}
							jQuery(".btn_responsive_tabs").removeClass('actived');
							jQuery(".tabs_offerings").removeClass('actived');
						}

						jQuery(window).on('resize',function(){
							if (jQuery(window).width() < 768) {
								if (isContains) {
									jQuery('.tab-1 span').html($text_second);
								}
								jQuery(".btn_responsive_tabs").addClass('actived');
								jQuery(".tabs_offerings").addClass('actived');
							}else{
								if (isContains) {
									jQuery('.tab-1').html($text_origin);
								}
								jQuery(".btn_responsive_tabs").removeClass('actived');
								jQuery(".tabs_offerings").removeClass('actived');
							}
						});
                        
						var $nav = jQuery('.tabs_info_offerring');
		                var $navTop = $nav.offset().top;
		                // var pasteTop = function(){
		                // 	if (jQuery(window).width() < 1025 && jQuery(window).width() > 767) {
			               //      var $scrollTop = jQuery(window).scrollTop();
			               //      if($scrollTop >= $navTop){
			               //          $nav.addClass('sticky-sub-m');
			               //      }else{
			               //          $nav.removeClass('sticky-sub-m');
			               //      }
		                // 	}else{
                  //           	if(jQuery(window).width() < 768){
                  //               	if(jQuery(window).width() < 641){
                  //                   	var $scrollTop = jQuery(window).scrollTop()+10;
                  //                       if($scrollTop >= $navTop){
                  //                           $nav.addClass('sticky-sub-m');
                  //                       }else{
                  //                           $nav.removeClass('sticky-sub-m');
                  //                       }
                  //                   }else{
                  //                   	var $scrollTop = jQuery(window).scrollTop();
                  //                       if($scrollTop >= $navTop){
                  //                           $nav.addClass('sticky-sub-m');
                  //                       }else{
                  //                           $nav.removeClass('sticky-sub-m');
                  //                       }
                  //                   }
                  //               }else{
                  //                   var $scrollTop = jQuery(window).scrollTop()+145;
                  //                   if($scrollTop >= $navTop){
                  //                       $nav.addClass('sticky-sub-m');
                  //                   }else{
                  //                       $nav.removeClass('sticky-sub-m');
                  //                   }
                  //               }
		                // 	}
		                // }
		                // jQuery(window).on('scroll',pasteTop);
					</script>
				    <?php
				endwhile; 
				endif;
			}
			?>