<?php // echo $this->lang->line('main_first_item_icon');  ?>
<?php
/******************************************************************** 
*	Description: Leeson language files
*********************************************************************
*/
$lang[''] ='';
/*--- developer-course ----*/
	$lang['dev_less_submit_title'] 				= "Submit a lesson for reviews";
	$lang['dev_less_submit_p1'] 				= "If you are done creating and editing your lesson and want to send it to the administrator team for a review use the following form.";
	$lang['dev_less_submit_p2'] 				= "You will need to write a message about your work( whats its about, what changes did you do, and whats the lesson supposed to teach the users.) ";
	$lang['dev_less_submit_p3'] 				= "If the Admintration team find errors they will send you a notification about the changes that you will need to make before the lesson goes live.";
	$lang['dev_less_submit_mess'] 				= "Message:";
/*--- user/_Layout_lesson ----*/
	$lang['lessons_user_author'] 		= 'Authored by ';
	$lang['lessons_user_on'] 			= 'on';
	$lang['lessons_user_lesson'] 		= "Lessons";
	$lang['lessons_user_disscussion']	= "Discussions";
/*--- Main_lesson_view_list  (BUGFIX check session('error'))---*/
	$lang['lessons_view_lesson'] 		= 'View a Lesson: ';
	//other header files are located in the default language files
	$lang['lessons_table_lesson_name'] 	= "Lesson name";
	$lang['lessons_btn_new'] 			= "New Lesson";
/*--- Main_lesson_view_list  ---*/

/*--- main_lesson_order  ---*/
	$lang['lessons_title'] 			= "Title: ";
	$lang['lessons_slug'] 			= "Slug: ";
	$lang['lessons_lesson_list'] 	= "Lesson list";
	$lang['lessons_lesson_list_editing'] 	= "Lesson editing:"; 
	/*--- Mini 404 page (BUGFIX session error message) ---*/
		$lang['404'] 			= "404";
		$lang['404_desc'] 		="Page not found";
		$lang['404_paragraph'] 	="The page you are looking for doesn't exit.<br /> Maybe you have miss typed the  URL OR the link has expired and deleted <br /><br /> ";
		$lang['404_url'] 		="Please follow the next link to the  <a class=\"color-green bold\" href=\"".site_url('en/home')."\">Home</a> page";
	/*--- Mini 404 page  ---*/
/*--- main_lesson_order  ---*/
/*--- main_lesson_create_form  (BUGFIX session error message)---*/
	$lang['lesson_edit_lesson'] 				= "Edit lesson: ";
	$lang['lesson_create_lesson'] 				= "Create lesson: ";
	$lang['lesson_lesson_name'] 				= "Lesson name";
	$lang['lesson_lesson_name_placeholder'] 	= "Lesson name";
	$lang['lesson_lesson_slug'] 				= "Lesson slug";
	$lang['lesson_lesson_slug_placeholder'] 	= "Lesson slug";
	$lang['lesson_lesson_language']			 	= "Language";
/*--- main_lesson_create_form  ---*/	
/*------------------ COMBINATION  ----------------------*/
		//======== List of php files that use these parameters ========
		//---- ----- main_lesson_course_select 	----- ----- ----- ----- 
		//---- ----- main_lesson_course_list  	----- ----- ----- -----
		//---- ----- main_lesson_cat_select 	----- ----- ----- -----
		//---- ----- main_lesson_cat_list		----- ----- ----- -----
		//---- ----- main_lesson_active			----- ----- ----- -----
		//=============================================================
	  //----   Titles    -----//
		$lang['lesson_select_course'] 			= "Select a course from the list: ";
		$lang['lesson_selected_course'] 		= "Selected course: ";
		$lang['lesson_selected_category'] 		= "Select a category: ";
		$lang['lesson_selected_category'] 		= "Selected category:";
		$lang['lesson_activation'] 				= "Lesson activation";
	  //----   Titles    -----//
	$lang['lesson_table_category'] 				= "Category";
	$lang['lesson_table_course'] 				= "Course";
	$lang['lesson_table_lesson'] 				= "Lesson";
	$lang['lesson_table_total'] 				= "Total";
	$lang['lesson_btn_new_course'] 				= "New Course";
	$lang['lesson_btn_new_category'] 			= "New category";
/*------------------ COMBINATION  ----------------------*/


/*--- main_lesson_block_order  (bugfix THE $MAIN_LINKS)---*/
	$lang['lesson_order'] 					= "Order:  ";
	$lang['lesson_order_instructions'] 		= "Just drag and drop block in the order you would like.<br /> Database update is automatic.";
	$lang['lesson_btn_save_exit'] 			= "Save and exit";
	$lang['lesson_create_lesson'] 			= "Create lesson: ";
	$lang['lesson_order_blocks'] 			= "Order blocks ";
