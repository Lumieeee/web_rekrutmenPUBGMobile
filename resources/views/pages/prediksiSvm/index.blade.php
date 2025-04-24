@extends('layouts.app')

@section('title', 'Halaman Prediksi SVM')

@section('content')
    <div class="container-fluid" id="container-wrapper">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <h3 class="text-dark">Prediksi Kandidat Player</h3>
                <div class="card">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>PUBG ID</th>
                                    <th>Nama</th>
                                    <th>KD</th>
                                    <th>Win Ratio</th>
                                    <th>Accuracy</th>
                                    <th>Headshot Rate</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($candidate_players as $player)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $player->pubg_id }}</td>
                                        <td>{{ $player->name }}</td>
                                        <td>{{ $player->kd }}</td>
                                        <td>{{ $player->win_ratio }}%</td>
                                        <td>{{ $player->accuracy }}%</td>
                                        <td>{{ $player->headshot_rate }}%</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm btn-prediksi"
                                                data-id="{{ $player->id }}">
                                                Prediksi
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $candidate_players->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk hasil prediksi -->
    <div class="modal fade" id="modalHasilPrediksi" tabindex="-1" aria-labelledby="modalHasilLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHasilLabel">Hasil Prediksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body" id="hasilPrediksiContent">Memuat...</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.btn-prediksi');

            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const playerId = this.getAttribute('data-id');

                    fetch(`/prediksiSVM/prediksi/${playerId}`)
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(data => {
                                    throw new Error(data.message || 'Unknown error');
                                });
                            }
                            return response.json();
                        })
                        .then(data => {
                            document.getElementById('hasilPrediksiContent').innerHTML = `
                            <strong>Nama Player:</strong> ${data.nama} <br>
                            <strong>KD:</strong> ${data.kd} <br>
                            <strong>Hasil Prediksi:</strong> <span class="badge bg-${data.hasil === 'Layak' ? 'success' : 'danger'}">${data.hasil}</span> <br>
                            <strong>Confidence:</strong> ${
                                data.confidence !== null && !isNaN(data.confidence)
                                    ? (data.confidence * 100).toFixed(2) + '%'
                                    : 'Tidak tersedia'
                            }
                        `;
                            new bootstrap.Modal(document.getElementById('modalHasilPrediksi'))
                                .show();
                        })
                        .catch(async err => {
                            try {
                                const errorResponse = await err.response.json();
                                alert('Gagal prediksi: ' + errorResponse.message);
                                console.error('DETAIL ERROR DARI SERVER:', errorResponse);
                            } catch (parseErr) {
                                alert('Terjadi kesalahan saat memproses prediksi.');
                                console.error('GAGAL MENGAMBIL PESAN ERROR:', err);
                            }
                        });
                });
            });

            // 🔁 Reload halaman setelah modal ditutup
            const modalEl = document.getElementById('modalHasilPrediksi');
            modalEl.addEventListener('hidden.bs.modal', function() {
                location.reload();
            });
        });
    </script>
@endpush
