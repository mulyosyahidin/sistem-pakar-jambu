@extends('layouts.bootslander')
@section('title', 'Selamat Datang di Website Sistem Pakar Hama Tanaman Jambu')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">

        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                    <div data-aos="zoom-out">
                        <h1>Selamat Datang</h1>
                        <h2>Sistem Pakar Diagnosa Hama Tanaman Jambu Berbasis Web Menggunakan Metode VCIRS</h2>
                        <div class="text-center text-lg-start">
                            @auth
                                @if(auth()->user()->role == 'admin')
                                    <a href="{{ route('admin.dashboard') }}" class="btn-get-started">Dashboard</a>
                                @else
                                    <a href="{{ route('user.dashboard') }}" class="btn-get-started">Dashboard</a>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn-get-started">Login</a>
                            @endauth
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
                    <img src="{{ asset('assets/images/hero1.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"/>
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)"/>
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)"/>
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff"/>
            </g>
        </svg>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">

                <div class="row" data-aos="fade-up">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-people"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $count['user'] }}"
                                  data-purecounter-duration="1" class="purecounter"></span>
                            <p>User</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $count['diagnosa'] }}"
                                  data-purecounter-duration="1" class="purecounter"></span>
                            <p>Diagnosa</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-bag-x-fill"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $count['hama'] }}"
                                  data-purecounter-duration="1" class="purecounter"></span>
                            <p>Hama</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-question"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $count['gejala'] }}"
                                  data-purecounter-duration="1" class="purecounter"></span>
                            <p>Gejala</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Details Section ======= -->
        <section id="details" class="details">
            <div class="container">

                <div class="row content">
                    <div class="col-md-4" data-aos="fade-right">
                        <img src="{{ asset('assets/themes/Bootslander/assets/img/details-1.png') }}" class="img-fluid"
                             alt="">
                    </div>
                    <div class="col-md-8 pt-4" data-aos="fade-up">
                        <h3>3 langkah mudah menggunakan sistem pakar diagnosa
                            hama tanaman jambu</h3>
                        <ul>
                            <li>
                                <i class="bi bi-check"></i> Daftar dan buat akun
                                <br>
                                <p style="padding-left: 28px;">Mendaftar dan membuat akun menggunakan email Anda.</p>
                            </li>
                            <li>
                                <i class="bi bi-check"></i> Kenali gejala tanaman
                                <br>
                                <p style="padding-left: 28px;">Kenali gejala yang muncul pada jeruk Anda dengan
                                memperhatikan
                                ciri-ciri fisik yang nampak.
                                </p>
                            </li>
                            <li>
                                <i class="bi bi-check"></i> Lakukan diagnosa
                                <br>
                                <p style="padding-left: 28px;">Sistem akan memandu Anda memilih gejala-gejala yang nampak.
                                    Kirim, dan sistem akan memberikan hasil diagnosa.</p>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </section><!-- End Details Section -->

    </main><!-- End #main -->
@endsection
