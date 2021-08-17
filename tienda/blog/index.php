<?php require_once("../res/x5engine.php"); ?>
<?php
$blog = new imBlog();
$data = $blog->parseUrlArray(@$_GET);
if (!$data['valid']) {
	header('Location: index.php', true, 302);
}
?>
<!DOCTYPE html><!-- HTML5 -->
<html prefix="og: http://ogp.me/ns#" lang="es-ES" dir="ltr">
	<head>
		<title><?php echo $blog->pageTitle('Crafty Gifts Blog - Tienda Facilweb', ' - '); ?></title>
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv="ImageToolbar" content="False" /><![endif]-->
		<meta name="author" content="Soluciones Navarro" />
		<meta name="generator" content="Incomedia WebSite X5 Pro 2020.2.2 - www.websitex5.com" />
		<meta name="description" content="<?php echo $blog->pageDescription(); ?>" />
		<meta name="keywords" content="<?php echo $blog->pageKeywords(); ?>" />
		<meta property="og:locale" content="es" />
<?php if (isset($data['id'])) { echo $blog->getOpengraphTags($data['id'], "\t\t"); } ?>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<link rel="stylesheet" href="../style/reset.css?2020-2-2-1" media="screen,print" />
		<link rel="stylesheet" href="../style/print.css?2020-2-2-1" media="print" />
		<link rel="stylesheet" href="../style/style.css?2020-2-2-1" media="screen,print" />
		<link rel="stylesheet" href="../style/template.css?2020-2-2-1" media="screen" />
		<link rel="stylesheet" href="../appsresources/font-awesome.css" media="screen, print" />
		<link rel="stylesheet" href="../pluginAppObj/imHeader_pluginAppObj_02/custom.css" media="screen, print" /><link rel="stylesheet" href="../pluginAppObj/imHeader_pluginAppObj_04/custom.css" media="screen, print" /><link rel="stylesheet" href="../pluginAppObj/imHeader_pluginAppObj_07/css/menu-overlay-effects.css" media="screen, print" />
		<link rel="stylesheet" href="../pluginAppObj/imHeader_pluginAppObj_07/css/custom.css" media="screen, print" />
		<link rel="stylesheet" href="../blog/style.css?2020-2-2-1-637314473412188178" media="screen,print" />
		<script src="../res/jquery.js?2020-2-2-1"></script>
		<script src="../res/x5engine.js?2020-2-2-1" data-files-version="2020-2-2-1"></script>
		<script src="../pluginAppObj/imHeader_pluginAppObj_02/main.js"></script><script src="../pluginAppObj/imHeader_pluginAppObj_04/main.js"></script><script src="../appsresources/js/classie.js"></script>
		<script src="../appsresources/js/modernizr.custom.js"></script>
		<script src="../appsresources/js/snap.svg-min.js"></script>
		<script src="../pluginAppObj/imHeader_pluginAppObj_07/js/main.js"></script>
		<script>
			window.onload = function(){ checkBrowserCompatibility('El Explorador que estás usando no es compatible con las funciones requeridas para mostrar este Sitio web.','El Navegador que estás utilizando podría no ser compatible con las funciones requeridas para poder ver este Sitio web.','[1]Actualiza tu explorador [/1] o [2]continuar de todos modos[/2].','http://outdatedbrowser.com/'); };
			x5engine.settings.currentPath = '../';
			x5engine.utils.currentPagePath = 'blog/index.php';
			x5engine.boot.push(function () { x5engine.imPageToTop.initializeButton({}); });
		</script>
		<link rel="icon" href="../favicon.png?2020-2-2-1-637314473411889572" type="image/png" />
		<link rel="alternate" type="application/rss+xml" title="Crafty Gifts Blog" href="../blog/x5feed.php" />
