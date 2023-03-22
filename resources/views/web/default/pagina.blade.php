@extends("web.{$configuracoes->template}.master.master")

@section('content')

    <div class="page__title align-items-center" data-background="{{ $post->cover() }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__title-content text-center">
                        <h3 class="breadcrumb-title breadcrumb-title-sd mb-15">{{ $post->titulo }}</h3>
                        <div class="page_title__bread-crumb">
                            <nav>
                                <nav class="breadcrumb-trail breadcrumbs">
                                    <ul class="breadcrumb-menu">
                                        <li class="breadcrumb-trail">
                                            <a href="{{ route('web.home') }}"><span>Início</span></a>
                                        </li>
                                        <li class="trail-item">
                                            <span>{{ $post->titulo }}</span>
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
                            <div class="mblog_image mb-30">
                                <a href="javascript:void(0)">
                                    <img src="{{ $post->cover() }}" alt="{{ $post->titulo }}">
                                </a>
                            </div>
                            <div class="mblog_info mblog_details">
                                <div class="mblog__meta mb-15">
                                    <div style="margin-right: 10px;" class="fb-share-button" data-href="{{url()->current()}}" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartilhar</a></div>
                                    <a style="background-color: #6ebf58;color:#fff;border:none;padding:4px 10px;font-size:0.875em;" class="btn btn-front sharezap" target="_blank" href="" data-action="share/whatsapp/share"><i class="fab fa-whatsapp"></i> Compartilhar</a>
                                </div>
                                <h6 class="mblog__title mb-15"><a href="javascript:void(0)">{{ $post->titulo }}</a></h6>
                                {!! $post->content !!}
                            </div>
                        </div>

                        @if($post->images()->get()->count())
                           <div class="blog_dimage">
                              <div class="row">
                                 @foreach($post->images()->get() as $image)
                                    <div class="col-md-6">
                                       <div class="image mb-30">
                                          @if ($image->cover == null)
                                          <img src="{{ $image->getUrlImageAttribute() }}" class="img-fluid" alt="{{ $post->titulo }}">
                                          @endif                                          
                                       </div>
                                    </div> 
                                 @endforeach                               
                              </div>
                           </div>
                        @endif                        
                    </div>
                    <div class="blog_nav mb-50">
                        <div class="blog-action-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    @if ($postsTags->count())
                                       <div class="blog_dmeta mb-20">
                                          <p><i class="far fa-bookmark"></i> 
                                             @foreach ($postsTags as $posttags)                                                
                                                @php
                                                   $array = explode(',', $posttags->tags);
                                                   foreach ($array as $key => $tags) {
                                                      $tag = trim($tags);
                                                      echo $tag . ($key == 0 ? '' : ', ');
                                                   }
                                                @endphp                                                   
                                             @endforeach
                                          </p>
                                       </div>                                        
                                    @endif                                    
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
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
               $('.sharezap').attr("href", "https://api.whatsapp.com/send?text=" + "{{url()->current()}}");
               return true; // está utilizando celular
            }
            else {
               $('.sharezap').attr("href", "https://web.whatsapp.com/send?text=" + "{{url()->current()}}");
               return false; // não é celular
            }
         }
      });
   </script>
   <div id="fb-root"></div>
   <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v11.0&appId=264170880377379&autoLogAppEvents=1" nonce="1eBNUT9J"></script>
@endsection
