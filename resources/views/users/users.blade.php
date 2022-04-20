@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                <img class="mr-2 rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
                <div class="media-body">
                     <div class="d-flex justify-content-start">
                        <div>
                        {{ $user->name }}
                        <p>{!! link_to_route('users.show', 'スケジュール', ['id' => $user->id]) !!}</p>
                        </div>
                    @include('user_follow.follow_button', ['user' => $user])
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
      {{ $users->links('pagination::bootstrap-4') }}
@endif