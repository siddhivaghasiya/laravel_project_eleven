<?php

function getStatusIcon($data){
	if ($data->status == 1) {
		return '<span title="'.trans('lang_data.click_on_button_change_status_label').'" class="btn btn-xs btn-success" id="active_inactive"
		status="1" data-id="'.\Crypt::encrypt($data->id).'">Active</span>';
	}else{
		return '<span title="'.trans('lang_data.click_on_button_change_status_label').'" class="btn btn-xs btn-danger" id="active_inactive"
		status="0" data-id="'.\Crypt::encrypt($data->id).'">Inactive</span>';
	}
}

function makeslug($text, string $divider = '-'){

     // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;

}
?>
