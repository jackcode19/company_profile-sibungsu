@extends('layouts.master')

@push('style')
    <link rel="stylesheet" href="/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush
@section('content')
    @php
        if (isset($client)) {
            $actionUrl = route('client.update', $client->id);
        } else {
            $actionUrl = route('client.store');
        }
    @endphp
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Client</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Client</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-seccond">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Service</h3>
                        </div>
                        <form id="submitClient" method="POST" action="{{ $actionUrl }}" enctype="multipart/form-data">
                            @if (@isset($client))
                                {{ method_field('PUT') }}
                                <input type="hidden" name="user_id" value="{{ $client->id }}" />
                            @endif
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" required
                                        placeholder="Title Client" value="{{ isset($client) ? $client->title : old('title') }}">

                                    @error('title')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Logo</label>
                                    @if (isset($client))
                                        <div class="mb-3">
                                            <img src="{{ Storage::url('clients/'. $client->client_logo) }}" alt=""
                                                style="width: 170px;" height="120px" class="img-rounded">
                                        </div>
                                    @endif
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="client_logo" id="client_logo">
                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>

                                    @error('client_logo')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Deskripsi</label>
                                    <textarea class="form-control" rows="3" name="description" id="description" placeholder="Deskripsi ...">{{ isset($client) ? $client->description : old('description') }}</textarea>
                                    @error('description')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Province</label>
                                    <select class="form-control" name="provinces_id" id="provinces_id" style="width: 100%;">
                                        <option value="">Pilih Provinsi</option>
                                    @foreach($provinceList as $province)
                                    <option {{ isset($client) && $client->provinces_id == $province->provinces_id ? 'selected' : '' }} value="{{ $province->provinces_id }}">{{ $province->name }}</option>
                                    @endforeach
                                    </select>
                                    @error('provinces_id')
                                        <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" submitClient="submit" class="btn btn-info btn-sm">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
