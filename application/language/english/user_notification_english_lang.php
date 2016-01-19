<?php // echo $this->lang->line('main_first_item_icon');  ?>
<?php
/******************************************************************** 
*	Description: Notification language files
*********************************************************************	
*/
$lang[''] ='';

/*---  Notification tab in the navigation menu  ---*/
	$lang['Notification_title'] 	= 'Notifications';// used also in the main screen for the title
	$lang['right_link']				= 'New notifications';
	$lang['view_link'] 				= 'View all';
	$lang['no_notifications']		= 'No new notifications';
	$lang['clear_notifications']	= " Clear seen notifications";
	
	/*---  In case we have some notifications ---*/
	//Titles for different kind of notifications
	$lang['note_reply'] 				= 'Reply';
	$lang['note_course_request']		= 'Course request: ';
	$lang['note_lesson_request']		= 'Lesson request: ';
	$lang['note_developer_request']		= 'Applicant: ';

	$lang['note_status'] 			= 'Status: '; //Used in the main screen to show statuses of notes.
	$lang['note_sent_by'] 			= 'Sent by ';
	$lang['note_sent_dev']			= ' sent a request on ';
	$lang['note_when'] 				= 'on ';
	$lang['note_sent_on'] 			= 'Sent on ';
	$lang['note_for'] 				= ' for ';
	$lang['note_dev_req'] 			= ' the developer request. ';
/*---  Notification tab in the navigation menu  ---*/

/*---  Main Notification screen  ---*/	
	/*----   Status  ----*/
		$lang['note_status_1']= "Not seen" ;
		$lang['note_status_2']= "Seen" ;
		$lang['note_status_3']= "Closed" ;
		$lang['note_status_4']= "All" ;
	/*----   Status  ----*/
	/*----   Reply   ----*/	
		$lang['note_type']= "Notification type: " ;
		$lang['note_first_name']= "First name: " ;
		$lang['note_last_name']= "Last name:" ;
		$lang['note_sent_on']= "Sent on: " ;
	/*----   Reply      ----*/

	/*----   Developer  ----*/
		$lang['note_applicant']= "Applicant: " ;
		//Still needs to be added for other users(admin)
	/*----   Developer  ----*/

	/*----   Sidebar-popout   ----*/
		$lang['popout_confirm_delete']	="You are about to delete a record. This cannot be undone. Are you sure?";
		$lang['popout_view_icon']		= "glyphicon glyphicon-info-sign" ;
		$lang['popout_delete_icon']		= "glyphicon glyphicon-trash" ;
		$lang['popout_view_title']		= "View this notification." ;
		$lang['popout_delete_title']	= "Delete this notification. " ;
	/*----   Sidebar-popout   ----*/
/*---  Main Notification screen  ---*/

