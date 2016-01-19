<?php // echo $this->lang->line('main_first_item_icon');  ?>
<?php
/******************************************************************** 
*	Description: Leeson language files
*********************************************************************
(BUGFIX MAIN LESSON CREATE validation errors)	
*/
$lang[''] ='';
/*--- developer-course ----*/
	$lang['dev_less_submit_title'] 				= "Pošalji lekciju da se odobri";
	$lang['dev_less_submit_p1'] 				= "Ako ste završili lekciju i želite da pošaljete administratorima na pregled upotrebite ovu formu";
	$lang['dev_less_submit_p2'] 				= "Morate da napišete poruku o lekciji što želite da postavite(O čemu se radi, ako je već bila postavljena koje ste izmene uradili, i šta bi lekcija trebala da nauči korisnike).";
	$lang['dev_less_submit_p3'] 				= "Ako administrator pronađe greške obavestiće vas notifikacijama i napomenuti šta bi trebalo da se promeni pre nego što lekcija postane javna.";
	$lang['dev_less_submit_mess'] 				= "Poruka:";
/*--- user/_Layout_lesson ----*/
	$lang['lessons_user_author'] 		= 'Author je ';
	$lang['lessons_user_on'] 			= ' napravljeno ';
	$lang['lessons_user_lesson'] 		= "Lekcije";
	$lang['lessons_user_disscussion']	= "Diskusija";
/*--- Main_lesson_view_list  (BUGFIX check session('error'))---*/
	$lang['lessons_view_lesson'] 		= 'Pogledaj lekciju lekciju: ';
	//other header files are located in the default language files
	$lang['lessons_table_lesson_name'] 	= "Ime lekcije";
	$lang['lessons_btn_new'] 			= "Nova lekcija";
/*--- Main_lesson_view_list  ---*/

/*--- main_lesson_order  ---*/
	$lang['lessons_title'] 			= "Naslov: ";
	$lang['lessons_slug'] 			= "Pečat: ";
	$lang['lessons_lesson_list'] 	= "Lista lekcija";
	$lang['lessons_lesson_list_editing'] 	= "Izmene kod lekcije:"; 
	/*--- Mini 404 page (BUGFIX session error message) ---*/
		$lang['404'] 			= "404";
		$lang['404_desc'] 		= "Stranica nije nađena";
		$lang['404_paragraph'] 	= "Stranica koju tražite ne postoji.<br /> Možda ste pogrešno ukucali URL adresu ili je stranica istekla i obrisana.<br /><br /> ";
		$lang['404_url'] 		= "Molim vas vratite se na prethodnu stranicu ili na početnu stranu.  <a class=\"color-green bold\" href=\"".site_url('en/home')."\">Početna</a> page";
	/*--- Mini 404 page  ---*/
/*--- main_lesson_order  ---*/
/*--- main_lesson_create_form  (BUGFIX session error message)---*/
	$lang['lesson_edit_lesson'] 				= "Izmeni lekciju: ";
	$lang['lesson_create_lesson'] 				= "Napravi lekciju: ";
	$lang['lesson_lesson_name'] 				= "Ime lekcije";
	$lang['lesson_lesson_name_placeholder'] 	= "Ime lekcije";
	$lang['lesson_lesson_slug'] 				= "Pečat lekcije";
	$lang['lesson_lesson_slug_placeholder'] 	= "Pečat lekcije";
	$lang['lesson_lesson_language']			 	= "Jezik";
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
		$lang['lesson_select_course'] 			= "Izaberi kurs iz liste: ";
		$lang['lesson_selected_course'] 		= "Izabrani kurs: ";
		$lang['lesson_selected_category'] 		= "Izaberi kategoriju: ";
		$lang['lesson_selected_category'] 		= "Izabrana kategorija:";
		$lang['lesson_activation'] 				= "Aktivacija lekcije";
	  //----   Titles    -----//
	$lang['lesson_table_category'] 				= "Kategorija";
	$lang['lesson_table_course'] 				= "Kurs";
	$lang['lesson_table_lesson'] 				= "Lekcija";
	$lang['lesson_table_total'] 				= "Ukupno";
	$lang['lesson_btn_new_course'] 				= "Novi kurs";
	$lang['lesson_btn_new_category'] 			= "Nova kategorija";
/*------------------ COMBINATION  ----------------------*/


/*--- main_lesson_block_order  (bugfix THE $MAIN_LINKS)---*/
	$lang['lesson_order'] 					= "Redosled:  ";
	$lang['lesson_order_instructions'] 		= "Samo povuci i premesti blokove po redosledu koji želite.<br /> Baza podataka će se automatski sačuvati.";
	$lang['lesson_btn_save_exit'] 			= " Sačuvaj i izađi";
	$lang['lesson_create_lesson'] 			= "Napravi lekciju: ";
	$lang['lesson_order_blocks'] 			= "Redosled blokova ";
