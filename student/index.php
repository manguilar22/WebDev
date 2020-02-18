<html>

<head>
    <link rel="stylesheet" href="../css/student.css"/>
</head>

<body>

    <!-- Student Account -->
    <div class="studentForm">
    <form method="post" action="#">
        <label>Name</label> <br/>
        <input type="text" name="firstName" placeholder="First Name Goes Here"/> <br/>
        <input type="text" name="middleName" placeholder="Middle Name goes here. Type N/A if not applicable"/> <br/>
        <input type="text" name="lastName" placeholder="Last Name Goes Here"/> <br/>
        <label>UTEP Email</label> <br/>
        <input type="text" name="utepEmail" placeholder="Use student email, please"/> <br/>
        <label>Classification</label> <br/>
        <!-- SELECT GOES HERE -->
        <select name="classification">
            <option value="Undergraduate">Undergraduate</option>
            <option value="Graduate">Graduate</option>
            <option value="Doctorate">Doctorate</option>
        </select> <br/>
        <label>Major GPA</label> <br/>
        <input type="text" name="majorGPA" placeholder="Major GPA"/> <br/>
        <label>Overall GPA</label> <br/>
        <input type="text" name="overallGPA" placeholder="Overall GPA"/> <br/>
        <label>Password</label> <br/>
        <input type="password" name="password" placeholder="type a secret password"/><br/>
        <button type="submit">Create Account</button>
    </form>
    </div>

</body>

</html>