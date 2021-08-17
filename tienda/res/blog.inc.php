<?php



$imSettings['blog'] = array(	'description' => '',
	'root' => 'http://localhost:9192/tienda/blog/',
	'home_posts_number' => 4,
	'card_type' => 'leftcoverrightcontents',
	'show_card_title' => true,
	'show_card_category' => true,
	'show_card_description' => true,
	'show_card_author' => true,
	'show_card_date' => true,
	'show_card_button' => true,
	'article_type' => 'covertitlecontents',
	'file_prefix' => 'x5_',
	'comments_source' => 'external', 
	'comments_code' => '<div id="fb-root"></div><div class="fb-comments" data-href="http://localhost:9192/tienda/blog/index.php" data-numposts="5" data-width="100%" data-colorscheme="light"></div><script>$(".fb-comments").attr("data-href", location.href);(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.6";fjs.parentNode.insertBefore(js, fjs);}(document, \'script\', \'facebook-jssdk\'));</script>',
	'highlight_mode' => 'none',
	'categories' => Array('Sample Articles'),
	'posts' => Array(),
	'posts_cat' => Array(),
	'posts_author' => Array(),
	'posts_month' => Array(),
	'posts_slug' => Array()
)
;

// Post titled "Fourth Article"
$imSettings['blog']['posts']['000000008'] = array(
	'id' => '000000008',
	'rel_url' => '?fourth-article',
	'title' => 'Fourth Article',
	'tag_title' => 'Fourth Article - Crafty Gifts Blog - Tienda Facilweb',
	'title_heading_tag' => 'h2',
	'slug' => 'fourth-article',
	'author' => 'WebSiteX5',
	'category' => 'Sample Articles',
	'cardCover' => 'blog/files/large-887272_thumb.jpg',
	'cover' => 'blog/files/large-887272.jpg',
	'summary' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
	'tag_description' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
	'body' => "<div id=\"imBlogPost_000000008\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.<div><br></div><div class=\"imHeading4\">Lorem Ipsum</div><div>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</div><div><br></div><div>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</div><div style=\"clear: both;\"><!-- clear floated images --></div></div>",
	'keywords' => '',
	'timestamp' => '5/6/2020',
	'utc_time' => 1591358040,
	'month' => '202006',
	'comments' => false,
	'sources' => array(),
	'tag' => array(),
	'opengraph' => array(
		'url' => 'http://localhost:9192/tienda/blog/?fourth-article',
		'type' => 'article',
		'title' => 'Fourth Article',
		'description' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
		'keywords' => '',
		'updated_time' => '1591358041',
		'images' => array('http://localhost:9192/tienda/blog/files/large-887272_thumb.jpg','http://localhost:9192/tienda/blog/files/large-887272.jpg')
	)
);$imSettings['blog']['posts_slug']['fourth-article'] = '000000008';

// Post titled "Third Article"
$imSettings['blog']['posts']['000000007'] = array(
	'id' => '000000007',
	'rel_url' => '?third-article',
	'title' => 'Third Article',
	'tag_title' => 'Third Article - Crafty Gifts Blog - Tienda Facilweb',
	'title_heading_tag' => 'h2',
	'slug' => 'third-article',
	'author' => 'WebSiteX5',
	'category' => 'Sample Articles',
	'cardCover' => 'blog/files/large-2107599_thumb.jpg',
	'cover' => 'blog/files/large-2107599.jpg',
	'summary' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
	'tag_description' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
	'body' => "<div id=\"imBlogPost_000000007\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.<div><br></div><div class=\"imHeading4\">Lorem Ipsum</div><div>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</div><div><br></div><div>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</div><div style=\"clear: both;\"><!-- clear floated images --></div></div>",
	'keywords' => '',
	'timestamp' => '5/6/2020',
	'utc_time' => 1591358040,
	'month' => '202006',
	'comments' => false,
	'sources' => array(),
	'tag' => array(),
	'opengraph' => array(
		'url' => 'http://localhost:9192/tienda/blog/?third-article',
		'type' => 'article',
		'title' => 'Third Article',
		'description' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
		'keywords' => '',
		'updated_time' => '1591358041',
		'images' => array('http://localhost:9192/tienda/blog/files/large-2107599_thumb.jpg','http://localhost:9192/tienda/blog/files/large-2107599.jpg')
	)
);$imSettings['blog']['posts_slug']['third-article'] = '000000007';

