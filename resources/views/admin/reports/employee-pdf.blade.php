<!DOCTYPE html>
<html>

<head>
    <title>Employee Report</title>

    <style>
        body {
            font-family: sans-serif;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2>Employee Report</h2>

    <table>

        <thead>

            <tr>

                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Status</th>

            </tr>

        </thead>

        <tbody>

            @forelse($employees as $employee)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        {{ $employee->name }}
                    </td>

                    <td>
                        {{ $employee->email }}
                    </td>

                    <td>
                        {{ $employee->phone }}
                    </td>

                    <td>
                        {{ $employee->department->name ?? 'N/A' }}
                    </td>

                    <td>
                        {{ $employee->designation }}
                    </td>

                    <td>
                        {{ ucfirst($employee->status) }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7">
                        No Employee Found
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</body>

</html>