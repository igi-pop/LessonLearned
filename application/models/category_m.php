<?php
class Category_m extends MY_Model{

	protected $_table_name = 'category';
	protected $_order_by = 'category_name asc, category_id desc';
	protected $_timestamps = FALSE;
	protected $_primary_key= 'category_id';
	//Default rules for inserting/updating categories
	public $rules = array( 
		'category_name' => array(
			'field' => 'category_name', 
			'label' => 'Category name', 
			'rules' => 'trim|required|xss_clean'
		), 
		'cat_slug' => array(
			'field' => 'cat_slug', 
			'label' => 'Slug', 
			'rules' => 'trim|required|url_title|xss_clean'
		), 
		'description' => array(
			'field' => 'description', 
			'label' => 'description', 
			'rules' => 'trim|required'
		),
	);

	/**
	 *	Deescription: Get all category data
	 */
	public function get_all(){
		$categories=$this->get();
		return ($categories);
	}
	/**
	 *	Deescription: Get all category data
	 */
	public function get_all_approved(){
		$this->db->where('approved', '1');
		$this->db->or_where('approved', 1);
		$categories=$this->get();
		return ($categories);
	}
	// Description: Creates new user object
	public function get_new(){
		$category = new stdClass();
		$category->category_name = '';
		$category->cat_slug = '';
		$category->description = '';
		$category->description_sr = '';
		$category->pub_date = '';
		$category->image = '';

		return $category;
		}

	/**
	*	Description: Get categories by slug, administration function take into acount non activated categories
	 *	@param string 	$Slug(unique category slug)
	 * 	@param boolean 	admin(If its true it willtake only activated)
	 *
	 *	@return Object or False
	 */
	public function get_by_slug($slug=NULL, $active=true){
		if($active==true){
		if( $slug!=NULL){	
			$category = $this->get_by(array(
				'cat_slug' => $slug,
				'approved' => '1',
			), TRUE);
			return($category);
		}
		return false;
		}
		else{
			if( $slug!=NULL){	
			$category = $this->get_by(array(
				'cat_slug' => $slug,
				
			), TRUE);
			return($category);
		}
		return false;
		}
		
		}
	
