@extends('layouts.main')

@section('title', '| Home')

@section('content')

        <div class="row" id="picture_carousel">
            <div class="col-md-10">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <img class="d-block w-100" src="http://ghy.com/images/uploads/default/InformationTechnologyWorld.jpg" style="width:420px;height:300px" alt="First slide">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block w-100" src="https://www.csi.cuny.edu/sites/default/files/styles/inner_page_slider/public/images/slider/5.1%20OITS%20Slider.jpg?itok=AiQ6-Bsb" style="width:420px;height:300px" alt="Second slide">
                        </div>
                        
                        <div class="carousel-item">
                            <img class="d-block w-100" src="https://cdn1.sph.harvard.edu/wp-content/uploads/sites/44/2017/04/cropped-iStock_000038124684_Medium.jpg" style="width:420px;height:300px" alt="Third slide">
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div><!-- end of .row -->

        <div class="row">
          @foreach($articles as $article)
                <div class="col-md-4 coll md-offset-1">  
                    <a href="{{ route('articles.show', $article->id) }}">{!!$article->title!!}</a>
                    {!!substr($article->intro_text, 0, 145)!!}{!!strlen($article->intro_text) > 145 ? "..." : ""!!}
                </div>
            @endforeach
        </div>
@endsection
   



   