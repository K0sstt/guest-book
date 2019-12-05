<div class="container">
	<div class="row">
		<form action="{{ route('home.get-ban') }}" method="POST">
			<input type="hidden" name="_method" value="PUT">
			@csrf
			<input type="text" name="id" value="{{ $answer->id }}" hidden>
			<button type="submit" name="ban" class="btn btn-outline-secondary">Ban</button>
		</form>
	</div>
	<div class="row">
		<form action="{{ route('home.delete', $answer->id) }}" method="POST">
			<input type="hidden" name="_method" value="DELETE">
			@csrf
			<button type="submit" name="delete" class="btn btn-outline-danger">Delete</button>
		</form>
	</div>
</div>