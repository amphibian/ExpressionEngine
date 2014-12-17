<!doctype html>
<html>
	<head>
		<?=ee()->view->head_title($cp_page_title)?>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" lang="en-us" dir="ltr">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<?php if (isset($meta_refresh)): ?>
		<meta http-equiv='refresh' content='<?=$meta_refresh['rate']?>; url=<?=$meta_refresh['url']?>'>
		<?php endif;?>

		<?=ee()->view->head_link('css/v3/common.min.css'); ?>
		<?=ee()->view->head_link('css/jquery-ui-1.8.16.custom.css'); ?>
		<?php if (ee()->extensions->active_hook('cp_css_end') === TRUE):?>
		<link rel="stylesheet" href="<?=cp_url('css/cp_global_ext', array('theme' => ee()->cp->cp_theme))?>" type="text/css" />
		<?php endif;?>
		<!-- <link href="touch-icon-iphone.png" rel="apple-touch-icon-precomposed" sizes="114x114">
		<link href="touch-icon-ipad.png" rel="apple-touch-icon-precomposed" sizes="144x144"> -->

		<?php
		foreach ($cp_its_all_in_your_head as $item)
		{
			echo $item."\n";
		}
		?>
	</head>
	<body id="top">
		<?=ee('Alert')->getAllBanners()?>
		<section class="bar info-wrap">
			<nav class="snap">
				<div class="site">
					<?php if (ee()->config->item('multiple_sites_enabled') === 'y'): ?>
						<a class="has-sub" href=""><?=ee()->config->item('site_name')?> <span class="ico sub-arrow"></span></a> <a href="<?=ee()->config->item('base_url').ee()->config->item('site_index')?>">view</a>
						<ul class="sites-list sub-menu">
							<?php foreach ($cp_main_menu['sites'] as $site_name => $link): ?>
								<a href="<?=$link?>"><?=$site_name?></a>
							<?php endforeach ?>
							<?php if (ee()->cp->allowed_group('can_admin_sites')): ?>
								<a class="last add" href="http://localhost/el-projects/ee-cp/views/msm-new.php">&#10010; New Site</a>
							<?php endif ?>
						</ul>
					<?php else: ?>
						<a href=""><?=ee()->config->item('site_name')?></a>
					<?php endif ?>
				</div>
				<div class="user">
					<a href="<?=cp_url('login/logout')?>"><?=lang('log_out')?></a> <a class="has-sub" href=""><?=$cp_screen_name?> <span class="ico sub-arrow"></span></a>
					<ul class="quick-links sub-menu">
						<a href="http://localhost/el-projects/ee-cp/views/members-profile.php">My Profile</a>
						<a href="">Quick Link</a>
						<a href="">Another Quick Link</a>
						<a href="">One More Quick Link</a>
						<a class="last add" href="http://localhost/el-projects/ee-cp/views/members-profile-quicklinks.php">&#10010; New Link</a>
					</ul>
				</div>
			</nav>
		</section>
		<section class="bar menu-wrap">
			<nav class="snap">
				<ul class="author-menu">
					<li>
						<a class="has-sub" href=""><?=lang('menu_create')?> <span class="ico sub-arrow"></span></a>
						<div class="sub-menu">
							<ul>
								<?php foreach ($cp_main_menu['channels']['create'] as $channel_name => $link): ?>
									<li><a href="<?=$link?>"><?=$channel_name?></a></li>
								<?php endforeach ?>
								<li class="last"><a class="add" href="http://localhost/el-projects/ee-cp/views/channel-new.php">&#10010; <?=lang('new_channel')?></a></li>
							</ul>
						</div>
					</li>
					<li>
						<a class="has-sub" href=""><?=lang('menu_edit')?> <span class="ico sub-arrow"></span></a>
						<div class="sub-menu">
							<ul>
								<?php foreach ($cp_main_menu['channels']['edit'] as $channel_name => $link): ?>
									<li><a href="<?=$link?>"><?=$channel_name?></a></li>
								<?php endforeach ?>
							</ul>
						</div>
					</li>
					<li><a href="http://localhost/el-projects/ee-cp/views/files.php"><?=lang('menu_files')?></a></li>
					<li><a href="<?=cp_url('members')?>"><?=lang('menu_members')?></a></li>
				</ul>
				<ul class="dev-menu">
					<!-- <li><a href="http://localhost/el-projects/ee-cp/views/design.php">Design</a></li> -->
					<li class="develop">
						<a class="has-sub" href=""><b class="ico develop"></b> <span class="ico sub-arrow"></span> <!-- Develop --></a>
						<div class="sub-menu">
							<ul>
								<?php
								// Grab the first and last items from the menu to determine
								// which items we need to put 'last' classes on
								$last = array_values(array_slice($cp_main_menu['develop'], -1, 1));

								foreach ($cp_main_menu['develop'] as $key => $link):
									$class = '';
									if ($link == $last[0])
									{
										$class = 'last';
									}
								?>
									<li<?php if ( ! empty($class)): ?> class="<?=$class?>"<?php endif; ?>><a href="<?=$link?>"><?=lang($key)?></a></li>
								<?php endforeach ?>
							</ul>
						</div>
					</li>
					<li class="settings"><a href="<?=cp_url('settings/general')?>"><b class="ico settings"></b> <!-- Settings --></a></li>
				</ul>
			</nav>
		</section>
		<section class="wrap">

<?php
/* End of file header.php */
/* Location: ./themes/cp_themes/default/_shared/header.php */