<?php
$blogBaseUrl = $imSettings['general']['url'] . 'blog';
$urlData = $blog->parseUrlArray(@$_GET);
$numPosts = $blog->getPostsCount();
$pagStart = array_key_exists("start", $urlData) ? $urlData['start'] : 0;
$pagLength = $imSettings['blog']['home_posts_number'];
$isPostPage = false;
if (array_key_exists('slug', $urlData)) {
	$isPostPage = true;
	$href = $blogBaseUrl . '/?' . $urlData['slug'];
}
else if (array_key_exists('id', $urlData)) {
	$isPostPage = true;
	$href = $blogBaseUrl . '/' . $blog->getSlugUrl($urlData['id']);
}
else if (array_key_exists('category', $urlData)) {
	$category = $blog->getUnescapedCategory($urlData['category']);
	if ($category !== NULL) {
		$href = $blogBaseUrl . '/?category=' . urlencode(str_replace(' ', '_', $category));
	}
}
else if (array_key_exists('author', $urlData)) {
	$author = $blog->getUnescapedAuthor($urlData['author']);
	if ($author !== NULL) {
		$href = $blogBaseUrl . '/?author=' . urlencode(str_replace(' ', '_', $author));
	}
}
else if (array_key_exists('tag', $urlData)) {
	$href = $blogBaseUrl . '/?tag=' . urlencode($urlData['tag']);
}
else if (array_key_exists('month', $urlData)) {
	$href = $blogBaseUrl . '/?month=' . urlencode($urlData['month']);
}
else {
	$href = $blogBaseUrl;
}
if ($isPostPage || $pagStart == 0) {
	echo '<link rel="canonical" href="'. $href. '"/>' . PHP_EOL;
}
if (!$isPostPage && $numPosts > $pagLength) {
	if ($pagStart - $pagLength >= 0) {
		$prev = 'start=' . ($pagStart - $pagLength) . '&length=' . $pagLength;
		$prev = ($href == $blogBaseUrl) ? '?' . $prev : '&' . $prev;
		echo '<link rel="prev" href="' . $href . $prev . '"/>' . PHP_EOL;
	}
	if ($pagStart + $pagLength < $numPosts) {
		$next = 'start=' . ($pagStart + $pagLength) . '&length=' . $pagLength;
		$next = ($href == $blogBaseUrl) ? '?' . $next : '&' . $next;
		echo '<link rel="next" href="' . $href . $next . '"/>' . PHP_EOL;
	}
}
?>
	</head>
	<body>
		<div id="imPageExtContainer">
			<div id="imPageIntContainer">
				<div id="imHeaderBg"></div>
				<div id="imFooterBg"></div>
				<div id="imPage">
					<header id="imHeader">
						<h1 class="imHidden">Crafty Gifts Blog - Tienda Facilweb</h1>
						<div id="imHeaderObjects"><div id="imHeader_imObjectImage_01_wrapper" class="template-object-wrapper"><div id="imHeader_imObjectImage_01"><div id="imHeader_imObjectImage_01_container"><a href="../blog/index.php" onclick="return x5engine.utils.location('../blog/index.php', null, false)"><img src="../images/logo.png" title="" alt="" />
</a></div></div></div><div id="imHeader_pluginAppObj_02_wrapper" class="template-object-wrapper"><!-- Font Awesome Icons v.13 --><div id="imHeader_pluginAppObj_02">        
        <script>
            if (true) {
                var container = $("#imHeader_pluginAppObj_02");  
                container.append("<div class='imHeader_pluginAppObj_02_child'></div>");
                var container_child = $(".imHeader_pluginAppObj_02_child");  
                var parsed_button = $.parseHTML(decode_html("<i id=\'imHeader_pluginAppObj_02_icon\' aria-hidden=\'true\'></i>"), null, true);
                container_child.append(parsed_button);
     
                var button = container_child.children("a").last();
                button.addClass("imHeader_pluginAppObj_02_link");
                container_child.append(button);
            }
            fontAwesomeIcons_imHeader_pluginAppObj_02();
       </script>
        <script>
