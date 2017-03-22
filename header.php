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
			<div><img src="<?php echo get_template_directory_uri()?>/img/header.jpg" class="h_logo" alt="Blogin" title="">
			<div class="header_title">
				<h1><a id="header_href" href="<?php echo get_home_url(); ?>">TRAVELLER</a></h1>
			</div>
			</div>
		</div>
	</header><!-- Header End -->