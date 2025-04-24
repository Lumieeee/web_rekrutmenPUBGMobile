@extends('layouts.app')

@section('title', 'Hasil Clustering K-Means')

@section('title_clustering', 'Hasil Clustering K-Means')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <h3 class="text-dark">Hasil Clustering</h3>

                <!-- Dropdown Filter -->
                <form action="{{ route('hasilClustering.index') }}" method="GET" class="mb-3">
                    <label for="statusFilter" class="small">Filter Status Cluster:</label>
                    <select name="status" id="statusFilter" class="form-control form-control-sm w-auto d-inline-block"
                        onchange="this.form.submit()">
                        <option value="all" {{ $filterStatus == 'all' ? 'selected' : '' }}>Semua</option>
                        <option value="layak" {{ $filterStatus == 'layak' ? 'selected' : '' }}>Layak</option>
                        <option value="tidak_layak" {{ $filterStatus == 'tidak_layak' ? 'selected' : '' }}>Tidak Layak
                        </option>
                    </select>
                </form>


                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="table-responsive p-3">
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
                                        <th>Status Cluster</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hasilClustering as $index => $data)
                                        <tr>
                                            <td>{{ $loop->iteration + ($hasilClustering->currentPage() - 1) * $hasilClustering->perPage() }}
                                            </td>
                                            <td>{{ $data->pubg_id }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->kd }}</td>
                                            <td>{{ $data->win_ratio }}%</td>
                                            <td>{{ $data->accuracy }}%</td>
                                            <td>{{ $data->headshot_rate }}%</td>
                                            <td>
                                                @if ($data->cluster_status == 'Layak')
                                                    <span class="badge badge-success">Layak</span>
                                                @else
                                                    <span class="badge badge-danger">Tidak Layak</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination Laravel -->
                        <div class="card-footer">
                            <div class="d-flex justify-content-center">
                                {{ $hasilClustering->appends(['status' => $filterStatus])->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection




{{-- <!-- Form Import -->
             <form action="{{ route('hasilClustering.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="file">Pilih File Excel untuk Import Hasil Clustering</label>
                    <input type="file" name="file" class="form-control" accept=".xlsx,.csv">
                </div>
                <button type="submit" class="btn btn-success">Import Data</button>
            </form> --}}
