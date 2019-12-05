@extends('layouts.app')

@section('content')
<!-- <div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Dashboard</div>

				<div class="card-body">
					@if (session('status'))
						<div class="alert alert-success" role="alert">
							{{ session('status') }}
						</div>
					@endif

					You are logged in!
				</div>
			</div>
		</div>
	</div>
</div> -->

<!-- Button trigger modal -->
<button type="button" class="btn btn-lg btn-dark m-2 p-2 px-4" data-toggle="modal" data-target="#exampleModal">
	ASK
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Your Question</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="{{ route('home.store') }}" method="POST">
				@csrf
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Write your question</label>
						<textarea 
							class="form-control" 
							id="exampleFormControlTextarea1" 
							rows="3"
							name="question">
						</textarea>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>

		</div>
	</div>
</div>
<!-- EndModal -->


<div class="container w-75">

	<div class="accordion" id="accordionOne">

		@foreach($questions as $question)
			<div class="card">

				<div class="card-header" id="heading{{$question->id}}">
					<h2 class="mb-0">
						<button 
							class="btn btn-link" 
							type="button" 
							data-toggle="collapse" 
							data-target="#collapse{{$question->id}}" 
							aria-expanded="true" 
							aria-controls="collapse{{$question->id}}">
							<h5>{{ $question->question }}</h5>
						</button>
					</h2>
				</div>

				<div 
					id="collapse{{$question->id}}" 
					class="collapse" 
					aria-labelledby="heading{{$question->id}}" 
					data-parent="#accordionOne">
					<div class="card-body">
						<ul class="list-group">
							@foreach($question->answers as $answer)
								@if($user->isBan != 1)
									<li class="list-group-item">
										<table class="w-100">
											<tr>
												<td class="w-75">
													<h4>{{ $answer->user->name }}</h4>
													<p>{{ $answer->answer }}</p>
												</td>
												<td class="w-25">
													@if($user->isAdmin == 1)
														@include('admin-panel')
													@endif
												</td>
											</tr>
										</table>
									</li>
								@endif
							@endforeach
							<li class="list-group-item">
								<label for="comment">Comment</label>
								<form action="{{ route('home.store') }}" method="POST">
									@csrf
									<input type="text" name="questionID" value="{{$question->id}}" hidden>
									<textarea 
										class="form-control" 
										id="comment" 
										rows="3"
										name="comment">
									</textarea>
									<button type="submit" class="btn btn-secondary m-2">Save Comment</button>
								</form>
							</li>
						</ul>
					</div>
				</div>
			
			</div>
		@endforeach

	</div>
</div>

{{ $questions->links() }}

@endsection
