<form class="form" action="{{ url('projects/save') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="step" value="{{ $step }}" />
    <input type="hidden" name="id" value="{{ $id }}" />
    @include('app.projects.events.all') 
</form>
<div class="card-toolbar">
    <a href="{{ url('projects/view/' . $id) }}" type="button" class="btn btn-primary">submit</a>
</div>
