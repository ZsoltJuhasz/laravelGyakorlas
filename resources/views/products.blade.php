<h1>Termékek</h1>

<form action="add-product" method="post">

    @csrf
    <p>
        Név: <input type="text" name="name" placeholder="Termek neve">
    </p>
    <p>
        Ár: <input type="text" name="ar" placeholder="Termek ara">
    </p>
    <p>
        Cikkszám: <input type="text" name="cikkszam" placeholder="Termek cikkszáma">
    </p>
    <p>
        <button type="submit">Küldés</button>
    </p>

</form>