/*---  Modifications in the model "notification_m"  ---*/
		/** 
		 *	Functions that use these parameters
		 *	@param admin_notification()
		 *  @param user_notification()
		 *  @param get_by_id()
		 */
	//(Note: These settings control the type names of notifications individual notification sections for a full controll you need to change parameters here and below)(Also applies to all parts of notification even i single page view)
		$lang['note_type_1']= "Lesson request";
		$lang['note_type_2']= "Course request";
		$lang['note_type_3']= "Developer request";
		$lang['note_type_4']= "Reply ";
		$lang['note_type_default']= "Reply";//for now

	/**
	 *	Functions that use these parameters
	 *  @param get_by_id()  
	 */
	//(Note: These settings control the name of statuses inindividual notification sections for a full controll you need to change parameters here and below)
		$lang['note_flag_1']= "Unseen";
		$lang['note_flag_2']= "Seen";
		$lang['note_flag_3']= "Completed";
		$lang['note_flag_4']= "Denied";
		$lang['note_flag_default']= "Unseen";// for now

	/**
	 *	Functions that use these parameters
	 *  @param create_type_links()
	 *	@param record_count() //Only slug
	 *	@param fetch_limit()  //Only slug
	 */	
	//(Note: These only control the name/slug of sorting tabs)		
		$lang['note_type_slug_1']="all";
		$lang['note_type_slug_2']="lesson";
		$lang['note_type_slug_3']="course";
		$lang['note_type_slug_4']="developer";

		$lang['note_type_name_1']="All";
		$lang['note_type_name_2']="Lesson request";
		$lang['note_type_name_3']="Course request";
		$lang['note_type_name_4']="Developer request";

	/**
	 *	Functions that use these parameters
	 *  @param create_type_links()
	 *	@param record_count() // Only slug values
	 *	@param fetch_limit()  //Only slug values
	 * 	@param CONTROLLER("en/user/profile/notification/") //Only uses slug values
	 *		@var $flag the same kind of slug we use here, it uses a default value	
	 *	(BUGFIX maybe its redundant in the controller i think that i implemented a switch case in each model function needs more checking)
	 */
	//(Note: These only control the name/slug of sorting tabs)
		$lang['note_status_slug_1']="all";
		$lang['note_status_slug_2']="unseen";
		$lang['note_status_slug_3']="seen";
		$lang['note_status_slug_4']="closed";

		$lang['note_status_name_1']="All";
		$lang['note_status_name_2']="Not seen";
		$lang['note_status_name_3']="Seen";
		$lang['note_status_name_4']="Closed";

	/**
	 *	Functions that use these parameters
  	 *  @param automatic_message()  
	 */
	//---------   Succesfull Messages    ---------

		$lang['note_success_lesson_message_1'] = "Thank you for sharing your knowledge with the community. <br />";
		$lang['note_success_lesson_message_2'] ="Your lesson has been successfully approved and is now visible to the public.<br /><br />";
		$lang['note_success_lesson_message_3'] ="LessonLearned team";

		$lang['note_success_course_message_1'] = "Thank you for sharing your knowledge with the community. <br />";
		$lang['note_success_course_message_2'] ="Your course has been successfully approved and is now visible to the public.<br /><br />";
		$lang['note_success_course_message_3'] ="LessonLearned team";

		$lang['note_success_dev_message_1'] = "Welcome!<br /><br />";
		$lang['note_success_dev_message_2'] ="Thank you for  showing enthusiasm for sharing your knowledge with the comunity<br />";
		$lang['note_success_dev_message_3'] ="We accept you with open arms. Please feel free to use our portal and exspress yourself.<br /><br />";
		$lang['note_success_dev_message_4'] ="LessonLearned team";
	//---------   Failed Messages        ---------
		$lang['note_fail_lesson_message_1'] = "Thank you for sharing your knowledge with the community. <br />";
		$lang['note_fail_lesson_message_2'] ="Unfortunatly there were problems with the following lesson. read more about the things that need to be fixed below<br /><br />";
		$lang['note_fail_lesson_message_3'] ="";
		$lang['note_fail_lesson_message_4'] ="LessonLearned team";

		$lang['note_fail_course_message_1'] = "Thank you for sharing your knowledge with the community. <br />";
		$lang['note_fail_course_message_2'] ="Unfortunatly there were problems with the following course. read more about the things that need to be fixed below<br /><br />";
		$lang['note_fail_course_message_3'] ="LessonLearned team";

		$lang['note_fail_dev_message_1'] = "Welcome!<br /><br />";
		$lang['note_fail_dev_message_2'] ="We can never have too meni developers, but you need to write a bit more about yourself.<br />";
		$lang['note_fail_dev_message_3'] ="expl. If you have any relavent expirience, or what would like to make lessons about in our portal.<br /><br />";
		$lang['note_fail_dev_message_4'] ="LessonLearned team";

/*---  Modifications in the model "notification_m"  ---*/


/*---  Notification single page screen  ---*/
	// (Note: the response is controlled by "note_type_XX" near line ~66)
	$lang['note_notification_type'] ="Notification type: ";
	$lang['note_notification_type_lesson'] ="Lesson information: ";
	$lang['note_notification_type_course'] ="Course information: ";
	$lang['note_author_info_title'] ="Author information: ";
	$lang['note_request_info_title'] ="Request information: ";
	$lang['note_applicant_info_title'] ="Applicant: ";

	$lang['note_back'] ="Go back ";
	/*---- All notification single information(some are used in the mini view "main notification screen") ----*/
		$lang['note_first_name']= "First name: ";
		$lang['note_last_name']	= "Last name:";
		$lang['note_username']	= "Username: ";
		$lang['note_category']	= "Category:";
		$lang['note_course']	= "Course:";
		$lang['note_lesson']	= "Lesson:";
		$lang['note_published']	= "Published:";
		$lang['note_modified']	= "Modified:";
		$lang['note_approved']	= "Approved:";
		$lang['note_message'] 	= "Message: ";

		$lang['note_reply_to'] 	= "Reply to:";
		$lang['note_subject'] 	= "Subject: ";
		$lang['note_btn_send'] 	= "Send";
		$lang['note_btn_approve'] = "Approve";
		$lang['note_btn_deny']	= "Deny";
		$lang['note_yes'] 		= "Yes";
		$lang['note_no'] 		= "No";
		$lang['note_course_link'] = "Course Preview";
	/*---- All notification single information ----*/

	$lang['note_no_notifications'] ="No notifications with that criteria were found.";//admin/main_notification.php
	$lang['note_fail_lesson_message_1'] ="";
	$lang['note_fail_lesson_message_1'] ="";

/*---  Notification single page screen  ---*/






?>