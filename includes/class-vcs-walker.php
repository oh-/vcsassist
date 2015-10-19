<?php 
/*
*  VCS_Cat_Walker is for the Plugin Directory submit category - it is slightly changed from the 
* original which is the WP_Category_Walker function found in wordpress. Also of note - if the
* plugin 'Business Directory Plugin' is updated further than 3.6.9.1 - there is a high chance
* that the walker class have been over-written, which enables this feature. - editing detail
* as below
* **	file:	core/fieldtypes/class-fieldtypes-checkbox.php
* **	line:	31: 'walker' => new VCS_Cat_Walker( 'checkbox', $value, $field ),


 */
class VCS_Cat_Walker extends Walker {
    public $tree_type = 'category';
    public $db_fields = array ('parent' => 'parent', 'id' => 'term_id'); //TODO: decouple this
    private $input_type;
    private $selected;
    private $field;
 
    public function __construct( $input_type='radio', $selected=null, &$field=null ) {
        $this->input_type = $input_type;
        $this->selected = $selected;
        $this->field = $field;
    }

    /**
     * Starts the list before the elements are added.
     *
     * @see Walker:start_lvl()
     *
     * @since 2.5.1
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of category. Used for tab indentation.
     * @param array  $args   An array of arguments. @see wp_terms_checklist()
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent<ul class='children'>\n";
    }

    /**
     * Ends the list of after the elements are added.
     *
     * @see Walker::end_lvl()
     *
     * @since 2.5.1
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of category. Used for tab indentation.
     * @param array  $args   An array of arguments. @see wp_terms_checklist()
     */
    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    /**
     * Start the element output.
     *
     * @see Walker::start_el()
     *
     * @since 2.5.1
     *
     * @param string $output   Passed by reference. Used to append additional content.
     * @param object $category The current term object.
     * @param int    $depth    Depth of the term in reference to parents. Default 0.
     * @param array  $args     An array of arguments. @see wp_terms_checklist()
     * @param int    $id       ID of the current term.
     */
    public function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
      $parentcat = ($depth === 0) ? $args['list_only'] = true : '' ;
        if ( empty( $args['taxonomy'] ) ) {
            $taxonomy = 'category';
        } else {
            $taxonomy = $args['taxonomy'];
        }
 
        if ( $taxonomy == 'category' ) {
            $name = 'post_category';
        } else {
          $name = 'listingfields[' . $this->field->get_id() . ']';
;
        }
 
        $args['popular_cats'] = empty( $args['popular_cats'] ) ? array() : $args['popular_cats'];
        $class = in_array( $category->term_id, $args['popular_cats'] ) ? ' class="popular-category"' : '';
 
        $args['selected_cats'] = empty( $args['selected_cats'] ) ? array() : $args['selected_cats'];
 
        /** This filter is documented in wp-includes/category-template.php */
        if ( ! empty( $args['list_only'] ) ) {
            $aria_cheched = 'false';
            $inner_class = 'category';
 
            if ( in_array( $category->term_id, $args['selected_cats'] ) ) {
                $inner_class .= ' selected';
                $aria_cheched = 'true';
            }
 
            $output .= "\n" . '<li' . $class . '>' .
                '<div class="' . $inner_class . '" data-term-id=' . $category->term_id .
                ' tabindex="0" role="checkbox" aria-checked="' . $aria_cheched . '">' .
                esc_html( apply_filters( 'the_category', $category->name ) ) . '</div>';
        } else {
            $output .= "\n<li id='{$taxonomy}-{$category->term_id}'$class>" .
                '<label class="selectit"><input value="' . $category->term_id . '" type="checkbox" name="'.$name.'[]" id="in-'.$taxonomy.'-' . $category->term_id . '"' .
                checked( in_array( $category->term_id, $args['selected_cats'] ), true, false ) .
                disabled( empty( $args['disabled'] ), false, false ) . ' /> ' .
                esc_html( apply_filters( 'the_category', $category->name ) ) . '</label>';
        }
    }
 
    /**
     * Ends the element output, if needed.
     *
     * @see Walker::end_el()
     *
     * @since 2.5.1
     *
     * @param string $output   Passed by reference. Used to append additional content.
     * @param object $category The current term object.
     * @param int    $depth    Depth of the term in reference to parents. Default 0.
     * @param array  $args     An array of arguments. @see wp_terms_checklist()
     */
    public function end_el( &$output, $category, $depth = 0, $args = array() ) {
        $output .= "</li>\n";
    }
}

/*
 * VCS_Walker - at the moment as no need to be here, but I am making a plugin that will 
 * hopefully allow a chosen category to be displayed as a widget in the sdebar
 */
class VCS_Walker extends Walker {
    var $tree_type = 'category';
    var $db_fields = array( 'parent' => 'parent', 'id' => 'term_id' );

    private $input_type;
    private $selected;
    private $field;

    public function __construct( $input_type='radio', $selected=null, &$field=null ) {
        $this->input_type = $input_type;
        $this->selected = $selected;
        $this->field = $field;
    }

    public function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
        switch ( $this->input_type ) {
            case 'checkbox':
                $output .= '<div class="wpbdmcheckboxclass">';
                $output .= sprintf( '<input type="checkbox" class="%s" name="%s" value="%s" %s style="margin-left: %dpx;" />%s',
                                    $this->field->is_required() ? 'required' : '',
                                    'listingfields[' . $this->field->get_id() . '][]',
                                    $category->term_id,
                                    in_array( $category->term_id, is_array( $this->selected ) ? $this->selected : array( $this->selected ) ) ? 'checked="checked"' : '',
                                    $depth * 10,
                                    esc_attr( $category->name )
                                  );
                $output .= '</div>';
                break;
            case 'radio':
            default:
                $output .= sprintf( '<input type="radio" name="%s" class="%s" value="%s" %s style="margin-left: %dpx;"> %s<br />',
                                    'listingfields[' . $this->field->get_id() . ']',
                                    $this->field->is_required() ? 'inradio required' : 'inradio',
                                    $category->term_id,
                                    $this->selected == $category->term_id ? 'checked="checked"' : '',
                                    $depth * 10,
                                    esc_attr( $category->name )
                                  );
                break;
        }

    }

}
