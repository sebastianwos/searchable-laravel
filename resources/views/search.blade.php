@extends('layouts.app')

@section('content')
    <h2>Search it !</h2>
    <form method="POST" action="/">
        {{ csrf_field() }}
        <!-- Title Form Input -->
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" value="{{ old('title') }}" class="form-control"/>
        </div>
        <!-- Category Form Input -->
        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" name="category" id="category">
                <option value="">- select -</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : null  }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <!-- Offer Type Form Input -->
        <div class="form-group">
            <label for="offer_type">Offer Type:</label>
            <select class="form-control" name="offer_type" id="offer_type">
                @foreach($offerTypes as $key => $name)
                    <option value="{{ $key }}" {{ old('offer_type') == $key ? 'selected' : null  }}>{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Offer Status Form Input -->
        <div class="form-group">
            <label for="offer_status">Offer Status:</label>
            <select class="form-control" name="offer_status" id="offer_status">
                @foreach($offerStatuses as $key => $name)
                    <option value="{{ $key }}" {{ old('offer_status') == $key ? 'selected' : null  }}>{{ $name }}</option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col-md-6">
                <!-- Min Area Form Input -->
                <div class="form-group">
                    <label for="area_min">Min Area:</label>
                    <input type="text" name="area_min" value="{{ old('area_min') }}" class="form-control"/>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Max Area Form Input -->
                <div class="form-group">
                    <label for="area_max">Max Area:</label>
                    <input type="text" name="area_max" value="{{ old('area_max') }}" class="form-control"/>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <!-- Monthly cost from Form Input -->
                <div class="form-group">
                    <label for="cost_min">Monthly cost from:</label>
                    <input type="text" name="cost_min" value="{{ old('cost_min') }}" class="form-control"/>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Monthly cost to Form Input -->
                <div class="form-group">
                    <label for="cost_max">Monthly cost to:</label>
                    <input type="text" name="cost_max" value="{{ old('cost_max') }}" class="form-control"/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Search" />
        </div>
    </form>

    @if(isset($offers))
    <ul class="list-group">
        @foreach($offers as $offer)
            <li class="list-group-item">{{ $offer->title }} {{ $offer->office_area }}<span class="label label-default pull-right">{{ $offer->category->name }}</span></li>
        @endforeach
    </ul>
    {{ $offers->links() }}
    @endif
@stop