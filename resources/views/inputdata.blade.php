<!DOCTYPE html>
<html lang="en">
<head>
    <title>REGISTER</title>
</head>
<body>
    <h1>Sign Up</h1>
    <form action="/input" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="name">Name</label></td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td><label for="password_confirmation">Confirmation Password</label></td>
                <td><input type="password" name="password_confirmation" required></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Daftar</button></td>
            </tr>
        </table>
    </form>
</body>
</html>