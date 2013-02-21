<?php

class Article_m extends MY_Model {
	protected $_table_name = 'articles';
	protected $_order_by = 'pubdate desc, id desc';
	protected $_timestamps = TRUE;
	
	public $rules = array(
		'pubdate' => array(
			'field' => 'pubdate', 
			'label' => 'Publication Date', 
			'rules' => 'trim|required|exact_length[10]|xss_clean'
		),
		'title' => array(
			'field' => 'title', 
			'label' => 'Title', 
			'rules' => 'trim|required|max_length[100]|xss_clean'
		),
		'slug' => array(
			'field' => 'slug', 
			'label' => 'Slug', 
			'rules' => 'trim|required|max_length[100]|url_title|xss_clean'
		),
		'body' => array(
			'field' => 'body', 
			'label' => 'Body', 
			'rules' => 'trim|required'
		)
	);	
	
	public function get_new() {
		$article = new stdClass();
		$article->title = '';
		$article->slug = '';
		$article->order = '';
		$article->body = '';
		$article->pubdate = date('Y-m-d');
		return $article;
	}
	
	public function delete($id) {
		// Delete a article
		parent::delete($id);
		
		// Reset parent ID for its children
		$this->db->set(array('parent_id' => 0))->where('parent_id', $id)->update($this->_table_name);
	}
	
}