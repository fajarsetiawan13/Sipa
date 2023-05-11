<div class="flex flex-col gap-2 w-full lg:w-3/4">
    <table class="table">
        <thead>
            <tr>
                <th colspan="3">Identitas Admin</th>
            </tr>
        </thead>
        <tbody>
            <tr class="hover">
                <td>Nama</td>
                <td>:</td>
                <td class="whitespace-pre-line">{{ auth()->user()->name }}</td>
            </tr>
            <tr class="hover">
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td class="whitespace-pre-line">{{ $account[0]->gender }}</td>
            </tr>
            <tr class="hover">
                <td>Alamat</td>
                <td>:</td>
                <td class="whitespace-pre-line">{{ $account[0]->address }}</td>
            </tr>
            <tr class="hover">
                <td>Nomor HP/Telepon</td>
                <td>:</td>
                <td class="whitespace-pre-line">{{ $account[0]->phone }}</td>
            </tr>
            <tr class="hover">
                <td>Email</td>
                <td>:</td>
                <td class="whitespace-pre-line">{{ $account[0]->email }}</td>
            </tr>
        </tbody>
    </table>
</div>