/*--- main_lesson_block_order  ---*/

/*--- 
	|============== All files that use these language parameters =====================
	|----- main_block_create  
	|----- main_block_edit
	|---*/
	$lang['block_editor'] 				= "Blok editor:";
	$lang['block_new'] 					= "Novi blok  ";
	$lang['block_edit'] 				= "Blok editor  ";
	$lang['block_create_information'] 	= "Sva polja su opciona i možete ih proizvoljno koristiti kako vam najviše odgovara. Kombinaciom više različitih blokova možete postići željeni format lekcije.";
	$lang['block_title'] 				= "Naslov";
	$lang['block_placeholder_title'] 	= "Naslov bloka";
	$lang['block_des']					= "Opis";
	$lang['block_placeholder_desc'] 	= "Glavna tema u ovom bloku";
	$lang['block_note']					= "Beleška ";
	$lang['block_placeholder_note'] 	= "stvari na koje treba paziti(Savet/Trik)";
	$lang['block_video']				= "Video URL"; 					 
	$lang['block_video_placeholder']	= "Cela putanja do video snimka"; 
	$lang['block_code']					= "Kod";
	$lang['block_placeholder_code'] 	= "Kod za ovaj segment";
	$lang['block_output']				= "Ispis koda";
	$lang['block_placeholder_output'] 	= "Rezultat koda";
/*-------------------------------------------------------------------------------*/
/*|============== Comments views =====================*/	//NEW
	//========== NO valid comment found screen =======
		$lang['comment_404'] 				= "404";
		$lang['comment_not_found'] 			= "Stranica komentara nije nađena";
		$lang['comment_exipired'] 			= "Stranica koju tražite ne postoji <br />Možda ste pogrešno ukucali URL ili je stranica promenjna i obrisana <br /><br /> ";
		$lang['comment_no_comment'] 		= "Nema komentara u ovoj lekciji.";
	//========== NO valid comment found screen =======
	$lang['comment_btn_new_discussion'] 	= "Nova priča";
	$lang['comment_your_c'] 				= "Tvoj komentar: ";
	$lang['comment_comment_placeholder'] 	= "O čemu želiš da razgovaraš ili imaš neko pitanje?";
	$lang['comment_ago'] 					= ""; //Ne treba nista za serb
	$lang['comment_created_thread'] 		= "napravio niz";
	$lang['comment_comments'] 				= "komentari";
	$lang['comment_reply'] 					= "Odgovor :";
	$lang['comment_edit'] 					= " Izmeni svoj komentar: ";
/*|============== Comments views =====================*/	

/*--- 
	|============== MODEL:Block_m All these functions use these language parameters =====================
	| 
	|
	|---*/
	//---- block_format()
	$lang['block_m_format_no_block'] 	= "Nema ni jedan blok u ovoj lekcije.";
	$lang['block_m_add_new'] 			= "Dodaj novi blok. ";
	$lang['block_m_format_start'] 		= "Počni da praviš tako što ćes kliknuti na link ispod.";

	$lang['block_m_format_number'] 		= "Broj bloka: ";
	$lang['block_m_format_order'] 		= "Redosled bloka: ";
	$lang['block_m_format_note'] 		= "Beleška: ";
	$lang['block_m_format_output'] 		= "Ispis koda";
	$lang['block_m_edit_block'] 		= "Izmeni blok";
	
/*--- 
	|============== MODEL: Lesson_m All these functions use these language parameters =====================
	| 
	|
	|---*/
	//---- tabel_header()
	$lang['lesson_m_table_category'] 	= "Kategorija";
	$lang['lesson_m_table_course'] 		= "Kurs";
	$lang['lesson_m_table_lesson'] 		= "Lekcija";
	$lang['block_m_table_modified'] 	= "Prepravljeno";
	$lang['block_m_table_active'] 		= "aktivno";
	$lang['block_m_table_tools'] 		= "Alati";
	$lang['block_m_table_approve'] 		= "Odobreno";

	$lang['block_m_table_category'] 	= "Beleška: ";
	$lang['block_m_format_output'] 		= "Ispis koda";
	$lang['block_m_edit_block'] 		= "Izmeni blok";
	


	/** 
	*============== MODEL: difficulty_m
	*	@param  create_difficulty_links() links for table filtering
	*/	
	//---- tabel_header()
	$lang['diff_m_all'] 		= "Sve";
	$lang['diff_m_easy'] 		= "Jednostavno";
	$lang['diff_m_medium'] 		= "Umereno";
	$lang['diff_m_hard'] 		= "Napredno";

	$lang['diff_m_all_slug'] 		= "sve";
	$lang['diff_m_easy_slug'] 		= "jednostavno";
	$lang['diff_m_medium_slug'] 	= "umereno";
	$lang['diff_m_hard_slug'] 		= "napredno";



//<?php  echo $this->lang->line('main_first_item_icon');  ?>