<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Locations {
	
	function Locations() {
		$this->CI = & get_instance ();
	}
	
	
	function check_country_exists($county_id){
		if ($this->CI->db->where('country_id', $county_id)->get('country')->num_rows() < 1){
			return false;
		} else {
			return true;
		}
	}
	
	function check_region_exists($county_id, $region_id){
		if ($this->CI->db->where('country_id', $county_id)->where('region_id', $region_id)->get('region')->num_rows() < 1){
			return false;
		} else {
			return true;
		}
	}
	
	function check_city_exists($county_id, $region_id, $city_id){
		if ($this->CI->db->where('country_id', $county_id)->where('region_id', $region_id)->where('city_id', $city_id)->get('city')->num_rows() < 1){
			return false;
		} else {
			return true;
		}
	}
	
	
	function get_country($id){
		return $this->CI->db->where('country_id', $id)->get('country')->row_array();
	}
	
	function get_region($id){
		return $this->CI->db->where('region_id', $id)->get('region')->row_array();
	}
	
	function get_city($id){
		return $this->CI->db->where('city_id', $id)->get('city')->row_array();
	}
}

?>