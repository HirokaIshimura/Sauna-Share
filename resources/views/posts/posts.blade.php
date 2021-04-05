@if (count($posts) > 0)
    <ul class="list-unstyled">
        @foreach ($posts as $post)
            <li class="media mb-3">
                <div class="media-body" style="display:flex;">
                    <div class="card" style="flex-grow:1; width:100%; height:auto;">
                        
                        <div class="card-header bg-dark">
                            <img class="mr-2 rounded" style="width:50px; height:50px" src="{{ asset('storage/profiles/'.$user->profile_image) }}" alt="プロフィール画像">
                            {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                            <span>{!! link_to_route('users.show', $post->user->name, ['user' => $post->user->id], ['class' => 'text-white']) !!}</span>
                        </div>
                        
                        <div class="card-header">
                            <h4 class="mb-2 text-dark">{!! nl2br(e($post->title)) !!}</h4>
                        </div>
                        
                        <div class="card-body">
                            
                            {{-- 投稿内容 --}}
                            <div class="post-content">
                                <p class="mb-2 text-dark">{!! nl2br(e($post->content)) !!}</p>
                            </div>
                            
                            @if ($post->picture_url != null)
                                <div class="post-picture">
                                    <img src ="{{ asset('storage/post_pictures/'.$post->picture_url) }}">
                                </div>
                            @endif
                            
                        </div>
                        
                        <div class="card-footer">
                            <p class="text-dark">posted at {{ $post->created_at }}</p>
                            
                            @if (Auth::id() == $post->user_id)
                                <div style="display:flex; flex-direction:row-reverse;"> 
                                    <div>
                                        {{-- 投稿編集ページへのフォーム --}}
                                        {!! link_to_route('posts.edit', '編集', ['post' => $post->id], ['class' => 'btn btn-secondary btn-sm']) !!}
                                    </div>
                                    <div>
                                        {{-- 投稿削除ボタンのフォーム --}}
                                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $posts->links() }}
@endif