function resizeFontAwesomeIcons_imHeader_pluginAppObj_02(){  var containerWidth = $('.imHeader_pluginAppObj_02_child').width();
  var fact = containerWidth < 20 ? containerWidth/20 : 1;
  $('.imHeader_pluginAppObj_02_child').css({height: 20*fact});
  var maxDimension = 20 > 20 ? 20 : 20;
  var fontSize = ((fact * maxDimension)/100)* 75;
  $('#imHeader_pluginAppObj_02_icon').css('font-size', fontSize);
}
x5engine.boot.push(function(){
$('#imContent').on('breakpointChangedOrFluid', function (e, breakpoint) {resizeFontAwesomeIcons_imHeader_pluginAppObj_02();});
resizeFontAwesomeIcons_imHeader_pluginAppObj_02();});
</script>

       </div></div><div id="imHeader_imTextObject_03_wrapper" class="template-object-wrapper"><div id="imHeader_imTextObject_03">
	<div data-index="0"  class="text-tab-content grid-prop current-tab "  id="imHeader_imTextObject_03_tab0" style="opacity: 1; ">
		<div class="text-inner">
			<div><span class="fs10lh1-5 cf1">+800 123-45-6789</span></div>
		</div>
	</div>

</div>
</div><div id="imHeader_pluginAppObj_04_wrapper" class="template-object-wrapper"><!-- Font Awesome Icons v.13 --><div id="imHeader_pluginAppObj_04">        
        <script>
            if (true) {
                var container = $("#imHeader_pluginAppObj_04");  
                container.append("<div class='imHeader_pluginAppObj_04_child'></div>");
                var container_child = $(".imHeader_pluginAppObj_04_child");  
                var parsed_button = $.parseHTML(decode_html("<i id=\'imHeader_pluginAppObj_04_icon\' aria-hidden=\'true\'></i>"), null, true);
                container_child.append(parsed_button);
     
                var button = container_child.children("a").last();
                button.addClass("imHeader_pluginAppObj_04_link");
                container_child.append(button);
            }
            fontAwesomeIcons_imHeader_pluginAppObj_04();
       </script>
        <script>
function resizeFontAwesomeIcons_imHeader_pluginAppObj_04(){  var containerWidth = $('.imHeader_pluginAppObj_04_child').width();
  var fact = containerWidth < 20 ? containerWidth/20 : 1;
  $('.imHeader_pluginAppObj_04_child').css({height: 20*fact});
  var maxDimension = 20 > 20 ? 20 : 20;
  var fontSize = ((fact * maxDimension)/100)* 75;
  $('#imHeader_pluginAppObj_04_icon').css('font-size', fontSize);
}
x5engine.boot.push(function(){
$('#imContent').on('breakpointChangedOrFluid', function (e, breakpoint) {resizeFontAwesomeIcons_imHeader_pluginAppObj_04();});
resizeFontAwesomeIcons_imHeader_pluginAppObj_04();});
</script>

       </div></div><div id="imHeader_imTextObject_05_wrapper" class="template-object-wrapper"><div id="imHeader_imTextObject_05">
	<div data-index="0"  class="text-tab-content grid-prop current-tab "  id="imHeader_imTextObject_05_tab0" style="opacity: 1; ">
		<div class="text-inner">
			<div><span class="fs10lh1-5 cf1">example@example.com</span></div>
		</div>
	</div>

</div>
</div><div id="imHeader_imMenuObject_06_wrapper" class="template-object-wrapper"><!-- UNSEARCHABLE --><div id="imHeader_imMenuObject_06"><div id="imHeader_imMenuObject_06_container"><div class="hamburger-button hamburger-component"><div><div><div class="hamburger-bar"></div><div class="hamburger-bar"></div><div class="hamburger-bar"></div></div></div></div><div class="hamburger-menu-background-container hamburger-component">
	<div class="hamburger-menu-background menu-mobile menu-mobile-animated hidden">
		<div class="hamburger-menu-close-button"><span>&times;</span></div>
	</div>
</div>
<ul class="menu-mobile-animated hidden">
	<li class="imMnMnFirst imPage" data-link-paths=",/tienda/index.html,/tienda/">
