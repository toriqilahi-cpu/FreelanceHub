<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <title>Data Project</title>

    <style>

        body{
            font-family: sans-serif;
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        th,td{
            border:1px solid #000;
            padding:8px;
            text-align:left;
        }

        th{
            background:#f3f3f3;
        }

    </style>

</head>

<body>

    <h2>Data Project Client</h2>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>Judul</th>
                <th>Budget</th>
                <th>Status</th>
                <th>Deadline</th>

            </tr>

        </thead>

        <tbody>

            @foreach($projects as $project)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $project->title }}</td>

                <td>
                    Rp {{ number_format($project->budget,0,',','.') }}
                </td>

                <td>{{ $project->status }}</td>

                <td>{{ $project->deadline }}</td>

            </tr>

            @endforeach

        </tbody>

    </table>

</body>

</html>