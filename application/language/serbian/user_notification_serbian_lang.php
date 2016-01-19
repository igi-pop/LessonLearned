<?php // echo $this->lang->line('main_first_item_icon');  ?>
<?php
/******************************************************************** 
*	Description: Notification language files
*********************************************************************	
*/
$lang[''] ='';

/*---  Notification tab in the navigation menu  ---*/
	$lang['Notification_title'] 	= 'Obaveštenja';// used also in the main screen for the title
	$lang['right_link']				= 'Nova obaveštenja';
	$lang['view_link'] 				= 'Pogledaj sve';
	$lang['no_notifications']		= 'Nema novih obaveštenja';
	$lang['clear_notifications']	= "Očisti pregledana obaveštenja";
	/*---  In case we have some notifications ---*/
	//Titles for different kind of notifications
	$lang['note_reply'] 				= 'Odgovor';
	$lang['note_course_request']		= 'Zastev za kurs: ';
	$lang['note_lesson_request']		= 'Zahtev za lekciju: ';
	$lang['note_developer_request']		= 'Kandidat: ';

	$lang['note_status'] 			= 'Stanje: '; //Used in the main screen to show statuses of notes.
	$lang['note_sent_by'] 			= 'napravljeno od autora ';
	$lang['note_sent_dev']			= ' zahtev je poslat data ';
	$lang['note_when'] 				= ', poslato ';
	$lang['note_sent_on'] 			= 'Poslat dana ';
	$lang['note_for'] 				= ' ZA ';
	$lang['note_dev_req'] 			= ' zahtev za developera. ';
/*---  Notification tab in the navigation menu  ---*/

/*---  Main Notification screen  ---*/	
	/*----   Status  ----*/
		$lang['note_status_1']= "Nije viđeno" ;
		$lang['note_status_2']= "Viđeno" ;
		$lang['note_status_3']= "Završeno" ;
		$lang['note_status_4']= "Sve" ;
	/*----   Status  ----*/
	/*----   Reply   ----*/	
		$lang['note_type']= "Tip obaveštenja: " ;
		$lang['note_first_name']= "Ime: " ;
		$lang['note_last_name']= "Prezime:" ;
		$lang['note_sent_on']= "Poslato: " ;
	/*----   Reply      ----*/

	/*----   Developer  ----*/
		$lang['note_applicant']= "Kandidat: " ;
		//Still needs to be added for other users(admin)
	/*----   Developer  ----*/

	/*----   Sidebar-popout   ----*/
		$lang['popout_confirm_delete']	="Upravo želite da obrisete opoadatak. Ovo se ne može vratiti nazad. Da li ste sigurni?";
		$lang['popout_view_icon']		= "glyphicon glyphicon-info-sign" ;
		$lang['popout_delete_icon']		= "glyphicon glyphicon-trash" ;
		$lang['popout_view_title']		= "Pogledaj ovo obaveštenje." ;
		$lang['popout_delete_title']	= "Obriši ovo obaveštenje. " ;
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
		$lang['note_type_1']= "Zahtev za lekciju";
		$lang['note_type_2']= "Zahtev za kurs";
		$lang['note_type_3']= "Zahtev za developera";
		$lang['note_type_4']= "Odgovor ";
		$lang['note_type_default']= "Odgovor";//for now

	/**
	 *	Functions that use these parameters
	 *  @param get_by_id()  
	 */
	//(Note: These settings control the name of statuses inindividual notification sections for a full controll you need to change parameters here and below)
		$lang['note_flag_1']= "Nije viđeno";
		$lang['note_flag_2']= "Viđeno";
		$lang['note_flag_3']= "Završeno";
		$lang['note_flag_4']= "Odbačeno";
		$lang['note_flag_default']= "Nije viđeno";// for now

	/**
	 *	Functions that use these parameters
	 *  @param create_type_links()
	 *	@param record_count() //Only slug
	 *	@param fetch_limit()  //Only slug
	 */	
	//(Note: These only control the name/slug of sorting tabs)		
		$lang['note_type_slug_1']="sve";
		$lang['note_type_slug_2']="lekcija";
		$lang['note_type_slug_3']="kurs";
		$lang['note_type_slug_4']="developer";

		$lang['note_type_name_1']="Sve";
		$lang['note_type_name_2']="Zahtev za lekciju";
		$lang['note_type_name_3']="Zahtev za kurs";
		$lang['note_type_name_4']="Zahtev za developera";

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
		$lang['note_status_slug_1']="sve";
		$lang['note_status_slug_2']="nevideno";
		$lang['note_status_slug_3']="videno";
		$lang['note_status_slug_4']="zatvoreno";

		$lang['note_status_name_1']="Sve";
		$lang['note_status_name_2']="Ne viđeno";
		$lang['note_status_name_3']="Viđeno";
		$lang['note_status_name_4']="Zatvoreno";

	/**
	 *	Functions that use these parameters
  	 *  @param automatic_message()  
	 */
	//---------   Succesfull Messages    ---------

		$lang['note_success_lesson_message_1'] = "Hvala vam što ste podelili svoje znanje sa zajednicom. <br />";
		$lang['note_success_lesson_message_2'] ="Vaša lekcija je uspešno odobrena i vidljiva je za sve članove.<br /><br />";
		$lang['note_success_lesson_message_3'] ="LessonLearned tim";

		$lang['note_success_course_message_1'] = "Hvala vam što ste podelili svoje znanje sa zajednicom. <br />";
		$lang['note_success_course_message_2'] ="Vaš kur je uspešno odobren i vidljiv je za sve članove.<br /><br />";
		$lang['note_success_course_message_3'] ="LessonLearned tim";

		$lang['note_success_dev_message_1'] = "Dobrodošli!<br /><br />";
		$lang['note_success_dev_message_2'] ="Hvala vam što ste pokazali interesovanje da postanete član developer tima i podelite vaše znanje sa zajednicom.<br />";
		$lang['note_success_dev_message_3'] ="Mi vas prihvatamo sa otvorenim rukama. Slobodno koristite naš portal i ako postoje neka pitanje možete kontaktirati anš tim.<br /><br />";
		$lang['note_success_dev_message_4'] ="LessonLearned tim";
	//---------   Failed Messages        ---------
		$lang['note_fail_lesson_message_1'] ="Hvala vam što ste podelili svoje znanje sa zajednicom. <br />";
		$lang['note_fail_lesson_message_2'] ="Nažalost došlo je do problema sa vašom lekcijom. Pročitajte detalnije u poruci koju je administrtor opisao probleme sa lekciom. <br /><br />";
		$lang['note_fail_lesson_message_3'] ="";
		$lang['note_fail_lesson_message_4'] ="LessonLearned tim";

		$lang['note_fail_course_message_1'] = "Hvala vam što ste podelili svoje znanje sa zajednicom. <br />";
		$lang['note_fail_course_message_2'] ="Nažalost došlo je do problema sa sledećim kursem.Pročitajte detalnije u sledeć poruci kojoj je administrtor opisao probleme vezanim za kurs.<br /><br />";
		$lang['note_fail_course_message_3'] ="LessonLearned tim";

		$lang['note_fail_dev_message_1'] = "Dobrodošli!<br /><br />";
		$lang['note_fail_dev_message_2'] ="Nekad nećemo imati previše developera, ali nažalost potrebno je da malo više napišete o sebi.<br />";
		$lang['note_fail_dev_message_3'] ="primer. Da li imate nekog značajnog iskustva u IT oblastima, ili o čemu biste hteli da pravite lekcije-kurseve na našem portalu.<br /><br />";
		$lang['note_fail_dev_message_4'] ="LessonLearned tim";

