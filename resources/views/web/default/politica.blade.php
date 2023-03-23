@extends("web.{$configuracoes->template}.master.master")

@section('content')

    <div class="page__title align-items-center" data-background="{{$configuracoes->gettopodosite()}}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content text-center">
                        <h3 class="breadcrumb-title breadcrumb-title-sd mb-15">Política de Privacidade</h3>
                        <div class="page_title__bread-crumb">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                            <a href="{{ route('web.home') }}"><span>Início</span></a>
                                        </li>
                                        <li class="trail-item">
                                            <span>Política de Privacidade</span>
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

    <div class="blog_area pt-120 pb-70">
        <div class="container custome-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-blog">
                        <div class="single_mblog mb-50">
                            <div class="mblog_info mblog_details">
                                {!! $configuracoes->politicas_de_privacidade !!}
                            </div>
                        </div>            
                    </div>                    
                </div>
            </div>
        </div>
    </div>
@endsection