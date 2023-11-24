<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        .debug {
            background-color: rgba(2, 255, 36, 0.2) !important;
            border: 1px solid red;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 50%;
            width: 350px;
            height: 50%;
            padding: 25px 25px;
            border: none;
            border-radius: 15px;
            box-shadow: 1px 1px 15px 2px silver;
        }

        .container h1 {
            margin-bottom: 30px;
        }

        form {
            width: 100%;
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        form input {
            height: 40px;
            padding-inline: 10px;
            border: 2px solid #b4b4b4;
            border-radius: 7px;
            font-size: 0.9em;
            margin-bottom: 15px;
        }

        form input:last-child {
            margin-bottom: 0;
        }

        form input:focus {
            outline: none !important;
            border-color: #e7b131;
        }

        form>a {
            margin-left: 5px;
        }

        form button {
            width: 80px;
            height: 40px;
            align-self: center;
            margin-top: 25px;
            /* background-color: #fdb940; */
            background-color: #ffc436;
            border-radius: 7px;
            border: none;
            font-weight: bold;
            font-size: 0.9rem;
        }

        form button:hover {
            background-color: #e7b131;
            cursor: pointer;
        }

        .link,
        .link>a {
            font-size: 0.85rem;
            text-decoration: none;
        }

        span>a {
            margin-left: 2px;
        }

        .formInfo {
            margin-top: 30px;
            width: 200px;
            font-size: 0.9em;
            text-align: center;
            color: red;
        }
    </style>
</head>

<body>

    <main class="container">
        <h1>Login</h1>
        <form method="post">
            <input type="text" name="username" value="<?= $username ?? ""  ?>" placeholder="username" required>
            <input type="password" name="password" value="<?= $username ?? ""  ?>" placeholder="password" required>
            <a class="link" href="">forgot password?</a>
            <button>Log in</button>
        </form>
        <span class="link">New user? <a href="/user/register">Register</a></span>

        <div class="formInfo">
            <?= $formInfo ?? "&nbsp;" ?>
        </div>
    </main>

</body>

</html>