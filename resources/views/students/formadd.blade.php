@extends('layout.main')

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="text-center">Form Add New Data</h5>
    </div>
    <div class="card-body">
        {{-- validasi untuk error dari laravel --}}
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <form method="POST" action="{{ url('students') }}">
            @csrf
            <div class="row mb-3">
                <label for="txtid" class="col-sm-2 col-form-label">Id Student</label>
                <div class="col-sm-10">
                    {{-- trying validation from bootstrap  --}}
                    <input type="text" class="form-control form-control-sm @error('txtid') is-invalid @enderror" id="txtid" name="txtid" value="{{ old('txtid') }}">
                    @error('txtid')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror   
                </div>
            </div>
            <div class="row mb-3">
                <label for="txtname" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('txtname') is-invalid @enderror" id="txtname" name="txtname" value="{{ old('txtname') }}">
                    @error('txtname')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="txtgender" class="col-sm-2 col-form-label @error('txtgender') is-invalid @enderror">Gender</label>
                <div class="col-sm-4">
                  <select class="form-select form-select-sm" name="txtgender" id="txtgender">
                    <option value="">Pilih Gender</option>
                    <option value="M" {{ (old('txtgender')=='M') ? 'selected' : '' }}>Male</option>
                    <option value="F" {{ (old('txtgender')=='F') ? 'selected' : '' }}>Female</option>
                  </select>
                </div>
            </div>
            <div>
                <div class="row mb-3">
                    <label for="txtaddress" class="col-sm-2 col-form-label">Adress</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="txtaddress" id="txtaddress" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div>
                <div class="row mb-3">
                    <label for="txtemail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" name="txtemail" id="txtemail" class="form-control form-control-sm @error('txtemail') is-invalid @enderror" value="{{ old('txtemail') }}" >
                        @error('txtemail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div>
                <div class="row mb-3">
                    <label for="txtphone" class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-6">
                        <input type="number" name="txtphone" id="txtemail" class="form-control form-control-sm" ></input>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-6">
                    <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ url('students') }}'">Back</button>
                    
                    <button type="submit" class="btn btn-sm btn-success">Save</button>
                    
                    <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                </div>
            </div>

        </form>
    </div>
</div>
    
@endsection