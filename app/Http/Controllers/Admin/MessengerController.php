<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QaTopicCreateRequest;
use App\Http\Requests\QaTopicReplyRequest;
use App\Models\QaTopic;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessengerController extends Controller
{
    public function index()
    {
        $topics = QaTopic::where(function ($query) {
            $query
                ->where('creator_id', Auth::id())
                ->orWhere('receiver_id', Auth::id());
        })
            ->orderBy('created_at', 'DESC')
            ->get();

        $title   = trans('global.all_messages');
        $unreads = $this->unreadTopics();
        $breadcrumb = "Message";
        return view('admin.messenger.index', compact('topics', 'title', 'unreads', 'breadcrumb'));
    }

    public function createTopic()
    {
        $users = User::all()
            ->except(Auth::id());

        $unreads = $this->unreadTopics();
        $breadcrumb = "New Message";
        return view('admin.messenger.create', compact('users', 'unreads', 'breadcrumb'));
    }

    public function storeTopic(QaTopicCreateRequest $request)
    {
        $topic = QaTopic::create([
            'subject'     => $request->input('subject'),
            'creator_id'  => Auth::id(),
            'receiver_id' => $request->input('recipient'),
        ]);

        $topic->messages()->create([
            'sender_id' => Auth::id(),
            'content'   => $request->input('content'),
        ]);

        return redirect()->route('admin.messenger.index');
    }

    public function showMessages(QaTopic $topic)
    {
        $this->checkAccessRights($topic);

        foreach ($topic->messages as $message) {
            if ($message->sender_id !== Auth::id() && $message->read_at === null) {
                $message->read_at = Carbon::now();
                $message->save();
            }
        }

        $unreads = $this->unreadTopics();
        $breadcrumb = "View Message";
        return view('admin.messenger.show', compact('topic', 'unreads', 'breadcrumb'));
    }

    public function destroyTopic(QaTopic $topic)
    {
        $this->checkAccessRights($topic);

        $topic->delete();

        return redirect()->route('admin.messenger.index');
    }

    public function showInbox()
    {
        $title = trans('global.inbox');

        $topics = QaTopic::where('receiver_id', Auth::id())
            ->orderBy('created_at', 'DESC')
            ->get();

        $unreads = $this->unreadTopics();
        $breadcrumb = "Message - Inbox";
        return view('admin.messenger.index', compact('topics', 'title', 'unreads', 'breadcrumb'));
    }

    public function showOutbox()
    {
        $title = trans('global.outbox');

        $topics = QaTopic::where('creator_id', Auth::id())
            ->orderBy('created_at', 'DESC')
            ->get();

        $unreads = $this->unreadTopics();
        $breadcrumb = "Message - Outbox";
        return view('admin.messenger.index', compact('topics', 'title', 'unreads', 'breadcrumb'));
    }

    public function replyToTopic(QaTopicReplyRequest $request, QaTopic $topic)
    {
        $this->checkAccessRights($topic);

        $topic->messages()->create([
            'sender_id' => Auth::id(),
            'content'   => $request->input('content'),
        ]);
        
        return redirect()->route('admin.messenger.index');
    }

    public function showReply(QaTopic $topic)
    {
        $this->checkAccessRights($topic);

        $receiverOrCreator = $topic->receiverOrCreator();

        if ($receiverOrCreator === null || $receiverOrCreator->trashed()) {
            abort(404);
        }

        $unreads = $this->unreadTopics();
        $breadcrumb = "Reply Message";
        return view('admin.messenger.reply', compact('topic', 'unreads', 'breadcrumb'));
    }

    public function unreadTopics(): array
    {
        $topics = QaTopic::where(function ($query) {
            $query
                ->where('creator_id', Auth::id())
                ->orWhere('receiver_id', Auth::id());
        })
            ->with('messages')
            ->orderBy('created_at', 'DESC')
            ->get();

        $inboxUnreadCount  = 0;
        $outboxUnreadCount = 0;

        foreach ($topics as $topic) {
            foreach ($topic->messages as $message) {
                if (
                    $message->sender_id !== Auth::id()
                    && $message->read_at === null
                ) {
                    if ($topic->creator_id !== Auth::id()) {
                        ++$inboxUnreadCount;
                    } else {
                        ++$outboxUnreadCount;
                    }
                }
            }
        }

        return [
            'inbox'  => $inboxUnreadCount,
            'outbox' => $outboxUnreadCount,
        ];
    }

    private function checkAccessRights(QaTopic $topic)
    {
        $user = Auth::user();

        if ($topic->creator_id !== $user->id && $topic->receiver_id !== $user->id) {
            return abort(401);
        }
    }
}
