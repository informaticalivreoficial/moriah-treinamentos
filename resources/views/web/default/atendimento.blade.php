@extends("web.{$configuracoes->template}.master.master")

@section('content')
    <div class="page__title align-items-center" data-background="{{url('frontend/'.$configuracoes->template.'/assets/img/bg/bg-atendimento.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content text-center">
                        <h3 class="breadcrumb-title breadcrumb-title-sd mb-15">Atendimento</h3>
                        <div class="page_title__bread-crumb">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                            <a href="{{ route('web.home') }}"><span>Início</span></a>
                                        </li>
                                        <li class="trail-item">
                                            <span>Atendimento</span>
                                        </li>
                                    </ul>
                                </nav>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tp-map-area-start -->
    <div class="tp-map-area pb-110">
        <div class="tp-contact-map">
            {!!$configuracoes->mapa_google!!}
        </div>
    </div>
    <!-- tp-map-area-end -->

    <!-- conatct_dinfo-start -->
    <div class="conatct_dinfo">
        <div class="container custome-container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="tp-contact-info mb-40">
                        <div class="sv-inner">
                            <div class="services-icon" style="background-color: #6ebf58;">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                        </div>
                        <div class="tp-contact-info-text">
                            <h4 class="tp-contact-info-title">WhatsApp</h4>
                            <p>
                                <a class="sharezap" href="" target="_blank">{{ $configuracoes->whatsapp }}</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    @if ($configuracoes->telefone1)
                        <div class="tp-contact-info mb-40">
                            <div class="sv-inner">
                                <div class="services-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                            </div>
                            <div class="tp-contact-info-text">
                                <h4 class="tp-contact-info-title">Fone</h4>
                                <p><a href="tel:{{ \App\Helpers\Renato::limpatelefone($configuracoes->telefone1) }}">{{$configuracoes->telefone1}}</a>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-md-4 col-sm-6">
                    @if ($configuracoes->email)
                        <div class="tp-contact-info mb-40">
                            <div class="sv-inner">
                                <div class="services-icon">
                                    <i class="fas fa-envelope-open"></i>
                                </div>
                            </div>
                            <div class="tp-contact-info-text">
                                <h4 class="tp-contact-info-title">Email</h4>
                                <p><a href="mailto:{{$configuracoes->email}}"><span class="__cf_email__">{{$configuracoes->email}}</span></a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="contact-shape">
            <img src="{{url('frontend/'.$configuracoes->template.'/assets/img/bg/contact-shape.png')}}">
        </div>
    </div>    

    <div class="support_area pt-35  pb-90">
        <div class="container custome-container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="support_info-two mb-35">
                        <div class="section-wrap mb-35">
                            <h3 class="mb-20">Formulário de Atendimento</h3>
                            <span class="section-border mb-30"><i class="far fa-circle"></i></span>
                        </div>
                        <form action="" method="post" class="j_formsubmit" autocomplete="off">
                            @csrf
                            <div class="tp-support-form-field mb-20">
                                <div id="js-contact-result"></div>
                            </div>
                            <div class="tp-support-form-field mb-20 form_hide">
                                <!-- HONEYPOT -->
                                <input type="hidden" class="noclear" name="bairro" value="" />
                                <input type="text" class="noclear" style="display: none;" name="cidade" value="" /> 
                                <input type="text" name="nome" placeholder="Nome">
                            </div>
                            <div class="tp-support-form-field mb-20 form_hide">
                                <input type="email" name="email" placeholder="Email">
                            </div>
                            <div class="tp-support-form-field mb-20 form_hide">
                                <textarea name="mensagem" placeholder="Mensagem"></textarea>
                            </div>

                            <div class="support-btn form_hide">
                                <button class="tp-btn-round btncheckout">Enviar Agora</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-shape-2">
            <img src="{{url('frontend/'.$configuracoes->template.'/assets/img/bg/contact-shape2.png')}}">
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {

        function checkDevice() { 
            if( navigator.userAgent.match(/Android/i)
            || navigator.userAgent.match(/webOS/i)
            || navigator.userAgent.match(/iPhone/i)
            || navigator.userAgent.match(/iPad/i)
            || navigator.userAgent.match(/iPod/i)
            || navigator.userAgent.match(/BlackBerry/i)
            || navigator.userAgent.match(/Windows Phone/i)
            ){
                $('.sharezap').attr("href", "https://api.whatsapp.com/send?l=pt_pt&phone="+{{ \App\Helpers\Renato::limpatelefone($configuracoes->whatsapp) }}+"&text=Atendimento");
                return true; // está utilizando celular
            }
            else {
                $('.sharezap').attr("href", "https://web.whatsapp.com/send?l=pt_pt&phone="+{{ \App\Helpers\Renato::limpatelefone($configuracoes->whatsapp) }}+"&text=Atendimento");
                return false; // não é celular
            }
        }
        });
    </script>

    <script>
        $(function() {

            // Seletor, Evento/efeitos, CallBack, Ação
            $('.j_formsubmit').submit(function (){
                var form = $(this);
                var dataString = $(form).serialize();

                $.ajax({
                    url: "{{ route('web.sendEmail') }}",
                    data: dataString,
                    type: 'GET',
                    dataType: 'JSON',
                    beforeSend: function(){
                        $(".btncheckout").attr("disabled", true);
                        $('.btncheckout').html("Carregando...");                
                        $('.alert').fadeOut(500, function(){
                            $(this).remove();
                        });
                    },
                    success: function(resposta){
                        $('html, body').animate({scrollTop:$('#js-contact-result').offset().top-100}, 'slow');
                        if(resposta.error){
                            $('#js-contact-result').html('<div class="alert alert-danger error-msg">'+ resposta.error +'</div>');
                            $('.error-msg').fadeIn();                    
                        }else{
                            $('#js-contact-result').html('<div class="alert alert-success error-msg">'+ resposta.sucess +'</div>');
                            $('.error-msg').fadeIn();                    
                            $('input[class!="noclear"]').val('');
                            $('textarea[class!="noclear"]').val('');
                            4('.form_hide').fadeOut(500);
                        }
                    },
                    complete: function(resposta){
                        form.find(".btncheckout").attr("disabled", false);
                        form.find('.btncheckout').html("Enviar Agora");                                
                    }
                });

                return false;
            });

        });
    </script>
@endsection
