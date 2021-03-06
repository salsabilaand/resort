<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <style>
            table.static{
                position: relative;
                border: 1px solid #543535;
            }
        </style>
        <title>Cetak Data Pemilik Resort</title>
    </head>
    <body>
        <div class="form-group">
            <h3 align="center"><b>Laporan Transaksi</b></h3>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th>No</th>
                    <th>ID Kamar</th>
                    <th>Nama Pelanggan</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Tarif</th>
                    <th>Catatan Tambahan</th>
                    <th>Status</th>
                  </tr>
                  <?php $no = 1 ?>
                  @foreach ($cetakTransaksi as $item)
                  <tr>
                    <th>{{ $no++ }}</th>
                    <th>{{$item->id_kamar}}</th>
                    <th>{{$item->nama}}</th>
                    <th>{{$item->telepon}}</th>
                    <th>{{$item->email}}</th>
                    <th>{{$item->tgl_masuk}}</th>
                    <th>{{$item->tgl_keluar}}</th>
                    <th>{{$item->harga}}</th>
                    <th>{{$item->catatan}}</th>
                    <th>{{$item->status}}</th>
                  </tr>
                @endforeach
            </table>
        </div>
        <script type="text/javascript">
            window.print();
        </script>
    </body>
</html>