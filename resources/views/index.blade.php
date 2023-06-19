@extends('layouts.front')

@section('content')
<section class="home" id="home">
        <div class="home-container container grid">
          <div class="home-img-bg">
            <!-- <img src="assets/images/bg-hero.jpg" alt="" class="home-img" /> -->
          </div>

          <div class="home-data">
            <h1 class="home-title">
              Kami Mengajari Anda <br />
              Semua yang Perlu Anda Ketahui
            </h1>
            <p class="home-description">
              Temukan cara anda belajar & mengendalikan hidup anda dan membuat sesuatu yang berguna bagi orang lain!
            </p>
            <div class="home-btns">
              <a href="{{ route('courses.index') }}" class="button btn-gray btn-small"> My Course </a>
              <a href="#course" class="button button-home">Discover Course</a>
            </div>
          </div>
        </div>
      </section>

      <section class="story section container">
        <div class="story-container grid">
          <div class="story-data">
            <h2 class="section-title story-section-title">Our Goals</h2>
            <h1 class="story-title">
                Nikmati belajar tanpa tekanan apa pun
            </h1>

            <p class="story-description">
                Belajar membuat sesuatu dengan proyek dunia nyata yang membantu Anda meningkatkan kreativitas
            </p>
            <a href="#course" class="button btn-small">Discover</a>
          </div>
          <div class="story-images">
            <img src="{{ asset('frontend/assets/images/goals.jpg') }}" alt="" class="story-img" />
            <div class="story-square"></div>
          </div>
        </div>
      </section>

      <section class="products section container" id="course">
        <h2 class="section-title">All Course</h2>

        <div class="new-container">
          <div class="swiper new-swipper">
            <div class="swiper-wrapper">
            @foreach($courses as $course)
              <article class="products-card swiper-slide">
              <a style="color: inherit;" href="{{ route('courses.show', [$course->slug]) }}" class="products-link">
                <img
                  src="{{ Storage::url($course->course_image) }}"
                  class="products-img"
                  alt=""
                />
                <h3 class="products-title">{{ $course->title }}</h3>
                <div class="products-star">
                @for ($star = 1; $star <= 5; $star++)
                    @if ($course->rating >= $star)
                    <i class="bx bxs-star"></i>
                    @else
                    <i class='bx bx-star'></i>
                    @endif
                @endfor
                </div>
                <span class="products-price">${{ $course->price }}</span>
                @if($course->students()->count() > 5)
                  <button class="products-button">
                    Popular
                  </button>
                @endif
                <span class="products-student">
                {{ $course->students()->count() }} students
                </span>
              </a>
              </article>
            @endforeach

            </div>
            <div
              class="swiper-button-next"
              style="
                bottom: initial;
                top: 50%;
                right: 0;
                left: initial;
                border-radius: 50%;
              "
            >
              <i class="bx bx-right-arrow-alt"></i>
            </div>
            <div
              class="swiper-button-prev"
              style="bottom: initial; top: 50%; border-radius: 50%"
            >
              <i class="bx bx-left-arrow-alt"></i>
            </div>
          </div>
        </div>
      </section>
@endsection
