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
?>
