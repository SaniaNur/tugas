@php
$juz = floor($entry->{$column['name']}/20);
$lembar = fmod($entry->{$column['name']}, 20)/2;
@endphp

<td>@if($entry->{$column['name']} == 0) {{ $entry->{$column['name']} }} Lembar @else @if($juz != 0) {{$juz}}  Juz @endif @if($lembar != 0){{$lembar}} Lembar @endif @endif</td>