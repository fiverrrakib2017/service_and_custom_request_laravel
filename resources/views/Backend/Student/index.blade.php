@extends('Backend.Layout.app')


@section('title', 'Welcome to student page')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="card">
                <div class="card-header"><button class="btn btn-warning"data-mdb-toggle="modal" data-mdb-target="#addModal">Add
                        Student</button></div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="bg-success text-white">
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </thead>
                        <tbody id="tableRow">
                            @foreach ($students as $students)
                                <tr>
                                    <td>{{ $students->name }}</td>
                                    <td>{{ $students->email }}</td>
                                    <td>{{ $students->phone }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-mdb-toggle="modal"
                                            data-mdb-target="#editModal{{ $students->id }}">Edit</button>
                                        <button type="button" class="btn btn-danger" data-mdb-toggle="modal"
                                            data-mdb-target="#deleteModal{{ $students->id }}">Delete</button>
                                    </td>
                                </tr>



                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $students->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Student </h5>
                                                <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">Are you sure! You delete this file</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-mdb-dismiss="modal">Close</button>
                                                <a type="submit" href="{{route('student.delete',$students->id)}}" class="btn btn-danger">Delete
                                                    Student</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="editModal{{ $students->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog card shadow">
                                        <form action="{{route('student.update')}}" method="POST">
                                            @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Student </h5>
                                                <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body ">

                                                    <div class="form-group mb-3 d-none">
                                                        <label for="name">Student Id</label>
                                                        <input type="text" id="name" name="id" value="{{$students->id}}" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3 ">
                                                        <label for="name">Student Name</label>
                                                        <input type="text" id="name" name="name"
                                                            placeholder="Enter Student Name" value="{{$students->name}}" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3 ">
                                                        <label for="image">Student Email</label>
                                                        <input type="email" name="email"
                                                            class="form-control"placeholder="Enter Email"  value="{{$students->email}}">
                                                    </div>
                                                    <div class="form-group mb-3 ">
                                                        <label for="phone number">Student Phone</label>
                                                        <input type="number"  name="phone"
                                                            class="form-control"placeholder="Enter Phone" value="{{$students->phone}}">
                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-mdb-dismiss="modal">Close</button>
                                                <button type="submit"  class="btn btn-danger">Update
                                                    Student</button>
                                            </div>
                                        </div>
                                       </form>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!----ADD Modal ----->
    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('student.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Student </h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body card shadow">

                        <div class="form-group mb-3 ">
                            <label for="name">Student Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter Student Name"
                                class="form-control">
                        </div>
                        <div class="form-group mb-3 ">
                            <label for="image">Student Email</label>
                            <input type="email" id="image" name="email"
                                class="form-control"placeholder="Enter Email">
                        </div>
                        <div class="form-group mb-3 ">
                            <label for="image">Student Phone</label>
                            <input type="text" id="image" name="phone"
                                class="form-control"placeholder="Enter Email">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Add Student</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
