<?php

namespace Flagrow\Masquerade\Listeners;

use Flarum\Api\Event\Serializing;
use Flarum\Api\Serializer\ForumSerializer;
use Illuminate\Contracts\Events\Dispatcher;

class InjectPermissions
{
    public function subscribe(Dispatcher $events)
    {
        $events->listen(Serializing::class, [$this, 'permissions']);
    }

    public function permissions(Serializing $event)
    {
        if ($event->serializer instanceof ForumSerializer) {
            $event->attributes['canViewMasquerade'] = $event->actor->can('flagrow.masquerade.view-profile');
            $event->attributes['canHaveMasquerade'] = $event->actor->can('flagrow.masquerade.have-profile');
        }
    }
}
