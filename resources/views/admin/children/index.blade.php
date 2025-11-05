<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anak - {{ $orphanage->name }}</title>
    <style>
        /* RESET & FONT */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f9; color: #333; line-height: 1.6; }
        .container { max-width: 1200px; margin: 20px auto; padding: 20px; }

        /* HEADER */
        .header { background: #2c3e50; color: white; padding: 15px 20px; border-radius: 8px; margin-bottom: 20px; }
        .header h1 { font-size: 24px; font-weight: 600; }
        .back-btn, .add-btn {
            display: inline-block; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-weight: 500; font-size: 14px; margin-top: 10px;
        }
        .back-btn { background: #3498db; color: white; }
        .back-btn:hover { background: #2980b9; }
        .add-btn { background: #27ae60; color: white; }
        .add-btn:hover { background: #219653; }

        /* NOTIFIKASI */
        .alert { padding: 12px; border-radius: 6px; margin-bottom: 20px; font-size: 14px; }
        .alert-success { background: #d5f5e3; border: 1px solid #27ae60; color: #27ae60; }

        /* STATISTIK */
        .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 15px; margin-bottom: 25px; }
        .stat-card {
            background: white; padding: 20px; border-radius: 10px; text-align: center; box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border-left: 5px solid;
        }
        .stat-card h3 { font-size: 28px; font-weight: bold; margin-bottom: 5px; }
        .stat-card p { font-size: 14px; color: #666; }
        .stat-male { border-color: #3498db; } .stat-male h3 { color: #3498db; }
        .stat-female { border-color: #e74c3c; } .stat-female h3 { color: #e74c3c; }
        .stat-inhouse { border-color: #27ae60; } .stat-inhouse h3 { color: #27ae60; }
        .stat-total { border-color: #f39c12; } .stat-total h3 { color: #f39c12; }

        /* TABEL */
        .table-container { background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; }
        th { background: #34495e; color: white; padding: 12px 15px; text-align: left; font-weight: 600; font-size: 13px; text-transform: uppercase; }
        td { padding: 12px 15px; border-bottom: 1px solid #eee; font-size: 14px; }
        tr:hover { background: #f8f9fa; }
        .badge {
            display: inline-block; padding: 4px 10px; border-radius: 20px; font-size: 11px; font-weight: bold; text-transform: uppercase;
        }
        .badge-male { background: #d6eaf8; color: #2980b9; }
        .badge-female { background: #fadbd8; color: #c0392b; }
        .badge-status { background: #fef5e7; color: #d35400; }

        /* AKSI */
        .action-link { color: #8e44ad; font-weight: 500; text-decoration: none; margin-right: 10px; }
        .action-link:hover { text-decoration: underline; }
        .delete-form { display: inline; }
        .delete-btn { background: none; border: none; color: #e74c3c; font-weight: 500; cursor: pointer; font-size: 14px; }
        .delete-btn:hover { text-decoration: underline; }

        /* PAGINATION */
        .pagination { text-align: center; margin-top: 20px; }
        .pagination a { display: inline-block; padding: 8px 12px; margin: 0 4px; background: #ecf0f1; color: #2c3e50; text-decoration: none; border-radius: 5px; font-size: 14px; }
        .pagination a:hover { background: #bdc3c7; }
        .pagination .active { background: #3498db; color: white; }

        /* EMPTY STATE */
        .empty { text-align: center; padding: 40px; color: #95a5a6; }
        .empty p { font-size: 16px; margin-top: 10px; }
    </style>
</head>
<body>

<div class="container">

    <!-- HEADER -->
    <div class="header">
        <h1>Data Anak - {{ $orphanage->name }}</h1>
        <div>
            <a href="{{ route('admin.orphanages.index') }}" class="back-btn">Kembali ke Daftar Panti</a>
            <a href="{{ route('admin.orphanages.children.create', $orphanage) }}" class="add-btn">+ Tambah Anak</a>
        </div>
    </div>

    <!-- NOTIFIKASI -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- STATISTIK -->
    <div class="stats">
        <div class="stat-card stat-male">
            <h3>{{ $children->where('gender', 'LAKI-LAKI')->count() }}</h3>
            <p>Laki-laki</p>
        </div>
        <div class="stat-card stat-female">
            <h3>{{ $children->where('gender', 'PEREMPUAN')->count() }}</h3>
            <p>Perempuan</p>
        </div>
        <div class="stat-card stat-inhouse">
            <h3>{{ $children->where('in_house', true)->count() }}</h3>
            <p>Dalam Panti</p>
        </div>
        <div class="stat-card stat-total">
            <h3>{{ $children->count() }}</h3>
            <p>Total Anak</p>
        </div>
    </div>

    <!-- TABEL -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th style="text-align:center;">JK</th>
                    <th>Tempat, Tgl Lahir</th>
                    <th>Pendidikan</th>
                    <th>Status</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>

                <!-- LOOP DATA -->
                @foreach($children as $child)
                <tr>
                    <td><strong>{{ $child->name }}</strong></td>
                    <td style="text-align:center;">
                        <span class="badge {{ $child->gender == 'LAKI-LAKI' ? 'badge-male' : 'badge-female' }}">
                            {{ $child->gender == 'LAKI-LAKI' ? 'L' : 'P' }}
                        </span>
                    </td>
                    <td>
                        {{ $child->birth_place }},
                        <span style="color:#7f8c8d;">
                            {{ $child->birth_date?->format('d/m/Y') ?? '—' }}
                        </span>
                    </td>
                    <td>{{ $child->education_level }}</td>
                    <td>
                        <span class="badge badge-status">{{ $child->status }}</span>
                    </td>
                    <td style="text-align:center;">
                        <a href="{{ route('admin.orphanages.children.edit', [$orphanage, $child]) }}" class="action-link">Edit</a>
                        <form action="{{ route('admin.orphanages.children.destroy', [$orphanage, $child]) }}" method="POST" class="delete-form">
                            @csrf @method('DELETE')
                            <button type="submit" class="delete-btn" onclick="return confirm('Hapus {{ addslashes($child->name) }}?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

                <!-- KOSONG -->
                @if($children->count() == 0)
                <tr>
                    <td colspan="6" class="empty">
                        <p>Belum ada data anak.</p>
                        <p style="font-size:14px; margin-top:8px;">Klik tombol "+ Tambah Anak" untuk memulai.</p>
                    </td>
                </tr>
                @endif

            </tbody>
        </table>
    </div>

    <!-- PAGINATION -->
    <div class="pagination">
        {{ $children->links() }}
    </div>

</div>

</body>
</html>