<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <h1>Data Profil Sekolah Kota Pontianak</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Nama Sekolah</th>
            <th>NPSN</th>
            <th>Status</th>
            <th>Alamat</th>
            <th>Kecamatan</th>
            <th>Kelurahan</th>
            <th>Jumlah Siswa</th>
            <th>Jumlah Guru</th>
            <th>Jumlah Kelas</th>
        </tr>
        @php
            $no=1;
        @endphp

        @foreach ($data as $row)

        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->nama_sekolah }}</td>
            <td>{{ $row->npsn }}</td> 
            <td>{{ $row->status }}</td> 
            <td>{{ $row->alamat }}</td>
            <td>{{ $row->kecamatan }}</td>
            <td>{{ $row->kelurahan }}</td>
            <td>{{ $row->jumlah_siswa }}</td>
            <td>{{ $row->jumlah_guru }}</td>
            <td>{{ $row->jumlah_kelas }}</td>
        </tr>
            
        @endforeach
    </table>

</body>

</html>
