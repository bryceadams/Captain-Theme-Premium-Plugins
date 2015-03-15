(function ( $ ) {
	"use strict";

	$(function () {
		//$(".cmb_id__coh_location_mon_open_time, .cmb_id__coh_location_mon_close_time").hide();
		$( document ).ready(function() {

			// Monday Checkbox Initial Check
			if($("#_coh_location_mon_open_bool").prop('checked') !== true){
				$(".cmb_id__coh_location_mon_open_time, .cmb_id__coh_location_mon_close_time, .cmb_id__coh_location_mon_split_hours_bool").hide();
			}
			if($("#_coh_location_mon_open_bool").prop('checked') === true){
				$(".cmb_id__coh_location_mon_open_time, .cmb_id__coh_location_mon_close_time, .cmb_id__coh_location_mon_split_hours_bool").show();
			}

			// Tuesday Checkbox Initial Check
			if($("#_coh_location_tues_open_bool").prop('checked') !== true){
				$(".cmb_id__coh_location_tues_open_time, .cmb_id__coh_location_tues_close_time, .cmb_id__coh_location_tues_split_hours_bool").hide();
			}
			if($("#_coh_location_tues_open_bool").prop('checked') === true){
				$(".cmb_id__coh_location_tues_open_time, .cmb_id__coh_location_tues_close_time, .cmb_id__coh_location_tues_split_hours_bool").show();
			}

			// Wednesday Checkbox Initial Check
			if($("#_coh_location_wed_open_bool").prop('checked') !== true){
				$(".cmb_id__coh_location_wed_open_time, .cmb_id__coh_location_wed_close_time, .cmb_id__coh_location_wed_split_hours_bool").hide();
			}
			if($("#_coh_location_wed_open_bool").prop('checked') === true){
				$(".cmb_id__coh_location_wed_open_time, .cmb_id__coh_location_wed_close_time, .cmb_id__coh_location_wed_split_hours_bool").show();
			}

			// Thursday Checkbox Initial Check
			if($("#_coh_location_thurs_open_bool").prop('checked') !== true){
				$(".cmb_id__coh_location_thurs_open_time, .cmb_id__coh_location_thurs_close_time, .cmb_id__coh_location_thurs_split_hours_bool").hide();
			}
			if($("#_coh_location_thurs_open_bool").prop('checked') === true){
				$(".cmb_id__coh_location_thurs_open_time, .cmb_id__coh_location_thurs_close_time, .cmb_id__coh_location_thurs_split_hours_bool").show();
			}

			// Friday Checkbox Initial Check
			if($("#_coh_location_fri_open_bool").prop('checked') !== true){
				$(".cmb_id__coh_location_fri_open_time, .cmb_id__coh_location_fri_close_time, .cmb_id__coh_location_fri_split_hours_bool").hide();
			}
			if($("#_coh_location_fri_open_bool").prop('checked') === true){
				$(".cmb_id__coh_location_fri_open_time, .cmb_id__coh_location_fri_close_time, .cmb_id__coh_location_fri_split_hours_bool").show();
			}

			// Saturday Checkbox Initial Check
			if($("#_coh_location_sat_open_bool").prop('checked') !== true){
				$(".cmb_id__coh_location_sat_open_time, .cmb_id__coh_location_sat_close_time, .cmb_id__coh_location_sat_split_hours_bool").hide();
			}
			if($("#_coh_location_sat_open_bool").prop('checked') === true){
				$(".cmb_id__coh_location_sat_open_time, .cmb_id__coh_location_sat_close_time, .cmb_id__coh_location_sat_split_hours_bool").show();
			}

			// Sunday Checkbox Initial Check
			if($("#_coh_location_sun_open_bool").prop('checked') !== true){
				$(".cmb_id__coh_location_sun_open_time, .cmb_id__coh_location_sun_close_time, .cmb_id__coh_location_sun_split_hours_bool").hide();
			}
			if($("#_coh_location_sun_open_bool").prop('checked') === true){
				$(".cmb_id__coh_location_sun_open_time, .cmb_id__coh_location_sun_close_time, .cmb_id__coh_location_sun_split_hours_bool").show();
			}

		});


		//////////


		// Monday Checkbox Check
		$('#_coh_location_mon_open_bool').click(function() {
			if( $(this).is(':checked')) {
				$(".cmb_id__coh_location_mon_open_time, .cmb_id__coh_location_mon_close_time, .cmb_id__coh_location_mon_split_hours_bool").show();
			} else {
				$(".cmb_id__coh_location_mon_open_time, .cmb_id__coh_location_mon_close_time, .cmb_id__coh_location_mon_split_hours_bool").hide();
			}
		});

		// Tuesday Checkbox Check
		$('#_coh_location_tues_open_bool').click(function() {
			if( $(this).is(':checked')) {
				$(".cmb_id__coh_location_tues_open_time, .cmb_id__coh_location_tues_close_time, .cmb_id__coh_location_tues_split_hours_bool").show();
			} else {
				$(".cmb_id__coh_location_tues_open_time, .cmb_id__coh_location_tues_close_time, .cmb_id__coh_location_tues_split_hours_bool").hide();
			}
		});

		// Wednesday Checkbox Check
		$('#_coh_location_wed_open_bool').click(function() {
			if( $(this).is(':checked')) {
				$(".cmb_id__coh_location_wed_open_time, .cmb_id__coh_location_wed_close_time, .cmb_id__coh_location_wed_split_hours_bool").show();
			} else {
				$(".cmb_id__coh_location_wed_open_time, .cmb_id__coh_location_wed_close_time, .cmb_id__coh_location_wed_split_hours_bool").hide();
			}
		});

		// Thursday Checkbox Check
		$('#_coh_location_thurs_open_bool').click(function() {
			if( $(this).is(':checked')) {
				$(".cmb_id__coh_location_thurs_open_time, .cmb_id__coh_location_thurs_close_time, .cmb_id__coh_location_thurs_split_hours_bool").show();
			} else {
				$(".cmb_id__coh_location_thurs_open_time, .cmb_id__coh_location_thurs_close_time, .cmb_id__coh_location_thurs_split_hours_bool").hide();
			}
		});

		// Friday Checkbox Check
		$('#_coh_location_fri_open_bool').click(function() {
			if( $(this).is(':checked')) {
				$(".cmb_id__coh_location_fri_open_time, .cmb_id__coh_location_fri_close_time, .cmb_id__coh_location_fri_split_hours_bool").show();
			} else {
				$(".cmb_id__coh_location_fri_open_time, .cmb_id__coh_location_fri_close_time, .cmb_id__coh_location_fri_split_hours_bool").hide();
			}
		});

		// Saturday Checkbox Check
		$('#_coh_location_sat_open_bool').click(function() {
			if( $(this).is(':checked')) {
				$(".cmb_id__coh_location_sat_open_time, .cmb_id__coh_location_sat_close_time, .cmb_id__coh_location_sat_split_hours_bool").show();
			} else {
				$(".cmb_id__coh_location_sat_open_time, .cmb_id__coh_location_sat_close_time, .cmb_id__coh_location_sat_split_hours_bool").hide();
			}
		});

		// Sunday Checkbox Check
		$('#_coh_location_sun_open_bool').click(function() {
			if( $(this).is(':checked')) {
				$(".cmb_id__coh_location_sun_open_time, .cmb_id__coh_location_sun_close_time, .cmb_id__coh_location_sun_split_hours_bool").show();
			} else {
				$(".cmb_id__coh_location_sun_open_time, .cmb_id__coh_location_sun_close_time, .cmb_id__coh_location_sun_split_hours_bool").hide();
			}
		});


		//////////


		// Monday Split Hours Initial Check
		if($("#_coh_location_mon_split_hours_bool").prop('checked') !== true){
			$(".cmb_id__coh_location_mon_open_time_2, .cmb_id__coh_location_mon_close_time_2").hide();
		}
		if($("#_coh_location_mon_split_hours_bool").prop('checked') === true){
			$(".cmb_id__coh_location_mon_open_time_2, .cmb_id__coh_location_mon_close_time_2").show();
		}

		// Monday Split Hours Checkbox Check
		$('#_coh_location_mon_split_hours_bool').click(function() {
			if( $(this).is(':checked')) {
				$(".cmb_id__coh_location_mon_open_time_2, .cmb_id__coh_location_mon_close_time_2").show();
			} else {
				$(".cmb_id__coh_location_mon_open_time_2, .cmb_id__coh_location_mon_close_time_2").hide();
			}
		});

		// Tuesday Split Hours Initial Check
		if($("#_coh_location_tues_split_hours_bool").prop('checked') !== true){
			$(".cmb_id__coh_location_tues_open_time_2, .cmb_id__coh_location_tues_close_time_2").hide();
		}
		if($("#_coh_location_tues_split_hours_bool").prop('checked') === true){
			$(".cmb_id__coh_location_tues_open_time_2, .cmb_id__coh_location_tues_close_time_2").show();
		}

		// Tuesday Split Hours Checkbox Check
		$('#_coh_location_tues_split_hours_bool').click(function() {
			if( $(this).is(':checked')) {
				$(".cmb_id__coh_location_tues_open_time_2, .cmb_id__coh_location_tues_close_time_2").show();
			} else {
				$(".cmb_id__coh_location_tues_open_time_2, .cmb_id__coh_location_tues_close_time_2").hide();
			}
		});

		// Wednesday Split Hours Initial Check
		if($("#_coh_location_wed_split_hours_bool").prop('checked') !== true){
			$(".cmb_id__coh_location_wed_open_time_2, .cmb_id__coh_location_wed_close_time_2").hide();
		}
		if($("#_coh_location_wed_split_hours_bool").prop('checked') === true){
			$(".cmb_id__coh_location_wed_open_time_2, .cmb_id__coh_location_wed_close_time_2").show();
		}

		// Wednesday Split Hours Checkbox Check
		$('#_coh_location_wed_split_hours_bool').click(function() {
			if( $(this).is(':checked')) {
				$(".cmb_id__coh_location_wed_open_time_2, .cmb_id__coh_location_wed_close_time_2").show();
			} else {
				$(".cmb_id__coh_location_wed_open_time_2, .cmb_id__coh_location_wed_close_time_2").hide();
			}
		});


		// Thursday Split Hours Initial Check
		if($("#_coh_location_thurs_split_hours_bool").prop('checked') !== true){
			$(".cmb_id__coh_location_thurs_open_time_2, .cmb_id__coh_location_thurs_close_time_2").hide();
		}
		if($("#_coh_location_thurs_split_hours_bool").prop('checked') === true){
			$(".cmb_id__coh_location_thurs_open_time_2, .cmb_id__coh_location_thurs_close_time_2").show();
		}

		// Thursday Split Hours Checkbox Check
		$('#_coh_location_thurs_split_hours_bool').click(function() {
			if( $(this).is(':checked')) {
				$(".cmb_id__coh_location_thurs_open_time_2, .cmb_id__coh_location_thurs_close_time_2").show();
			} else {
				$(".cmb_id__coh_location_thurs_open_time_2, .cmb_id__coh_location_thurs_close_time_2").hide();
			}
		});

		// Friday Split Hours Initial Check
		if($("#_coh_location_fri_split_hours_bool").prop('checked') !== true){
			$(".cmb_id__coh_location_fri_open_time_2, .cmb_id__coh_location_fri_close_time_2").hide();
		}
		if($("#_coh_location_fri_split_hours_bool").prop('checked') === true){
			$(".cmb_id__coh_location_fri_open_time_2, .cmb_id__coh_location_fri_close_time_2").show();
		}

		// Friday Split Hours Checkbox Check
		$('#_coh_location_fri_split_hours_bool').click(function() {
			if( $(this).is(':checked')) {
				$(".cmb_id__coh_location_fri_open_time_2, .cmb_id__coh_location_fri_close_time_2").show();
			} else {
				$(".cmb_id__coh_location_fri_open_time_2, .cmb_id__coh_location_fri_close_time_2").hide();
			}
		});

		// Saturday Split Hours Initial Check
		if($("#_coh_location_sat_split_hours_bool").prop('checked') !== true){
			$(".cmb_id__coh_location_sat_open_time_2, .cmb_id__coh_location_sat_close_time_2").hide();
		}
		if($("#_coh_location_sat_split_hours_bool").prop('checked') === true){
			$(".cmb_id__coh_location_sat_open_time_2, .cmb_id__coh_location_sat_close_time_2").show();
		}

		// Saturday Split Hours Checkbox Check
		$('#_coh_location_sat_split_hours_bool').click(function() {
			if( $(this).is(':checked')) {
				$(".cmb_id__coh_location_sat_open_time_2, .cmb_id__coh_location_sat_close_time_2").show();
			} else {
				$(".cmb_id__coh_location_sat_open_time_2, .cmb_id__coh_location_sat_close_time_2").hide();
			}
		});

		// Sunday Split Hours Initial Check
		if($("#_coh_location_sun_split_hours_bool").prop('checked') !== true){
			$(".cmb_id__coh_location_sun_open_time_2, .cmb_id__coh_location_sun_close_time_2").hide();
		}
		if($("#_coh_location_sun_split_hours_bool").prop('checked') === true){
			$(".cmb_id__coh_location_sun_open_time_2, .cmb_id__coh_location_sun_close_time_2").show();
		}

		// Sunday Split Hours Checkbox Check
		$('#_coh_location_sun_split_hours_bool').click(function() {
			if( $(this).is(':checked')) {
				$(".cmb_id__coh_location_sun_open_time_2, .cmb_id__coh_location_sun_close_time_2").show();
			} else {
				$(".cmb_id__coh_location_sun_open_time_2, .cmb_id__coh_location_sun_close_time_2").hide();
			}
		});



	});

}(jQuery));
