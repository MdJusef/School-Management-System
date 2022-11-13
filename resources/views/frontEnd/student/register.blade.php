@extends('frontEnd.master')
@section('title')
    Register | Perfect Learn
@endsection
@section('content')

    <!-- section -->

    <section class="inner_banner pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="full">
                        <h3>Student Registration Form</h3>
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
                        <form action="{{route('student-register')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <fieldset>
                                <div class="full field">
                                    <input type="text" placeholder="Enter Your Name" name="student_name" />
                                </div>
                                <div class="full field">
                                    <input type="email" placeholder="Enter Email Address" name="student_email" />
                                </div>
                                <div class="full field">
                                    <input type="text" placeholder="Phone Number" name="student_phone" />
                                </div>
                                <div class="full field">
                                    <input type="password" placeholder="Password" name="password" />
                                </div>
                                <div class="full field">
                                    <input type="file" class="form-control" name="image" />
                                </div>
                                <div class="full field">
                                    <textarea placeholder="Address" name="address"></textarea>
                                </div>
                                <div class="full field">
                                    <div class=""><button type="submit">Register</button></div><h5 style="color: green;">{{session('message')}}</h5>
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
