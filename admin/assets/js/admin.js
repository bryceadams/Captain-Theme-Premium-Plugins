(function ( $ ) {
	"use strict";

	$(function () {
		//$(".cmb_id__coh_location_mon_open_time, .cmb_id__coh_location_mon_close_time").hide();
		$( document ).ready(function() {
			
			// Monday Checkbox Initial Check
			if($("#_coh_location_mon_open_bool").prop('checked') !== true){
				$(".cmb_id__coh_location_mon_open_time, .cmb_id__coh_location_mon_close_time").hide();
			}
			if($("#_coh_location_mon_open_bool").prop('checked') === true){
				$(".cmb_id__coh_location_mon_open_time, .cmb_id__coh_location_mon_close_time").show();
			}

			// Tuesday Checkbox Initial Check
			if($("#_coh_location_tues_open_bool").prop('checked') !== true){
				$(".cmb_id__coh_location_tues_open_time, .cmb_id__coh_location_tues_close_time").hide();
			}
			if($("#_coh_location_tues_open_bool").prop('checked') === true){
				$(".cmb_id__coh_location_tues_open_time, .cmb_id__coh_location_tues_close_time").show();
			}

			// Wednesday Checkbox Initial Check
			if($("#_coh_location_wed_open_bool").prop('checked') !== true){
				$(".cmb_id__coh_location_wed_open_time, .cmb_id__coh_location_wed_close_time").hide();
			}
			if($("#_coh_location_wed_open_bool").prop('checked') === true){
				$(".cmb_id__coh_location_wed_open_time, .cmb_id__coh_location_wed_close_time").show();
			}

			// Thursday Checkbox Initial Check
			if($("#_coh_location_thurs_open_bool").prop('checked') !== true){
				$(".cmb_id__coh_location_thurs_open_time, .cmb_id__coh_location_thurs_close_time").hide();
			}
			if($("#_coh_location_thurs_open_bool").prop('checked') === true){
				$(".cmb_id__coh_location_thurs_open_time, .cmb_id__coh_location_thurs_close_time").show();
			}

			// Friday Checkbox Initial Check
			if($("#_coh_location_fri_open_bool").prop('checked') !== true){
				$(".cmb_id__coh_location_fri_open_time, .cmb_id__coh_location_fri_close_time").hide();
			}
			if($("#_coh_location_fri_open_bool").prop('checked') === true){
				$(".cmb_id__coh_location_fri_open_time, .cmb_id__coh_location_fri_close_time").show();
			}

			// Saturday Checkbox Initial Check
			if($("#_coh_location_sat_open_bool").prop('checked') !== true){
				$(".cmb_id__coh_location_sat_open_time, .cmb_id__coh_location_sat_close_time").hide();
			}
			if($("#_coh_location_sat_open_bool").prop('checked') === true){
				$(".cmb_id__coh_location_sat_open_time, .cmb_id__coh_location_sat_close_time").show();
			}

			// Sunday Checkbox Initial Check
			if($("#_coh_location_sun_open_bool").prop('checked') !== true){
				$(".cmb_id__coh_location_sun_open_time, .cmb_id__coh_location_sun_close_time").hide();
			}
			if($("#_coh_location_sun_open_bool").prop('checked') === true){
				$(".cmb_id__coh_location_sun_open_time, .cmb_id__coh_location_sun_close_time").show();
			}

		});


		// Monday Checkbox Check
		$('#_coh_location_mon_open_bool').click(function() {
			if( $(this).is(':checked')) {
				$(".cmb_id__coh_location_mon_open_time, .cmb_id__coh_location_mon_close_time").show();
			} else {
				$(".cmb_id__coh_location_mon_open_time, .cmb_id__coh_location_mon_close_time").hide();
			}
		});

		// Tuesday Checkbox Check
		$('#_coh_location_tues_open_bool').click(function() {
			if( $(this).is(':checked')) {
				$(".cmb_id__coh_location_tues_open_time, .cmb_id__coh_location_tues_close_time").show();
			} else {
				$(".cmb_id__coh_location_tues_open_time, .cmb_id__coh_location_tues_close_time").hide();
			}
		});

		// Wednesday Checkbox Check
		$('#_coh_location_wed_open_bool').click(function() {
			if( $(this).is(':checked')) {
				$(".cmb_id__coh_location_wed_open_time, .cmb_id__coh_location_wed_close_time").show();
			} else {
				$(".cmb_id__coh_location_wed_open_time, .cmb_id__coh_location_wed_close_time").hide();
			}
		});

		// Thursday Checkbox Check
		$('#_coh_location_thurs_open_bool').click(function() {
			if( $(this).is(':checked')) {
				$(".cmb_id__coh_location_thurs_open_time, .cmb_id__coh_location_thurs_close_time").show();
			} else {
				$(".cmb_id__coh_location_thurs_open_time, .cmb_id__coh_location_thurs_close_time").hide();
			}
		});

		// Friday Checkbox Check
		$('#_coh_location_fri_open_bool').click(function() {
			if( $(this).is(':checked')) {
				$(".cmb_id__coh_location_fri_open_time, .cmb_id__coh_location_fri_close_time").show();
			} else {
				$(".cmb_id__coh_location_fri_open_time, .cmb_id__coh_location_fri_close_time").hide();
			}
		});

		// Saturday Checkbox Check
		$('#_coh_location_sat_open_bool').click(function() {
			if( $(this).is(':checked')) {
				$(".cmb_id__coh_location_sat_open_time, .cmb_id__coh_location_sat_close_time").show();
			} else {
				$(".cmb_id__coh_location_sat_open_time, .cmb_id__coh_location_sat_close_time").hide();
			}
		});

		// Sunday Checkbox Check
		$('#_coh_location_sun_open_bool').click(function() {
			if( $(this).is(':checked')) {
				$(".cmb_id__coh_location_sun_open_time, .cmb_id__coh_location_sun_close_time").show();
			} else {
				$(".cmb_id__coh_location_sun_open_time, .cmb_id__coh_location_sun_close_time").hide();
			}
		});

	});

}(jQuery));