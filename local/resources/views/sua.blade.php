<div class="content">

	@foreach($sanpham as $mota)
		<form action="{{route('sua-post')}}" method="post">
			<input type="text" value="{{$mota->idSP}}" name="">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<input type="hidden" value="{{$mota->idSP}}" name="idsp">
			<textarea style="width: 50%; height: 300px;" name="mota">
				{!!$mota->mota!!}
			</textarea>
			<a href=""><input type="submit" target="_blank" name="capnhat" value="capnhat"></a>
			
		</form>
	@endforeach
</div>