<div class="label-wrapper">
<div class="label-inner-wrapper">
		<a class="label" href="../index.html">
Inicio		</a>
</div>
</div>
	</li><li class="imMnMnMiddle imLevel" data-link-hash="706496780"><div class="label-wrapper"><div class="label-inner-wrapper"><a href="../cartsearch/index.html" class="label">Productos</a></div></div></li><li class="imMnMnMiddle imPage" data-link-paths=",/tienda/nosotros.html">
<div class="label-wrapper">
<div class="label-inner-wrapper">
		<a class="label" href="../nosotros.html">
Nosotros		</a>
</div>
</div>
	</li><li class="imMnMnMiddle imPage" data-link-paths=",/tienda/-contactenos.html">
<div class="label-wrapper">
<div class="label-inner-wrapper">
		<a class="label" href="../-contactenos.html">
 Contáctenos		</a>
</div>
</div>
	</li><li class="imMnMnMiddle imLevel" data-link-hash="706496783"><div class="label-wrapper"><div class="label-inner-wrapper"><a href="../cartsearch/index.html?discounted=1" class="label">Descuentos</a></div></div></li><li class="imMnMnLast imLevel" data-link-hash="334639460"><div class="label-wrapper"><div class="label-inner-wrapper"><a href="../cart/index.html" class="label">Carrito</a></div></div></li></ul></div></div><!-- UNSEARCHABLE END --><script>
