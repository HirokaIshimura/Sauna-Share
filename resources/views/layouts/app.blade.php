<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>Sauna Share</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>

        {{-- ナビゲーションバー --}}
        @include('commons.navbar')

        <div class="container">
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')

            @if(Auth::check())
                <a href="/posts/create" id="create_post" style="z-index:1000; color:orange;">
                    <i class="fas fa-edit fa-3x"></i>
                </a>
            @endif
            
            @yield('content')
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        <script>
            const previewImage = (e) => {
                const img = document.getElementById('img');
                const reader = new FileReader();
                const imgReader = new Image();
                const imgWidth = 400;
                reader.onloadend = () => {
                    imgReader.onload = () => {
                        const imgType = imgReader.src.substring(5, imgReader.src.indexOf(';'));
                        const imgHeight = imgReader.height * (imgWidth / imgReader.width);
                        const canvas = document.createElement('canvas');
                        canvas.width = imgWidth;
                        canvas.height = imgHeight;
                        const ctx = canvas.getContext('2d');
                        ctx.drawImage(imgReader,0,0,imgWidth,imgHeight);
                        img.src = canvas.toDataURL(imgType);
                    }
                    imgReader.src = reader.result;
                }
                reader.readAsDataURL(e.files[0]);
            }
        </script>
    </body>
</html>