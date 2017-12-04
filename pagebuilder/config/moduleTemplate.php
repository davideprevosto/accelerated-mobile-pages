<?php
$moduleTemplate = array();
$dir = AMP_PAGE_BUILDER.'/modules/';
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
        	if(is_file($dir.$file)){
        		$moduleTemplate[str_replace(".php", "", $file)] = include $dir.$file;
        	}
        }
        closedir($dh);
        $moduleTemplate = array_filter($moduleTemplate);
    }
}

$layoutTemplate = array();
$dir = AMP_PAGE_BUILDER.'/layouts/';
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {

        while (($file = readdir($dh)) !== false) {
        	if(is_file($dir.$file)){
        		$layoutTemplate[str_replace(".php", "", $file)] = include $dir.$file;
        	}
        }
        closedir($dh);
        $layoutTemplate = array_filter($layoutTemplate);
    }
}

$savedlayoutTemplate = array();
$dir = AMP_PAGE_BUILDER.'/custom-layouts/';
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {

        while (($file = readdir($dh)) !== false) {
        	if(is_file($dir.$file)){
        		$savedlayoutTemplate[str_replace(".php", "", $file)] = include $dir.$file;
        	}
        }
        closedir($dh);
        $savedlayoutTemplate = array_filter($savedlayoutTemplate);
    }
}

//Row Contents
$output = '<div class="amp_pb_module {{row_class}}">';
$outputEnd = '<div class="cb"></div> </div>';
$containerCommonSettings = array(
			'default_tab'=> 'customizer',
			'tabs' => array(
			  'customizer'=>'Customizer',
			  'container_css'=>'Container css'
			),
			'fields' => array(
							array(
								'type'		=>'text',
								'name'		=>"row_label",
								'label'		=>'Row label',
								'tab'    	=>'customizer',
								'default'	=>'Add here',
								),
					
							array(
								'type'		=>'text',
								'name'		=>"row_class",
								'label'		=>'Row class',
								'tab'     	=>'container_css',
								'default'	=>'Add here',
								)
							),
			'front_template_start'=>$output,
			'front_template_end'=>$outputEnd,
			'front_css'=>'',	
			);
