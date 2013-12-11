<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Shops {
	
	function Shops() {
		$this->CI = & get_instance ();
	}
	
	function create() {}
	
	function edit() {}
	
	function delete($shop_id) {
		
		$data = $this->CI->db->where('shop_id', $shop_id)->get('shops')->row_array();
		
		@unlink($data['logo']);
		@unlink($data['pricelist']);
		
		$this->CI->db->where('shop_id', $shop_id)->delete('shops');
		$this->CI->db->where('shop_id', $shop_id)->delete('shops_phones');
		
		// Delete photos
		
		$data = $this->CI->db->where('shop_id', $shop_id)->get('shops_photos')->result_array();
		foreach ($data as $key => $value) {
			//@unlink();
		}
		$this->CI->db->where('shop_id', $shop_id)->delete('shops_photos');
		
		// Delete products
		$data = $this->CI->db->where('shop_id', $shop_id)->get('products')->result_array();
			// Delete photos
			foreach ($data as $key => $value) {
				//@unlink();
			}
		$this->CI->db->where('shop_id', $shop_id)->delete('products');
		
		// Delete requests
		$this->CI->db->where('shop_id', $shop_id)->delete('requests');
	}
	
	
	function get_shops(){
		return $this->CI->db->where('user_id', $this->CI->session->userdata('user_id'))->order_by('title', 'asc')->get('shops')->result_array();
	}
	
	function get_stat($shop_id){
		$temp = $this->CI->db->select('COUNT(*)')->where('shop_id', $shop_id)->get('stat_shops')->row_array();
		return $temp["COUNT(*)"];
	}
	
	function get_shop_phones($shop_id){
		return $this->CI->db->where('shop_id', $shop_id)->get('shops_phones')->result_array();
	}
	
	function get_shop_photos($shop_id){
		return $this->CI->db->where('shop_id', $shop_id)->order_by('order_num', 'asc')->get('shops_photos')->result_array();
	}
	
	
	function delete_phones($shop_id){
		$this->CI->db->where('shop_id', $shop_id)->delete('shops_phones');
	}
	
	function delete_photos($shop_id){
		$this->CI->db->where('shop_id', $shop_id)->delete('shops_photos');
		// @todo ������� ����� � �����
	}
	
	
	function insert_phones($shop_id, $phones){
		if (! empty($phones)) {
			foreach ($phones as $key=>$value) {
				if (!empty($value)) {
					$data = array (
						'shop_id'=>$shop_id,
						'phone'=>$value
					);
					$this->CI->db->insert('shops_phones', $data);
				}
			}
		}
	}
	
	function insert_photos($shop_id, $user_id, $photos, $order){
		if (! empty($photos)) {
			foreach ($photos as $key=>$value) {
				$data = array (
					'shop_id'=>$shop_id,
					'user_id'=>$user_id,
					'photo'=>$value,
					'order_num'=>$order[$key]
				);
				$this->CI->db->insert('shops_photos', $data);
			}
		}
	}
	
    function construct_address($shop)
    {
    	
		
		
    		$temp = $this->CI->db->where('country_id', $shop['loc_country'])->get('country')->row_array();
		$country = $temp['name'];
		
			$temp = $this->CI->db->where('region_id', $shop['loc_region'])->get('region')->row_array();
		$region = $temp['name'];
		
			$temp = $this->CI->db->where('city_id', $shop['loc_city'])->get('city')->row_array();
		$city = $temp['name'];
		
		$return = $country.', '.$region.', '.$city;
    
        if ($shop['type'] == 'shop_separately')
        {
        	
            if (! empty($shop['loc_street'])) $return .= ', '.$shop['loc_street'];
            if (! empty($shop['loc_house'])) $return .= ', '.$shop['loc_house'];
			if (! empty($shop['loc_fraction'])) $return .= '/'.$shop['loc_fraction'];
            if (! empty($shop['loc_floor'])) $return .= ', этаж '.$shop['loc_floor'];
            if (! empty($shop['loc_office'])) $return .= ', офис '.$shop['loc_office'];
			
        } else if ($shop['type'] == 'shop-tc')
        {
        	$parent_shop = $shop['parent_shop_id'];
			
			$temp = $this->CI->db->where('shop_id', $parent_shop)->get('shops')->row_array();
			
			if (! empty($temp['loc_ground'])) $return .= ', '.$temp['loc_ground'];
			if (! empty($temp['loc_street'])) $return .= ', '.$temp['loc_street'];
            if (! empty($temp['loc_house'])) $return .= ', '.$temp['loc_house'];
			if (! empty($temp['loc_fraction'])) $return .= '/'.$temp['loc_fraction'];
			
			
        } else if ($shop['type'] == 'internet-shop')
        {
        	
        } else if ($shop['type'] == 'personal')
        {
            if (! empty($shop['loc_street'])) $return .= ', '.$shop['loc_street'];
            if (! empty($shop['loc_house'])) $return .= ', '.$shop['loc_house'];
			if (! empty($shop['loc_fraction'])) $return .= '/'.$shop['loc_fraction'];
            if (! empty($shop['loc_floor'])) $return .= ', этаж '.$shop['loc_floor'];
            if (! empty($shop['loc_office'])) $return .= ', офис '.$shop['loc_office'];
			
        } else if ($shop['type'] == 'trade-center')
        {
        	
            if (! empty($shop['loc_street'])) $return .= ', '.$shop['loc_street'];
            if (! empty($shop['loc_house'])) $return .= ', 0'.$shop['loc_house'];
			if (! empty($shop['loc_fraction'])) $return .= '/'.$shop['loc_fraction'];
			
        }
		
		
    
		return $return;
    }
	
    function set_save_rules(){
    
        $this->CI->form_validation->set_rules('type', 'Тип магазина', 'required|callback__shops_create_typecheck');
        
		$this->CI->form_validation->set_rules('single_title', 'URL площадки', 'xss_clean|alpha_dash|required|callback__check_shop_cpu_form_val');
		$this->CI->form_validation->set_rules('info', 'Информация о магазине', 'xss_clean');
    
        $this->CI->form_validation->set_rules('country', 'Страна', 'required|callback__locations_country_check');
        $this->CI->form_validation->set_rules('region', 'Область', 'required|callback__locations_region_check');
        $this->CI->form_validation->set_rules('city', 'Город', 'required|callback__locations_city_check');
    
        $this->CI->form_validation->set_rules('email', 'E-mail', 'valid_email');
        $this->CI->form_validation->set_rules('site', 'Сайт', 'prep_url|valid_url');
        $this->CI->form_validation->set_rules('phone', '', 'xss_clean');
    	
		// Files
		$this->CI->form_validation->set_rules('logo_file', '', '');
		$this->CI->form_validation->set_rules('logo', '', 'callback__upload_logo');
		
		$this->CI->form_validation->set_rules('price_file', '', '');
		$this->CI->form_validation->set_rules('pricelist', '', 'callback__upload_price');
		
    	$this->CI->form_validation->set_rules('photos', '', '');
		$this->CI->form_validation->set_rules('photos_sort', '', '');
		
		$this->CI->form_validation->set_rules('type_shop', '', '');
		
		// Tags
		$this->CI->form_validation->set_rules('tags', '', 'xss_clean');
		
		$personal = false;
        $type = $_POST['type'];
        if ($type == 'shop'){
			
			$this->CI->form_validation->set_rules('type_shop', 'Подтип площадки', 'required');
			
			if (isset($_POST['type_shop'])) {
			
				$type_shop = $_POST['type_shop'];
				
				if ($type_shop == 'shop_separately') {
					
					$this->CI->form_validation->set_rules('shop_street', 'Улица', 'required');
		            $this->CI->form_validation->set_rules('shop_house', 'Дом', 'required');
					$this->CI->form_validation->set_rules('shop_fraction', '', '');
					$this->CI->form_validation->set_rules('shop_floor', '', '');
		            $this->CI->form_validation->set_rules('shop_office', '', '');
					$this->CI->form_validation->set_rules('shop_alternative', '', '');
					
				} else if ($type_shop == 'shop-tc') {
					
					$this->CI->form_validation->set_rules('shop_tc_trade-center', 'Торговый центр', 'required|callback__shops_check_tc');
					$this->CI->form_validation->set_rules('shop_tc_ground', '', '');
					$this->CI->form_validation->set_rules('shop_tc_street', '', '');
					$this->CI->form_validation->set_rules('shop_tc_floor', '', '');
		            $this->CI->form_validation->set_rules('shop_tc_office', '', '');
					
				}
				
			}
			
        } else if ($type == 'internet-shop') {
           
        } else if ($type == 'personal') {
           	
			$this->CI->form_validation->set_rules('pers_street', '', '');
	        $this->CI->form_validation->set_rules('pers_house', '', '');
			$this->CI->form_validation->set_rules('pers_fraction', '', '');
			$this->CI->form_validation->set_rules('pers_floor', '', '');
	        $this->CI->form_validation->set_rules('pers_office', '', '');
			$this->CI->form_validation->set_rules('pers_alternative', '', '');
			
			$this->CI->form_validation->set_rules('title', 'Имя/ник', 'xss_clean|required');
			$personal = true;
        } else if ($type == 'trade-center') {
           
		   $this->CI->form_validation->set_rules('tc_street', 'Улица', 'required');
	       $this->CI->form_validation->set_rules('tc_house', 'Дом', 'required');
		   $this->CI->form_validation->set_rules('tc_fraction', '', '');
		   
        }
		if (!$personal) { $this->CI->form_validation->set_rules('title', 'Название площадки', 'xss_clean|required'); }
    }
	
	function check_tc_exist($id) {
		$rows = $this->CI->db->where('shop_id', $id)->where('type', 'trade-center')->get('shops')->num_rows();
		if ($rows > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	function generate_shop_type($type, $type_shop){
		if ($type == 'shop'){
			if ($type_shop == 'shop_separately') {				
				return 'shop_separately';
			} else if ($type_shop == 'shop-tc') {
				return 'shop-tc';
			}
        } else if ($type == 'internet-shop') {
			return 'internet-shop';
        } else if ($type == 'personal') {
			return 'personal';
        } else if ($type == 'trade-center') {
			return 'trade-center';
        }
	}
	
	function generate_shop_type_back($type){
		if ($type == 'shop_separately') {
			return array('shop', 'shop_separately');
		} else if ($type == 'shop-tc') {
			return array('shop', 'shop-tc');
        } else if ($type == 'internet-shop') {
        	return array('internet-shop', '');
        } else if ($type == 'personal') {
        	return array('personal', '');
        } else if ($type == 'trade-center') {
        	return array('trade-center', '');
        }
	}
	
	
	function get_shop_info_ground($type, $type_shop){
		$return = false;
		if ($type == 'shop'){
			if ($type_shop == 'shop_separately') {				
				// No return
			} else if ($type_shop == 'shop-tc') {
				// No return
			}
		} else if ($type == 'internet-shop') {
			// No return	
		} else if ($type == 'personal') {
			// No return
		} else if ($type == 'trade-center') {
			$return = $this->CI->form_validation->set_value('tc_ground');
		}
		return $return;
	}
	
	
	function get_shop_info_street($type, $type_shop){
				
		$return = false;
		if ($type == 'shop'){
			if ($type_shop == 'shop_separately') {		
	
				$return = $this->CI->form_validation->set_value('shop_street');
			} else if ($type_shop == 'shop-tc') {
				$return = $this->CI->form_validation->set_value('shop_tc_street');
			}
		} else if ($type == 'internet-shop') {
			// No return		
		} else if ($type == 'personal') {
			$return = $this->CI->form_validation->set_value('pers_street');	
		} else if ($type == 'trade-center') {
			$return = $this->CI->form_validation->set_value('tc_street');
		}
		return $return;
	}
	
	
	
	function get_shop_info_house($type, $type_shop){
		$return = false;
		if ($type == 'shop'){
			if ($type_shop == 'shop_separately') {				
				$return = $this->CI->form_validation->set_value('shop_house');
			} else if ($type_shop == 'shop-tc') {
				// No return
			}
		} else if ($type == 'internet-shop') {
			// No return	
		} else if ($type == 'personal') {
			$return = $this->CI->form_validation->set_value('pers_house');	
		} else if ($type == 'trade-center') {
			$return = $this->CI->form_validation->set_value('tc_house');
		}
		return $return;
	}
	
	
	function get_shop_info_fraction($type, $type_shop){
		$return = false;
		if ($type == 'shop'){
			if ($type_shop == 'shop_separately') {				
				$return = $this->CI->form_validation->set_value('shop_fraction');
			} else if ($type_shop == 'shop-tc') {
				// No return
			}
		} else if ($type == 'internet-shop') {
			// No return	
		} else if ($type == 'personal') {
			$return = $this->CI->form_validation->set_value('pers_fraction');	
		} else if ($type == 'trade-center') {
			$return = $this->CI->form_validation->set_value('tc_fraction');
		}
		return $return;
	}
	
	
	function get_shop_info_floor($type, $type_shop){
		$return = false;
		if ($type == 'shop'){
			if ($type_shop == 'shop_separately') {				
				$return = $this->CI->form_validation->set_value('shop_floor');
			} else if ($type_shop == 'shop-tc') {
				$return = $this->CI->form_validation->set_value('shop_tc_floor');
			}
		} else if ($type == 'internet-shop') {
			// No return	
		} else if ($type == 'personal') {
			$return = $this->CI->form_validation->set_value('pers_floor');	
		} else if ($type == 'trade-center') {
			// No return
		}
		return $return;
	}
	
	
	function get_shop_info_office($type, $type_shop){
		$return = false;
		if ($type == 'shop'){
			if ($type_shop == 'shop_separately') {				
				$return = $this->CI->form_validation->set_value('shop_office');
			} else if ($type_shop == 'shop-tc') {
				$return = $this->CI->form_validation->set_value('shop_tc_office');
			}
		} else if ($type == 'internet-shop') {
			// No return
		} else if ($type == 'personal') {
			$return = $this->CI->form_validation->set_value('pers_office');	
		} else if ($type == 'trade-center') {
			// No return
		}
		return $return;
	}
	

	function get_shop_info_alternative($type, $type_shop){
		$return = false;
		if ($type == 'shop'){
			if ($type_shop == 'shop_separately') {				
				$return = $this->CI->form_validation->set_value('shop_alternative');
			} else if ($type_shop == 'shop-tc') {
				// No return
			}
		} else if ($type == 'internet-shop') {
			// No return
		} else if ($type == 'personal') {
			$return = $this->CI->form_validation->set_value('pers_alternative');	
		} else if ($type == 'trade-center') {
			// No return
		}
		return $return;
	}
	
	
	function get_shop_info_parent($type, $type_shop){
		$return = false;
		if ($type == 'shop'){
			if ($type_shop == 'shop_separately') {				
				// No return
			} else if ($type_shop == 'shop-tc') {
				$return = $this->CI->form_validation->set_value('shop_tc_trade-center');
			}
		} else if ($type == 'internet-shop') {
			// No return
		} else if ($type == 'personal') {
			// No return
		} else if ($type == 'trade-center') {
			// No return
		}
		return $return;
	}
	
	
	
	/*
	 * 
	 * Return field names
	 * 
	 */
	
	
	
	
	function get_field_name_street($type, $type_shop){
		$return = false;
		if ($type == 'shop'){
			if ($type_shop == 'shop_separately') {				
				$return = 'shop_street';
			} else if ($type_shop == 'shop-tc') {
				$return = 'shop_tc_street';
			}
		} else if ($type == 'internet-shop') {
			// No return		
		} else if ($type == 'personal') {
			$return = 'pers_street';	
		} else if ($type == 'trade-center') {
			$return = 'tc_street';
		}
		return $return;
	}
	
	
	function get_field_name_house($type, $type_shop){
		$return = false;
		if ($type == 'shop'){
			if ($type_shop == 'shop_separately') {				
				$return = 'shop_house';
			} else if ($type_shop == 'shop-tc') {
				// No return
			}
		} else if ($type == 'internet-shop') {
			// No return	
		} else if ($type == 'personal') {
			$return = 'pers_house';	
		} else if ($type == 'trade-center') {
			$return = 'tc_house';
		}
		return $return;
	}
	
	
	function get_field_name_fraction($type, $type_shop){
		$return = false;
		if ($type == 'shop'){
			if ($type_shop == 'shop_separately') {				
				$return = 'shop_fraction';
			} else if ($type_shop == 'shop-tc') {
				// No return
			}
		} else if ($type == 'internet-shop') {
			// No return	
		} else if ($type == 'personal') {
			$return = 'pers_fraction';	
		} else if ($type == 'trade-center') {
			$return = 'tc_fraction';
		}
		return $return;
	}
	
	
	function get_field_name_floor($type, $type_shop){
		$return = false;
		if ($type == 'shop'){
			if ($type_shop == 'shop_separately') {				
				$return = 'shop_floor';
			} else if ($type_shop == 'shop-tc') {
				$return = 'shop_tc_floor';
			}
		} else if ($type == 'internet-shop') {
			// No return	
		} else if ($type == 'personal') {
			$return = 'pers_floor';	
		} else if ($type == 'trade-center') {
			// No return
		}
		return $return;
	}
	
	
	
	
	function get_field_name_office($type, $type_shop){
		$return = false;
		if ($type == 'shop'){
			if ($type_shop == 'shop_separately') {				
				$return = 'shop_office';
			} else if ($type_shop == 'shop-tc') {
				$return = 'shop_tc_office';
			}
		} else if ($type == 'internet-shop') {
			// No return
		} else if ($type == 'personal') {
			$return = 'pers_office';
		} else if ($type == 'trade-center') {
			// No return
		}
		return $return;
	}
	
	function get_field_name_alternative($type, $type_shop){
		$return = false;
		if ($type == 'shop'){
			if ($type_shop == 'shop_separately') {				
				$return = 'shop_alternative';
			} else if ($type_shop == 'shop-tc') {
				// No return
			}
		} else if ($type == 'internet-shop') {
			// No return
		} else if ($type == 'personal') {
			$return = 'pers_alternative';	
		} else if ($type == 'trade-center') {
			// No return
		}
		return $return;
	}
	
	
	function get_field_name_parent($type, $type_shop){
		$return = false;
		if ($type == 'shop'){
			if ($type_shop == 'shop_separately') {				
				// No return
			} else if ($type_shop == 'shop-tc') {
				$return = 'shop_tc_trade-center';
			}
		} else if ($type == 'internet-shop') {
			// No return
		} else if ($type == 'personal') {
			// No return
		} else if ($type == 'trade-center') {
			// No return
		}
		return $return;
	}
	
	
	/*
	 * 
	 *   CALLBACKS 
	 * 
	 */
	
	function shops_create_typecheck($type){
		if ($type != 'shop' && $type != 'internet-shop' && $type != 'personal' && $type != 'trade-center') {
			return false;
		} else {
			if ($type == 'shop') {
				if ($_POST['type_shop'] != 'shop_separately' && $_POST['type_shop'] != 'shop-tc') {
					return false;
				} else {
					return true;
				}
			} else {			
				return true;
			}
		}
		
	}
}

?>