/*--- main_lesson_block_order  ---*/

/*--- 
	|============== All files that use these language parameters =====================
	|----- main_block_create  
	|----- main_block_edit
	|---*/
	$lang['block_editor'] 				= "Blok editor:";
	$lang['block_new'] 					= "New Block  ";
	$lang['block_edit'] 				= "Block editor  ";
	$lang['block_create_information'] 	= "All of the fields are optional, and you can use as meni blocks as you want in a lection. ";
	$lang['block_title'] 				= "Title";
	$lang['block_placeholder_title'] 	= "Block title";
	$lang['block_des']					= "Description";
	$lang['block_placeholder_desc'] 	= "Main topic of this block";
	$lang['block_note']					= "Note";
	$lang['block_placeholder_note'] 	= "Things to watch out for (Tips/Tricks)";
	$lang['block_video']				= "Video URL"; 					
	$lang['block_video_placeholder']	= "The full video embeded link"; 
	$lang['block_code']					= "Code";
	$lang['block_placeholder_code'] 	= "Code for this segment";
	$lang['block_output']				= "Output";
	$lang['block_placeholder_output'] 	= "Code results";
/*-------------------------------------------------------------------------------*/
/*|============== Comments views =====================*/	
	//========== NO valid comment found screen =======
		$lang['comment_404'] 				= "404";
		$lang['comment_not_found'] 			= "Comment page not found";
		$lang['comment_exipired'] 			= "The page you are looking for doesn't exit. <br /> Maybe you have misstyped the  URL or the link has expired and deleted <br /><br /> ";
		$lang['comment_no_comment'] 		= "No comments in this disscussion.";
	//========== NO valid comment found screen =======
	$lang['comment_btn_new_discussion'] 	= "New discussion";
	$lang['comment_your_c'] 				= "Your comment: ";
	$lang['comment_comment_placeholder'] 	= "What do you want to talk about, have any questions?";
	$lang['comment_ago'] 					= "ago"; //Ne treba nista za serb
	$lang['comment_created_thread'] 		= "created a thread";
	$lang['comment_comments'] 				= "comments";
	$lang['comment_reply'] 					= "Reply :";
	$lang['comment_edit'] 					= " Edit your comment: ";
/*|============== Comments views =====================*/	
/*--- 
|============== MODEL:Block_m All these functions use these language parameters =====================
	| 
	|
	|---*/
	//---- block_format()
	$lang['block_m_format_no_block'] 	= "There are no blocks in this lesson.";
	$lang['block_m_add_new'] 			= "Add a new block. ";
	$lang['block_m_format_start'] 		= "Start creating be clicking the link below.";

	$lang['block_m_format_number'] 		= "Block number: ";
	$lang['block_m_format_order'] 		= "Order number: ";
	$lang['block_m_format_note'] 		= "Note: ";
	$lang['block_m_format_output'] 		= "Output Format";
	$lang['block_m_edit_block'] 		= "Edit block";
	
/*--- 
	|============== MODEL: Lesson_m All these functions use these language parameters =====================
	| 
	|
	|---*/
	//---- tabel_header()
	$lang['lesson_m_table_category'] 	= "Category";
	$lang['lesson_m_table_course'] 		= "Course";
	$lang['lesson_m_table_lesson'] 		= "Lesson";
	$lang['block_m_table_modified'] 	= "Modified";
	$lang['block_m_table_active'] 		= "Active";
	$lang['block_m_table_tools'] 		= "Tools";
	$lang['block_m_table_approve'] 		= "Approve";

	$lang['block_m_table_category'] 	= "Note: ";
	$lang['block_m_format_output'] 		= "Output Format";
	$lang['block_m_edit_block'] 		= "Edit block";
	


	/** 
	*============== MODEL: difficulty_m
	*	@param  create_difficulty_links() links for table filtering
	*/	
	//---- tabel_header()
	$lang['diff_m_all'] 		= "All";
	$lang['diff_m_easy'] 		= "Easy";
	$lang['diff_m_medium'] 		= "Medium";
	$lang['diff_m_hard'] 		= "Hard";

	$lang['diff_m_all_slug'] 		= "all";
	$lang['diff_m_easy_slug'] 		= "easy";
	$lang['diff_m_medium_slug'] 	= "medium";
	$lang['diff_m_hard_slug'] 		= "hard";



//<?php  echo $this->lang->line('main_first_item_icon');  ?>