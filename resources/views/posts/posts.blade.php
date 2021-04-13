<div class="user-posts">
    @if (count($posts) > 0)
        <ul class="list-unstyled">
            @foreach ($posts as $post)
                <li class="media mb-3">
                    <div class="media-body" style="display:flex;">
                        <div class="card" style="width:100%; height:auto;">
                            
                            <div class="card-header">
                                <img class="mr-2" style="width:50px; height:50px; border-radius:50%;" src="{{ asset('storage/profiles/'.$post->user->profile_image) }}" alt="プロフィール画像">
                                {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                                <span>{!! link_to_route('users.show', $post->user->name, ['user' => $post->user->id], ['class' => 'text-dark']) !!}</span>
                            </div>
                            
                            <div class="card-header bg-white">
                                <h4 class="text-dark">{!! nl2br(e($post->title)) !!}</h4>
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
                            
                            <div class="card-footer bg-white" style="display:flex; flex-direction:row-reverse;">
                                <div>
                                    <p class="text-dark">posted at {{ $post->created_at }}</p>
                                </div>
                            @if (Auth::id() == $post->user_id)
                                <div>
                                    {{-- 投稿編集ページへのフォーム --}}
                                    {!! link_to_route('posts.edit', 'シェアを編集', ['post' => $post->id], ['class' => 'btn btn-secondary btn-sm']) !!}
                                </div>
                            @else
                                <div>
                                    @include('favorite_posts.favorite_button')
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
</div>