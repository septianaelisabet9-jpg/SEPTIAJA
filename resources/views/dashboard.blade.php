<!DOCTYPE html>
<html lang="en">
<head>
    <title>DASHBOARD</title>
</head>
<body>

    <h1>Welcome to the dashboard <?php echo session('u')?> </h1>
    <form action="/home" method="GET">
        <label>Dari ID:</label>
        <input type="number" name="from" value="{{ request('from') }}" required>

        <label>Sampai ID:</label>
        <input type="number" name="to" value="{{ request('to') }}" required>

        <button type="submit">Filter</button>
        <button type="submit" name="export" value="excel" formtarget="_blank">Print Excel</button>
        <button type="button" onclick="window.print()">Print Window</button>
    </form>
    <table border='1' width='550'>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>email</th>
</tr>
<tr>

<?php
    $no=1;
    foreach ($hai as $key => $value) {
    
?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $value->name ?></td>
        <td><?= $value->email ?></td>
</tr>
<?php
    }
?>
</table>

    <button><a href="/logout">Logout</a></button>
   
 
</body>
</html>