<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class IT_Company_Lite_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'it-company-lite' ),
				'family'      => esc_html__( 'Font Family', 'it-company-lite' ),
				'size'        => esc_html__( 'Font Size',   'it-company-lite' ),
				'weight'      => esc_html__( 'Font Weight', 'it-company-lite' ),
				'style'       => esc_html__( 'Font Style',  'it-company-lite' ),
				'line_height' => esc_html__( 'Line Height', 'it-company-lite' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'it-company-lite' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'it-company-lite-ctypo-customize-controls' );
		wp_enqueue_style(  'it-company-lite-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'it-company-lite' ),
        'Abril Fatface' => __( 'Abril Fatface', 'it-company-lite' ),
        'Acme' => __( 'Acme', 'it-company-lite' ),
        'Anton' => __( 'Anton', 'it-company-lite' ),
        'Architects Daughter' => __( 'Architects Daughter', 'it-company-lite' ),
        'Arimo' => __( 'Arimo', 'it-company-lite' ),
        'Arsenal' => __( 'Arsenal', 'it-company-lite' ),
        'Arvo' => __( 'Arvo', 'it-company-lite' ),
        'Alegreya' => __( 'Alegreya', 'it-company-lite' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'it-company-lite' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'it-company-lite' ),
        'Bangers' => __( 'Bangers', 'it-company-lite' ),
        'Boogaloo' => __( 'Boogaloo', 'it-company-lite' ),
        'Bad Script' => __( 'Bad Script', 'it-company-lite' ),
        'Bitter' => __( 'Bitter', 'it-company-lite' ),
        'Bree Serif' => __( 'Bree Serif', 'it-company-lite' ),
        'BenchNine' => __( 'BenchNine', 'it-company-lite' ),
        'Cabin' => __( 'Cabin', 'it-company-lite' ),
        'Cardo' => __( 'Cardo', 'it-company-lite' ),
        'Courgette' => __( 'Courgette', 'it-company-lite' ),
        'Cherry Swash' => __( 'Cherry Swash', 'it-company-lite' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'it-company-lite' ),
        'Crimson Text' => __( 'Crimson Text', 'it-company-lite' ),
        'Cuprum' => __( 'Cuprum', 'it-company-lite' ),
        'Cookie' => __( 'Cookie', 'it-company-lite' ),
        'Chewy' => __( 'Chewy', 'it-company-lite' ),
        'Days One' => __( 'Days One', 'it-company-lite' ),
        'Dosis' => __( 'Dosis', 'it-company-lite' ),
        'Droid Sans' => __( 'Droid Sans', 'it-company-lite' ),
        'Economica' => __( 'Economica', 'it-company-lite' ),
        'Fredoka One' => __( 'Fredoka One', 'it-company-lite' ),
        'Fjalla One' => __( 'Fjalla One', 'it-company-lite' ),
        'Francois One' => __( 'Francois One', 'it-company-lite' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'it-company-lite' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'it-company-lite' ),
        'Great Vibes' => __( 'Great Vibes', 'it-company-lite' ),
        'Handlee' => __( 'Handlee', 'it-company-lite' ),
        'Hammersmith One' => __( 'Hammersmith One', 'it-company-lite' ),
        'Inconsolata' => __( 'Inconsolata', 'it-company-lite' ),
        'Indie Flower' => __( 'Indie Flower', 'it-company-lite' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'it-company-lite' ),
        'Julius Sans One' => __( 'Julius Sans One', 'it-company-lite' ),
        'Josefin Slab' => __( 'Josefin Slab', 'it-company-lite' ),
        'Josefin Sans' => __( 'Josefin Sans', 'it-company-lite' ),
        'Kanit' => __( 'Kanit', 'it-company-lite' ),
        'Lobster' => __( 'Lobster', 'it-company-lite' ),
        'Lato' => __( 'Lato', 'it-company-lite' ),
        'Lora' => __( 'Lora', 'it-company-lite' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'it-company-lite' ),
        'Lobster Two' => __( 'Lobster Two', 'it-company-lite' ),
        'Merriweather' => __( 'Merriweather', 'it-company-lite' ),
        'Monda' => __( 'Monda', 'it-company-lite' ),
        'Montserrat' => __( 'Montserrat', 'it-company-lite' ),
        'Muli' => __( 'Muli', 'it-company-lite' ),
        'Marck Script' => __( 'Marck Script', 'it-company-lite' ),
        'Noto Serif' => __( 'Noto Serif', 'it-company-lite' ),
        'Open Sans' => __( 'Open Sans', 'it-company-lite' ),
        'Overpass' => __( 'Overpass', 'it-company-lite' ),
        'Overpass Mono' => __( 'Overpass Mono', 'it-company-lite' ),
        'Oxygen' => __( 'Oxygen', 'it-company-lite' ),
        'Orbitron' => __( 'Orbitron', 'it-company-lite' ),
        'Patua One' => __( 'Patua One', 'it-company-lite' ),
        'Pacifico' => __( 'Pacifico', 'it-company-lite' ),
        'Padauk' => __( 'Padauk', 'it-company-lite' ),
        'Playball' => __( 'Playball', 'it-company-lite' ),
        'Playfair Display' => __( 'Playfair Display', 'it-company-lite' ),
        'PT Sans' => __( 'PT Sans', 'it-company-lite' ),
        'Philosopher' => __( 'Philosopher', 'it-company-lite' ),
        'Permanent Marker' => __( 'Permanent Marker', 'it-company-lite' ),
        'Poiret One' => __( 'Poiret One', 'it-company-lite' ),
        'Quicksand' => __( 'Quicksand', 'it-company-lite' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'it-company-lite' ),
        'Raleway' => __( 'Raleway', 'it-company-lite' ),
        'Rubik' => __( 'Rubik', 'it-company-lite' ),
        'Rokkitt' => __( 'Rokkitt', 'it-company-lite' ),
        'Russo One' => __( 'Russo One', 'it-company-lite' ),
        'Righteous' => __( 'Righteous', 'it-company-lite' ),
        'Slabo' => __( 'Slabo', 'it-company-lite' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'it-company-lite' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'it-company-lite'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'it-company-lite' ),
        'Sacramento' => __( 'Sacramento', 'it-company-lite' ),
        'Shrikhand' => __( 'Shrikhand', 'it-company-lite' ),
        'Tangerine' => __( 'Tangerine', 'it-company-lite' ),
        'Ubuntu' => __( 'Ubuntu', 'it-company-lite' ),
        'VT323' => __( 'VT323', 'it-company-lite' ),
        'Varela Round' => __( 'Varela Round', 'it-company-lite' ),
        'Vampiro One' => __( 'Vampiro One', 'it-company-lite' ),
        'Vollkorn' => __( 'Vollkorn', 'it-company-lite' ),
        'Volkhov' => __( 'Volkhov', 'it-company-lite' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'it-company-lite' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'it-company-lite' ),
			'100' => esc_html__( 'Thin',       'it-company-lite' ),
			'300' => esc_html__( 'Light',      'it-company-lite' ),
			'400' => esc_html__( 'Normal',     'it-company-lite' ),
			'500' => esc_html__( 'Medium',     'it-company-lite' ),
			'700' => esc_html__( 'Bold',       'it-company-lite' ),
			'900' => esc_html__( 'Ultra Bold', 'it-company-lite' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'normal'  => esc_html__( 'Normal', 'it-company-lite' ),
			'italic'  => esc_html__( 'Italic', 'it-company-lite' ),
			'oblique' => esc_html__( 'Oblique', 'it-company-lite' )
		);
	}
}
