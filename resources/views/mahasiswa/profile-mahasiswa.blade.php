<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Student Profile</title>


</head>

<body>
    @include('layouts.header')

    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #475569;
            --light-bg: #f8fafc;
            --card-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }

        body {
            background-color: var(--light-bg);
            font-family: 'Inter', sans-serif;
        }

        .profile-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .profile-header {
            background: linear-gradient(to right, #0DBDE5, #2DB08B);
            color: white;
            border-radius: 1rem;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
        }

        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 4px solid white;
            object-fit: cover;
            box-shadow: var(--card-shadow);
        }

        .profile-card {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
            transition: transform 0.2s;
        }

        .profile-card:hover {
            transform: translateY(-5px);
        }

        .info-label {
            color: var(--secondary-color);
            font-weight: 600;
            min-width: 140px;
        }

        .project-card {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .project-card:hover {
            box-shadow: var(--card-shadow);
            border-color: var(--primary-color);
        }

        .achievement-item {
            background: var(--light-bg);
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 0.5rem;
            border-left: 4px solid var(--primary-color);
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .status-active {
            background: #dcfce7;
            color: #166534;
        }

        .status-completed {
            background: #dbeafe;
            color: #1e40af;
        }

        .btn-custom {
            padding: 0.5rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary-custom {
            background: var(--primary-color);
            color: white;
            border: none;
        }

        .btn-primary-custom:hover {
            background: #1e40af;
        }

        .modal-custom {
            border-radius: 1rem;
        }

        .modal-custom .modal-content {
            border-radius: 1rem;
            border: none;
            box-shadow: var(--card-shadow);
        }

        .form-control-custom {
            border-radius: 0.5rem;
            border: 1px solid #e2e8f0;
            padding: 0.75rem;
        }

        .form-control-custom:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
    </style>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $errors)
                    <li>{{ $errors }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="profile-container">
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="row align-items-center">
                <div class="col-md-3 text-center">
                    @if ($mahasiswa && $mahasiswa->foto_profil != null)
                    <img src="{{ asset('uploads/mahasiswa/' . $mahasiswa->foto_profil) }}" alt="Profile Image"
                        class="profile-image mb-3">
                    @endif
                </div>
                <div class="col-md-9">
                    <h1 class="display-5 mb-2">{{ $mahasiswa ? $mahasiswa->nama_mahasiswa : '-' }}</h1>
                    <p class="lead mb-3">{{ $mahasiswa ? $mahasiswa->universitas : '-' }}</p>
                    {{-- <form action="{{ route('mahasiswa.profile.edit', $mahasiswa->id_user) }}" method="get"> --}}

                    <a href="{{ route('mahasiswa.profile.edit', $mahasiswa->id_user) }}">
                        <button type="submit" class="btn btn-light btn-custom">
                            <i class="fas fa-edit me-2"></i>Edit Profile
                        </button>

                    </a>
                </div>
            </div>
        </div>

        <!-- Profile Information -->
        <div class="row">
            <div class="col-md-4">
                <div class="profile-card">
                    <h3 class="mb-4">Personal Information</h3>
                    <div class="mb-3">
                        <div class="d-flex mb-2">
                            <span class="info-label"><i class="fas fa-calendar me-2"></i>Birth Date:</span>
                            <span>{{ \Carbon\Carbon::parse($mahasiswa->tanggal_lahir)->format('d M Y') }}</span>
                        </div>
                        <div class="d-flex mb-2">
                            <span class="info-label"><i class="fas fa-map-marker-alt me-2"></i>Location:</span>
                            <span>{{ $mahasiswa->kota_mahasiswa }}, {{ $mahasiswa->provinsi_mahasiswa }}</span>
                        </div>
                        <div class="d-flex mb-2">
                            <span class="info-label"><i class="fas fa-phone me-2"></i>Contact:</span>
                            <span>{{ $mahasiswa->no_hp }}</span>
                        </div>
                    </div>
                </div>

                <!-- Di profile page, ganti bagian bio section dengan kode ini -->
                <div class="profile-card">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3>About Me</h3>
                        <button class="btn btn-outline-primary btn-custom" data-bs-toggle="modal"
                            data-bs-target="#editBioModal">
                            <i class="fas fa-edit me-2"></i>Edit Bio
                        </button>
                    </div>
                    <p class="bio-content">{{ $mahasiswa->bio ?? 'No bio added yet.' }}</p>
                </div>

                <!-- Tambahkan modal ini di bagian bawah halaman, sebelum tag closing body -->
                <div class="modal fade" id="editBioModal" tabindex="-1" aria-labelledby="editBioModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h5 class="modal-title" id="editBioModalLabel">Edit Bio</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="bioForm" action="{{ route('mahasiswa.bio.update') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="bio" class="form-label">Tell us about yourself</label>
                                        <textarea name="bio" id="bio" class="form-control form-control-custom" rows="6"
                                            placeholder="Write something about yourself...">{{ old('bio', $mahasiswa->bio) }}</textarea>
                                        <div class="invalid-feedback" id="bioError"></div>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary btn-custom" data-bs-dismiss="modal"
                                        onclick="window.location.reload();">Cancel</button>
                                    <button type="submit" class="btn btn-primary-custom">
                                        <span class="spinner-border spinner-border-sm d-none me-2" role="status"
                                            aria-hidden="true"></span>
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <!-- Active Projects Section -->
                <div class="profile-card">
                    <h3 class="mb-4">Active Projects</h3>
                    @php
                        $activeProjects = $mahasiswa->user
                            ->apply()
                            ->where('status', 'active')
                            ->whereHas('project', function ($query) {
                                $query->where('status', 'active');
                            })
                            ->with('project')
                            ->get();
                    @endphp

                    @forelse($activeProjects as $apply)
                        <div class="project-card">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-1">{{ $apply->project->posisi }}</h4>
                                    <p class="text-muted mb-0">{{ $apply->project->tempat_bekerja }}</p>
                                </div>
                                <span class="status-badge status-active">
                                    <i class="fas fa-circle me-2"></i>Active
                                </span>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>Department:</strong> {{ $apply->jurusan }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>Start Date:</strong>
                                        {{ \Carbon\Carbon::parse($apply->project->tanggal)->format('d M Y') }}
                                    </p>
                                </div>
                            </div>

                            <!-- Updated Achievement Display Section -->
                            <div class="achievements-section">
                                <h5 class="mb-3">Uploaded Files</h5>
                                @foreach ($apply->achievements as $achievement)
                                    <div class="achievement-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-file me-2 text-primary"></i>
                                                <div>
                                                    <a href="{{ asset('storage/' . $achievement->deskripsi) }}"
                                                        class="text-decoration-none" target="_blank">
                                                        {{ basename($achievement->deskripsi) }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <small class="text-muted me-3">
                                                    {{ $achievement->created_at->format('M d, Y') }}
                                                </small>
                                                <a href="{{ asset('storage/tasks/' . $achievement->deskripsi) }}"
                                                    class="btn btn-sm btn-outline-primary" download>
                                                    <i class="fas fa-download"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <button class="btn btn-primary-custom mt-3"
                                    onclick="openAchievementModal({{ $apply->id }})">
                                    <i class="fas fa-upload me-2"></i>Upload New File
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-4">
                            <i class="fas fa-clipboard-list fa-3x text-muted mb-3"></i>
                            <p>No active projects at the moment.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Completed Projects Section -->
                <div class="profile-card">
                    <h3 class="mb-4">Completed Projects</h3>
                    @php
                        $completedProjects = $mahasiswa
                            ->applies()
                            ->where('status', 'completed')
                            ->whereHas('project', function ($query) {
                                $query->where('status', 'completed');
                            })
                            ->with('project')
                            ->get();
                        dd($completedProjects);
                    @endphp

                    @forelse($completedProjects as $apply)
                        <div class="project-card">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h4 class="mb-1">{{ $apply->project->posisi }}</h4>
                                    <p class="text-muted mb-0">{{ $apply->project->tempat_bekerja }}</p>
                                </div>
                                <span class="status-badge status-completed">
                                    <i class="fas fa-check-circle me-2"></i>Completed
                                </span>
                            </div>

                            <div class="mb-3">
                                <p class="mb-1"><strong>Department:</strong> {{ $apply->jurusan }}</p>
                                <p class="mb-1"><strong>Organization Experience:</strong>
                                    {{ $apply->pengalaman_organisasi }}
                                </p>
                                <p class="mb-1"><strong>Work Experience:</strong>
                                    {{ $apply->pengalaman_kerja }}
                                </p>
                            </div>

                            <div class="achievements-section">
                                <h5 class="mb-3">Key Achievements</h5>
                                @foreach ($apply->achievements as $achievement)
                                    <div class="achievement-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0">{{ $achievement->deskripsi }}</p>
                                            <small class="text-muted">
                                                {{ $achievement->created_at->format('M d, Y') }}
                                            </small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-4">
                            <i class="fas fa-trophy fa-3x text-muted mb-3"></i>
                            <p>No completed projects yet.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="achievementModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-custom">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Upload Task File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Ubah menjadi form biasa tanpa JavaScript handler -->
                <form action="{{ route('mahasiswa.achievement.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="apply_id" id="achievementApplyId">
                        <div class="mb-3">
                            <label for="taskFile" class="form-label">Choose File</label>
                            <input type="file" class="form-control form-control-custom" id="taskFile"
                                name="task_file" required>
                            <small class="text-muted">Allowed file types: PDF, DOC, DOCX, ZIP, RAR (Max: 10MB)</small>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary btn-custom"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary-custom">
                            Upload File
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    {{-- Pastikan meta CSRF token ada di layout --}}


    {{-- Di bagian bawah sebelum closing body, update script section --}}
    <!-- Bootstrap and jQuery Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

    <script>
        // Utility function to reset form
        function resetForm(form) {
            form.reset();
            const invalidInputs = form.querySelectorAll('.is-invalid');
            invalidInputs.forEach(input => input.classList.remove('is-invalid'));
            const errorMessages = form.querySelectorAll('.invalid-feedback');
            errorMessages.forEach(error => error.textContent = '');
        }

        // Modal function for achievements
        function openAchievementModal(applyId) {
            document.getElementById('achievementApplyId').value = applyId;
            const modal = new bootstrap.Modal(document.getElementById('achievementModal'));
            modal.show();
        }

        // Make it available to window object
        window.openAchievementModal = openAchievementModal;

        // Main initialization
        document.addEventListener('DOMContentLoaded', function() {
            // Set up CSRF token for all AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Bio form handling
            const bioForm = document.getElementById('bioForm');
            const bioModal = new bootstrap.Modal(document.getElementById('editBioModal'));

            if (bioForm) {
                bioForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const submitBtn = this.querySelector('button[type="submit"]');
                    const spinner = submitBtn.querySelector('.spinner-border');
                    submitBtn.disabled = true;
                    spinner.classList.remove('d-none');

                    const formData = new FormData(this);

                    fetch(this.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .content,
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                document.querySelector('.bio-content').textContent = formData.get(
                                    'bio');
                                bioModal.hide();
                            } else {
                                throw new Error(data.message || 'An error occurred');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        })
                        .finally(() => {
                            submitBtn.disabled = false;
                            spinner.classList.add('d-none');
                        });
                });
            }

            // // File upload handling
            // const achievementForm = document.querySelector('#achievementModal form');
            // if (achievementForm) {
            //     achievementForm.addEventListener('submit', function(e) {
            //         e.preventDefault();

            //         const submitBtn = this.querySelector('button[type="submit"]');
            //         const spinner = submitBtn.querySelector('.spinner-border');
            //         submitBtn.disabled = true;
            //         spinner.classList.remove('d-none');

            //         const formData = new FormData(this);

            //         fetch(this.action, {
            //                 method: 'POST',
            //                 body: formData,
            //                 headers: {
            //                     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
            //                         .content,
            //                     'Accept': 'application/json'
            //                 }
            //             })
            //             .then(response => response.json())
            //             .then(data => {
            //                 if (data.success) {
            //                     window.location.reload();
            //                 } else {
            //                     throw new Error(data.message || 'An error occurred');
            //                 }
            //             })
            //             .catch(error => {
            //                 alert(error.message || 'Failed to upload file. Please try again.');
            //                 // console.error('Error:', error);
            //             })
            //             .finally(() => {
            //                 submitBtn.disabled = false;
            //                 spinner.classList.add('d-none');
            //             });
            //     });
            // }

            // Reset all modals on close
            document.querySelectorAll('.modal').forEach(modal => {
                modal.addEventListener('hidden.bs.modal', function() {
                    const form = this.querySelector('form');
                    if (form) {
                        resetForm(form);
                    }
                });
            });

            // Scroll to top functionality
            const scrollButton = document.getElementById('scrollToTop');
            if (scrollButton) {
                window.onscroll = function() {
                    scrollButton.style.display =
                        (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) ?
                        'block' :
                        'none';
                };

                scrollButton.addEventListener('click', function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }
        });
    </script>
    <button id="scrollToTop" class="btn btn-primary-custom rounded-circle position-fixed bottom-0 end-0 m-4"
        style="display: none;" onclick="scrollToTop()">
        <i class="fas fa-arrow-up"></i>
    </button>
</body>
