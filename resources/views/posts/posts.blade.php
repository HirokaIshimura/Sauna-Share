<div class="user-posts">
    @if (count($posts) > 0)
        <ul class="list-unstyled">
            @foreach ($posts as $post)
                <li class="media mb-3">
                    <div class="media-body" style="display:flex;">
                        <div class="card" style="flex-grow:1; width:100%; height:auto;">
                            
                            <div class="card-header bg-dark">
                                <img class="mr-2 rounded" style="width:50px; height:50px" src="{{ asset('storage/profiles/'.$post->user->profile_image) }}" alt="プロフィール画像">
                                {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                                <span>{!! link_to_route('users.show', $post->user->name, ['user' => $post->user->id], ['class' => 'text-white']) !!}</span>
                            </div>
                            
                            <div class="card-header row">
                                <h4 class="col-10 text-dark ">{!! nl2br(e($post->title)) !!}</h4>
                            @if (Auth::id() == $post->user_id)
                                <div class="col-2">
                                    {{-- 投稿編集ページへのフォーム --}}
                                    {!! link_to_route('posts.edit', 'シェアを編集', ['post' => $post->id], ['class' => 'btn btn-secondary btn-sm']) !!}
                                </div>
                            @endif
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
                            
                            <div class="card-footer" style="display:flex; flex-direction:row-reverse;">
                                <div>
                                    <p class="text-dark">posted at {{ $post->created_at }}</p>
                                </div>
                                <div>
                                    @include('favorite_posts.favorite_button')
                                </div>
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