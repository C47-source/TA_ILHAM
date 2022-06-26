@extends('template_dashboard')

@section('konten')
   <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow mb-5">
                <div style="background-color:#0E0943 ;"  class="card-header text-white">
                    Riwayat Transaksi
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Service</th>
                                <th>Nama Unit</th>
                                <th>Tanggal Pesan</th>
                                <th>Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transaksi as $data)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td><a href="{{ url('detail-pesanan-selesai',$data->id_service) }}" style="color: #FA7854;text-decoration:none;">{{ $data->id_service }}</a></td>
                                <td>{{ $data->detail_service->nm_unit }}</td>
                                <td>{{Carbon\Carbon::parse($data->tanggal_masuk)->format('l, d/m/Y H:i') }}</td>
                                <td>{{ number_format($data->transaksi()->sum('harga'),2) }}</td>
                            </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
           </div>
        </div>
   </div>
@endsection