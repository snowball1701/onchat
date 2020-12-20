<?php

declare(strict_types=1);

namespace app\listener\websocket;

use app\core\service\User as UserService;

class Unload extends BaseListener
{

    /**
     * 事件监听处理
     *
     * @return mixed
     */
    public function handle($event)
    {
        $user = $this->getUserByFd();
        $this->removeFdUserPair();
        $this->removeUserIdFdPair($user['id']);

        $chatrooms = UserService::getChatrooms($user['id'])->data;

        // 退出房间
        foreach ($chatrooms as $chatroom) {
            $this->websocket->leave(parent::ROOM_CHATROOM . $chatroom['id']);
        }
        $this->websocket->leave(parent::ROOM_FRIEND_REQUEST . $user['id']);
        $this->websocket->leave(parent::ROOM_CHAR_INVITATION . $user['id']);
    }
}
