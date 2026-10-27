<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - {{ $portofolio->nama }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #f4f4f4; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .cv-card { max-width: 750px; margin: 30px auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.15); }
        .cv-header-bg { height: 60px; background: linear-gradient(135deg, #2b3a4a 70%, #d4af37 70%); }
        .cv-footer-bg { height: 40px; background: linear-gradient(135deg, #d4af37 30%, #2b3a4a 30%); margin-top: 30px; }
        .profile-section { padding: 20px 40px 10px 40px; }
        .profile-img { width: 120px; height: 120px; object-fit: cover; border-radius: 15px; border: 3px solid #d4af37; }
        .section-badge { background-color: #334155; color: #fff; padding: 6px 20px; border-radius: 20px; font-weight: 600; display: inline-block; margin-bottom: 12px; font-size: 1.1rem; }
        .cv-content { padding: 0 40px; }
        .info-table td { padding: 3px 0; font-size: 0.95rem; color: #475569; }
        .info-table td.label-col { width: 140px; font-weight: 500; }
        ul.custom-list { list-style-type: disc; padding-left: 20px; color: #475569; margin-bottom: 0; }
        ul.custom-list li { margin-bottom: 4px; font-size: 0.95rem; }
        @media print { body { background: #fff; } .cv-card { box-shadow: none; margin: 0; max-width: 100%; } .no-print { display: none; } }
    </style>
</head>
<body>

    <div class="text-center my-3 no-print">
        <a href="{{ route('portofolio.index') }}" class="btn btn-secondary btn-sm me-2">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <button onclick="window.print()" class="btn btn-primary btn-sm">
            <i class="bi bi-printer"></i> Cetak / Simpan PDF
        </button>
    </div>

    <div class="cv-card">
        <div class="cv-header-bg"></div>

        <div class="profile-section">
            <div class="d-flex align-items-center gap-4">
                <div>
                    @if($portofolio->foto)
                        <img src="{{ asset('storage/' . $portofolio->foto) }}" alt="Foto" class="profile-img">
                    @else
                        <img src="https://via.placeholder.com/120" alt="Foto Default" class="profile-img">
                    @endif
                </div>
                <div>
                    <h2 class="fw-bold mb-0 text-dark">{{ $portofolio->nama }}</h2>
                    <p class="text-muted mb-2">Portofolio / CV Profil</p>
                </div>
            </div>
        </div>

        <div class="cv-content">
            <div class="mt-3">
                <div class="section-badge">Data Pribadi</div>
                <table class="table table-borderless info-table mb-2">
                    <tr><td class="label-col">• Nama</td><td>: {{ $portofolio->nama }}</td></tr>
                    <tr><td class="label-col">• Tanggal lahir</td><td>: {{ \Carbon\Carbon::parse($portofolio->tanggal_lahir)->translatedFormat('d F Y') }}</td></tr>
                    <tr><td class="label-col">• Alamat</td><td>: {{ $portofolio->alamat }}</td></tr>
                    <tr><td class="label-col">• Usia</td><td>: {{ $portofolio->usia }} tahun</td></tr>
                    <tr><td class="label-col">• Jenis kelamin</td><td>: {{ $portofolio->jenis_kelamin }}</td></tr>
                </table>
            </div>

            <div class="mt-3">
                <div class="section-badge">Pendidikan</div>
                <ul class="custom-list">
                    @foreach(explode("\n", $portofolio->pendidikan) as $edu)
                        @if(trim($edu) != '') <li>{{ trim($edu) }}</li> @endif
                    @endforeach
                </ul>
            </div>

            <div class="mt-3">
                <div class="section-badge">Pengalaman</div>
                <ul class="custom-list">
                    @foreach(explode("\n", $portofolio->pengalaman) as $exp)
                        @if(trim($exp) != '') <li>{{ trim($exp) }}</li> @endif
                    @endforeach
                </ul>
            </div>

            <div class="mt-3">
                <div class="section-badge">Keterampilan</div>
                <ul class="custom-list">
                    @foreach(explode("\n", $portofolio->keterampilan) as $skill)
                        @if(trim($skill) != '') <li>{{ trim($skill) }}</li> @endif
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="cv-footer-bg"></div>
    </div>

</body>
</html>