<?php

if (!function_exists('pr')) {
	function pr($data) {
		echo "<pre>";
		print_r($data);
		echo "</pre>";

	}

}
	 
if (!function_exists('opictf_cat_logo')) {
	function opictf_cat_logo($slug, $attr = array('width'=>'80px')) {
		global $tfcategories;
 
		$_attr = NULL;
		if (!empty($attr) && is_array($attr)) {
			foreach ($attr as $key => $value) {
				$_attr .= sprintf('%s="%s" ', $key, $value);
			}

		}
		 
		if (!empty($tfcategories[$slug]['logo'])) {
			return sprintf('<img src="%s" %s />', TFLogourl . $tfcategories[$slug]['logo'], $_attr);
		}
		return NULL;
	}

}

if (!function_exists('opictf_icon_logo')) {
	function opictf_icon_logo($slug, $attr = array('width'=>'80px')) {
		$_attr = NULL;
		if (!empty($attr) && is_array($attr)) {
			foreach ($attr as $key => $value) {
				$_attr .= sprintf('%s="%s" ', $key, $value);
			}

		}
	 
		
		if (file_exists(TFIconpath . $slug)) {
			return sprintf('<img src="%s" %s />', TFIconurl . $slug, $_attr);
		}
		return NULL;
	}

}

if (!function_exists('opic_cat_flags')) {
	function opic_cat_flags($slug, $attr = array('width'=>'30px')) {
		global $tfcategories;
		$_attr = NULL;
		if (!empty($attr) && is_array($attr)) {
			foreach ($attr as $key => $value) {
				$_attr .= sprintf('%s="%s" ', $key, $value);
			}
		}
		if (file_exists(Flagspath . $slug)) {
			return sprintf('<img src="%s" %s />', Flagsurl . $slug, $_attr);
		}
		return NULL;
	}

}

if (!function_exists('set_value')) {
	function set_value($key) {
		if (!empty($_POST[$key])) {
			return $_POST[$key];
		} else {
			return get_option($key);
		}
	}

}

if (!function_exists('opic_get_data')) {
	function opic_get_data($url = NULL) {

		if ($url) {
			return @file_get_contents($url);
		}
		return;
	}

}

if (!function_exists('opic_set_tf_transient')) {
	function opic_set_tf_transient($slug, $data) {
		global $wpdb;
		if (is_array($data)) {
			$data = json_encode($data);
		}
		return $wpdb -> insert($wpdb -> prefix . TFDBTable, array('opic_key' => $slug, 'opic_value' => $data), array('%s', '%s'));
	}

}

if (!function_exists('opic_get_tf_transient')) {
	function opic_get_tf_transient($slug) {
		global $wpdb;
		$result = array();
		$tablename = $wpdb -> prefix . TFDBTable;
		$return = $wpdb -> get_row("SELECT * FROM `$tablename` WHERE `opic_key`='$slug'");
		if ($return) {
			$result['id'] = $return -> id;
			$result['opic_key'] = $return -> opic_key;
			$result['opic_value'] = json_decode($return -> opic_value);
			return $result;
		}
		return NULL;
	}

}
if (!function_exists('opic_do_tf_transient')) {
	function opic_do_tf_transient($slug, $data = NULL) {
		$old = opic_get_tf_transient($slug);
		if (empty($old)) {
			opic_set_tf_transient($slug, $data);
		}
		return opic_get_tf_transient($slug);

	}

}

if (!function_exists('fun_tf_loadlang')) {

	function fun_tf_loadlang() {
		 $__lang = get_option(OPICTF_Input_SLUG . 'language');
		 
		if ($__lang) {
			$def_lang = get_option(OPICTF_Input_SLUG . 'language') . '.php';
			$tfpath = TFLangpath . $def_lang;
		 	
			if (file_exists($tfpath)) {
				include_once $tfpath;
				return $tflang;
			} else {
				echo sprintf("Lnaguage File <b>%s</b> not found in path <b>%s</b>", $def_lang, TFLangpath);
				exit();
			}
		}else{
			return array();
		}

	}

}
?>