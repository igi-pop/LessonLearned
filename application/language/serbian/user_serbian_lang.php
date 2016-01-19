<?php 
/******************************************************************** 
*	Description: Category language files
*********************************************************************
*/


/*--- 
	 --------- edit
 ---*/
 	$lang['user_new'] 				= "Napravi novog korisnika";
 	$lang['user_edit'] 				= "Izmeni korisnika ";
	$lang['user_username'] 			= "Korisničko ime";
	$lang['user_firstname'] 		= "Ime";
	$lang['user_lastname'] 			= "Prezime";
	$lang['user_email'] 			= "E-mail";
	$lang['user_password'] 			= "Lozinka";
	$lang['user_pass_conf'] 		= "Potvrdi lozinku ";

	$lang['user_personal'] 			= "Lične informacije";
	$lang['user_country'] 			= "Država";
	$lang['user_city'] 				= "Grad";
	$lang['user_sele_priv_1'] 		= "Korisnik";
	$lang['user_sele_priv_2'] 		= "Programer";
	$lang['user_sele_priv_3'] 		= "Administrator";


	$lang['user_user']				="Korisnici";

 	$lang['user_btn_new'] 			= "Dodaj korisnika";
	$lang['user_search']			= "Šta tražimo?";
	$lang['user_filter']			= "Pretraži";
	$lang['user_status'] 			= "Status";
	$lang['user_courses'] 			= "Kursevi";
	$lang['user_active'] 			= "Aktivnost";
	$lang['user_permit'] 			= "Promena statusa";
	

/*--- Dashboard ---*/
	$lang['dashboard_title'] 		= "Administratorska tabla";
	//============================ User section ============================ 
	$lang['dashboard_user_title'] 	= "Kontrola korisnika";
	$lang['dashboard_user_create'] 	= " Napravi novog korisnika";
	$lang['dashboard_user_list'] 	= " Lista korisnika";
	$lang['dashboard_user_edit'] 	= " Izmena korisnika";
	$lang['dashboard_user_delete'] 	= " Brisanje korisnika";
	$lang['dashboard_user_dev'] 	= " Zahtevi za programere";

	$lang['dashboard_user_create_d'] 	= " (Napravi novog korisnika, automatski ga postavlja kao aktivnog člana) ";
	$lang['dashboard_user_list_d'] 		= " (Pregled svih korisnika u tabeli) ";
	$lang['dashboard_user_edit_d'] 		= " (Izmena korisnika zahteva da se korisnik prvo odabere iz tabele) ";
	$lang['dashboard_user_delete_d'] 	= " (Brisanje korisnika zahteva da se korisnik odabe iz tabele) ";
	$lang['dashboard_user_dev_d'] 		= " (Korisnički zahtevi za prijavljivanje kao programer na sajtu) ";
	//============================ category section ============================ 
	$lang['dashboard_category_title'] 	= "Kontrola kategorija";
	$lang['dashboard_category_create'] 	= " Nova kategorija";
	$lang['dashboard_category_list'] 	= " Lista kategorija";
	$lang['dashboard_category_edit'] 	= " Izmena kategorija";
	$lang['dashboard_category_delete'] 	= " Brisanje kategorija";
	$lang['dashboard_category_dis'] 	= " Deaktiviranje kategorija";
	$lang['dashboard_category_link'] 	= " Povezivanje kategorija";
	$lang['dashboard_category_show'] 	= " Prikaz veza";

	$lang['dashboard_category_create_d'] 	= " (Pravljenje nove kategorije) ";
	$lang['dashboard_category_list_d'] 		= " (Prikazivanje svih kategorija u tabeli) ";
	$lang['dashboard_category_edit_d'] 		= " (Kategoriju je potrebno izabrati pre nego što se može menjati sadržaj) ";
	$lang['dashboard_category_delete_d'] 	= " (Kategoriju je potrebno izabrati pre nego što se može obrisati)";
	$lang['dashboard_category_dis_d'] 		= " (Deaktivirane kategorije su vidljive samo za programere i administratore) ";
	$lang['dashboard_category_link_d'] 		= " (Poveži više sličnih kategorija) ";
	$lang['dashboard_category_show_d'] 		= " (Prikaži povezane kategorije) ";

	//============================ Course section ============================ 
	$lang['dashboard_course_title'] 	= "Kontrola kurseva";
	$lang['dashboard_course_new'] 		= " Novi kurs";
	$lang['dashboard_course_list'] 		= " Lista kurseva";
	$lang['dashboard_course_app'] 		= " Aktiviranje/Deaktiviranje kurseva ";

	$lang['dashboard_course_new_d'] 	= " (Napravi novi kurs) ";
	$lang['dashboard_course_list_d'] 	= " (Pregled svih kurseva u tabeli, povezano je sa ostalim potrebnim alatima.) ";
	$lang['dashboard_course_app_d']		= " (Sve nove kurseve je potrebno aktivirati da bi postali javni) ";

	//============================ Lesson section ============================ 
	$lang['dashboard_lesson_title'] 	= "Kontrola lekcija";
	$lang['dashboard_lesson_new'] 		= " Nova lekcija";
	$lang['dashboard_lesson_wiz'] 		= " Čarobnjak ";
	$lang['dashboard_lesson_app'] 		= " Aktiviranje/Deaktiviranje lekcija ";

	$lang['dashboard_lesson_new_d'] 	= "(Pravljenje nove lekcije, biranje kategorije i kursa je neophodno)  ";
	$lang['dashboard_lesson_list_d'] 	= "(Prvo izaberite kategoriju, potom kurs i na kraju vam se pružaju alati za izmenu lekcija.)";
	$lang['dashboard_lesson_app_d']		= "(Kada se nova lekcija napravi neophodno je da se ona proveri i aktivira)  ";
	$lang['dashboard_lesson_wiz_d']		= "(Napravi i menjaj lekcije uz pomoću čarobnjaka)  ";
