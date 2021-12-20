@extends('home')
@section('crud1')

    <div class="content">
        <div class="card card-info card-outline">
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>No </th>
                    <th>Nama Pelanggan</th>
                    <th>Barang Yang dipilih</th>
                    <th>Jumlah Barang</th>
                    <th>Harga Total</th>
                    <th>Alamat</th>
                    <th>Waktu Pembelian</th>
                    <th>Estimasi Pengerjaan</th>
                </tr>
                @foreach ($dtcheckout as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item['nama_user'] }}</td>
                        <td>{{ $item['nama_barang'] }}</td>
                        <td>{{ $item['jumlah'] }}</td>
                        <td>Rp {{ number_format($item['biaya_total']) }}</td>
                        <td>{{ $item['alamat'] }}</td>
                        <td>{{ $item->created_at->format('d M Y - H:i:s') }}</td>
                        <td>{{ $item->waktu }} Hari</td>
                    </tr>

                @endforeach
            </table>
        </div>
        {{-- <div class="card-footer">{{ $dtcheckout->links() }}</div> --}}
    </div>
@endsection
