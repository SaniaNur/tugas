@php
$bulan=['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
@endphp

<td>{{$bulan[$entry->{$column['name']}-1]}}</td>