@extends('layout.main')

@section('content')
<h3 class="">Data Mahasiswa</h3>
    <div class="card">
        <div class="card-header">
        <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ url('students/add') }}'">
            <i class="fas fa-plus-circle"></i> Add Data
        </button>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success alert-dissmissible fade show" role="alert">
                    <strong>Succes</strong> {{ session('msg') }}
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>            
            @endif
           <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Students</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $row)
                    <tr>
                        <th> {{ $loop->iteration }}</th>
                        <td>{{ $row->idstudents }}</td>
                        <td>{{ $row->fullname }}</td>
                        <td>{{ ($row->gender=='M')?'Male':'Female' }}</td>
                        <td>{{ $row->address }}</td>
                        <td>{{ $row->emailaddress }}</td>
                        <td>{{ $row->phone }}</td>
                        <td class="">
                            <button onclick="window.location='{{ url('students/'.$row->idstudents) }}'" type="button" class="btn btn-sm btn-info" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" title="Delete Data">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                        
                    @endforeach
                </tbody>
           </table>
        </div>
    </div>
@endsection