@extends('layouts.header')

@section('content')
<div class="container py-5">
    <h1 class="mb-4" style="font-size: 2.5rem; color: #2DB08B; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);">Proyek di Kategori {{ $category }}</h1>

    <div class="row">
        @if($projects->isNotEmpty())
            @foreach($projects as $project)
                <div class="col-md-4 mb-4">
                    <div class="card h-100" style="border-radius: 15px; padding: 20px;">
                        <div class="card-header text-white" style="background: linear-gradient(to right, #0DBDE5, #2DB08B); border-radius: 15px; padding: 20px;">
                            <h5 class="mb-0">Posisi : {{ $project->posisi }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-1">Tempat Bekerja : {{ $project->tempat_bekerja }}</p>
                            <p>Deskripsi Projek : {{ $project->deskripsi }}</p>
                            <a href="{{ route('mahasiswa.pekerjaan.show', $project->id) }}" class="btn btn-primary btn-sm" style="border-radius: 15px; padding: 10px;">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>No projects in this category.</p>
        @endif
    </div>
</div>
@endsection



































