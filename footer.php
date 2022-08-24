<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php get_sidebar( 'main' ); ?>
			
			<div id="footer_info_container">
				<div id="footer_info">
					<p class="footer_date"><a href="/privacy-policy">Privacy policy</a> &nbsp; | &nbsp; <a href="/terms-and-conditions">Terms and conditions</a> &nbsp; | &nbsp; <a href="/site-map">Site map</a> &nbsp; | &nbsp; One Care (BNSSG) C.I.C. © <script>document.write(new Date().getFullYear())</script>.
</p>

										<div class="search_mobile"><?php get_search_form(); ?></div>

				</div>

				<div id="header_social" class="footer_social_override">
						
							<div class="footer_icon social_icons">
   								<a href="/contact"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2014/10/footer_phone_icon.png" alt="telephone icon" class="social_icon_image" width="24">
    								</a>
							</div>

							<div class="footer_icon social_icons">
   								<a href="mailto:enquiries@onecare.org.uk"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2014/10/footer_email_icon.png" alt="email icon" class="social_icon_image" width="24">
    								</a>
							</div>


							<div class="footer_icon social_icons">
   								<a href="https://www.linkedin.com/company/one-care-bnssg" target="_blank"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2021/12/footer_linked_icon.png" alt="linkedin icon" class="social_icon_image" width="25">
                   </a>
							</div>

							<div class="footer_icon social_icons">
   								<a href="https://twitter.com/onecaretweets" target="_blank"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2014/10/footer_twitter_icon.png" alt="twitter icon" class="social_icon_image" width="24">
    								</a>
							</div>
						</div>
						

			</div>
			
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>

<script>
$(document).ready(function(){
  
  $("#small").click(function(event){
    event.preventDefault();
    $("h1").animate({"font-size":"36px"});
    $("h2").animate({"font-size":"28px"});
    $("h3").animate({"font-size":"22px"});
    $("h4").animate({"font-size":"20px"});
    $("p").animate({"font-size":"16px", "line-height":"24px"});
    $("li").animate({"font-size":"16px", "line-height":"24px"});
    $(".nav-menu li a").animate({"font-size":"16px", "line-height":"24px"});
    $(".accessibility_tab").animate({"font-size":"16px", "line-height":"24px"});
    $("#homepage_content_block_1").animate({"height":"445px"});
    $(".overview_news_content_block").animate({"height":"90px"});

  });
  
  $("#medium").click(function(event){
    event.preventDefault();
    $("h1").animate({"font-size":"40px"});
    $("h2").animate({"font-size":"32px"});
    $("h3").animate({"font-size":"24px"});
    $("h4").animate({"font-size":"22px"});
    $("p").animate({"font-size":"18px", "line-height":"26px"});
    $("li").animate({"font-size":"18px", "line-height":"26px"});
    $(".nav-menu li a").animate({"font-size":"18px", "line-height":"26px"});
    $(".accessibility_tab").animate({"font-size":"18px", "line-height":"26px"});
    $("#homepage_content_block_1").animate({"height":"470px"});
    $(".overview_news_content_block").animate({"height":"125px"});
    $(".rsGCaption h5").animate({"top":"30px"});
    $(".visibleNearbyZoom .rsGCaption span").animate({"top":"30px"});
    $(".read_more_slider").animate({"top":"30px"});
    
  });
  
  $("#large").click(function(event){
    event.preventDefault();
    $("h1").animate({"font-size":"48px"});
    $("h2").animate({"font-size":"36px"});
    $("h3").animate({"font-size":"28px"});
    $("h4").animate({"font-size":"24px"});
    $("p").animate({"font-size":"20px", "line-height":"28px"});
    $("li").animate({"font-size":"20px", "line-height":"28px"});
    $(".nav-menu li a").animate({"font-size":"20px", "line-height":"28px"});
    $(".accessibility_tab").animate({"font-size":"20px", "line-height":"28px"});
    $("#homepage_content_block_1").animate({"height":"605px"});
    $(".overview_news_content_block").animate({"height":"140px"});
    $(".rsGCaption h5").animate({"top":"42px"});
    $(".visibleNearbyZoom .rsGCaption span").animate({"top":"42px"});
    $(".read_more_slider").animate({"top":"42px"});

  });
  
  $( "a" ).click(function() {
   $("a").removeClass("selected");
  $(this).addClass("selected");
  
 });

});
</script>
<script>
$(document).ready(function(){
    $("button.search_button").click(function(){
        $("body").toggleClass("mobile_search");
    });
    $(".contraceptive_width_right").click(function(){
        $(this).toggleClass("expand_pl");
    });
    $("button.sub_menu_button").click(function(){
        $("body").toggleClass("sub_menu");
    });
    $("span.view_all_doctors").click(function(){
        $(".contraceptive_width_right").toggleClass("expand_pl");
    });
});
</script>
</body>
</html>