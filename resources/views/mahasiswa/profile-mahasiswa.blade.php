    @include('layouts.header')

    @if ($errors->any())
        <div class="container mx-auto my-4">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">Something went wrong.</span>
                <ul class="mt-2">
                    @foreach ($errors->all() as $error)
                        <li class="text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

<br>
    <div class="max-w-5xl mx-auto p-6 mt-11">
        
        <!-- Profile Header -->
        <div class="bg-gradient-to-r from-teal-500 to-green-500 text-white rounded-lg shadow-lg p-8 mb-6 flex flex-col md:flex-row items-center md:justify-between">
            <div class="flex flex-col items-center md:flex-row">
                <img src="{{ asset($mahasiswa && $mahasiswa->foto_profil ? 'uploads/mahasiswa/' . $mahasiswa->foto_profil : 'images/default.png') }}" alt="Profile Image"
                    class="w-32 h-32 rounded-full border-4 border-white shadow-lg mb-4 md:mb-0 md:mr-6 object-cover">
                <div class="text-center md:text-left">
                    <h1 class="text-2xl font-bold">{{ $mahasiswa->nama_mahasiswa ?? 'N/A' }}</h1>
                    <p class="text-lg">{{ $mahasiswa->universitas ?? 'N/A' }}</p>
                </div>
            </div>
            <a href="{{ route('mahasiswa.profile.edit', $mahasiswa->id_user) }}" class="mt-4 md:mt-0 bg-white text-teal-700 font-semibold px-6 py-2 rounded-lg shadow hover:bg-gray-200 transition duration-300">
                Edit Profile
            </a>
        </div>

        <!-- Profile Information and About Me -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Personal Information -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-4">Personal Information</h3>
                <p class="flex items-center text-gray-700 mb-2">
                    <i class="fas fa-calendar-alt mr-2"></i> 
                    <span class="font-semibold">Birth Date:</span> {{ \Carbon\Carbon::parse($mahasiswa->tanggal_lahir)->format('d M Y') }}
                </p>
                <p class="flex items-center text-gray-700 mb-2">
                    <i class="fas fa-map-marker-alt mr-2"></i> 
                    <span class="font-semibold">Location:</span> {{ $mahasiswa->kota_mahasiswa }}, {{ $mahasiswa->provinsi_mahasiswa }}
                </p>
                <p class="flex items-center text-gray-700">
                    <i class="fas fa-phone-alt mr-2"></i> 
                    <span class="font-semibold">Contact:</span> {{ $mahasiswa->no_hp }}
                </p>
            </div>

            <!-- About Me Section -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold">About Me</h3>
                    <button class="text-teal-700 font-semibold" data-bs-toggle="modal" data-bs-target="#editBioModal">Edit Bio</button>
                </div>
                <p>{{ $mahasiswa->bio ?? 'No bio added yet.' }}</p>
            </div>

            <!-- Active Projects Section -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold mb-4">Active Projects</h3>
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
                    <div class="border-l-4 border-teal-500 pl-4 mb-4">
                        <h4 class="font-semibold text-teal-700">{{ $apply->project->posisi }}</h4>
                        <p class="text-gray-600">{{ $apply->project->tempat_bekerja }}</p>
                        <p class="text-sm text-gray-500">Start Date: {{ \Carbon\Carbon::parse($apply->project->tanggal)->format('d M Y') }}</p>
                    </div>
                @empty
                    <p class="text-gray-500">No active projects at the moment.</p>
                @endforelse
            </div>
        </div>

        <!-- Completed Projects Section -->
        <div class="bg-white p-6 rounded-lg shadow-md mt-6">
            <h3 class="text-xl font-bold mb-4">Completed Projects</h3>
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
                <div class="border-l-4 border-gray-500 pl-4 mb-4">
                    <h4 class="font-semibold text-gray-700">{{ $apply->project->posisi }}</h4>
                    <p class="text-gray-600">{{ $apply->project->tempat_bekerja }}</p>
                    <p class="text-sm text-gray-500">Completed on {{ $apply->project->completed_date->format('d M Y') }}</p>
                </div>
            @empty
                <p class="text-gray-500">No completed projects yet.</p>
            @endforelse
        </div>
    </div>

    <!-- Edit Bio Modal -->
    <div class="modal fade" id="editBioModal" tabindex="-1" aria-labelledby="editBioModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBioModalLabel">Edit Bio</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <form action="{{ route('mahasiswa.bio.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <textarea name="bio" class="w-full p-2 border rounded-lg" rows="5">{{ old('bio', $mahasiswa->bio) }}</textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-teal-600 text-white rounded-lg hover:bg-teal-700">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="fixed bottom-8 right-8 bg-teal-600 text-white p-3 rounded-full shadow-lg hover:bg-teal-700 transition duration-300" style="display: none;" onclick="window.scrollTo({ top: 0, behavior: 'smooth' });">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Scroll to Top Button Functionality
        const scrollButton = document.getElementById('scrollToTop');
        window.onscroll = () => {
            scrollButton.style.display = (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) ? 'block' : 'none';
        };

        // Modal function for achievements
        function openAchievementModal(applyId) {
            document.getElementById('achievementApplyId').value = applyId;
            const modal = new bootstrap.Modal(document.getElementById('achievementModal'));
            modal.show();
        }

        window.openAchievementModal = openAchievementModal;
    </script>

</body>
</html>