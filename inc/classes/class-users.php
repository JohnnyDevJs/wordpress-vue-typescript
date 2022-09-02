<?php
/**
 * Send Users
 *
 * @package sjp
 */

namespace SJP_THEME\Inc;

use SJP_THEME\Inc\Traits\Singleton;

class Users {

    use Singleton;

    protected function __construct() {

        // load class
        $this->setup_hooks();

    }

    protected function setup_hooks() {

        /**
         * Actions.
         */

        add_action( 'show_user_profile', [$this, 'user_profile_fields'] );
        add_action( 'edit_user_profile', [$this, 'user_profile_fields'] );
        add_action( 'personal_options_update', [$this, 'user_profile_fields_save'], 10, 1 );
        add_action( 'edit_user_profile_update', [$this, 'user_profile_fields_save'], 10, 1 );

    }

    public function user_profile_fields( $user ) {

        $user_phone = get_the_author_meta( 'user_phone', $user->ID, true );

        $output = '';
        $output .= '

        <table class="form-table">
          <tr>
            <th>
              <label for="user_phone">Telefone</label>
            </th>
            <td>
              <input type="text" name="user_phone" id="user_phone" value="' . $user_phone . '" class="regular-text" />
            </td>
          </tr>
        </table>';

        echo $output;
    }

    public function user_profile_fields_save( $user_id ) {

        if ( !  current_user_can( 'edit_user', $user_id ) ) {
            return false;
        }

        update_user_meta( $user_id, 'user_phone', $_REQUEST['user_phone'] );
    }

}
