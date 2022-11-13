@extends('admin.master')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $i=1
                    @endphp
                    @foreach($students as $student)
                        <tr class="text-center">
                            <td> {{ $i++  }} </td>
                            <td> {{$student->student_name}} </td>
                            <td> {{$student->student_email}} </td>
                            <td> {{$student->student_phone}} </td>
                            <td> {{$student->address}} </td>
                            <td> <img src="{{asset($student->image)}}" alt="studentImage" style="height: 50px; width: 50px; border-radius: 50%;"> </td>
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
