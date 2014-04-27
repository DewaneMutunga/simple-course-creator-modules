<?php
/**
 * SCC_Module_Taxonomy class
 *
 * @since 1.0.0
 */
 class SCC_Module_Taxonomy {
	 
	 /**
	 * constructor for SCC_Module_Taxonomy class
	 *
	 * @since 1.0.0
	 */
	 public function __construct() {
		 
		 // load new taxonomy
		 add_action( 'init', array( $this, 'register_module_taxonomy' ), 60 );
	 }
	 
	 /**
	 * register "Module" taxonomy 
	 *
	 * Also add a custom section for modules in the custom metabox on the edit post screen
	 * using the module_meta_box() method.
	 *
	 * @since 1.0.0
	 */
	 public function register_module_taxonomy() {
	 	if ( class_exists( 'Simple_Course_Creator' ) ) {
		 	$labels = array(
				'name'              => _x( 'Modules', 'sccm' ),
				'singular_name'     => _x( 'Module', 'sccm' ),
				'search_items'      => __( 'Search Modules', 'sccm' ),
				'all_items'         => __( 'All Modules', 'sccm' ),
				'parent_item'       => __( 'Parent Course', 'sccm' ),
				'parent_item_colon' => __( 'Parent Course:', 'sccm' ),
				'edit_item'         => __( 'Edit Module', 'sccm' ),
				'update_item'       => __( 'Update Module', 'sccm' ),
				'add_new_item'      => __( 'Add New Module', 'sccm' ),
				'new_item_name'     => __( 'New Module Name', 'sccm' ),
				'menu_name'         => __( 'Modules', 'sccm' ),
				'popular_items'		=> __( 'Popular Modules', 'sccm' )
			);	
			$args = array(
				'hierarchical'      => false,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array( 'slug' => 'module' ),
		        'meta_box_cb'       => array( $this, 'module_meta_box' )
			);		
			register_taxonomy( 'module', array( 'post' ), $args );
		 }
	 }
	 
	 /**
	 * determine a post's Module
	 *
	 * @since 1.0.0
	 */
	public function retrieve_module( $post_id ) {
		$module = wp_get_post_terms( $post_id, 'module' );
		if ( ! is_wp_error( $module ) && ! empty( $module ) && is_array( $module ) ) {
			$module = current( $module );
		} else {
			$module = false;
		}
		return $module;
	}


	/**
	 * determine a post's Module ID
	 *
	 * @uses retrieve_module()
	 * @since 1.0.0
	 */
	public function retrieve_module_id( $post_id ) {
		$module = $this->retrieve_module( $post_id );
		if ( $module ) {
			return $module->term_id;
		} else {
			return 0;
		}
	}


	/**
	 * assign post to a module from edit post screen
	 *
	 * If a post already belongs to a module, show that module as
	 * a selected option. Whether assigned to a module already or
	 * not, allow the module to be changed.
	 *
	 * A select form is used to prevent more than one module from
	 * being assigned to a post. Though it may make sense based on
	 * content, it doesn't make sense to output multiple post listings
	 * in your content for multiple modules, which is the point of the
	 * plugin.
	 *
	 * @uses retrieve_module_id()
	 * @since 1.0.0
	 */
	 public function module_meta_box( $post ) {
		
		// get the current course for the post if set
		$current_module = $this->retrieve_module_id( $post->ID );

		// get list of all courses and the taxonomy
		$tax = get_taxonomy( 'module' );
		$modules = get_terms( 'module', array( 'hide_empty' => false, 'orderby' => 'name' ) );
		?>
		<div id="taxonomy-<?php echo lcfirst( $tax->labels->name ); ?>" class="categorydiv">
			<label class="screen-reader-text">
				<?php echo $tax->labels->parent_item_colon; ?>
			</label>
			<select name="tax_input[module]" style="width:100%">
				<option value="0"><?php _e( 'Select Module', 'sccm' ) ?></option>
				<?php foreach ( $modules as $module ) : ?>
					<option value="<?php echo esc_attr( $module->slug ); ?>" <?php selected( $current_module, $module->term_id ); ?>><?php echo esc_html( $module->name ); ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<?php
	 }
 }
 new SCC_Module_Taxonomy();