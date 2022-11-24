@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <div class="row">
        <div class="col-md-12">
            <h2>Edit: {{$post->title}}</h2>
            <form action="{{ route('admin.update') }}" method="post">
                <div class="form-group">
                    <label for="make">Make</label>
                    <input type="text" class="form-control" id="make" name="make" value="{{ $post->make }}">
                </div>
                <div class="form-group">
                    <label for="model">Model</label>
                    <input type="text" class="form-control" id="model" name="model" value="{{ $post->model }}">
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <select id="year" name="year" class="form-control">
                        <?php
                            for($year = date('Y'); $year >= 1950; $year--) {
                                if($post->year == $year) {
                                    echo '<option value="'.$year.'" selected="selected">' . $year . '</option>';
                                } else {
                                    echo '<option value="'.$year.'">' . $year . '</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="trim">Trim (Optional)</label>
                    <input type="text" class="form-control" id="trim" name="trim" value="{{ $post->trim }}">
                </div>
                <div class="form-group">
                    <label for="description">Description (Optional)</label>
                    <textarea class="form-control" id="description" name="description">{{ $post->description }}</textarea>
                </div>
                <div class="form-group">
                    <input type="checkbox" id="public" name="public" @if($post->public) checked disabled>
                    <input type="hidden" id="public" name="public" value="{{$post->public}}" @endif>
                    <label for="public"> Make Public <span class="warning-text">(Cannot be undone)</span></label>
                    <p class="info">Public posts can be edited by any user. This action cannot be undone.</p>
                </div>
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $post->id }}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection