<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<style>
    
    .button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 20px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
        margin: 20px 30px;
    }

    .button:hover {
        background-color: #0b0b0b;
    }
    
</style>

<body>
    <section>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand">Home</a>
                <button class="navbar-toggler" type="text" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">

                </div>
            </div>
        </nav>
        <div class="container-fluid mt-3">
            <center>
                <h3>SELAMAT DATANG DI HALAMAN UTAMA</h3>
            </center>
            <br/>
            <br/>
            <center>
                <h4>Masuk Sebagai :</h4></h4>
                <ul class="text-container">
                    <a href="index_pergantian.php?role=admin" class="button">Admin</a>
                    <a href="index_pergantian.php?role=dosen" class="button">Dosen</a>
                </ul>
            </center>
        </div>
    </section>
</body>

</html>