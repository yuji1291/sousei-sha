<ul class="media-list">
     @if (count($tasks) > 0)
    @foreach ($tasks as $task)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($task->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    <p class="mb-0">{!! nl2br(e($task->start_date)) !!}</p>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($task->title)) !!}</p>
                </div>
        </li>
    @endforeach
    @endif
</ul>