/*--- DAshboard ---*/
/**
*	user_m
*	@param email_to
*/
	$lang['user_m_from']		= 	'admin@lessonlearned.com';
	$lang['user_m_from_title']	= 	"Lesson Learned automatska poruka";
	$lang['user_m_cc']			= 	"testcc@domainname.com";
	$lang['user_m_subject']		= 	"Lesson Learned aktivacija (Ne treba odgovoriti)";

/**
*	user_m
*	@param email_to
*	@param password_recovery
*	@param password_change
*	@param tabel_header
*/
	$lang['user_m_message_1']		= 	'Dobrodošli u Lesson Lerned! \n\n';
	$lang['user_m_message_2']		= 	"Vaše korisničko ime:";
	$lang['user_m_message_3']		= 	"Vaša lozinka:";
	$lang['user_m_subject_4']		= 	"Cenomo vašu želju za znanjem. Potrebno je samo da pratite sledeći link da biste aktivirali vašu email adresu. \n\n";

	$lang['user_m_recovery_message'] = ", dobili smo zahtev za resetovanje lozinke vezano sa ovom email adresom \n 
		ako vi niste zatražili zahtev, ne morate da pratite sledeći link, u suprotnom pratite sledeći link da biste promenili lozinku.\n\n";

	$lang['user_m_pass_change_message_1']		= 	'Uspešno ste promenili vašu lozinku \n\n ';
	$lang['user_m_pass_change_message_2']		= 	"Vaša lozinka:";
	$lang['user_m_pass_change_message_3']		= 	"Lozinka je uspešno promenjena i možete da pristupite sajtu.\n\n";
	$lang['user_m_pass_change_subject_4']		= 	"LessonLearned Tim";

	$lang['user_m_table_username']		= "Korisničko ime";
	$lang['user_m_table_first_name']	= "Ime";
	$lang['user_m_table_last_name']		= "Prezime";
	$lang['user_m_table_email']			= "Email";
	$lang['user_m_table_status']		= "Status";
	$lang['user_m_table_active']		= "Aktivacija";
	

//  <?php  echo $this->lang->line('main_first_item_icon');  ?>