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
                        <article>
                            <header>
                                <h1><strong>{{$artikel->judul}}</strong></h1>
                            </header>
                            <div>
                                <p>Published on {{$artikel->created_at->format('j F Y H:i')}}</p>
                            </div>
                            <figure>
                                <center><img src="{{url($artikel->gambar)}}" alt="" style="width: 80%"></center>
                            </figure>
                            <section>
                                <p style="font-size: 20px; color: black;">{!! html_entity_decode($artikel->konten) !!}</p>
                            </section>
                            <a href="{{url($artikel->dokumen->dokumen_file) }}" target="_blank" style="color: blue;">
                                <button class="btn" style="background-color: DodgerBlue;
                                border: none;
                                color: white;
                                padding: 12px;
                                cursor: pointer;
                                font-size: 10px;"><i class="fa fa-download"></i> Download</button>
                            </a>
                        </article>
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
