<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: '#fff';
                margin: 0;
                padding: 0;
            }

            .container {
                width: 100%;
                max-width: 1400px;
                margin: 0 auto;
                padding: 10px;
                align-items: center;
            }

            .header {
                width: 100%;
                margin-bottom: 50px;
                display: flex;
                justify-content: flex-end; /* Alinha os itens à direita */
                align-items: center; 
            }

            .header a {
                margin-left: 10px; /* Adiciona espaço entre os botões */
            }

            .header h2 {
                font-size: 2rem;
                color: #333;
            }

            .library-section {
                display: flex;
                justify-content: space-between;
                align-items: center;
                background-color: #fff3e0;
                padding: 40px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .library-section .info {
                max-width: 50%;
            }

            .library-section h2 {
                font-size: 2.5rem;
                margin-bottom: 20px;
                color: #333;
            }

            .library-section p {
                font-size: 1rem;
                color: #666;
                margin-bottom: 20px;
                line-height: 1.6;
            }

            .learn-more {
                display: inline-block;
                background-color: #ff9800;
                color: white;
                padding: 10px 20px;
                border-radius: 5px;
                text-decoration: none;
                font-weight: bold;
            }

            .learn-more {
                display: inline-block;
                background-color: rgb(201, 89, 14);
                color: white;
                padding: 10px 20px;
                border-radius: 5px;
                text-decoration: none;
                font-weight: bold;
            }

            .login {
                display: inline-block;
                border: 1px solid brown;                
                color: #000;
                padding: 10px 20px;
                border-radius: 5px;
                text-decoration: none;
                font-weight: bold;
            }

            .library-section .learn-more:hover {
                background-color: #e68900;
            }

            .library-section .bookshelf {
                max-width: 45%;
            }

            .library-section .bookshelf img {
                width: 100%;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
             .gerenciar{
                border-radius: 10px;
                border-color: rgb(201, 89, 14);
                background-color: #fff3e0;
             }
        </style>
    </head>
    <body class="antialiased">
            
        <div class="container">
            <!-- Top Section -->
            <div class="header">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class=" learn-more align-items: center">Gerenciar livros</a>
                    @else
                        <a href="{{ route('login') }}" class="login align-items: center">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="learn-more align-items: center">Resgistrar-se</a>
                        @endif
                    @endauth
            @endif
            </div>

            <!-- Library Section -->
            <section class="library-section">
                <div class="info">
                    <h2>Seus livros favoritos a qualquer hora!!</h2>
                    <h4> Crie uma conta para baixar e compartilhe seus livros favoritos</h4>
                    <a href="#" class="learn-more">Ver mais</a>
                </div>
                <div class="bookshelf">
                    <img src="/images/bookshelf.jpg" alt="Bookshelf">
                </div>
            </section>
        </div>
    </body>
</html>
