@if (count($tasklists) > 0)
    <ul class="list-unstyled">
        @foreach ($tasklists as $tasklist)
        <li class="media mb-3">
            <div class="media-body">
            <div>
                {{-- 投稿内容 --}}
                <p class="mb-0">{!! nl2br(e($tasklist->content)) !!}</p>
            </div>
            <div>
                @if (Auth::id() == $tasklist->user_id)
                    {{-- 投稿削除ボタンのフォーム --}}
                    {!! Form::open(['route' => ['tasklists.destroy', $tasklist->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $tasklists->links() }}
@endif