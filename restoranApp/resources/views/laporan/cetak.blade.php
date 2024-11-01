<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Laporan Pesanan Pelanggan</title>
 <style>
     body { font-family: Arial, sans-serif; }
     table { width: 100%; border-collapse: collapse; margin-top: 20px; }
     th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }
     th { background-color: #f2f2f2; }
     .total-row { font-weight: bold; }
 </style>
</head>
<body>
 <h2>Laporan Pesanan Pelanggan</h2>
 <table>
     <thead>
         <tr>
             <th>Nomor Meja</th>
             <th>Nama Pelanggan</th>
             <th>Menu yang Dipesan</th>
             <th>Harga Total</th>
             <th>Status Pesanan</th>
         </tr>
     </thead>
     <tbody>
         @foreach($orders as $order)
             <tr>
                 <td>{{ $order->pelanggan->nomor_meja }}</td>
                 <td>{{ $order->pelanggan->nama }}</td>
                 <td>
                     <ul>
                         @foreach($order->menus as $menu)
                             <li>{{ $menu->nama_hidangan }} - Rp{{ number_format($menu->harga, 2) }}</li>
                         @endforeach
                     </ul>
                 </td>
                 <td>Rp{{ number_format($order->menus->sum('harga'), 2) }}</td>
                 <td>{{ $order->status }}</td>
             </tr>
         @endforeach
     </tbody>
 </table>
</body>
</html>