var imHeader_imMenuObject_06_settings = {
	'menuId': 'imHeader_imMenuObject_06',
	'responsiveMenuEffect': 'slide',
	'animationDuration': 1000,
}
x5engine.boot.push(function(){x5engine.initMenu(imHeader_imMenuObject_06_settings)});
$(function () {$('#imHeader_imMenuObject_06_container ul li').not('.imMnMnSeparator').each(function () {    var $this = $(this), timeout = 0;    $this.on('mouseenter', function () {        if($(this).parents('#imHeader_imMenuObject_06_container-menu-opened').length > 0) return;         clearTimeout(timeout);        setTimeout(function () { $this.children('ul, .multiple-column').stop(false, false).fadeIn(); }, 250);    }).on('mouseleave', function () {        if($(this).parents('#imHeader_imMenuObject_06_container-menu-opened').length > 0) return;         timeout = setTimeout(function () { $this.children('ul, .multiple-column').stop(false, false).fadeOut(); }, 250);    });});});
$(function () {$('#imHeader_imMenuObject_06_container > ul > li').not('.imMnMnSeparator').each(function () {    var $this = $(this), timeout = 0;    $this.on('mouseenter', function () {        clearTimeout(timeout);        var overElem = $this.children('.label-wrapper-over');        if(overElem.length == 0)            overElem = $this.children('.label-wrapper').clone().addClass('label-wrapper-over').appendTo($this);        setTimeout(function(){overElem.addClass('animated');}, 10);    }).on('mouseleave', function () {        var overElem = $this.children('.label-wrapper-over');        overElem.removeClass('animated');        timeout = setTimeout(function(){overElem.remove();}, 500);    });});});
</script>
</div><div id="imHeader_pluginAppObj_07_wrapper" class="template-object-wrapper"><!-- Overlay Menu v.5 --><div id="imHeader_pluginAppObj_07">
           <div class="trigger-overlay hamburger-button">
                <div>
                    <div>
                        <div class="hamburger-bar"></div>
                        <div class="hamburger-bar"></div>
                        <div class="hamburger-bar"></div>
                    </div>
                </div>
            </div>
        
            <script>
                var wsx5Data_imHeader_pluginAppObj_07 = {};
                wsx5Data_imHeader_pluginAppObj_07.id = "imHeader_pluginAppObj_07";
                wsx5Data_imHeader_pluginAppObj_07.preview = ("online" === 'uipreview' ? true : false);
                wsx5Data_imHeader_pluginAppObj_07.fw = ("" ? "true" : "false");
                wsx5Data_imHeader_pluginAppObj_07.param_effects = "fade";
                wsx5Data_imHeader_pluginAppObj_07.anim_duration = 800;
                overlaymenu_imHeader_pluginAppObj_07(wsx5Data_imHeader_pluginAppObj_07);
            </script>
       </div></div><div id="imHeader_imObjectSearch_08_wrapper" class="template-object-wrapper"><div id="imHeader_imObjectSearch_08"><form id="imHeader_imObjectSearch_08_form" action="../imsearch.php" method="get"><fieldset><input type="text" id="imHeader_imObjectSearch_08_field" name="search" value="" /><button id="imHeader_imObjectSearch_08_button">Buscar</button></fieldset></form><script>$('#imHeader_imObjectSearch_08_button').click(function() { $(this).prop('disabled', true); setTimeout(function(){ $('#imHeader_imObjectSearch_08_button').prop('disabled', false);}, 900); $('#imHeader_imObjectSearch_08_form').submit(); return false; });</script></div></div></div>
					</header>
					<div id="imStickyBarContainer">
						<div id="imStickyBarGraphics"></div>
						<div id="imStickyBar">
							<div id="imStickyBarObjects"></div>
						</div>
					</div>
					<a class="imHidden" href="#imGoToCont" title="Salta el menu principal">Vaya al Contenido</a>
					<div id="imSideBar">
						<div id="imSideBarObjects"></div>
					</div>
					<div id="imContentGraphics"></div>
					<main id="imContent">
						<a id="imGoToCont"></a>
						<div id="imBlogPage" class="<?php echo (isset($data['id']) ? 'imBlogArticle' : 'imBlogHome'); ?>"><<?php echo (isset($data['id']) ? 'article' : 'div'); ?> id="imBlogContent"><?php
						if(isset($data['id']))
							$blog->showPost($data['id'],1);
						else if(isset($data['category']))
							$blog->showCategory($data['category']);
						else if(isset($data['author']))
							$blog->showAuthor($data['author']);
						else if(isset($data['tag']))
							$blog->showTag($data['tag']);
						else if(isset($data['month']))
							$blog->showMonth($data['month']);
						else if(isset($data['search']))
							$blog->showSearch($data['search']);
						else
							$blog->showLast(4);
						?>
						</<?php echo (isset($data['id']) ? 'article' : 'div'); ?>>
						<aside id="imBlogSidebar">
							<div class="imBlogBlock" id="imBlogBlock0">
								<div>
									<div class="imBlogBlockTitle">Categorías</div>
						<?php $blog->showBlockCategories(4) ?>
								</div>
							</div>
							<div class="imBlogBlock" id="imBlogBlock1">
								<div>
									<div class="imBlogBlockTitle">Artículos recientes</div>
						<?php $blog->showBlockLast(4) ?>
								</div>
							</div>
							<div class="imBlogBlock" id="imBlogBlock2">
								<div>
									<div class="imBlogBlockTitle">Imagen</div>
									<div class="imBlogImageBlock"><a href="../cartsearch/index.html?discounted=1"><img src="../blog/images/sidebanner.png"></a></div>
								</div>
							</div>
						</aside>
						<script>
							x5engine.boot.push(function () { 
								x5engine.blogSidebarScroll({ enabledBreakpoints: ['ea2f0ee4d5cbb25e1ee6c7c4378fee7b', 'd2f9bff7f63c0d6b7c7d55510409c19b', '72e5146e7d399bc2f8a12127e43469f1'] });
								var postHeightAtDesktop = 350,
									postWidthAtDesktop = 780;
								if ($('#imBlogPage').hasClass('imBlogArticle')) {
									var coverResizeTo = null,
										coverWidth = 0;
									x5engine.utils.onElementResize($('.imBlogPostCover')[0], function (rect, target) {
										if (coverWidth == rect.width) {
											return;
										}
										coverWidth = rect.width;
										if (!!coverResizeTo) {
											clearTimeout(coverResizeTo);
										}
										coverResizeTo = setTimeout(function() {
											$('.imBlogPostCover').height(postHeightAtDesktop * coverWidth / postWidthAtDesktop + 'px');
										}, 50);
									});
								}
							});
						</script>
						</div>
					</main>
					<footer id="imFooter">
						<div id="imFooterObjects"><div id="imFooter_imTextObject_01_wrapper" class="template-object-wrapper"><div id="imFooter_imTextObject_01">
	<div data-index="0"  class="text-tab-content grid-prop current-tab "  id="imFooter_imTextObject_01_tab0" style="opacity: 1; ">
		<div class="text-inner">
			<div class="imTACenter"><span class="fs11lh1-5 cf1">Created with <b>WebSite X5</b></span></div>
		</div>
	</div>

