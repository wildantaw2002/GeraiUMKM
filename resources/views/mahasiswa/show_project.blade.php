@extends('layouts.header')

@section('content')
    <div class="container py-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-header text-white"
                        style="background: linear-gradient(to right, #0DBDE5, #2DB08B); border-radius: 15px;">
                        <h3 class="mb-0">{{ $project->posisi }}</h3>
                    </div>

                    <div class="card-body">
                        <p><strong>Tempat Bekerja: </strong>{{ $project->tempat_bekerja }}</p>
                        <p><strong>Deskripsi: </strong>{{ $project->deskripsi }}</p>
                        <p><strong>Kategori: </strong>{{ $project->kategori }}</p>
                        <p><strong>Posted by: </strong>{{ $project->user->name }}</p>
                        <a href="{{ route('mahasiswa.pekerjaan') }}" class="btn btn-secondary">Back to Projects</a>
                        <!-- Apply Button -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#applyModal">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Apply Modal -->
    <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="applyModalLabel">Apply for {{ $project->posisi }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('apply.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi_diri" class="form-label">Deskripsi Diri</label>
                            <textarea class="form-control" id="deskripsi_diri" name="deskripsi_diri" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan</label>
                            <input type="text" class="form-control" id="jurusan" name="jurusan" required>
                        </div>

                        <div class="mb-3">
                            <label for="pengalaman_organisasi" class="form-label">Pengalaman Organisasi</label>
                            <div id="organisasi-list">
                                <input type="text" class="form-control mb-2" name="pengalaman_organisasi[]" placeholder="Pengalaman Organisasi 1">
                            </div>
                            <button type="button" class="btn btn-secondary" onclick="addOrganisasiField()">Tambah Pengalaman Organisasi</button>
                        </div>

                        <div class="mb-3">
                            <label for="pengalaman_kerja" class="form-label">Pengalaman Kerja</label>
                            <div id="kerja-list">
                                <input type="text" class="form-control mb-2" name="pengalaman_kerja[]" placeholder="Pengalaman Kerja 1">
                            </div>
                            <button type="button" class="btn btn-secondary" onclick="addKerjaField()">Tambah Pengalaman Kerja</button>
                        </div>

                        {{-- <div class="mb-3">
                            <label for="dokumen" class="form-label">Upload Dokumen (CV, etc.)</label>
                            <input type="file" class="form-control" id="dokumen" name="dokumen" required>
                        </div> --}}
                        <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="id_project" value="{{ $project->id }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit Application</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function addOrganisasiField() {
            var container = document.getElementById('organisasi-list');
            var input = document.createElement('input');
            input.type = 'text';
            input.name = 'pengalaman_organisasi[]';
            input.placeholder = 'Pengalaman Organisasi lainnya';
            input.classList.add('form-control', 'mb-2');
            container.appendChild(input);
        }

        function addKerjaField() {
            var container = document.getElementById('kerja-list');
            var input = document.createElement('input');
            input.type = 'text';
            input.name = 'pengalaman_kerja[]';
            input.placeholder = 'Pengalaman Kerja lainnya';
            input.classList.add('form-control', 'mb-2');
            container.appendChild(input);
        }
    </script>
@endsection
