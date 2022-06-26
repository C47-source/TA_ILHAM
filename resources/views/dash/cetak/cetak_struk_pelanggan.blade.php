<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cetak Struk</title>
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

/* #logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px; */
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
      <h1>CV. INTTECH</h1>
      <div id="company" class="clearfix">
        <div>CV. INTTECH</div>
        <div>Jl.Ulu Lolo, Nagari Lolo, Kec. Pantai Cermin, Kab. Solok</div>
        <div>0823 0897 0978</div>
        <div><a href="mailto:cv_inttech@gmail.com">cv_inttech@gmail.com</a></div>
      </div>
      <div id="project">
        <div><span>ID SERVICE</span> #{{ $detail->id_service }}</div>
        <div><span>PELANGGAN</span> {{ $detail->pelanggan->nm_pelanggan }}</div>
        <div><span>ALAMAT</span>  {{ $detail->pelanggan->alamat}}</div>
        <div><span>EMAIL</span> <a href="mailto:{{ $detail->user->email }}"> {{ $detail->user->email }}</a></div>
        <div><span>TANGGAL</span> {{ Carbon\Carbon::parse($detail->tanggal_masuk)->format('l, d/m/Y H:i')}}</div>
        <div><span>NAMA UNIT</span> {{ $detail->detail_service->nm_unit}}</div>
        <div><span>KELENGKAPAN</span> {{ $detail->detail_service->kelengkapan_unit}}</div>
        <div><span>KELUHAN</span> {{ $detail->detail_service->deskripsi_kerusakan}}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">NAMA JASA/SPAREPART</th>
            <th>JUMLAH</th>
            <th>HARGA</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($pembelian as $item)
            
        <tr>
            <td class="service">
                @if($item->jenis_pembelian == 'jasa') 
                {{ $item->nm_jasa }} 
                @endif  
                @if($item->jenis_pembelian == 'sparepart') 
                {{ $item->nm_sparepart }} 
                @endif  
            </td>
            <td class="qty">{{ $item->jumlah }}</td>
            <td class="unit">{{ number_format($item->harga,2) }}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="2" class="service"><b>TOTAL</b></td>
            <td class="unit"><b>{{ 'Rp.' .number_format($detail->transaksi->sum('harga'),2) }}</b></td>
        </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>CATATAN TEKNISI:</div>
        <div class="notice">{{ $detail->catatan_teknisi }}</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>