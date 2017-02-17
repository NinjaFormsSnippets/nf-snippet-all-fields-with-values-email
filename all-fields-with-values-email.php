<?php

/*
 * Plugin Name: Ninja Forms - All Fields with Values in Email (Snippet)
 * Description: Adds the {all_fields_with_values} merge tag to Email Actions.
 * Version: 3.0.0
 */

add_filter( 'ninja_forms_action_email_message', 'nf_snippet_email__all_fields_with_values', 10, 3 );
function nf_snippet_email__all_fields_with_values( $message, $data, $action_settings ){
    if( isset( $data[ 'fields' ]  ) && ! empty( $data[ 'fields' ]  ) ){
        $table = '<table>';
        foreach( $data[ 'fields' ] as $field ){
            if( ! isset( $field[ 'value' ] ) || empty( $field[ 'value' ] ) ) continue;
            $label = ( isset( $field[ 'settings' ][ 'label' ] ) ) ? $field[ 'settings' ][ 'label' ] : '';
            $table .= "<tr><td>{$label}:</td><td>{$field[ 'value' ]}</td></tr>";
        }
        $table .= '</table>';
    } else {
        $table = '';
    }
    return str_replace( '{all_fields_with_values}', $table, $message );
}
