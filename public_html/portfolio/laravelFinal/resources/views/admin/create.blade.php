@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
        <form action="{{ route('admin.create') }}" method="post">
                <div class="form-group">
                    <label for="make">Make</label>
                    <input type="text" class="form-control" id="make" name="make">
                </div>
                <div class="form-group">
                    <label for="model">Model</label>
                    <input type="text" class="form-control" id="model" name="model">
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <select id="year" name="year" class="form-control">
                        <?php
                            for($year = date('Y'); $year >= 1950; $year--) {
                                echo '<option value="'.$year.'">' . $year . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="trim">Trim (Optional)</label>
                    <input type="text" class="form-control" id="trim" name="trim">
                </div>
                <div class="form-group">
                    <label for="description">Description (Optional)</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
                <div class="form-group">
                    <input type="checkbox" if="public" name="public">
                    <label for="public"> Make Public <span class="warning-text">(Cannot be undone)</span></label>
                    <p class="info">Public posts can be edited by any user. This action cannot be undone.</p>
                </div>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection