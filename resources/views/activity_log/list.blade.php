@extends('layout')

@section('title')
    <?= get_label('activity_log', 'Activity log') ?>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="d-flex justify-content-between mt-4">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-style1">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home.index') }}"><?= get_label('home', 'Home') ?></a>
                        </li>
                        <li class="breadcrumb-item active">
                            <?= get_label('activity_log', 'Activity log') ?>
                        </li>

                    </ol>
                </nav>
            </div>
            <a href="{{ route('activity_log.calendar_view') }}"><button type="button" class="btn btn-sm btn-primary"
                        data-bs-toggle="tooltip" data-bs-placement="left"
                        data-bs-original-title="<?= get_label('calendar_view', 'Calendar view') ?>"><i
                            class='bx bx-calendar'></i></button></a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <div class="row">
                        <div class="mb-3 col-md-3">
                            <div class="input-group input-group-merge">
                                <input type="text" id="activity_log_between_date" class="form-control"
                                    placeholder="<?= get_label('date_between', 'Date between') ?>" autocomplete="off">
                            </div>
                        </div>

                        
                        @if (isAdminOrHasAllDataAccess())
                            <div class="mb-3 col-md-3 ">
                                <select class="form-select" id="user_filter" aria-label="Default select example">

                                </select>
                            </div>

                            <div class="mb-3 col-md-3">
                                <select class="form-select" id="client_filter" aria-label="Default select example">

                                </select>
                            </div>
                        @endif

                        <div class="mb-3 col-md-3">
                            <select class="form-select" id="activity_filter" aria-label="Default select example">
                                <option value=""><?= get_label('select_activity', 'Select activity') ?></option>
                                <option value="created"><?= get_label('created', 'Created') ?></option>
                                <option value="updated"><?= get_label('updated', 'Updated') ?></option>
                                <option value="duplicated"><?= get_label('duplicated', 'Duplicated') ?></option>
                                <option value="uploaded"><?= get_label('uploaded', 'Uploaded') ?></option>
                                <option value="deleted"><?= get_label('deleted', 'Deleted') ?></option>
                                <option value="updated_status"><?= get_label('updated_status', 'Updated status') ?></option>
                                <option value="signed"><?= get_label('signed', 'Signed') ?></option>
                                <option value="unsigned"><?= get_label('unsigned', 'Unsigned') ?></option>
                            </select>
                        </div>

                        <div class="mb-3 col-md-3">
                            <select class="form-select" id="type_filter" aria-label="Default select example">
                                <option value=""><?= get_label('select_type', 'Select type') ?></option>
                                @foreach ($types as $type)
                                    <option value="{{ $type }}">{{ Str::title(str_replace('_', ' ', $type)) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <input type="hidden" id="activity_log_between_date_from">
                    <input type="hidden" id="activity_log_between_date_to">

                    <input type="hidden" id="data_type" value="activity-log">


                    <table id="table" data-toggle="table" data-loading-template="loadingTemplate"
                        data-url="{{ route('activity_log.list') }}" data-icons-prefix="bx" data-icons="icons"
                        data-show-refresh="true" data-total-field="total" data-trim-on-search="false" data-data-field="rows"
                        data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true" data-side-pagination="server"
                        data-show-columns="true" data-pagination="true" data-sort-name="id" data-sort-order="desc"
                        data-mobile-responsive="true" data-query-params="queryParams">
                        <thead>
                            <tr>
                                <th data-checkbox="true"></th>
                                <th data-sortable="true" data-field="id"><?= get_label('id', 'ID') ?></th>
                                <th data-sortable="true" data-visible="false" data-field="actor_id">
                                    <?= get_label('actor_id', 'Actor ID') ?></th>
                                <th data-sortable="true" data-field="actor_name">
                                    <?= get_label('actor_name', 'Actor name') ?></th>
                                <th data-sortable="true" data-visible="false" data-field="actor_type">
                                    <?= get_label('actor_type', 'Actor type') ?></th>
                                <th data-sortable="true" data-visible="false" data-field="type_id">
                                    <?= get_label('type_id', 'Type ID') ?></th>
                                <th data-sortable="true" data-field="activity"><?= get_label('activity', 'Activity') ?>
                                </th>
                                <th data-sortable="true" data-field="type"><?= get_label('type', 'Type') ?></th>
                                <th data-sortable="true" data-field="type_title">
                                    <?= get_label('type_title', 'Type title') ?></th>
                                <th data-sortable="true" data-visible="false" data-field="message">
                                    <?= get_label('message', 'Message') ?></th>
                                <th data-sortable="true" data-field="created_at">
                                    <?= get_label('created_at', 'Created at') ?></th>
                                <th data-sortable="true" data-field="updated_at" data-visible="false">
                                    <?= get_label('updated_at', 'Updated at') ?></th>
                                <th data-formatter="actionsFormatter"><?= get_label('actions', 'Actions') ?></th>
                            </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <script>
        var label_delete = '<?= get_label(' delete ', 'Delete ') ?>';
    </script>
    <script src="{{ asset('assets/js/pages/activity-log.js') }}"></script>
@endsection