	/**
	 *	Description: Gets categories by its main id, can be approved or not-approved
	 *	
	 * 	@param int 		$id (Category id)
	 * 	@param boolean 	@approved (If we ant the result to be approved only or not)
	 *
	 *	@return Object/False
	 */
	public function get_by_id($id=NULL, $approved=true){
		if( $id!=NULL){	
			if($approved == true)
			$category = $this->get_by(array(
				'category_id' => $id,
				'approved' => '1',
			), TRUE);
			else
			$category = $this->get_by(array(
				'category_id' => $id,
			), TRUE);
			return($category);
		}
		return false;	
	}
	public function sort_related($category_id, $language){
		$this->load->model('cat_link_m');
		//retrives an raay of objects that are linked to this category
		$links=$this->cat_link_m->get_links($category_id);
		foreach($links as $key=>$link){
			if($link->course_main == $category_id AND $link->course_second != $category_id){
				$this->db->select('category_id, cat_slug, category_name, image');
				$this->db->where('category_id', $link->course_second);
				$links[$key]=$this->db->get('category')->row();
				$links[$key]->url= base_url().$language."/user/course/select/".$links[$key]->cat_slug;
				//$links[$key]=$this->get(NULL, false);
			}
			elseif($link->course_second == $category_id AND $link->course_main != $category_id)
			{
				$this->db->select('category_id, cat_slug, category_name, image');
				$this->db->where('category_id', $link->course_main);
				$links[$key]=$this->db->get('category')->row();
				$links[$key]->url= base_url().$language."/user/course/select/".$links[$key]->cat_slug;
			}
			else{}
			
			
		}
	return($links);
	}
	/**
	*	Descripition: GEt a list of all categories with some extra informatio (Created connected links,counting categories etc)
	 *	@param Arrray of objects 	$category_data (Data related to a single category)
	 *	@param boolean $dev (Devideds the user and developer versions)
 	 * 	@param string $language (What will the language linking be (default="en", serbian="sr"))
	 * 	@return Array of Objects
	 */
    public function create_category_list($category_data, $dev=false, $language="en"){
	 	$this->load->model('user_m');
	 	$this->load->model('difficulty_m');
		$this->load->model('cat_link_m');

		
	 	$item='';
	   	$base_url = base_url() . $language."/user/course/lesson";
	   	$i=0;
	   	if($category_data !=NULL) :
	   		foreach($category_data as $category): 
	   	if($dev==true){
   		$author_courses=$this->course_m->get_all_by_author($category->category_id, $this->session->userdata['id']);
   		$number_active=$this->course_m->count_active($category->category_id, $this->session->userdata('id'));
   		$number_non_active=$this->course_m->count_non_active($category->category_id, $this->session->userdata('id'));
   		}else{
   		$author_courses=$this->course_m->get_all_by_author($category->category_id, $this->session->userdata['id']);
   		$number_active=$this->course_m->count_active($category->category_id);
   		$number_non_active=$this->course_m->count_non_active($category->category_id);
   		}
   		$data[$i]['image']= $this->image_path($category->image);


   		//Developer branching
   		if($dev == false){
   			$data[$i]['url']= base_url().$language."/user/course/select/".$category->cat_slug;}
   		else{
   			$data[$i]['url']= base_url().$language."/developer/course/select/".$category->cat_slug;}
   		$data[$i]['category_id']=$category->category_id;
   		$data[$i]['category_name']=$category->category_name;
   		$data[$i]['cat_slug']=$category->cat_slug;
   		$data[$i]['active']=$number_active;
   		$data[$i]['non_active']=$number_non_active;
   		$data[$i]['description']=$category->description;
   		$data[$i]['description_sr']=$category->description_sr;
   		$data[$i]['related']=$this->sort_related($category->category_id, $language);
   		$j=0;
   		if($author_courses ){
   			foreach($author_courses as $co){
   		$data[$i]['course_id'][$j]=$co->course_id;
   		$data[$i]['course_title'][$j]=$co->title;
   		$j++;}
	   	}
	    
		$i++;
		 endforeach; endif;
		return( $data);
	}

	/**
	*	Description: Takes and Absolute image path given when the image is uploaded and converts it into a relative path
	 *	@param string $image(Absolute image path)
	 * 
	 *	@return string (Relative image path)
	 */
	public function image_path($image){
		$i=3; 
	    $string='';
		$link_part=explode("/", $image);
	    while(isset($link_part[$i])){
	        $string .='/'.$link_part[$i];
	        $i++;
	     }
	     $string='http://localhost/'.$string;
	     return($string);
	}

