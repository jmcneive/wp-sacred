			<footer class="footer" role="contentinfo">
				<?php if ( is_active_sidebar( 'sidebar4' ) ) : ?>
					<div class="footer-widgets wrap">

						<?php dynamic_sidebar( 'sidebar4' ); ?>
		
					<div class="clear"></div>
					</div>
				<?php endif; ?>
				<div id="inner-footer" class="wrap cf">

					<div class="social-icons footer-social">
		           			<?php 
					           	if(function_exists('BIGPIX_social_icons')) :
					           		echo BIGPIX_social_icons(); 
					           	endif;
					        ?>
                	</div> <!-- social-icons-->

					<p class="source-org copyright">
						 &#169; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> 
						<span><?php if(is_home()): ?>
							- <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'BIGPIX' ) ); ?>"><?php printf( __( 'Powered by %s', 'BIGPIX' ), 'WordPress' ); ?></a> and <a href="<?php echo esc_url( __( 'http://wpdevshed.com', 'BIGPIX' ) ); ?>"><?php printf( __( '%s', 'BIGPIX' ), 'WP Dev Shed' ); ?></a>
						<?php endif; ?>
						</span>
					</p>

				</div>

			</footer>

		</div>

		<?php wp_footer(); ?>
	</body>

</html> <!-- end of site. what a ride! -->