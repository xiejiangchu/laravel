<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Overtrue\Wechat\Server;

class WechatController extends Controller {
	const MSGTYPE_TEXT     = "text";
	const MSGTYPE_IMAGE    = "image";
	const MSGTYPE_MUSIC    = "voice";
	const MSGTYPE_VIDEO    = "video";
	const MSGTYPE_LOCATION = "location";
	const MSGTYPE_LINK     = "link";
	const MSGTYPE_NEWS     = "news";

	const EVENT_SUBSCRIBE   = 'subscribe';
	const EVENT_UNSUBSCRIBE = 'unsubscribe';
	const EVENT_SCAN        = 'SCAN';
	const EVENT_LOCATION    = 'LOCATION';
	const EVENT_CLICK       = 'CLICK';
	const EVENT_VIEW        = 'VIEW';

	/**
	 *      'wechat.server'    => 'Overtrue\Wechat\Server',
	 *      'wechat.user'      => 'Overtrue\Wechat\User',
	 *      'wechat.group'     => 'Overtrue\Wechat\Group',
	 *      'wechat.auth'      => 'Overtrue\Wechat\Auth',
	 *      'wechat.menu'      => 'Overtrue\Wechat\Menu',
	 *      'wechat.menu.item' => 'Overtrue\Wechat\MenuItem',
	 *      'wechat.js'        => 'Overtrue\Wechat\Js',
	 *      'wechat.staff'     => 'Overtrue\Wechat\Staff',
	 *      'wechat.store'     => 'Overtrue\Wechat\Store',
	 *      'wechat.card'      => 'Overtrue\Wechat\Card',
	 *      'wechat.qrcode'    => 'Overtrue\Wechat\QRCode',
	 *      'wechat.url'       => 'Overtrue\Wechat\Url',
	 *      'wechat.media'     => 'Overtrue\Wechat\Media',
	 *      'wechat.image'     => 'Overtrue\Wechat\Image',
	 *      'wechat.notice'    => 'Overtrue\Wechat\Notice',
	 *      'wechat.media'     => 'Overtrue\Wechat\Media',
	 *
	 *
	 * 		我们有三种方式获取 SDK 的服务实例
	 *
	 *      使用容器的自动注入
	 *
	 *      <?php namespace App\Http\Controllers;
	 *
	 *      use Overtrue\Wechat\Auth;
	 *
	 *      class WechatController extends Controller {
	 *
	 *          public function demo(Auth $auth)
	 *          {
	 *              // $auth 则为容器中 Overtrue\Wechat\Auth 的实例
	 *          }
	 *      }
	 *      使用别名/类名从容器获取对应实例
	 *
	 *      上面已经列出了所有可用的别名对应关系，你可以使用别名或者类名获取对应的实例：
	 *
	 *        $wechatServer = App::make('wechat.server'); // 服务端
	 *        $wechatUser = App::make('wechat.user'); // 用户服务
	 *        或者：
	 *        $wechatUser = App::make('Overtrue\Wechat\User'); // 用户服务
	 *        // ... 其它同理
	 *      使用外观 Wechat
	 *
	 *      $wechatServer = Wechat::server();
	 *      $wechatUser = Wechat::user();
	 *      //... 其它同理
	 *
	 *
	 *
	 */

	/**
	 * 处理微信的所有请求
	 *
	 * @param Overtrue\Wechat\Server $server
	 *
	 * @return string
	 */
	public function serve(Server $server) {

		//监听消息
		$server->on('message', function ($message) {
			return self::dispatchMessage($message);
		});

		//监听事件
		$server->on('event', function ($event) {
			return self::dispatchEvent($event);
		});

		return $server->serve(); // 或者 return $server;
	}

	public function dispatchEvent($event) {
		// return "收到事件 " . $event->Event;
		//
		switch ($event->Event) {

		case self::EVENT_SUBSCRIBE:
			# code...
			return self::handleSubscribe($event);

			break;
		case self::EVENT_UNSUBSCRIBE:
			# code...
			return self::handleUnsubscribe($event);

			break;
		case self::EVENT_SCAN:
			# code...
			// return self::handleMusic($message);
			break;
		case self::EVENT_LOCATION:
			# code...
			// return self::handleVideo($message);
			break;
		case self::EVENT_CLICK:
			# code...
			// return self::handleLocation($message);
			break;
		case self::EVENT_VIEW:
			# code...
			// return self::handleLink($message);
			break;
		}
	}

	public function dispatchMessage($message) {
		// return "欢迎关注 桃李荟！" . $message->MsgType;
		switch ($message->MsgType) {

		case self::MSGTYPE_TEXT:
			# code...
			return self::handleText($message);

			break;
		case self::MSGTYPE_IMAGE:
			# code...
			return self::handleImage($message);

			break;
		case self::MSGTYPE_MUSIC:
			# code...
			return self::handleMusic($message);
			break;
		case self::MSGTYPE_VIDEO:
			# code...
			return self::handleVideo($message);
			break;
		case self::MSGTYPE_LOCATION:
			# code...
			return self::handleLocation($message);
			break;
		case self::MSGTYPE_LINK:
			# code...
			return self::handleLink($message);
			break;
		case self::MSGTYPE_NEWS:
			# code...
			return self::handleNews($message);
			break;

		}
	}

	public function handleText($message) {
		return "欢迎关注 桃李荟，有什么可以帮助您的！" . $message->Content;
	}

	public function handleImage($message) {
		return "欢迎关注 桃李荟，有什么可以帮助您的！" . $message->Content;
	}

	public function handleMusic($message) {
		return "欢迎关注 桃李荟，有什么可以帮助您的！" . $message->Content;
	}

	public function handleVideo($message) {
		return "欢迎关注 桃李荟，有什么可以帮助您的！" . $message->Content;
	}

	public function handleLocation($message) {
		return "欢迎关注 桃李荟，有什么可以帮助您的！" . $message->Content;
	}

	public function handleLink($message) {
		return "欢迎关注 桃李荟，有什么可以帮助您的！" . $message->Content;
	}

	public function handleNews($message) {
		return "欢迎关注 桃李荟，有什么可以帮助您的！" . $message->Content;
	}

	public function handleSubscribe($event) {
		return "欢迎您 " . $event->FromUserName . "  订阅 桃李荟";
	}

	public function handleUnsubscribe($event) {
		return "欢迎您 " . $event->FromUserName . "  再次订阅 桃李荟";
	}

}
