<!DOCTYPE html>
<html>
<head>
    <title>Payroll Report</title>
</head>
<body>

<h2>Payroll Report</h2>

<h1 style="text-align:center">
    {{ $setting->company_name ?? 'Mini ERP' }}
</h1>

<p style="text-align:center">
    {{ $setting->email }}
    |
    {{ $setting->phone }}
</p>

<hr>

<table border="1" width="100%" cellspacing="0" cellpadding="8">

    <tr>
        <th>Employee</th>
        <th>Month</th>
        <th>Salary</th>
    </tr>

    @foreach($payrolls as $payroll)

    <tr>
        <td>{{ $payroll->employee->name }}</td>
        <td>{{ $payroll->month }}</td>
        <td>{{ $payroll->net_salary }}</td>
    </tr>

    @endforeach

</table>

</body>
</html>