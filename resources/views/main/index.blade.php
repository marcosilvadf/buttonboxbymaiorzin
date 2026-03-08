@extends('layout.app')
@section('title', 'Button Box para ETS2 Grátis | Painel para Euro Truck Simulator 2')

@section('css')
    <style>
        img {
            width: 100%;
            max-height: 400px;
            object-fit: contain;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: flex !important;
            justify-content: center;
            align-items: center;
            z-index: 1050;
            display: none;
            cursor: pointer;
        }

        .overlay img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
            object-fit: contain;
            transition: transform 0.3s ease-in-out;
        }

        .overlay img:hover {
            transform: scale(1.05);
        }

        .img_clicked {
            cursor: pointer;
        }


    </style>
@endsection

@section('content_body')
    <div class="container">        
        <h1 class="h2">Dashboard e Button Box para Euro Truck Simulator 2 (ETS2)</h1>
        <p>
        Este dashboard e button box para ETS2 permite transformar celular, tablet ou outro monitor em um painel interativo para Euro Truck Simulator 2.
        </p>

        <p>
        Com ele você pode acompanhar informações importantes do caminhão em tempo real como velocidade, marcha, combustível, RPM e outras informações de telemetria do ETS2.
        </p>

        <p>
        A ferramenta funciona conectada ao PC e é ideal para quem deseja montar um cockpit de simulador mais imersivo usando um button box no celular.
        </p>

        <p><strong>Button Box</strong> é um app pra Android, desenvolvido por mim (Maiorzin), onde te proporciona uma gameplay aprimorada em simuladores de pc, simulando um button box no seu celular, nessa fase inicial ele tem compatibilidade com o Euro Truck Simulator 2 (ETS2), mas se a ideia for aceita pelos usuários, terá funções para outros jogos.</p>
        <p>Aproveite e me siga nas redes sociais abaixo e entre no meu servidor no Discord (DC).</p>

        <ul>
            <li><a href="https://www.youtube.com/@maiorzin" target="_blank">Youtube</a></li>
            <li><a href="https://www.instagram.com/maiorzin" target="_blank">Instagram</a></li>
            <li><a href="https://discord.gg/GrxzDY8CX3" target="_blank">Discord</a></li>
        </ul>

        <h2>Baixe diretamente da Play Store clicando no link abaixo</h2>        

        <p style="font-weight: bolder">Clique <a href="https://play.google.com/store/apps/details?id=br.com.buttonbox" target="_blank">aqui para fazer o Download do app.</a></p>

        <hr>

        <h2>Programas e arquivos necessários para o PC</h2>

        <p style="font-weight: bolder"><a href="{{asset('programsv5/buttonboxbymaiorzin.zip')}}">Clique aqui para baixar o Button Box.</a></p>
        <hr>

        <h2>Tutorial</h2>

        <div style="position: relative; width: 100%; padding-top: 56.25%;">
            <iframe 
                src="https://www.youtube.com/embed/xSuIHRTJxiI?si=DLOXxivqt8Y_3mlD" 
                title="YouTube video player" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                referrerpolicy="strict-origin-when-cross-origin" 
                allowfullscreen 
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
            </iframe>
        </div>

        <hr>
        <p>Caso abra essa tela, quer dizer que você não está logado, ou está logado com outra conta no navegador, para mudar a conta ou logar, basta clicar naquele botão que está circulado e selecionar a conta ou digitar as credenciais da sua conta para logar no Google.</p>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_become_tester/app_nao_tester.jpg')}}" alt="">

        <hr>
        <p>Depois clique no botão azul circulado, como na imagem abaixo.</p>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_become_tester/app_tornar_tester.jpg')}}" alt="">

        <hr>
        <p>Depois quando a página atualizar e ficar igual a imagem abaixo, clique no link azul, o mesmo que está circulado na imagem abaixo e pronto, já poderá baixar direto da Play Store.</p>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_become_tester/app_abrir_pagina_ps.jpg')}}" alt="">

        @section('js')
        <script>
            document.getElementById('emailForm').addEventListener('submit', function() {
                // Desabilita o botão de envio e exibe a mensagem
                document.getElementById('submitButton').disabled = true;
                document.getElementById('submitButton').innerText = 'Enviando...';
            });
        </script>
        <script class="img_clicked" src="{{asset('js/control_imgs.js?').config('app.app_version')}}"></script>
        @endsection
@endsection