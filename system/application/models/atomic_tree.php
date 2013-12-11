<?php

class Atomic_Tree extends Model {
	
	public $layout;
	private $deep;
	
	function __construct() {
		parent::Model();
		$this->load->database();
		$this->layout = array();
	}
	
	
	function getChilds($data) {
		return  $this->build_tree(array(), $this->findIdByParam($data), -1, $data);
	}
	
	private function findIdByParam($data) {
		if (!isset($data['parent_by'])) {
			$data['parent_by'] = 'object_label';
		}
		$this->db->select('id');
		$this->db->where($data['parent_by'], $data['parent_node']);
		if (isset($data['parent_type'])) {
			$this->db->where('object_type', $data['parent_type']);
		}
		$query = $this->db->get('__structure');
		if ($query->num_rows() == 0) {
			return false;
		}
		return $query->row()->id;
	}
	
	
	private function build_tree($tree=array(), $parentID, $level, $data) {
		if ((empty($data['tree']) || $data['tree'] != true) && $level >= 0) {
			return $tree;
		}
		if (isset($data['child_type'])) {
			$this->db->where('object_type', $data['child_type']);
		}
		$this->db->where('parent_id',$parentID);
		$this->db->order_by('object_sort', 'asc');
		$query = $this->db->get('__structure');	
		$level += 1;
		foreach ($query->result() as $row) {
			$row->level = $level;
			$tree[] = $row;
			$tree = $this->build_tree($tree, $row->id, $level, $data);
		}
		return $tree;
	}

	
	function getParent($data) {
		if (!isset($data['parent_by'])) {
			$data['parent_by'] = 'object_label';
		}
		$this->db->select('parent_id');
		$this->db->where($data['parent_by'], $data['parent_node']);
		$query = $this->db->get('__structure');
		$this->db->where('id', $query->row()->parent_id);
		$query = $this->db->get('__structure');
		return $query->row();
	}
	
	function hasSubNodes($data) {
		$id = $this->findIdByParam($data);
		$this->db->where('parent_id', $id);
		return $this->db->count_all_results('__structure');
	}
	
	function getObjects($data) {
		if (!isset($data['parent_by'])) {
			$data['parent_by'] = 'object_label';
		}
		$this->db->where($data['parent_by'], $data['parent_node']);
		$total = $this->db->count_all_results('__structure');
		$this->db->where($data['parent_by'], $data['parent_node']);
		if (isset($data['object_type'])) {
			$this->db->where('object_type', $data['object_type']);
		}
		if (isset($data['page'])) {
			$objects = $this->db->get('__structure', $data['per_page'], $data['page']*$data['per_page']);	
		} else {
			$objects = $this->db->get('__structure');
		}
		$arr = array();
		foreach ($objects->result() as $row) {
			$this->db->where($row->object_type.'_id', $row->object_id);
			$final = (array)$this->db->get($row->object_type)->row();
			foreach ($final as &$node) {
				$node = stripslashes(str_replace('\\n', '', $node));
			}
			$final = array_merge($final, (array)$row);
			$arr[] = $final;
		}
		return array($arr, $total);
	}
}

?>