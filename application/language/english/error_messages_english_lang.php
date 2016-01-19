<?php // echo $this->lang->line('main_first_item_icon');  ?>
<?php
/******************************************************************** 
*	Description: All error messages
*********************************************************************	
*/
$lang[''] ='';
/**
---   Lesson  ---
*/
	//------------ flash errors --------------------
	$lang['error_flash_not_valid'] 		= "Nofication: Not a valid lesson.";
	$lang['error_flash_no_permission'] 	= "You dont have permission complete that task.";
	$lang['error_flash_no_course'] 		= "You must select a course before creating a lesson.";
	$lang['error_flash_no_lesson'] 		= "We are sorry but we could find that lesson";
	$lang['error_flash_no_lesson_in_course'] = "(There are no lessons for this course)";
	//------------ flash success -------------------
	$lang['info_flash_add'] 			= "Succesfully added a lesson.";
	$lang['info_flash_update'] 			= "Succesfully updated a lesson.";
	$lang["info_lesson_delete_success"] = "A lesson has been successfully deleted"; 
	$lang['info_flash_activation'] 		= "Succesfully changed activation.";


	/*---  Admin/Lesson error messages  ---*/

/**
---   Course  ---
*/
	//------------ flash errors --------------------
	$lang['error_no_course_available'] 		= "No courses available.";
	//------------ flash success -------------------
	$lang["info_course_delete_success"] = "A course has been successfully deleted"; 
	$lang["info_course_create_success"] = "A course has been successfully created"; 	
/**
---   block  ---
*/	
	/*---  Admin/block  ---*/

	//------------ flash error   -------------------
	$lang['block_error_delete_no_permit'] 	= 'You don\'t have permission to delete this block (id = ';
	$lang['block_error_delete'] 			= 'The block is invalid. No block was deleted.';
	//------------ flash success -------------------
	$lang['block_info_update'] 				= 'Block was succesfully updated. ';
	$lang['block_info_add'] 				= 'Block was succesfully added. ';
	$lang['block_info_delete'] 				= 'You have deleted the block.';

	
/**
---  Category  ---
*/
	//------------ flash errors --------------------
		$lang['category_error_not_found'] 			= "Data could not be found";
		$lang['error_is_unique'] 					= "%s should be unique";
		$lang['category_error_delete_no_permit'] 	= 'You don\'t have permission to delete the category';
	//------------ flash success -------------------
		$lang['catefory_info_active'] 				= "Succesfully changed activation.";
		$lang['catefory_info_links'] 				= "Connections succesfully changed!";
		$lang['category_info_delete'] 				= 'You have deleted the category.';
	/*---  Admin/Category   ---*/
/**
---  User  ---
*/
	//------------ flash errors --------------------
	$lang['user_error_not_found'] 		= "User could not be found";
	$lang['user_error_email_pass'] 		= "That email/password combination does not exist";
	$lang['user_error_invalid'] 		= "That user doesn\'t exist.";
	$lang['user_error_no_permisssion'] 	= "You don\'t have permission to delete this user or the user is has the same status as you.";
	$lang['error_profile_avatar_upload']= "Please select a image before uploading.";
	$lang['user_infor_success_delete'] 	= 'The user has successfully been deleted.';
	/*--- User_m function: email_to error messages  ---*/
		$lang['user_m_error_not_sent'] 	= "Sorry Unable to send email...";

	
	$lang['profile_error_current_pass'] 	= "The current password is incorrect";
	$lang['profile_info_updated'] 			= "Your Profile has been Updated!";
	$lang['profile_info_pass_updated'] 		= "Password successfully changed";

	$lang['home_error_captcha'] 			= "Incorrect captcha, please try again.";
	/*---  Admin/Category   ---*/
/**
---  Notification error messages  ---
*/
/*---  Not found table messages  ---*/
	$lang['note_error_no_permission'] 	= 'The notification is invalid or you don\'t have permission to view the notification'; 
	// Used in admin/main_notification.php to dispaly a information message when no notifications are found
	$lang['note_no_notifications'] 	= "No notifications with that criteria were found.";
	$lang['lesson_no_lessons'] 		= "No lessons available.";
	$lang['lesson_no_courses'] 		= "No courses available.";
	$lang['course_no_courses'] 		= "We could not find any courses.";
	$lang['category_no_category']	= "We could not find any categories.";
	$lang['category_no_cat_exist']	= "No categories exist.";
	$lang['category_no_links']		= "No related links availble.";
	$lang['user_no_users']			= "We could not find any users.";
	$lang['info_seen_notif_del'] 	= "All seen notifications have been cleared."; 		// NEW
/*---  Notification error messages   ---*/


//$this->form_validation->set_message('_unique_email', $this->lang->line('error_is_unique'));
//<?php  echo $this->lang->line('main_first_item_icon');  ?>