<!DOCTYPE html>
<html>

<head>
    <title>Expense Report</title>

    <style>
        body {
            font-family: sans-serif;
        }

        h2,
        p {
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

    <h2>Expense Report</h2>

    @if($month)
        <p>Month: {{ $month }}</p>
    @endif

    <table>

        <thead>

            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Description</th>
            </tr>

        </thead>

        <tbody>

            @forelse($expenses as $expense)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        {{ $expense->title }}
                    </td>

                    <td>
                        {{ number_format($expense->amount, 2) }}
                    </td>

                    <td>
                        {{ $expense->expense_date }}
                    </td>

                    <td>
                        {{ $expense->description }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5">
                        No Expense Found
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</body>

</html>