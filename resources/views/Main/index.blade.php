@extends('layout.app')
@section('title', 'Início - Button Box')

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
        <h2>Button Box (By Maiorzin)</h2>
        <p><strong>Button Box</strong> é um app pra Android, desenvolvido por mim (Maiorzin), onde te proporciona uma gameplay aprimorada em simuladores de pc, simulando um button box no seu celular, nessa fase inicial ele tem compatibilidade com o Euro Truck Simulator 2 (ETS2), mas se a ideia for aceita pelos usuários, terá funções para outros jogos.</p>
        <p>Aproveite e me siga nas redes sociais abaixo e entre no meu servidor no Discord (DC).</p>

        <ul>
            <li><a href="https://www.youtube.com/@maiorzin" target="_blank">Youtube</a></li>
            <li><a href="https://www.instagram.com/maiorzin" target="_blank">Instagram</a></li>
            <li><a href="https://discord.gg/GrxzDY8CX3" target="_blank">Discord</a></li>
        </ul>

        <h2>Participe do programa de testadores:</h2>

        @if (session()->has('msg'))
            <div class="alert alert-success" role="alert">
                {{session()->get('msg')}}
            </div>
        @endif  

        <form class="col-xl-6 col-sm-12 mb-2" action="{{route('email-test.store')}}" method="get" id="emailForm">
            <div class="form-group">
                <label for="email">E-mail da Play Store:</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="E-mail" required>
                <small id="emailHelp" class="form-text text-muted">Adicione ou consulte seu e-mail!</small>
                @error('email')
                <br>
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-2" id="submitButton">Enviar/Consultar</button>                        
        </form>

        <p style="font-weight: bolder">Clique <a href="https://play.google.com/apps/testing/br.com.buttonbox" target="_blank">aqui para entrar no teste e fazer o Download do app.</a></p>

        <div style="position: relative; width: 100%; padding-top: 56.25%;">
            <iframe 
                src="https://www.youtube.com/embed/vOdB5KYLeGs?si=zk-JZ-f1QsoHHsW9" 
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

        <hr>

        <h2>Programas e arquivos necessários para o PC</h2>

        <p style="font-weight: bolder"><a href="{{asset('programsv4/vJoySetup.exe')}}">Clique aqui para baixar o VJoy</a></p>
        <p style="font-weight: bolder"><a href="{{asset('programsv4/SimHubSetup_9.4.4.exe')}}">Clique aqui para baixar o SimHub</a></p>
        <p style="font-weight: bolder"><a href="{{asset('programsv4/test.simhubdash')}}">Clique aqui para baixar o Dashboard para o SimHub</a></p>
        <p style="font-weight: bolder"><a href="{{asset('programsv4/ets2controllerv4.zip')}}">Clique aqui para baixar o ETS2Controller</a></p>
        <hr>
        <h4>Para instalar o vJoy basta clicar no <span style="font-weight: bolder">vJoySetup.exe</span>, na tela de setup clique em <span style="font-weight: bolder">next</span>:</h4>
        <hr>

        <img class="img_clicked" src="{{asset('images/setup_vjoy/setup_vjoy.JPG')}}" alt="">

        <hr>
        <p>Depois clique em <span style="font-weight: bolder">next</span>:</p>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_vjoy/setup_vjoy2.JPG')}}" alt="">

        <hr>
        <p>Depois clique em <span style="font-weight: bolder">next</span>:</p>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_vjoy/setup_vjoy3.JPG')}}" alt="">

        <hr>
        <p>Depois clique em <span style="font-weight: bolder">OK</span>:</p>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_vjoy/setup_vjoy4.JPG')}}" alt="">

        <hr>
        <h5>Configuração do vJoy, logo após, abra o programa <span style="font-weight: bolder">Configure vJoy</span>, deixe as opções iguais a imagem abaixo e clique em <span style="font-weight: bolder">apply</span>:</h5>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_vjoy/setup_vjoy_configuracao_padrao.JPG')}}" alt="">

        <hr>
        <h4>Para instalar o SimHub basta clicar no <span style="font-weight: bolder">SimHubSetup_9.4.4.exe</span>, na tela de setup clique em <span style="font-weight: bolder">next</span>:</h4>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_simhub/setup1.JPG')}}" alt="">

        <hr>
        <p>Depois clique em <span style="font-weight: bolder">next</span>:</p>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_simhub/setup2.JPG')}}" alt="">

        <hr>
        <p>Depois clique em <span style="font-weight: bolder">next</span>:</p>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_simhub/setup3.JPG')}}" alt="">

        <hr>
        <p>Depois clique em <span style="font-weight: bolder">install</span>, essa etapa no meu computador demorou mais de 5 minutos para instalar:</p>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_simhub/setup4.JPG')}}" alt="">

        <hr>
        <p>Depois clique em <span style="font-weight: bolder">Finish</span>:</p>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_simhub/setup5_launch.JPG')}}" alt="">

        <hr>
        <h5>Configuração do SimHub, quando o programa abrir, deixe as configurações como está na imagem abaixo, no meu caso já estava assim e clique em <span style="font-weight: bolder">OK</span>:</h5>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_simhub/setup6.JPG')}}" alt="">

        <hr>
        <p>Essa tela é pra seleção de jogos, ele vem com todos marcados, se você preferir pode desabilitar o que quiser, menos o ETS2, depois clique em <span style="font-weight: bolder">OK</span>:</p>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_simhub/setup7.JPG')}}" alt="">

        <hr>
        <p>Procure o ETS2 e <span style="font-weight: bolder">clique nele duas vezes</span>:</p>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_simhub/setup8.JPG')}}" alt="">

        <hr>
        <p>Depois, clique em <span style="font-weight: bolder">Dash Studio</span> no menu e em seguida clique em <span style="font-weight: bolder">Import dashboard:</span></p>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_simhub/setup9.JPG')}}" alt="">

        <hr>
        <p>Irá abrir um explorer, no explorer que abrir, vá até o arquivo que você baixou chamado <span style="font-weight: bolder">test.simhubdash</span>, clique e selecione o arquivo, e por fim, clique em Import into SimHub library:</p>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_simhub/setup10.JPG')}}" alt="">

        <hr>
        <p>Depois clique <em></em><span style="font-weight: bolder">OK</span>:</p>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_simhub/setup11.JPG')}}" alt="">

        <hr>
        <p>Após importar o arquivo corretamente, clique em <span style="font-weight: bolder">Devices</span> no menu e depois em <span style="font-weight: bolder">Add Device</span>:</p>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_simhub/setup12.JPG')}}" alt="">

        <hr>
        <p>Na barra de pesquisa digite <span style="font-weight: bolder">web</span> e selecione <span style="font-weight: bolder">Web device slot (Phone, tablet, app...)</span> e clique em <span style="font-weight: bolder">OK</span>:</p>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_simhub/setup13.JPG')}}" alt="">

        <hr>
        <p>Em seguida, clique na lista de <span style="font-weight: bolder">Main dashboard</span> e selecione o <span style="font-weight: bolder">test</span>:</p>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_simhub/setup14.JPG')}}" alt="">

        <hr>
        <p>Tudo pronto, lembre-se de quando for jogar deixe o SimHub aberto!</p>
        <hr>

        <hr>
        <h4>Para instalar o SimHub basta clicar no <span style="font-weight: bolder">SimHubSetup_9.4.4.exe</span>, na tela de setup clique em <span style="font-weight: bolder">next</span>:</h4>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_simhub/setup1.JPG')}}" alt="">

        <hr>
        <h4>Descompacte o arquivo <span style="font-weight: bolder">ets2controllerv4.zip</span>, recomendo que você crie um atalho na Área de trabalho.</h4>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_ets2controller/config_ets2.JPG')}}" alt="">

        <hr>
        <h4>Toda vez que for jogar, abra o executável <span style="font-weight: bolder">ets2controller.exe</span>:</h4>
        <hr>
        <img id="img" class="img_clicked" src="{{asset('images/setup_ets2controller/config_ets2_1.JPG')}}" alt="">

        <hr>
        <p>Caso mostre o aviso da imagem abaixo, clique em <span style="font-weight: bolder">Mais informações</span>:</p>
        <hr>
        <img id="img" class="img_clicked" src="{{asset('images/setup_ets2controller/aviso1.JPG')}}" alt="">

        <hr>
        <p>Depois clique em <span style="font-weight: bolder">Executar mesmo assim</span>:</p>
        <hr>
        <img id="img" class="img_clicked" src="{{asset('images/setup_ets2controller/aviso2.JPG')}}" alt="">

        <hr>
        <p>E caso mostre essa em seguida, deixe como está na imagem abaixo e clique em <span style="font-weight: bolder">Permitir acesso</span>:</p>
        <hr>
        <img id="img" class="img_clicked" src="{{asset('images/setup_ets2controller/aviso3.JPG')}}" alt="">

        <hr>
        <h5 style="font-weight: bolder">Reforço que sempre use os programas e app baixados desse site que é o oficial, caso você baixe de outro lugar, pode haver códigos mal intencionados escondidos.</h5>

        <hr>
        <p>O número do <span style="font-weight: bolder">IP</span> é o que você deve colocar no app pra Android, no meu caso está aparecendo 2 porquê no meu notebook tem duas placas de rede, wi-fi e ethernet, nesse caso você deve colocar a que você está usando no momento, wireless é o wi-fi e ethernet é o cabo, lembre-se, são os números com os pontos, exemplo: <span style="font-weight: bolder">192.168.1.36</span></p>
        <hr>
        <img class="img_clicked" src="{{asset('images/setup_ets2controller/config_ets2_2.JPG')}}" alt="">

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