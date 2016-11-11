<!DOCTYPE html>
<html lang="ru-ru" dir="ltr">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta charset="utf-8" />
	<base href="<?php echo "http://".$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']; ?>" />
	<meta name="rights" content="Дмитрий ПРО" />
	<meta name="description" content="CD SS X3" />
	<title>CD SS X3 ALFA</title>
	<link href="/templates/std/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
	<!--[if lt IE 9]><script src="/media/jui/js/html5.js"></script><![endif]-->
</head>
<body class="site com_content view-category layout-blog no-task itemid-196 fluid">
	<!-- Body -->
	<div class="body">
		<div class="container-fluid">
			<!-- Header -->
			<header class="header" role="banner">
				<div class="header-inner clearfix">
					<a class="brand pull-left" href="/">
						<span class="site-title" title="My Program">My Program</span>											</a>
					<div class="header-search pull-right">

					</div>
				</div>
			</header>

			<div class="row-fluid">
								<main id="content" role="main" class="span9">
					<!-- Begin Content -->

					<div id="system-message-container">
	</div>
<?php echo SSKernel::Site()->getAutForm(); ?>
	<?php echo SSKernel::Site()->getPage()->getText(); ?>

<ul itemscope itemtype="https://schema.org/BreadcrumbList" class="breadcrumb">
			<li>
			Вы здесь: &#160;
		</li>

				<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="active">
				<span itemprop="name">
					Главная				</span>
				<meta itemprop="position" content="1">
			</li>
		</ul>

					<!-- End Content -->
				</main>
									<div id="aside" class="span3">
						<!-- Begin Right Sidebar -->
						<?php echo Page::getPage('menu')->GetText(); ?>

						<div class="ya-site-form ya-site-form_inited_no" onclick="return {'action':'https://yandex.ru/search/site/','arrow':false,'bg':'transparent','fontsize':12,'fg':'#000000','language':'ru','logo':'rb','publicname':'Ïîèñê äëÿ ñàéòîâ My Program è Call of Dead','suggest':true,'target':'_self','tld':'ru','type':2,'usebigdictionary':true,'searchid':2236981,'input_fg':'#000000','input_bg':'#ffffff','input_fontStyle':'normal','input_fontWeight':'bold','input_placeholder':null,'input_placeholderColor':'#000000','input_borderColor':'#7f9db9'}"><form action="https://yandex.ru/search/site/" method="get" target="_self"><input type="hidden" name="searchid" value="2236981"/><input type="hidden" name="l10n" value="ru"/><input type="hidden" name="reqenc" value=""/><input type="search" name="text" value=""/><input type="submit" value="Íàéòè"/></form></div><style type="text/css">.ya-page_js_yes .ya-site-form_inited_no { display: none; }</style><script type="text/javascript">(function(w,d,c){var s=d.createElement('script'),h=d.getElementsByTagName('script')[0],e=d.documentElement;if((' '+e.className+' ').indexOf(' ya-page_js_yes ')===-1){e.className+=' ya-page_js_yes';}s.type='text/javascript';s.async=true;s.charset='utf-8';s.src=(d.location.protocol==='https:'?'https:':'http:')+'//site.yandex.net/v2.0/js/all.js';h.parentNode.insertBefore(s,h);(w[c]||(w[c]=[])).push(function(){Ya.Site.Form.init()})})(window,document,'yandex_site_callbacks');</script>
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'ru', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

	<img src="/media/system/images/livemarks.png" alt="feed-image" />			<span>
					RSS-лента				</span>
	</a>
</div><div class="well "><div class="search">
	<form action="/" method="post" class="form-inline">
		<label for="mod-search-searchword" class="element-invisible">Искать...</label> <input name="searchword" id="mod-search-searchword" maxlength="200"  class="inputbox search-query" type="search" placeholder="Поиск..." /> <button class="button btn btn-primary" onclick="this.form.searchword.focus();">искать</button>		<input type="hidden" name="task" value="search" />
		<input type="hidden" name="option" value="com_search" />
		<input type="hidden" name="Itemid" value="196" />
	</form>
