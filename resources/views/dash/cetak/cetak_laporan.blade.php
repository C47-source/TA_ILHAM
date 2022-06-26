<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cetak Laporan</title>
    <style>
        .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 100%;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
    </style>
  </head>
  <body>
    <header class="clearfix">
      <h1>Laporan Transaksi CV. Inttech</h1>
      <div id="company" class="clearfix">
        <div>CV. INTTECH</div>
        <div>Jl.Ulu Lolo, Nagari Lolo, Kec. Pantai Cermin, Kab. Solok</div>
        <div>0823 0897 0978</div>
        <div><a href="mailto:cv_inttech@gmail.com">cv_inttech@gmail.com</a></div>
      </div>
      <div id="project">
        <div><span>Periode Laporan</span> {{  Carbon\Carbon::parse($tgl_awal)->format('D, d M Y') }} - {{ Carbon\Carbon::parse($tgl_akhir)->format('D, d M Y') }}</div>
        <div><span>Tanggal Cetak</span> {{ \Carbon\Carbon::now()->format('D, d M Y') }}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">No</th>
            <th class="service">ID SERVICE</th>
            <th class="service">Tanggal</th>
            <th class="desc">Nama Pelanggan</th>
            <th class="desc">Pembelian Jasa/Sparepart</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($transaksi as $data)
            
        <tr>
            <td class="service">{{ $no++ }}</td>
            <td class="service">{{ $data->id_service }}</td>
            <td class="service">{{ Carbon\Carbon::parse($data->tanggal_masuk)->format('l, d/m/Y H:i')}}</td>
            <td class="desc">{{ $data->nm_pelanggan }}</td>
            <td class="desc">
                @foreach ($pembelian as $list)
                @if ($list->id_service == $data->id_service)
                    @if ($list->jenis_pembelian == 'jasa')
                    {{ $list->nm_jasa }},
                    @endif
                    @if ($list->jenis_pembelian == 'sparepart')
                    {{ $list->nm_sparepart }},
                    @endif
                @endif
                @endforeach
            </td>
            <td class="total">{{'Rp. '. number_format($data->total_harga,2) }}</td>
        </tr>
        @endforeach
          <tr>
            <td colspan="5" class="grand total">GRAND TOTAL</td>
            @foreach ($jumlah as $item)
                
            <td class="grand total">{{ 'Rp. '. number_format($item->grand_total,2)}}</td>
            @endforeach
          </tr>
        </tbody>
      </table>
      {{-- <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div> --}}
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>