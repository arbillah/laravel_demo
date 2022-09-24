<style type="text/css">
	table td, table th{
		border:1px solid black;
	}
</style>
<div class="container">


	<br/>
	<a href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a>


	<table>
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Email</th>
		</tr>
		@foreach ($users as $key => $user)
		<tr>
			<td>{{ ++$key }}</td>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
		</tr>
		@endforeach
	</table>
</div>