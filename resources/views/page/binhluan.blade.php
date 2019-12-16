<form action="{{route('binhluan')}}" action="post">
	@csrf
<div class="form-group col-md-12">
	<textarea name="txtContent" class="form-control " id="editor1" name="comment_content"></textarea>
</div>	
<div class="form-group col-md-12">
	<input type="file" name="">
</div>	
<button type="submit" class="btn btn-primary">Bình luận</button>			
</form>