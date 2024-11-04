@include('layouts.header')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white" style="background: linear-gradient(to right, #0DBDE5, #2DB08B)">
                    <h2 class="text-center mb-0">Edit Profile</h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('mahasiswa.profile.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nama Mahasiswa -->
                        <div class="form-group mb-3">
                            <label for="nama_mahasiswa" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control" value="{{ $mahasiswa->nama_mahasiswa }}" required>
                        </div>

                        <!-- Universitas -->
                        <div class="form-group mb-3">
                            <label for="universitas" class="form-label">Universitas</label>
                            <input type="text" name="universitas" id="universitas" class="form-control" value="{{ $mahasiswa->universitas }}" required>
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="form-group mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ $mahasiswa->tanggal_lahir }}" required>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="form-group mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                                <option value="L" {{ $mahasiswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ $mahasiswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <!-- No HP -->
                        <div class="form-group mb-3">
                            <label for="no_hp" class="form-label">No HP</label>
                            <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ $mahasiswa->no_hp }}" required>
                        </div>

                        <!-- Alamat -->
                        <div class="form-group mb-3">
                            <label for="alamat_mahasiswa" class="form-label">Alamat</label>
                            <input type="text" name="alamat_mahasiswa" id="alamat_mahasiswa" class="form-control" value="{{ $mahasiswa->alamat_mahasiswa }}" required>
                        </div>

                        <!-- Foto Profil -->
                        <div class="form-group mb-3">
                            <label for="foto_profil" class="form-label">Foto Profil</label>
                            <input type="file" name="foto_profil" id="foto_profil" class="form-control">
                        </div>

                        <!-- Buttons -->
                        <div class="form-actions d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('mahasiswa.profile') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
