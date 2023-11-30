<!doctype html>

@extends('user.layouts.app')

<body>

    @section('header')
    <main>
   <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <!-- Nav Card -->
                        <div class="tab-content" id="nav-tabContent">
                            <!-- card one -->
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <form class="form" method="get" action="{{ route('search') }}">
                                    <div class="form-group w-100 mb-3">
                                        <label for="search" class="d-block mr-2">Pencarian</label>
                                        <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan keyword">
                                        <button type="submit" class="btn btn-primary mb-1">Cari</button>
                                    </div>
                                </form>
                                <div class="whats-news-caption">
                                    <div class="row">
                                        @foreach ($artikel as $data)
                                        <div class="col-lg-4 col-md-4">
                                            <div class="single-what-news mb-100">
                                                <div class="what-img">
                                                    <img src="{{$data->gambar}}" alt="">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1">ARTIKEL</span>
                                                    <h4><a href="{{ route('detail-artikel',$data->slug) }}">{{$data->judul}}</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    {{$artikel->links()}}
                                </div>
                            </div>
                        </div>
                    <!-- End Nav Card -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
    <!-- Whats New End -->

    @section('footer')
    @endsection

    </body>
</html>
