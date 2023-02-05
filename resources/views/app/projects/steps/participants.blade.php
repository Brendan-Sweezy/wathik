<form class="form" action="{{ url('projects/save') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="step" value="{{ $step }}" />
    <input type="hidden" name="id" value="{{ $id }}" />
    @include('app.projects.participants.all')
    <button type="submit" class="btn btn-primary">
        <span class="indicator-label">التالي</span>
    </button>
</form>
