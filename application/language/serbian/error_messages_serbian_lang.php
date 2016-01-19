<?php // echo $this->lang->line('main_first_item_icon');  ?>
<?php
/******************************************************************** 
*	Description: All error messages
*********************************************************************	
*/
$lang[''] ='';
/**
---   Admin/Lesson  ---
*/
	//------------ flash errors --------------------
	$lang['error_flash_not_valid'] 		= "Notifikacija: Nije ispravna lekcija.";
	$lang['error_flash_no_permission'] 	= "Nemas ovlaštenje da izvršiš taj zadatak.";
	$lang['error_flash_no_course'] 		= "Moraš da izabereš kurs pre nego što počneš da praviš lekciju.";
	$lang['error_flash_no_lesson'] 		= "Izvini, nismo našli tu lekciju.";
	$lang['error_flash_no_lesson_in_course'] = "(Ne postoji lekcija za ovaj kurs)";
	//------------ flash success -------------------
	$lang['info_flash_add'] 	= "Uspešno ste napravili lekciju.";
	$lang['info_flash_update'] 	= "Uspešno ste izmenili lekciju.";
	$lang["info_lesson_delete_success"] = "Lekcija je uspešno obrisana."; 
	$lang['info_flash_activation'] 	= "Uspešno ste aktivirali/deaktivirali lekciju.";


	/*---  Admin/Lesson error messages  ---*/

/**
---   Course  ---
*/
	//------------ flash errors --------------------
	$lang['error_no_course_available'] 		= "Nijedan kurs nije dostupan.";
	//------------ flash success -------------------
	$lang["info_course_delete_success"] = "Kurs je uspešno obrisan."; 	
	$lang["info_course_create_success"] = "Kurs je uspešno napravljen."; 	
/**
---   Admin/block  ---
*/	/*---  Admin/block  ---*/

	//------------ flash error   -------------------
	$lang['block_error_delete_no_permit'] 	= 'Nemate pravo da obrišete ovaj blok (id = ';
	$lang['block_error_delete'] 			= 'Blok nije ispravan. Radnja se nije ivršila.';
	//------------ flash success -------------------
	$lang['block_info_update'] 		= 'Blok je uspešno izmenjen. ';
	$lang['block_info_add'] 		= 'Blok je uspešno napravljen.';
	$lang['block_info_delete'] 		= 'Obrisali ste blok.';

	/*---  Admin/block error messages  ---*/
/**
---  Admin/Category  ---
*/
	//------------ flash errors --------------------
		$lang['category_error_not_found'] 	= "Podatci nisu mogli da se pronađu.";
		$lang['error_is_unique'] 	= "%s mora da bude jedinstven";
		$lang['category_error_delete_no_permit'] 	= 'Nemate dovoljno pravo da obrišete kategoriju.';
	//------------ flash success -------------------
		$lang['catefory_info_active'] 		= "Uspešno ste aktivirali/deaktivirali.";
		$lang['catefory_info_links'] 		= "Spajanje je uspešno izvršeno.";
		$lang['category_info_delete'] 		= 'Obrisali the kategoriju.';
	/*---  Admin/Category   ---*/
/**
---  Admin/User  ---
*/
	//------------ flash errors --------------------
	$lang['user_error_not_found'] 		= "Nismo mogli da nađemo korisnika";
	$lang['user_error_email_pass'] 		= "Ta kombinacija email-a i lozinke ne postoji.";
	$lang['user_error_invalid'] 		= "Taj korisnik ne postoji.";
	$lang['user_error_no_permisssion'] 	= "Nemate pravo za brisanje korisnika ili taj korisnik ima isti status kao vi.";
	$lang['error_profile_avatar_upload']= "Molimo vas da prvo izaberete sliku pre nego što pokušate da je postavite.";
	$lang['user_infor_success_delete'] 	= 'The user has successfully been deleted.';
	/*--- User_m function: email_to error messages  ---*/
		$lang['user_m_error_not_sent'] 	= "Izvini nismo mogli da pošaljemo email...";

	
	$lang['profile_error_current_pass'] 	= "Trenutna lozinka nije tačna.";
	$lang['profile_info_updated'] 			= "Tvoj profil je uspešno izmenjen.";
	$lang['profile_info_pass_updated'] 		= "Lozinka je uspešno promenjena.";

	$lang['home_error_captcha'] 			= "Ne ispravna capča kod, molim vas pokušajte ponovo.";
	/*---  Admin/Category   ---*/
/**
---  Notification error messages  ---
*/
/*---  Not found table messages  ---*/
	$lang['note_error_no_permission'] 	= 'Notifikacija je ne postojeća ili vi nemate pravo da prikažete tu notifikaciju';
	// Used in admin/main_notification.php to dispaly a information message when no notifications are found
	$lang['note_no_notifications'] 	= "Nismo našli nijednu notifikacviju sa tim kriterijumom.";
	$lang['lesson_no_lessons'] 		= "Nijedna lekcija nije dostupna.";
	$lang['lesson_no_courses'] 		= "Nijedan kurs nije dostupan.";
	$lang['course_no_courses'] 		= "Nismo mogli da nađemo nijedan kurs.";
	$lang['category_no_category']	= "Nismo mogli da nađemo nijednu kategoriju.";
	$lang['category_no_cat_exist']	= "Nijedna kategorija ne postoji.";
	$lang['category_no_links']		= "Nijedna veza između kategorije ne postoji.";
	$lang['user_no_users']			= "Nismo mogli da pronađemo korisnike.";
	$lang['info_seen_notif_del'] 	= "Sve pregledane notifikacije su uklonjene."; 		
/*---  Notification error messages   ---*/


//$this->form_validation->set_message('_unique_email', $this->lang->line('error_is_unique'));
//<?php  echo $this->lang->line('main_first_item_icon');  ?>