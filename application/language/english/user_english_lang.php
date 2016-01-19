<?php 
/******************************************************************** 
*	Description: Category language files
*********************************************************************	
*/


/*--- 
	 --------- edit
 ---*/
 	$lang['user_new'] 				= "Add a new user";
 	$lang['user_edit'] 				= "Edit user ";
	$lang['user_username'] 			= "Username";
	$lang['user_firstname'] 		= "First name";
	$lang['user_lastname'] 			= "Last name";
	$lang['user_email'] 			= "Email";
	$lang['user_password'] 			= "Password";
	$lang['user_pass_conf'] 		= "Confirm password ";

	$lang['user_personal'] 			= "Personal information";
	$lang['user_country'] 			= "Country";
	$lang['user_city'] 				= "City";
	$lang['user_sele_priv_1'] 		= "User";
	$lang['user_sele_priv_2'] 		= "Developer";
	$lang['user_sele_priv_3'] 		= "Administrator";


	$lang['user_user']				="Users";

 	$lang['user_btn_new'] 			= "Add a user";
	$lang['user_search']			= "Search";
	$lang['user_filter']			= "Filter";
	$lang['user_status'] 			= "Status";
	$lang['user_courses'] 			= "Courses";
	$lang['user_active'] 			= "Active";
	$lang['user_permit'] 			= "Permit";
	

/*--- Dashboard ---*/
	$lang['dashboard_title'] 		= "Administrator Dashboard";
	//============================ User section ============================ 
	$lang['dashboard_user_title'] 	= "User Controls";
	$lang['dashboard_user_create'] 	= " Create a user";
	$lang['dashboard_user_list'] 	= " List user";
	$lang['dashboard_user_edit'] 	= " Edit user";
	$lang['dashboard_user_delete'] 	= " Remove user";
	$lang['dashboard_user_dev'] 	= " Developer request";

	$lang['dashboard_user_create_d'] 	= " (Creating a new user, sets him automaticly to active) ";
	$lang['dashboard_user_list_d'] 		= " (Listing all users in a table) ";
	$lang['dashboard_user_edit_d'] 		= " (Editing a user requires you to selecta a user from a list you wish to edit) ";
	$lang['dashboard_user_delete_d'] 	= " (Deleting a user requires you to select him from a list) ";
	$lang['dashboard_user_dev_d'] 		= " (User submited request to become a developer) ";
	//============================ category section ============================ 
	$lang['dashboard_category_title'] 	= "Category Controls";
	$lang['dashboard_category_create'] 	= " New category";
	$lang['dashboard_category_list'] 	= " List categories";
	$lang['dashboard_category_edit'] 	= " Edit category";
	$lang['dashboard_category_delete'] 	= " Remove category";
	$lang['dashboard_category_dis'] 	= " Disable category";
	$lang['dashboard_category_link'] 	= " Link categories";
	$lang['dashboard_category_show'] 	= " Show links";

	$lang['dashboard_category_create_d'] 	= " (Creating a new category) ";
	$lang['dashboard_category_list_d'] 		= " (Listing all categories in a table) ";
	$lang['dashboard_category_edit_d'] 		= " (Category needs to be selected from a list) ";
	$lang['dashboard_category_delete_d'] 	= " (Deleting a category is only possible  if they don't have content linked to them)";
	$lang['dashboard_category_dis_d'] 		= " (Disabled categories are only visible to Admins and Developers) ";
	$lang['dashboard_category_link_d'] 		= " (Connect related categories) ";
	$lang['dashboard_category_show_d'] 		= " (Show linked categories) ";

	//============================ Course section ============================ 
	$lang['dashboard_course_title'] 	= "Course Controls";
	$lang['dashboard_course_new'] 		= " New course";
	$lang['dashboard_course_list'] 		= " List courses";
	$lang['dashboard_course_app'] 		= " Approve/Deny courses ";

	$lang['dashboard_course_new_d'] 	= " (Creating a new course) ";
	$lang['dashboard_course_list_d'] 	= " (Listing all courses in a table, allows other tools.) ";
	$lang['dashboard_course_app_d']		= " (When a new course is created it needs to be approved) ";

	//============================ Lesson section ============================ 
	$lang['dashboard_lesson_title'] 	= "Lesson Controls";
	$lang['dashboard_lesson_new'] 		= " New lesson";
	$lang['dashboard_lesson_wiz'] 		= " Wizard ";
	$lang['dashboard_lesson_app'] 		= " Approve/Deny lessons ";

	$lang['dashboard_lesson_new_d'] 	= "(Creating a new lesson, selecting a category and course is necessary)  ";
	$lang['dashboard_lesson_list_d'] 	= "(First select a category, then a course, then you are able to choose what tools to use.)";
	$lang['dashboard_lesson_app_d']		= "(When a new lesson is created it needs to be approved)  ";
	$lang['dashboard_lesson_wiz_d']		= "(Create and change a lesson using the wizard)  ";
/*--- DAshboard ---*/
/**
*	user_m
*	@param email_to
*/
	$lang['user_m_from']		= 	'admin@lessonlearned.com';
	$lang['user_m_from_title']	= 	"Lesson Learned automatic response";
	$lang['user_m_cc']			= 	"testcc@domainname.com";
	$lang['user_m_subject']		= 	"Lesson Learned Activation (NO REPLY)";

/**
*	user_m
*	@param email_to
*	@param password_recovery
*	@param password_change
*	@param tabel_header
*/
	$lang['user_m_message_1']		= 	'Welcome to Lesson Lerned! \n\n';
	$lang['user_m_message_2']		= 	"Your username:";
	$lang['user_m_message_3']		= 	"Your password:";
	$lang['user_m_subject_4']		= 	"We appreciate your enthusiasam for learning. we just need you to follow the nest link to activate your account \n\n";

	$lang['user_m_recovery_message'] = ", we got a request for a password recovery linked with this e-mail adress \n 
		if this isn't you please ignore this email. Otherwise follow the next link to change your password for you account.\n\n";

	$lang['user_m_pass_change_message_1']		= 	'You have succesfully changed your password \n\n ';
	$lang['user_m_pass_change_message_2']		= 	"Your password:";
	$lang['user_m_pass_change_message_3']		= 	"Password has succesfully been changed, and you can now log in.\n\n";
	$lang['user_m_pass_change_subject_4']		= 	"LessonLearned Team";

	$lang['user_m_table_username']		= "Username";
	$lang['user_m_table_first_name']	= "First name";
	$lang['user_m_table_last_name']		= "Last name";
	$lang['user_m_table_email']			= "Email";
	$lang['user_m_table_status']		= "Status";
	$lang['user_m_table_active']		= "Active";
	

//  <?php  echo $this->lang->line('main_first_item_icon');  ?>