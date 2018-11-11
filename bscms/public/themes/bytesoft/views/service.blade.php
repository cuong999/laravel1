<main id="main" class="main-pages">
    <section class="section-banner">
        <div class="banner-page">
            <div class="bs-container">
                <div class="banner-text">
                    <h4 class="title" data-aos="zoom-out" data-aos-delay="1200">
                        {{ trans('plugins.service::service.title') }}
                        {!!  Theme::breadcrumb()->render()  !!}
                       
                           
                    </h4>
                </div>
            </div>
        </div>
    </section>
    <section class="section-service">
        <div class="bs-container">
            <div class="bs-row">
                    <div class="bs-col">
                        <div class="module module-service">
                            <div class="module-content">
                                <div class="bs-tab tab-left">
                                    <div class="tab-container">
                                        <div class="tab-control">
                                            <span class="control__show"><span class="img"><img src="images/icon_service1_1.gif" alt="" class="base__img"><img src="images/icon_service1.gif" alt="" class="active__img"></span> TƯ VẤN CHIẾN LƯỢC CNTT</span>
                                            <ul class="control-list">
                                                 <?php $e=1 ?>
                                                @foreach(get_service() as $service)
                                                <li class="control-list__item {{ $e==1?'active':''}}" tab-show="#tab{{$service->id }}"><span class="img"><img src="{{$service->image }}" alt="" class="base__img"><img src="{{ $service->image }}" alt="" class="active__img"></span> {{ $service->name }}</li>
                                                <?php $e++;?>
                                                @endforeach
                                
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                            <?php $i=1 ?>
                                            @foreach(get_service() as $service)
                                            <div class="tab-item {{$i==1?'active':''}} " id="tab{{$service->id}}">
                                                <h3 class="title"> {{$service->name}} </h3>
                                                <div class="item">
                                                    {!!$service->content!!}
                                                </div>
                                                <div class="img">
                                                    <img src="{{$service->image}}" alt="">
                                                </div>
                                    
                                            </div>
                                            <?php $i++;?>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>

    {!! do_shortcode('[static-block alias="phuong-cham"]') !!}
</main>