	/**
	 *	Description: sorting categories
	 */
	public function sort_linked($object, $id){
		$i=0;
		$item='';	
		foreach($object as $link){
			if($link->course_main == $id){
				$item[$i]=$link->course_second;
			} else{
				$item[$i]=$link->course_main;
			}$i++;
		}return($item);
	}
	/**
	*	Description: Creating a table heaqder for administrator table(links can be ordered, and there is also a search)
	 *	@param string $order (orderg by columns)
	 *	@param string $type (what tupe of ordering you wnat "ascending"/"descending")
	 *	@param int $page (pagination of the page)
	 *	@param string $match (Search variable) 
	 *
	 *	@return string
	 */
	public function tabel_header($order='category', $type='asc', $page=0, $match='-', $language="en"){	
		$links='';
		$cat_order='';
		$fn_order='';
		$ln_order='';
		$cor_order='';
		$les_order='';
		$mod_order='';
		$act_order='';
	
		if($type != 'asc' AND $type!='desc'){
			$type='asc';
		}
		switch($order){
			case 'category':
			$cat_order='active';
			break;
			case 'slug':
			$fn_order='active';
			break;
			case 'description':
			$ln_order='active';
			break;
			case 'date':
			$cor_order='active';
			break;
			case 'active':
			$les_order='active';
			break;
			
			default:
			$cat_order='active';
			break;
		}
		$page = ($this->uri->segment(7)) ? $this->uri->segment(7) : 0;

		$links.="<tr class=\"center\">";
		$links.="<th class=\"center\">".$this->lang->line('category_table_icon')."</th>";
		$links.= "<th class=\"center\"><a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/category/order/category/".$type."/".$page."/".$match."/\" >".$this->lang->line('category_table_name')."</a> ";
		if($cat_order !=''){
			if($type=='desc'){
				$links.="&nbsp;<a class=\" dark-limegreen-link\" class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/category/order/".$order."/asc/".$page."/".$match."/\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-down\"></i>";
				$links.="	</a>";
			}else{
				$links.="&nbsp;<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/category/order/".$order."/desc/".$page."/".$match."/\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-up\"></i>";
			$links.="</a>";
			}

		}  
		$links.= "</th>";
		
		$links.= "<th class=\"center\"><a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/category/order/slug/".$type."/".$page."/".$match."/\" class=\"\">".$this->lang->line('category_table_slug')."</a> ";
		if($fn_order !=''){
			if($type=='desc'){
				$links.="&nbsp;<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/category/order/".$order."/asc/".$page."/".$match."/\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-down\"></i>";
				$links.="	</a>";
			}else{
				$links.="&nbsp;<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/category/order/".$order."/desc/".$page."/".$match."/\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-up\"></i>";
			$links.="</a>";
			}

		}  
		$links.= "</th>";
		
		$links.= "<th class=\"center\"><a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/category/order/description/".$type."/".$page."/".$match."/\" class=\"\">".$this->lang->line('category_table_desc')."</a> ";
		if($ln_order !=''){
			if($type=='desc'){
				$links.="&nbsp;<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/category/order/".$order."/asc/".$page."/".$match."/\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-down\"></i>";
				$links.="	</a>";
			}else{
				$links.="&nbsp;<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/category/order/".$order."/desc/".$page."/".$match."/\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-up\"></i>";
			$links.="</a>";
			}

		}  
		$links.= "</th>";
		$links.= "<th class=\"center\" style=\"min-width:120px;\"><a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/category/order/date/".$type."/".$page."/".$match."/\" class=\"\">".$this->lang->line('category_table_created')."</a> ";
		if($cor_order !=''){
			if($type=='desc'){
				$links.="&nbsp;<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/category/order/".$order."/asc/".$page."/".$match."/\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-down\"></i>";
				$links.="	</a>";
			}else{
				$links.="	<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/category/order/".$order."/desc/".$page."/".$match."/\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-up\"></i>";
				$links.="</a>&nbsp;";
			}

		}  
		$links.= "</th>";
		
		$links.= "<th class=\"center\" style=\"min-width:80px;\" ><a class=\" dark-limegreen-link\" style=\"display:inline-block;\" href=\"".base_url().$language."/admin/category/order/active/".$type."/".$page."/".$match."/\" class=\"\">".$this->lang->line('active')."</a>&nbsp;";
		if($les_order !=''){
			if($type=='desc'){
				$links.="<a class=\" dark-limegreen-link\" href=\"".base_url().$language."/admin/category/order/".$order."/asc/".$page."/".$match."/\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-down\"></i>";
				$links.="	</a>";
			}else{
				$links.="<a class=\" dark-limegreen-link\" style=\"display:inline-block\" href=\"".base_url().$language."/admin/category/order/".$order."/desc/".$page."/".$match."/\" class=\"\">";
				$links.= 	"<i class=\"glyphicon glyphicon-chevron-up\"></i>";
				$links.="</a>";
			}

		}  
		$links.= "</th>";
		
		
		$links.= "<th class=\"center\">".$this->lang->line('permit')."</th>
				<th class=\"center\">".$this->lang->line('edit')."</th>
				<th class=\"center\">".$this->lang->line('delete')."</th>
			</tr>";


		return($links);
	}
}



?>