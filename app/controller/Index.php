<?php

declare(strict_types=1);

namespace app\controller;

use HTMLPurifier;
use app\model\User;
use think\Response;
use think\facade\Db;
use app\BaseController;
use app\model\Chatroom as ChatroomModel;
use app\model\UserInfo;
use think\facade\Cache;
use app\core\oss\Client;
use HTMLPurifier_Config;
use app\model\ChatMember;
use app\model\ChatRecord;
use app\model\ChatSession;
use OSS\Core\OssException;
use app\model\FriendRequest;
use app\core\util\Arr as ArrUtil;
use app\core\util\Sql as SqlUtil;
use think\captcha\facade\Captcha;
use app\core\util\Date as DateUtil;
use app\core\oss\Client as OssClient;
use Identicon\Generator\SvgGenerator;
use app\core\service\User as UserService;
use app\core\service\Friend as FriendService;
use app\core\service\Chatroom as ChatroomService;
use app\core\service\Chat as ChatService;
use app\core\identicon\generator\ImageMagickGenerator;
use app\model\ChatRequest;
use think\facade\Config;

class Index extends BaseController
{

    public function index()
    {
        // $data = ChatroomModel::join('user', 'user.id = chatroom.id')->field('chatroom.*')->where('chatroom.id', 1)->find();
        // $data->name = 'TestChatroom';
        // $data->save();
        // dump(ChatService::agree(1, 1));
        // dump(User::find(1));
        $id = 21;
        $userId = 1;
        dump([
            ChatroomModel::TYPE_SINGLE_CHAT  => 1,
            ChatroomModel::TYPE_PRIVATE_CHAT => 2,
            ChatroomModel::TYPE_GROUP_CHAT   => 100,
        ][2]);
    }

    /**
     * 验证码
     *
     * @return Response
     */
    public function captcha(): Response
    {
        return Captcha::create();
    }
}
