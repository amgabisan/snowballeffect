@extends ('partials.layout') @section ('content')

<?php
    $arr = ['id', 'address', 'company', 'name'];
?>

<br />
<h1 class="display-4 text-center">{{ $user['name'] }}</h1>
<hr />
<br />
<div class="row">
    <div class="col-md-5 col-sm-12">
        <table class="table" id="userdetails-table">
        @foreach ($user as $key => $value)
            <?php if(!in_array($key, $arr)) { ?>
                <tr>
                    <td class="bg-dark text-light">{{ ucwords($key) }}</td>
                    <td class="bg-light">{{ $value }}</td>
                </tr>
            <?php } ?>
        @endforeach

            <tr>
                <td class="bg-dark text-light">Address</td>
                <td class="bg-light">{{ $user['address']['street'].' '.$user['address']['suite'].' '.$user['address']['city'].' '.$user['address']['zipcode'] }}</td>
            </tr>
            <tr>
                <td class="bg-dark text-light">Company</td>
                <td class="bg-light">
                    <span class="font-weight-bold">{{ $user['company']['name'] }}</span><br>
                    <span class="font-weight-normal">{{ $user['company']['catchPhrase'] }}</span><br>
                    <span class="font-weight-light">{{ $user['company']['bs'] }}</span>
                </td>
            </tr>

        </table>
    </div>
    <div class="col-md-7 col-sm-12" id="mapContainer" data-lat="{{ $user['address']['geo']['lat'] }}" data-lng="{{ $user['address']['geo']['lng'] }}">
        <div id="map" style="width: 100%; height: 25em; overflow: visible"></div>
    </div>
</div>
<hr />

<div class="text-center">
    <a href="/" class="btn btn-dark">Back to User List</a>
</div>
<br>

@endsection
