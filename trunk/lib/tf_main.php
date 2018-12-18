<?php
$opictf_categories_lang = array();



// ======================   Titles ==============================
												
$tfcategories["the_faith"] 		= array(
                                                    'title'=>"The Faith",
                                                    'url'=>"http://www.the-faith.com",
                                                    'logo'=>"the_faith.png",
                                                );

// =================== English ===========================




$opictf_categories_lang['eng']['the_faith']['url']                    =  $tfcategories["the_faith"]['url'];
$opictf_categories_lang['eng']['the_faith']['cat']                    =  $tfcategories["the_faith"]['url'].'/api/get_category_index/';
$opictf_categories_lang['eng']['the_faith']['importurl']              =  $tfcategories["the_faith"]['url'].'/api/get_category_posts/?slug=';
?>