@extends ('partials.layout')

@section ('content')

<h2>User List</h2>
<br>
<table class="table table-striped table-bordered dt-responsive nowrap" id="users-list" style="width: 100%">
    <thead>
        <tr>
            <th class="text-center">First Name</th>
            <th class="text-center">Last Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Website Address</th>
            <th class="text-center"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <?php
            $name = explode(' ', $user['name']);
            $last_name = array_pop($name);
            $name = implode(' ', $name);

        ?>
        <tr>
            <td class="text-center">{{ $name }}</td>
            <td class="text-center">{{ $last_name }}</td>
            <td class="text-center">
                <a href="mailto:{{ $user['email'] }}" target="_blank">{{ $user['email'] }}</a>
            </td>
            <td class="text-center">
                <a href="{{ $user['website'] }}" target="_blank">{{ $user['website'] }}</a>
            </td>
            <td class="text-center">
                <a href="/{{ $user['id'] }}" class="btn btn-dark">View User Details</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<br>
@endsection
