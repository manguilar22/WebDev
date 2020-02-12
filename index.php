<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"/>
    <meta charset="UTF-8">
    <title>UTEP</title>
</head>
<body>

    <h1>Database Management</h1>

    <h3>My Sample POST Form</h3>
    <form method="post" action="#">
        <label>Name</label><br/>
        <input type="text" name="firstName" placeholder="type something here"/><br/>
        <label>Last Name</label><br/>
        <input type="text" name="lastName" placeholder="type something here"/><br/>
        <input type="submit" value="Submit"/><br/>
    </form>

    <h3>My Sample GET Form</h3>
    <form method="get" action="/form/getMethod.php">
        <label>First Name</label><br/>
        <input type="text" name="firstName" placeholder="Type something here"/>
        <label>Second Name</label><br/>
        <input type="text" name="secondName" placeholder="Type something here"/>
        <input type="submit" value="Submit"/>
    </form>
	
</body>

<!-- Javascript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>
