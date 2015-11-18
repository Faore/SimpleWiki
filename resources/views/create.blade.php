@extends('app')
@section('contentPane')
<div class="container-fluid">
	<div class="col-md-12">
		<h1>Create a Page</h1>
		<hr>
		<form class="form-horizontal" action="/wiki/create" method="post">
			<input type="text" class="form-control" id="title" placeholder="An Awesome Title">
			<div id="editor">
				<textarea v-model="input" debounce="300"></textarea>
				<div v-html="input | marked"></div>
			</div>
			<button type="submit" class="btn btn-success">Save</button>
		</form>
	</div>
</div>
<div class="container-fluid footer">
	<div class="col-sm-3 col-md-2"></div>
	You can categorize this to a page using this syntax[[PageName]]
</div>
@endsection

@section('scripts')
	<script src="/marked.min.js"></script>
	<script src="/vue.js"></script>
	<script type="text/javascript">
		new Vue({
			el: '#editor',
			data: {
				input: '# My New Page\n\nIt is easy to write:\n\n* And can even do bullets!'
			},
			filters: {
				marked: marked
			}
		})
	</script>
@endsection