<?php
function customize_admin_menu() {
    remove_menu_page('edit.php'); // Hide default "Posts"
    remove_menu_page('edit-comments.php'); // Hide comments
}
add_action('admin_menu', 'customize_admin_menu');
?>
