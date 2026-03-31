@extends('layouts.app')
@section('title', 'Termos de Uso | Button Box by Maiorzin')
@section('meta')
    <meta name="description" content="Leia os Termos de Uso do Button Box by Maiorzin e entenda as regras para utilização da plataforma, publicação de mods e uso do sistema.">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Open Graph --}}
    <meta property="og:title" content="Termos de Uso | Button Box by Maiorzin">
    <meta property="og:description" content="Confira as regras e condições para uso da plataforma Button Box by Maiorzin e publicação de conteúdos.">
    <meta property="og:image" content="{{config('app.url') . asset('icon/android-chrome-192x192.png') }}?{{ config('app.app_version') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    {{-- Twitter --}}
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Termos de Uso - Button Box">
    <meta name="twitter:description" content="Saiba as condições e regras para utilizar o Button Box by Maiorzin e publicar mods na plataforma.">
    <meta name="twitter:image" content="{{config('app.url') . asset('icon/android-chrome-192x192.png') }}?{{ config('app.app_version') }}">

    <link rel="canonical" href="{{ url()->current() }}">
@endsection


@section('content')
    <div class="div-emphasis">

        <h1>Termos de Uso</h1>

        <p><strong>Última atualização:</strong> 30/03/2026</p>

        <p>
            Bem-vindo ao <strong>Button Box by Maiorzin</strong>, disponível em https://buttonbox.maiorzin.com.
            Ao acessar ou utilizar nossa plataforma, você concorda com os presentes Termos de Uso.
        </p>

        <hr>

        <h2>1. Aceitação dos Termos</h2>
        <p>
            Ao se cadastrar e utilizar o sistema, você declara que leu, compreendeu e concorda com estes Termos.
            Caso não concorde, não utilize a plataforma.
        </p>

        <hr>

        <h2>2. Cadastro do Usuário</h2>
        <ul>
            <li>O usuário deve fornecer informações verdadeiras e atualizadas</li>
            <li>É responsável pela segurança da sua conta</li>
            <li>Não deve compartilhar seu acesso com terceiros</li>
        </ul>

        <hr>

        <h2>3. Publicação de Mods</h2>

        <p>
            O sistema permite que usuários publiquem mods, links, imagens e descrições.
        </p>

        <p>Ao publicar conteúdo, você declara que:</p>
        <ul>
            <li>É o autor do conteúdo ou possui autorização para publicá-lo</li>
            <li>Não está violando direitos autorais ou de terceiros</li>
            <li>O conteúdo não é ilegal, ofensivo ou prejudicial</li>
        </ul>

        <p><strong>É proibido publicar:</strong></p>
        <ul>
            <li>Conteúdo protegido por direitos autorais sem autorização</li>
            <li>Links maliciosos, vírus ou qualquer conteúdo prejudicial</li>
            <li>Conteúdo ofensivo, discriminatório ou ilegal</li>
            <li>Spam ou conteúdo enganoso</li>
        </ul>

        <hr>

        <h2>4. Responsabilidade pelo Conteúdo</h2>

        <p>
            O <strong>Button Box by Maiorzin</strong> não se responsabiliza pelos conteúdos publicados pelos usuários.
        </p>

        <p>
            Cada usuário é integralmente responsável pelo material que publica.
        </p>

        <hr>

        <h2>5. Remoção de Conteúdo</h2>

        <p>
            Reservamo-nos o direito de remover qualquer conteúdo que viole estes Termos,
            sem aviso prévio.
        </p>

        <p>
            Também disponibilizamos um sistema de denúncia para que usuários possam reportar conteúdos irregulares.
        </p>

        <hr>

        <h2>6. Suspensão ou Exclusão de Conta</h2>

        <p>
            Podemos suspender ou excluir contas que:
        </p>

        <ul>
            <li>Violarem estes Termos</li>
            <li>Praticarem atividades abusivas ou ilegais</li>
            <li>Comprometerem a segurança da plataforma</li>
        </ul>

        <hr>

        <h2>7. Uso do Software Button Box</h2>

        <p>
            O software Button Box para PC é disponibilizado como ferramenta auxiliar e pode se comunicar com o site.
        </p>

        <p>
            Não garantimos funcionamento ininterrupto ou livre de erros.
        </p>

        <hr>

        <h2>8. Limitação de Responsabilidade</h2>

        <p>
            Não nos responsabilizamos por:
        </p>

        <ul>
            <li>Danos causados por uso indevido da plataforma</li>
            <li>Conteúdos publicados por terceiros</li>
            <li>Falhas técnicas, indisponibilidade ou erros</li>
        </ul>

        <hr>

        <h2>9. Propriedade Intelectual</h2>

        <p>
            A plataforma, seu design, código e funcionalidades são de propriedade do
            <strong>Button Box by Maiorzin</strong>.
        </p>

        <p>
            É proibida a cópia, modificação ou distribuição sem autorização.
        </p>

        <hr>

        <h2>10. Alterações nos Termos</h2>

        <p>
            Estes Termos podem ser atualizados a qualquer momento.
        </p>

        <p>
            O uso contínuo da plataforma após alterações representa concordância com os novos termos.
        </p>

        <hr>

        <h2>Licença de Uso de Conteúdo</h2>

        <p>
            Ao publicar qualquer conteúdo na plataforma, incluindo mas não se limitando a mods, links,
            imagens, descrições, configurações e painéis do Button Box, o usuário concede ao
            <strong>Button Box by Maiorzin</strong> uma licença:
        </p>

        <ul>
            <li>Não exclusiva</li>
            <li>Gratuita</li>
            <li>Válida por prazo indeterminado</li>
            <li>Aplicável globalmente</li>
        </ul>

        <p>
            Essa licença permite ao Button Box by Maiorzin:
        </p>

        <ul>
            <li>Exibir publicamente o conteúdo na plataforma</li>
            <li>Reproduzir, armazenar e distribuir o conteúdo</li>
            <li>Adaptar o conteúdo para fins técnicos (como otimização, layout e compatibilidade)</li>
            <li>Utilizar o conteúdo para divulgação da plataforma (ex: imagens, destaques, redes sociais)</li>
        </ul>

        <p>
            O usuário declara que possui todos os direitos necessários para conceder essa licença,
            sendo integralmente responsável pelo conteúdo publicado.
        </p>

        <p>
            A exclusão do conteúdo ou da conta pode remover o material da plataforma,
            porém não revoga usos já realizados anteriormente, especialmente para fins de backup,
            segurança ou divulgação já publicada.
        </p>
    
        <h2>11. Contato</h2>

        <p>
            Em caso de dúvidas:
        </p>

        <p><strong>Email:</strong> maiorzincontato@gmail.com</p>        

        <hr>

        <p>
            Ao utilizar a plataforma, você declara estar ciente e de acordo com estes Termos de Uso.
        </p>
    </div>
@endsection
