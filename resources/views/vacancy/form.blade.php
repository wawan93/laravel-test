<div class="panel-body">

    @include('common.errors')

    <form action="{{ url('vacancy') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Vacancy name</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="vacancy-name" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="vacancy-text" class="col-sm-3 control-label">Text</label>

            <div class="col-sm-6">
                <textarea name="text" id="vacancy-text" class="form-control"></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Add Vacancy
                </button>
            </div>
        </div>
    </form>
</div>