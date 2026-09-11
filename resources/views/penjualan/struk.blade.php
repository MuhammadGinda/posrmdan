<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Penjualan #{{ $penjualan->id }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Courier New', Courier, monospace;
            font-size: 12px;
            color: #000;
            width: 58mm;
            margin: 0 auto;
            padding: 5px;
        }
        .center { text-align: center; }
        .bold { font-weight: bold; }
        .divider { border-top: 1px dashed #000; margin: 6px 0; }
        .row { display: flex; justify-content: space-between; width: 100%; }
        .row span:first-child { text-align: left; }
        .row span:last-child { text-align: right; }
        table { width: 100%; border-collapse: collapse; font-size: 11px; }
        table td { padding: 2px 0; vertical-align: top; }
        .item-name { display: block; }
        .item-detail { display: block; font-size: 10px; }
        .footer { margin-top: 8px; font-size: 11px; }

        .action-bar {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 18px;
        }
        .btn-action {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            font-size: 12px;
            font-weight: 600;
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: filter 0.15s ease, transform 0.05s ease;
        }
        .btn-action:active {
            transform: scale(0.97);
        }
        .btn-print-again {
            background-color: #4F46E5;
            color: #fff;
        }
        .btn-print-again:hover {
            filter: brightness(1.1);
        }
        .btn-close {
            background-color: #E5E7EB;
            color: #33395c;
        }
        .btn-close:hover {
            filter: brightness(0.95);
        }

        @media print {
            body { width: 58mm; }
            .no-print { display: none; }
            @page { margin: 0; size: 58mm auto; }
        }
    </style>
</head>
<body onload="window.print()">

    <div class="center bold" style="font-size: 14px;">POS RMDAN</div>
    <div class="center" style="font-size: 10px;">
        Jl. Contoh Alamat No. 123<br>
        Telp: 0800-0000-0000
    </div>

    <div class="divider"></div>

    <div class="row"><span>No. Transaksi</span><span>#{{ $penjualan->id }}</span></div>
    <div class="row"><span>Tanggal</span><span>{{ $penjualan->created_at->translatedFormat('d-m-Y H:i:s') }}</span></div>
    <div class="row"><span>Kasir</span><span>{{ $penjualan->user?->name ?? '-' }}</span></div>

    <div class="divider"></div>

    <table>
        @foreach ($penjualan->itemPenjualan as $item)
            <tr>
                <td colspan="3">
                    <span class="item-name">{{ $item->produk->nama ?? '-' }}</span>
                </td>
            </tr>
            <tr>
                <td class="item-detail">
                    {{ $item->kuantitas }} x Rp{{ number_format($item->kuantitas > 0 ? $item->subtotal / $item->kuantitas : 0, 0, ',', '.') }}
                </td>
                <td></td>
                <td class="item-detail" style="text-align: right;">
                    Rp{{ number_format($item->subtotal, 0, ',', '.') }}
                </td>
            </tr>
        @endforeach
    </table>

    <div class="divider"></div>

    <div class="row bold"><span>TOTAL</span><span>Rp{{ number_format($penjualan->total_pembayaran, 0, ',', '.') }}</span></div>
    <div class="row"><span>Metode</span><span>{{ strtoupper($penjualan->metode_pembayaran) }}</span></div>
    <div class="row"><span>Dibayar</span><span>Rp{{ number_format($penjualan->uang_dibayar, 0, ',', '.') }}</span></div>
    <div class="row"><span>Kembalian</span><span>Rp{{ number_format($penjualan->kembalian, 0, ',', '.') }}</span></div>

    <div class="divider"></div>

    <div class="center bold">{{ strtoupper($penjualan->status) }}</div>

    <div class="divider"></div>

    <div class="center footer">
        Terima kasih atas kunjungan Anda!<br>
        Barang yang sudah dibeli tidak dapat<br>
        dikembalikan/ditukar.
    </div>

    <div class="no-print action-bar">
        <button class="btn-action btn-print-again" onclick="window.print()">Cetak Ulang</button>
        <button class="btn-action btn-close" onclick="window.close()">Tutup</button>
    </div>

</body>
</html>