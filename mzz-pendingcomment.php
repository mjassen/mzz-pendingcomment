<?php

 /**
* Plugin Name: Mzz Pendingcomment
* Plugin URI: https://github.com/mjassen/mzz-pendingcomment
* Description: Helper plugin for CollabPress sets collabpress comments to pending.
* Version: 0.0.1
* Author: mjassen
* Author URI: http://wieldlinux.com/
* License: MIT
*/

//tell wordpress to execute the mzz_comment_inserted function whenever it executes the wp_insert_comment function-- for example when collabpress calls the wp_insert_comment function.
add_action('wp_insert_comment','mzz_comment_inserted',99,2);

function mzz_comment_inserted($comment_id, $comment_object) {

	//for the comment that just got inserted, check whether the comment type is 'collabpress'
    if ($comment_object->comment_type == 'collabpress') {
        
        //the comment type was seen to be collabpress. It was already inserted into the database. Now we go back into the database and update that comment's approved status to 0 (pending)
        $mzzcommentarr = array();
		$mzzcommentarr['comment_ID'] = $comment_id;
		$mzzcommentarr['comment_approved'] = 0;
		wp_update_comment( $mzzcommentarr );

    }
}

?>
