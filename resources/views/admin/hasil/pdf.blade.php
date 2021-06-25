<!DOCTYPE html>
<html>
<head>
	<title>Laporan Ujian</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Ujian {{$data->package}}</h5>
        <p style="font-size:13px">{{$data->deskripsi}}</p>
        <p style="font-size:10px">Ujian ini dipublish pada @php echo date('d F Y', strtotime($data->publish)) @endphp dengan durasi {{$data->durasi}} menit</p>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Nama</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Role</th>
                <th scope="col" class="text-center">Nilai</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($list as $item)
                <tr>
                <th class="text-center">{{$loop->iteration}}</th>
                <td class="text-center">{{$item->user->firstname}}</td>
                <td class="text-center">{{$item->user->email}}</td>
                <td class="text-center">
                    @if ($item->user->role == 'Checker')
                        <span class="badge badge-primary">checker</span>
                    @else
                        <span class="badge badge-info">Peserta</span>
                    @endif
                </td>
                <td class="text-center"> {{ (intval($item->jumlahBenar) / (intval($item->jumlahBenar) + intval($item->jumlahSalah)) * 100) }} </td>                                  
                </tr>
            @endforeach   
		</tbody>
	</table>
 
</body>
</html>