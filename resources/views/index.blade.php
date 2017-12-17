@extends('layouts.home')

@section('main')

    @if (!is_null($purchased_courses))
        <h3>My courses</h3>
        <div class="row">

        @foreach($purchased_courses as $course)
            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <img src="/image/c1.png" alt="">
                    <div class="caption">
                        <h4><a href="{{ route('courses.show', [$course->slug]) }}">{{ $course->title }}</a>
                        </h4>
                        <p>{{ $course->description }}</p>
                    </div>
                    <div class="ratings">
                        <p>Progress: {{ Auth::user()->lessons()->where('course_id', $course->id)->count() }}
                            of {{ $course->lessons->count() }} lessons</p>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <hr />

    @endif
    <h3>All courses</h3>
    <div class="row">
    @foreach($courses as $course)
        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail" style="padding: 5px">
                <img src="/image/c1.png" alt="" style="border-radius: 20px">
                <div class="caption">
                    <!-- <h4 class="pull-right">${{ $course->price }}</h4> -->
                    <h4><a href="{{ route('courses.show', [$course->slug]) }}">{{ $course->title }}</a>
                    </h4>
                    <h5 style="color: red">${{ $course->price }}</h5>
                    <p>{{ $course->description }}</p>
                </div>
                <div class="ratings" style="margin-top: 10px">
                    <p class="pull-right">
                        @for ($star = 1; $star <= 5; $star++)
                            @if ($course->rating >= $star)
                                <span class="glyphicon glyphicon-star"></span>
                            @else
                                <span class="glyphicon glyphicon-star-empty"></span>
                            @endif
                        @endfor
                    </p>
                    <p>
                        Students: {{ $course->students()->count() }}
                    </p>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    

    

@endsection