<?php
/**
 * Register custom customizer controls/fields.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0-or-later
 * @link    https://www.studiopress.com/
 */

if ( class_exists( 'WP_Customize_Control' ) ) :

	// Separator Control.
	if ( ! class_exists( 'Genesis_Sample_Reset_Control' ) ) :
		/**
		 * Reset Custom Control
		 */
		class Genesis_Sample_Reset_Control extends WP_Customize_Control {

			/**
			 * Render the control in the customizer
			 */
			public function render_content() {
				?>

				<li id="customize-control-regular_font_size" class="customize-control customize-control-number" style="display: list-item;">
					<label for="_customize-input-regular_font_size" class="customize-control-title">
						<?php echo esc_html( $this->label ); ?>
					</label>

					<div class="font-size-container">
						<input name="_customize-input-regular_font_size" id="_customize-input-<?php echo esc_attr( $this->id ); ?>" type="number" value="<?php echo esc_attr( get_theme_mod( 'regular_font_size', '14' ) ); ?>" data-customize-setting-link="regular_font_size" class="customize-control-font-size-value" <?php $this->link(); ?> />

						<input type="button" class="button button-regular wp-picker-default " id="font-size-reset" value="Default" aria-label="Reset to default regular font size">

					</div>

				</li>

				<?php
			}

		}

	endif;

endif;