</div>
</div><div id="imFooter_imTextObject_02_wrapper" class="template-object-wrapper"><div id="imFooter_imTextObject_02">
	<div data-index="0"  class="text-tab-content grid-prop current-tab "  id="imFooter_imTextObject_02_tab0" style="opacity: 1; ">
		<div class="text-inner">
			<div><span class="fs16lh1-5 cf1 ff1"><b>Payments</b></span></div><div data-line-height="1.15" class="lh1-15 mt1"><span class="fs11lh1-15">Configure your own payments methods.</span></div>
		</div>
	</div>

</div>
</div><div id="imFooter_imObjectImage_03_wrapper" class="template-object-wrapper"><div id="imFooter_imObjectImage_03"><div id="imFooter_imObjectImage_03_container"><img src="../images/ccards.jpg" title="" alt="" />
</div></div></div><div id="imFooter_imTextObject_04_wrapper" class="template-object-wrapper"><div id="imFooter_imTextObject_04">
	<div data-index="0"  class="text-tab-content grid-prop current-tab "  id="imFooter_imTextObject_04_tab0" style="opacity: 1; ">
		<div class="text-inner">
			<div><span class="fs16lh1-5 cf1 ff1"><b>Shipping</b></span></div><div data-line-height="1" class="lh1 mt1"><span class="fs11lh1">Configure your own shipping methods.</span></div><div data-line-height="1" class="lh1 mt2"><span class="fs11lh1">&gt; The first one</span></div><div data-line-height="1" class="lh1 mt2"><span class="fs11lh1">&gt; The second one</span></div><div data-line-height="1" class="lh1 mt2"><span class="fs11lh1">&gt; The third one</span></div>
		</div>
	</div>

</div>
</div><div id="imFooter_imTextObject_05_wrapper" class="template-object-wrapper"><div id="imFooter_imTextObject_05">
	<div data-index="0"  class="text-tab-content grid-prop current-tab "  id="imFooter_imTextObject_05_tab0" style="opacity: 1; ">
		<div class="text-inner">
			<div><span class="fs16lh1-5 cf1 ff1"><b>Contact Us</b></span></div><div data-line-height="1" class="lh1 mt1"><span class="fs11lh1">Configure your own contact methods.</span></div><div data-line-height="1" class="lh1 mt2"><span class="fs11lh1">Phone: +800 123-45-6789</span></div><div data-line-height="1" class="lh1 mt2"><span class="fs11lh1">Fax: +800 123-45-6789</span></div><div data-line-height="1" class="lh1 mt2"><span class="fs11lh1">Email: <a href="mailto:example@example.com?subject=&amp;body=" class="imCssLink">example@example.com</a></span></div>
		</div>
	</div>

</div>
</div></div>
					</footer>
				</div>
				<span class="imHidden"><a href="#imGoToCont" title="Lea esta página de nuevo">Regreso al contenido</a></span>
			</div>
		</div>
		<script src="../cart/x5cart.js?2020-2-2-1-637314473412197758"></script>

		<noscript class="imNoScript"><div class="alert alert-red">Para utilizar este sitio tienes que habilitar JavaScript.</div></noscript>
	</body>
</html>