/*---  Modifications in the model "notification_m"  ---*/


/*---  Notification single page screen  ---*/
	// (Note: the response is controlled by "note_type_XX" near line ~66)
	$lang['note_notification_type'] ="Tip obaveštenja: ";
	$lang['note_notification_type_lesson'] ="Infomarcije o lekciji: ";
	$lang['note_notification_type_course'] ="Informacije o kursu: ";
	$lang['note_author_info_title'] ="Informacije o autoru: ";
	$lang['note_request_info_title'] ="Informacije o zahtevu: ";
	$lang['note_applicant_info_title'] ="Kandidat: ";

	$lang['note_back'] ="Vrati se nazad ";
	/*---- All notification single information(some are used in the mini view "main notification screen") ----*/
		$lang['note_first_name']= "Ime: ";
		$lang['note_last_name']	= "Prezime:";
		$lang['note_username']	= "Korisničko ime: ";
		$lang['note_category']	= "Kategorija:";
		$lang['note_course']	= "Kurs:";
		$lang['note_lesson']	= "Lekcija:";
		$lang['note_published']	= "Objavljeno:";
		$lang['note_modified']	= "Izmenjeno:";
		$lang['note_approved']	= "Odobreno:";
		$lang['note_message'] 	= "Poruka: ";

		$lang['note_reply_to'] 	= "Odgovor:";
		$lang['note_subject'] 	= "Predmet: ";
		$lang['note_btn_send'] 	= "Pošalji";
		$lang['note_btn_approve'] = "Odobri";
		$lang['note_btn_deny']	= "zabrani";
		$lang['note_yes'] 		= "Da";
		$lang['note_no'] 		= "Ne";
		$lang['note_course_link'] = "Pregled kursa";
	/*---- All notification single information ----*/

	$lang['note_no_notifications'] ="Nijedno obaveštenje sa tim kriterijumom nije pronađeno.";//admin/main_notification.php
	//$lang['note_fail_lesson_message_1'] ="";
	//$lang['note_fail_lesson_message_1'] ="";

/*---  Notification single page screen  ---*/






?>