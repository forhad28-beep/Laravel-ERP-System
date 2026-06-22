<h2>Payroll Report</h2>

@if($month)
<p>Month: {{ $month }}</p>
@endif

<table border="1" width="100%">
    <tr>
        <th>Employee</th>
        <th>Month</th>
        <th>Net Salary</th>
    </tr>

    @foreach($payrolls as $payroll)
    <tr>
        <td>{{ $payroll->employee->name }}</td>
        <td>{{ $payroll->month }}</td>
        <td>{{ $payroll->net_salary }}</td>
    </tr>
    @endforeach
</table>