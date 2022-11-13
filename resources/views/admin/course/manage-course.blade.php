@extends('admin.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Teacher Name</th>
                        <th>Course Name</th>
                        <th>Course Code</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i=1
                    @endphp
                    @foreach($courses as $course)
                        <tr class="text-center">
                            <td> {{ $i++  }} </td>
                            <td> {{$course->name}} </td>
                            <td> {{$course->course_name}} </td>
                            <td> {{$course->course_code}} </td>
                            <td> {{$course->description}} </td>
                            <td> <img src="{{asset($course->image)}}" alt="courseImage" style="height: 50px; width: 50px;"> </td>
                            <td>
                                <a href="" class="btn btn-outline-info fw-bold" title="edit">Edit</a>
                                <a href="" class="btn btn-outline-danger fw-bold" title="delete">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