</div>
</div><div class="well "><h3 class="page-header">Login Form</h3><form action="https://myprogram.us/" method="post" id="login-form" class="form-inline">
		<div class="userdata">
		<div id="form-login-username" class="control-group">
			<div class="controls">
									<div class="input-prepend">
						<span class="add-on">
							<span class="icon-user hasTooltip" title="Логин"></span>
							<label for="modlgn-username" class="element-invisible">Логин</label>
						</span>
						<input id="modlgn-username" type="text" name="username" class="input-small" tabindex="0" size="18" placeholder="Логин" />
					</div>
							</div>
		</div>
		<div id="form-login-password" class="control-group">
			<div class="controls">
									<div class="input-prepend">
						<span class="add-on">
							<span class="icon-lock hasTooltip" title="Пароль">
							</span>
								<label for="modlgn-passwd" class="element-invisible">Пароль							</label>
						</span>
						<input id="modlgn-passwd" type="password" name="password" class="input-small" tabindex="0" size="18" placeholder="Пароль" />
					</div>
							</div>
		</div>
				<div id="form-login-secretkey" class="control-group">
			<div class="controls">
									<div class="input-prepend input-append">
						<span class="add-on">
							<span class="icon-star hasTooltip" title="Секретный код">
							</span>
								<label for="modlgn-secretkey" class="element-invisible">Секретный код							</label>
						</span>
						<input id="modlgn-secretkey" autocomplete="off" type="text" name="secretkey" class="input-small" tabindex="0" size="18" placeholder="Секретный код" />
						<span class="btn width-auto hasTooltip" title="Если вы включили двухфакторную аутентификацию для вашей учётной записи, введите ваш секретный код. Если вы не знаете, что это такое - оставьте поле пустым.">
							<span class="icon-help"></span>
						</span>
				</div>

			</div>
		</div>
						<div id="form-login-remember" class="control-group checkbox">
			<label for="modlgn-remember" class="control-label">Запомнить меня</label> <input id="modlgn-remember" type="checkbox" name="remember" class="inputbox" value="yes"/>
		</div>
				<div id="form-login-submit" class="control-group">
			<div class="controls">
				<button type="submit" tabindex="0" name="Submit" class="btn btn-primary">Войти</button>
			</div>
		</div>
					<ul class="unstyled">
							<li>
					<a href="/мой-профиль?view=registration">
					Регистрация <span class="icon-arrow-right"></span></a>
				</li>
							<li>
					<a href="/мой-профиль?view=remind">
					Забыли логин?</a>
				</li>
				<li>
					<a href="/мой-профиль?view=reset">
					Забыли пароль?</a>
				</li>
			</ul>
		<input type="hidden" name="option" value="com_users" />
		<input type="hidden" name="task" value="user.login" />
		<input type="hidden" name="return" value="aHR0cHM6Ly9teXByb2dyYW0udXMv" />
		<input type="hidden" name="eeb8a62d9544b248b7ba010ee603c493" value="1" />	</div>
	</form>
</div><div class="well ">

<div class="custom"  >
	<p><span style="font-size: 12pt;">Вам понравился наш сайт? Вы можете нам помочь совершенствовать его:</span></p>
<p><span style="font-size: 12pt;"><span style="color: #0000ff;">wmr</span>:&nbsp;R946130823481</span></p>
<p><span style="font-size: 12pt;"><span style="color: #0000ff;">wmz</span>:&nbsp;Z230413336625</span></p>
<p><span style="font-size: 12pt;"><span style="color: #0000ff;">wme</span>:&nbsp;E110003099599</span></p>
<p><span style="font-size: 12pt;"><span style="color: #0000ff;">wmg</span>:&nbsp;G534205545601</span></p>
<p><span style="font-size: 12pt;"><span style="color: #0000ff;">Yandex</span>: 410012533617692</span></p>
<p><span style="font-size: 12pt;">Также Вы можете нам отправить уже готовый материал или его идеи на <a href="mailto:diman-pro@myprogram.us">адрес</a></span></p></div>
</div><div class="well "><h3 class="page-header">Подписывайтесь на наши каналы</h3>

<div class="custom"  >

</div><div class="well ">

<div class="custom"  >

<form action="https://advisor.wmtransfer.com/Spasibo.aspx" method="post"
target="_blank" title="Передать $пасибо! нашему сайту">
<input type="hidden" name="url" value=""/><!-- укажите в value адрес Вашего сайта -->
<input type="image" src="//advisor.wmtransfer.com/img/Spasibo!.png" border="0" name="submit"/>
</form>
</div>
</div>
						<!-- End Right Sidebar -->
					</div>
							</div>
		</div>
	</div>
	<!-- Footer -->
	<footer class="footer" role="contentinfo">
		<div class="container-fluid">
			<hr />

			<p class="pull-right">
				<a href="#top" id="back-top">
					Наверх				</a>
			</p>
			<p>

				&copy; 2015 - 2016 My Program
			</p>
			<p>
				Site Setup X3 (Kernel <?php echo SSKernel::version(); ?>)
		</div>
	</footer>





</body>
</html>
