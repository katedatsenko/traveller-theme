<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		<?php wp_title('|', true, 'right'); ?>
        <?php bloginfo('name'); ?>
	</title>
	<meta charset="utf-8">

	<?php wp_head(); ?>
</head>
<body>

	<header>
		<div class="wrapper">
			<h1><a id="header_href" href="<?php echo get_home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>


			<?php
                		$args = array(
		                    'theme_location' => 'primary',        // (string) Расположение меню в шаблоне. (указывается ключ которым было зарегистрировано меню в функции register_nav_menus)
		                    'menu'            => '',              // (string) Название выводимого меню (указывается в админке при создании меню, приоритетнее
		                    // чем указанное местоположение theme_location - если указано, то параметр theme_location игнорируется)
		                    'container'       => 'nav',           // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
		                    'container_class' => '',              // (string) class контейнера (div тега)
		                    'container_id'    => 'main-menu',              // (string) id контейнера (div тега)
		                    'menu_class'      => 'horizontal-navigation',          // (string) class самого меню (ul тега)
		                    'menu_id'         => '',              // (string) id самого меню (ul тега)
		                    'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
		                    'fallback_cb'     => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
		                    'before'          => '',              // (string) Текст перед <a> каждой ссылки
		                    'after'           => '',              // (string) Текст после </a> каждой ссылки
		                    'link_before'     => '',              // (string) Текст перед анкором (текстом) ссылки
		                    'link_after'      => '',              // (string) Текст после анкора (текста) ссылки
		                    'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
		                    'walker'          => '',              // (object) Класс собирающий меню. Default: new Walker_Nav_Menu
		                );
		                wp_nav_menu($args);
		                ?>
			</nav>
		</div>
		<div class="wrapper">
			<div class="header_logo"><img src="<?php echo get_template_directory_uri()?>/img/header.jpg" class="h_logo" alt="Blogin" title="">
				<h1 id="traveller_my_settings">
                    <?php
                        echo get_theme_mod("traveller_my_settings");
                    ?>

                </h1>
		</div>

		<!-- <div class="wrapper">
			<div class="header_logo"><img src="<?php echo get_template_directory_uri()?>/img/header.jpg" class="h_logo" alt="Blogin" title="">
				<div class="header_title">
					<h1><a id="header_href" href="<?php echo get_home_url(); ?>">TRAVELLER</a></h1>
	        		<div class="header_nav">
	        			<?php
                		$args = array(
		                    'theme_location' => 'primary',        // (string) Расположение меню в шаблоне. (указывается ключ которым было зарегистрировано меню в функции register_nav_menus)
		                    'menu'            => '',              // (string) Название выводимого меню (указывается в админке при создании меню, приоритетнее
		                    // чем указанное местоположение theme_location - если указано, то параметр theme_location игнорируется)
		                    'container'       => 'nav',           // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
		                    'container_class' => '',              // (string) class контейнера (div тега)
		                    'container_id'    => 'main-menu',              // (string) id контейнера (div тега)
		                    'menu_class'      => 'horizontal-navigation',          // (string) class самого меню (ul тега)
		                    'menu_id'         => '',              // (string) id самого меню (ul тега)
		                    'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
		                    'fallback_cb'     => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
		                    'before'          => '',              // (string) Текст перед <a> каждой ссылки
		                    'after'           => '',              // (string) Текст после </a> каждой ссылки
		                    'link_before'     => '',              // (string) Текст перед анкором (текстом) ссылки
		                    'link_after'      => '',              // (string) Текст после анкора (текста) ссылки
		                    'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
		                    'walker'          => '',              // (object) Класс собирающий меню. Default: new Walker_Nav_Menu
		                );
		                wp_nav_menu($args);
		                ?>
	        		</div>
	            </div>

			</div>
		</div>-->
		<div></div>
	</header><!-- Header End -->