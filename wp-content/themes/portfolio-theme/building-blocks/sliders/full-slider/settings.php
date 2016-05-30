<?php

	$ds              = get_sub_field('data_source'); // this is the key to it all, if this is 'dynamic', it will choose an existing source, if not it will choose the repeater fields.
	$text_color      = get_sub_field('text_color') ? get_sub_field('text_color') : '';
	$container_width = get_sub_field('container_width') ? get_sub_field('container_width') : '';
	$dot_nav         = get_sub_field('dot_nav') == 1 ? '' : 'no-dot-nav';
	$arrow_nav       = get_sub_field('arrow_nav') == 1 ? '' : 'no-arrow-nav';
	$tran_speed      = get_sub_field('tran_speed') ? get_sub_field('tran_speed') : '';
	$pause_speed     = get_sub_field('pause_speed') ? get_sub_field('pause_speed') : '';
	$a_start         = get_sub_field('a_start') ? get_sub_field('a_start') : '';
	$looping         = get_sub_field('looping') ? get_sub_field('looping') : '';