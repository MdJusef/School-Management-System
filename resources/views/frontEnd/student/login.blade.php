@extends('frontEnd.master')
@section('title')
    Login | Perfect Learn
@endsection
@section('content')

    <!-- section -->

    <section class="inner_banner pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="full">
                        <h3>Student Login</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end section -->
    <!-- section -->
    <div class="section layout_padding contact_section" style="background:#f6f6f6;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="full float-right_img">
                        <img src="{{asset('/frontEndAsset/images/')}}/img10.png" alt="#">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="contact_form">
                        <h5 style="color: red;"> {{session('message')}}</h5>

                        <form action="{{route('student-login')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <fieldset>
                                <div class="full field">
                                    <input type="text" placeholder="Enter your email or phone" name="user_name" />
                                </div>
                                <div class="full field">
                                    <input type="password" placeholder="Enter your password" name="password" />
                                </div>
                                <div class="full field">
                                    <div class=""><button type="submit">sign in</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
@endsection
