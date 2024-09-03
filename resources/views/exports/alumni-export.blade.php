<table>
    <thead>
        <tr>
            <th>No. </th>
            <th>Nama</th>
            <th>Email</th>
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
            </tr>
        @endforeach
    </tbody>
</table>
