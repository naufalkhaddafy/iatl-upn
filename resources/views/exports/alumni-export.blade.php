<table>
    <thead>
        <tr>
            <th>No. </th>
            <th>Nama</th>
            <th>Email</th>
            <th>Angkatan</th>
            <th>Nim</th>
            <th>No. HP</th>
            <th>Alamat Domisili</th>
            <th>Alamat Sekarang</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allAlumni as $alumni)
            <tr>
                <td>
                    {{ $loop->iteration }}
                </td>
                <td>{{ $alumni->name }}</td>
                <td>{{ $alumni->email }}</td>
                <td>{{ $alumni->generation }}</td>
                <td>{{ $alumni->nim }}</td>
                <td>{{ $alumni->phone_number }}</td>
                <td>{{ $alumni->domicile }}, {{ $alumni->addressDomicile?->name }},
                    {{ $alumni->addressDomicile?->province->name }}
                </td>
                <td>{{ $alumni->address_now }}, {{ $alumni->addressNow?->name }},
                    {{ $alumni->addressNow?->province->name }}</td>
                <td>{{ $alumni->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
