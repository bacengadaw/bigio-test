@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6>Table Penilaian</h6>
                        </div>
                        <div class="col-sm-6 text-end">
                        @hasanyrole('admin-master')
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Tambah Data
                            </button>
                        @endhasanyrole
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nilai</th>
                                @hasanyrole('admin-master')
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                @endhasanyrole
                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($dataNilai as $data)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$data->name}}</h6>
                                                <p class="text-xs text-secondary mb-0">{{$data->user->email}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p>{{$data->nilai}}</p>
                                        </td>
                                        @hasanyrole('admin-master')
                                        <td class="align-middle text-center">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#editModal{{$data->id}}" class="text-secondary font-weight-bold mx-2" data-toggle="tooltip" data-original-title="Edit user">
                                                <i class="fas fa-edit"> Edit</i> 
                                            </a>
                                            <form method="POST" action="/delete-data/{{$data->id}}">
                                                {{ csrf_field() }}
                                                <button type="submit" class="text-secondary font-weight-bold bg-transparent border-0" ><i class="fas fa-trash"> Hapus</i> </button>
                                            </form>
                                            
                                        </td>
                                        @endhasanyrole
                                    </tr>

                                    @include('modal.editnilai-modal')
                                @empty
                                    <tr>
                                        <td colspan="3"></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer pt-3">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                    document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
                </div>
            </div>
        </div>
    </div>
    </footer>
    <!-- modal  -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form method="POST" action="{{ route('post-data') }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Nilai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                        <label for="exampleInputEmail1" class="form-label">Pilih Siswa</label>
                        <select class="form-select" aria-label="Default select example" name="user_id">
                            @foreach($dataUser as $user)
                                @foreach($user->roles as $dataRoles)
                                    @if($dataRoles->name == 'users')
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endif
                                @endforeach
                            @endforeach
                        </select>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nilai</label>
                            <input type="number" name="nilai" class="form-control">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