// Post titled "Second Article"
$imSettings['blog']['posts']['000000005'] = array(
	'id' => '000000005',
	'rel_url' => '?test-article-1',
	'title' => 'Second Article',
	'tag_title' => 'Second Article - Crafty Gifts Blog - Tienda Facilweb',
	'title_heading_tag' => 'h2',
	'slug' => 'test-article-1',
	'author' => 'WebSiteX5',
	'category' => 'Sample Articles',
	'cardCover' => 'blog/files/large-2390136_thumb.jpg',
	'cover' => 'blog/files/large-2390136.jpg',
	'summary' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
	'tag_description' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
	'body' => "<div id=\"imBlogPost_000000005\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.<div><br></div><div class=\"imHeading4\">Lorem Ipsum</div><div>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</div><div><br></div><div>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</div><div style=\"clear: both;\"><!-- clear floated images --></div></div>",
	'keywords' => '',
	'timestamp' => '5/6/2020',
	'utc_time' => 1591358040,
	'month' => '202006',
	'comments' => false,
	'sources' => array(),
	'tag' => array(),
	'opengraph' => array(
		'url' => 'http://localhost:9192/tienda/blog/?test-article-1',
		'type' => 'article',
		'title' => 'Second Article',
		'description' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
		'keywords' => '',
		'updated_time' => '1591358041',
		'images' => array('http://localhost:9192/tienda/blog/files/large-2390136_thumb.jpg','http://localhost:9192/tienda/blog/files/large-2390136.jpg')
	)
);$imSettings['blog']['posts_slug']['test-article-1'] = '000000005';

// Post titled "First Article"
$imSettings['blog']['posts']['000000004'] = array(
	'id' => '000000004',
	'rel_url' => '?test-article',
	'title' => 'First Article',
	'tag_title' => 'First Article - Crafty Gifts Blog - Tienda Facilweb',
	'title_heading_tag' => 'h2',
	'slug' => 'test-article',
	'author' => 'WebSiteX5',
	'category' => 'Sample Articles',
	'cardCover' => 'blog/files/large-1163695_thumb.jpg',
	'cover' => 'blog/files/large-1163695.jpg',
	'summary' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
	'tag_description' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
	'body' => "<div id=\"imBlogPost_000000004\">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.<div><br></div><div class=\"imHeading4\">Lorem Ipsum</div><div>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</div><div><br></div><div>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</div><div style=\"clear: both;\"><!-- clear floated images --></div></div>",
	'keywords' => '',
	'timestamp' => '5/6/2020',
	'utc_time' => 1591358040,
	'month' => '202006',
	'comments' => false,
	'sources' => array(),
	'tag' => array(),
	'opengraph' => array(
		'url' => 'http://localhost:9192/tienda/blog/?test-article',
		'type' => 'article',
		'title' => 'First Article',
		'description' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
		'keywords' => '',
		'updated_time' => '1591358041',
		'images' => array('http://localhost:9192/tienda/blog/files/large-1163695_thumb.jpg','http://localhost:9192/tienda/blog/files/large-1163695.jpg')
	)
);$imSettings['blog']['posts_slug']['test-article'] = '000000004';
$imSettings['blog']['posts_cat'] = array(
	'Sample Articles' => array(
		'000000008',
		'000000007',
		'000000005',
		'000000004'
	)
);
$imSettings['blog']['posts_author'] = array(
	'WebSiteX5' => array(
		'000000008',
		'000000007',
		'000000005',
		'000000004'
	)
);
$imSettings['blog']['posts_month'] = array(
	'202006' => array(
		'000000008',
		'000000007',
		'000000005',
		'000000004'
	)
);
$imSettings['blog']['posts_tag'] = array();

// End of file blog.inc.php