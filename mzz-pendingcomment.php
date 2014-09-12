<?php
 /**
* Plugin Name: mzz pendingcomment
* Plugin URI: http://wieldlinux.com/
* Description: plugin sets collabpress comments to pending
* Version: v0.1
* Author: mjassen
* Author URI: http://wieldlinux.com/
* License: MIT
*/
 
function mzz_cp_pendingcomment( $approved , $commentdata )
{
  // if the comment_type found in $commentdata is 'collabpress', then set approval to 0 (pending), otherwise leave its approval to $approved(i.e. leave its approval alone)
        return ( $commentdata['comment_type'] == 'collabpress' ) ? '0' : $approved;

}

add_filter( 'pre_comment_approved' , 'mzz_cp_pendingcomment' , '99', '2' );
?>
