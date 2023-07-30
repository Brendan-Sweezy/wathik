<form class="form" action="{{ url('projects/save') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="step" value="{{ $step }}" />
    <input type="hidden" name="id" value="{{ $id }}" />

    @foreach ($threats as $threat)
        <div class="fv-row form-check form-check-custom form-check-solid m-4" style="direction: rtl">
            <input class="form-check-input" name="threats[]" type="checkbox" id="threat{{ $threat->id }}"
                value="{{ $threat->id }}" />
            <label class="form-check-label px-3" for="threat{{ $threat->id }}">
                {{ $threat->threat }}
            </label>
        </div>
    @endforeach
    <div class="fv-row form-check form-check-custom form-check-solid m-4" style="direction: rtl">
        <input class="form-check-input" name="other" type="checkbox" id="other" value="1" />
        <label class="form-check-label px-3" for="other">
            <input type="text" class="form-control form-control-solid" placeholder="اذكر مخاطر أخرى"
                name="otherThreat" />
        </label>
    </div>
    <button type="submit" class="btn btn-primary">
        <span class="indicator-label">التالي</span>
    </button>
</form>
