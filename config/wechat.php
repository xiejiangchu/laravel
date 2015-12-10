<?php
return [
	'use_alias' => env('WECHAT_USE_ALIAS', false),
	'app_id'    => env('WECHAT_APPID', 'wx64775ef4863b4175'), // 必填
	'secret'    => env('WECHAT_SECRET', 'd4624c36b6795d1d99dcf0547af5443d'), // 必填
	'token'     => env('WECHAT_TOKEN', 'xiejiangchu'), // 必填
	// 'encoding_key' => env('WECHAT_ENCODING_KEY', '7NKC0J7utwvaSszaF41nlQAEXXFGFe5vcYz7tVRvMCS'), // 加密模式需要，其它模式不需要
];