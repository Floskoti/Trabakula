<?php  
// Preveri ali uporabnik že obstaja v bazi
function checkIfUserExists(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "phishing";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT ip FROM zaposleni";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["ip"] == $_SERVER['REMOTE_ADDR']){
            return true;
        }
    }
    } else {
    return false;
    }
    $conn->close();
}

function insertUser(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "phishing";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO zaposleni (ip)
    VALUES ('". $_SERVER['REMOTE_ADDR'] . "')";

    if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
    } else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function createNewRetry(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "phishing";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO poskus (datum, datum_konca, zaposleni_fk) VALUES (STR_TO_DATE(?, '%d.%m.%Y %H:%i:%s'), ?, ?)");
    $stmt->bind_param("sss", $datum, $datum_konca, $id);

    $datum = $_SESSION["start_date"];
    $datum_konca = null;
    $id = $_SERVER['REMOTE_ADDR'];

    $stmt->execute();

    $conn->close();
}


if(!checkIfUserExists()){
    insertUser();
}

session_set_cookie_params(0);
session_start();
$_SESSION["start_date"] = date("d.m.Y H:i:s");

createNewRetry();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Epoštni predal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/stil.css">
    <script src="../js/skripta.js"></script>
</head>
<body onload="modalFunc()">
<div class="container">
    <!-- The Modal -->
    <div id="myModal" class="modal modalblur" >

        <!-- Modal content -->
        <div class="modal-content">
            <div class="close float-end" style="width:25px;">&times;</div>
            <div class="text-center">
                <p>Postavljeni ste v vlogo direktorja slovenskega podjetja Butale d.o.o.</p>
                <p>V službeni poštni predal ste prejeli nekaj novih sporočil, preglejte jih.</p>
                <p>Z zastavico lahko označite sumljiva sporočila.</p>
            </div>
        </div>
    
    </div>
    <script>
    </script>

    <div class="odmik-n-vrhi">
        <h1>POŠTNI PREDAL</h1>
    </div>
    <div class="row">
        <div class="col-12 col-lg-4 ">
            <!-- mail headerji -->
            <!-- header je z vsebino linkan preko hrefa in ID od VSEBINE -->
            <ul class="nav nav-pills">
                <li class="nav-item d-none"><a id="pozdravbtn" class="nav-link active" data-bs-toggle="pill" href="#hello">Home</a></li>
                <li class="nav-item bg-li-1 ">
                    <div id="overlay-fb" class="overlay-btn" onclick="areYouSure('fbopenareyousure')">
                    </div>
                    <a class="nav-link" id="linkfb" data-bs-toggle="pill" href="#home">
                        <div class="row">
                            <div class="col-10"><div class="sender">support@facebok.com</div><div class="sender">Pomembno: Vaše Facebook geslo potrebuje posodobitev!</div></div>
                        </div>
                    </a>
                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                        <div class="zastava" style="position: absolute; z-index: 2;">
                            <i id="fas1" class="fa-solid fa-flag flag-icon hidden" onclick="toggleFlagNoSpam(this)" style="color: red;" data-toggle="tooltip" title="Označi kot nesumljivo"></i>
                            <i id="far1" class="fa-regular fa-flag regular-flag-icon" onclick="toggleFlagSpam(this)"data-toggle="tooltip" title="Označi kot sumljivo"></i>
                        </div>
                    </div>
            </li>
            <li class="nav-item">
                <div id="overlay-po" class="overlay-btn" onclick="areYouSure('poopenareyousure')">
                </div>
                <a id="link3" class="nav-link" data-bs-toggle="pill" href="#menu1">
                    <div class="row">
                        <div class="col-10"><div class="sender">janez.selski@butalle.si</div><div class="sender">Pomembno: Polletno finančno poročilo za direktorja</div></div>
                    </div>
                </a>
                <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                    <div class="zastava" style="position: absolute; z-index: 2;">
                        <i id="fas2" class="fa-solid fa-flag flag-icon hidden" onclick="toggleFlagNoSpam(this)" style="color: red;" data-toggle="tooltip" title="Označi kot nesumljivo"></i>
                        <i id="far2" class="fa-regular fa-flag regular-flag-icon" onclick="toggleFlagSpam(this)"data-toggle="tooltip" title="Označi kot sumljivo"></i>
                    </div>
                </div>
            </li>
            <li class="nav-item bg-li-1">
                <div id="overlay-us" class="overlay-btn" onclick="areYouSure('usopenareyousure')">
                </div>
                <a id="linklgit" class="nav-link" data-bs-toggle="pill" href="#menu2">
                    <div class="row">
                        <div class="col-10"><div class="sender">luka.petrovic@butale.si</div><div class="sender">Pomembno: Urgentni sestanek</div></div>
                    </div>
                </a>
                <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                    <div class="zastava" style="position: absolute; z-index: 2;">
                        <i id="fas3" class="fa-solid fa-flag flag-icon hidden" onclick="toggleFlagNoSpam(this)" style="color: red;" data-toggle="tooltip" title="Označi kot nesumljivo"></i>
                        <i id="far3" class="fa-regular fa-flag regular-flag-icon" onclick="toggleFlagSpam(this)"data-toggle="tooltip" title="Označi kot sumljivo"></i>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div id="overlay-pr" class="overlay-btn" onclick="areYouSure('propenareyousure')">
                </div>
                <a id="linkpr" class="nav-link" data-bs-toggle="pill" href="#menu3">
                    <div class="row">
                        <div class="col-10"><div class="sender">prodaja@prenosko.xxz.co</div><div class="sender">Neverjetno visoki popusti za podjetja!</div></div>
                    </div>
                </a>
                <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                    <div class="zastava" style="position: absolute; z-index: 2;">
                        <i id="fas4" class="fa-solid fa-flag flag-icon hidden" onclick="toggleFlagNoSpam(this)" style="color: red;" data-toggle="tooltip" title="Označi kot nesumljivo"></i>
                        <i id="far4" class="fa-regular fa-flag regular-flag-icon" onclick="toggleFlagSpam(this)"data-toggle="tooltip" title="Označi kot sumljivo"></i>
                    </div>
            </ul>
        </div>
        <div class="col-12 col-lg-8 ">
            <!-- mail content / vsebina -->
            <div id="mailcontent" class="tab-content">
                <div id="hello" class="tab-pane fade show active h-100">
                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <i class="fa-solid fa-envelope fa-2xl" style="color: #0d6efd;"></i>
                            <p>Izberite sporočilo za ogled</p>
                        </div>
                    </div>
                </div>
                <div id="home" class="tab-pane fade">
                    <div class="from-div">
                        <h3 class="from-tag" style="display: inline-block;">F</h3>
                        <span style="position: relative; top: -10px">Facebook</span>
                        <span style="position: relative; left: -71px; top: 5px">To: direktor@butale.si</span>
                        <div class="zastava">
                            <i id="fas1open" class="fa-solid fa-flag flag-icon hidden" onclick="toggleFlagNoSpam(this)" style="color: red;" data-toggle="tooltip" title="Označi kot nesumljivo"></i>
                            <i id="far1open" class="fa-regular fa-flag regular-flag-icon" onclick="toggleFlagSpam(this)"data-toggle="tooltip" title="Označi kot sumljivo"></i>
                        </div>
                        <h5>Zadeva: Vaše geslo potrebuje obnovitev!</h5>
                    </div>
                    
                    <br>
                    <br>
                    <p>Spoštovani, </p>
                    <p>
                        Opozarjamo vas, da se približuje datum poteka vašega Facebook gesla. Za ohranjanje varnosti vašega računa je ključnega pomena, da ga posodobite čim prej.
                    </p>
                    <p>    
                        Prosimo, da sledite spodnji varni povezavi, da lahko nemudoma posodobite svoje geslo:
                        <a href="../../facebookFakeSite/html/index.html" target="_blank">facebook.com</a>
                    </p>
                    <p>    
                        Lep pozdrav,
                        Ekipa Facebook varnosti.
                    </p>
                    <br>
                    <i class="fa-brands fa-facebook fa-2xl"></i>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="from-div">
                        <h3 class="from-tag" style="display: inline-block;">J</h3>
                        <span style="position: relative; top: -10px">Janez Selski</span>
                        <span style="position: relative; left: -87px; top: 5px">To: direktor@butale.si</span>
                        <div class="zastava">
                            <i id="fas2open" class="fa-solid fa-flag flag-icon hidden" onclick="toggleFlagNoSpam(this)" style="color: red;" data-toggle="tooltip" title="Označi kot nesumljivo"></i>
                            <i id="far2open" class="fa-regular fa-flag regular-flag-icon" onclick="toggleFlagSpam(this)"data-toggle="tooltip" title="Označi kot sumljivo"></i>
                        </div>
                        <h5>Zadeva: Polletno finančno poročilo</h5>
                    </div>
                    <br>
                    <p>Spoštovani direktor,</p>
                    <p>
                        V priponki vam pošiljam polletno finančno poročilo Prosim, da si ga ogledate in preučite.
                    </p>
                    <a onclick="modalFuncNateg()" href="#">  
                        <i class="fa-solid fa-file-word"></i> 
                        "Polletno_financno_porocilo.docx"
                    </a> <br>
                        Če imate kakršna koli vprašanja ali potrebujete dodatne informacije, se obrnite na name.
                    </p>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <div class="from-div">
                        <h3 class="from-tag" style="display: inline-block;">L</h3>
                        <span style="position: relative; top: -10px">Luka Petrovič</span>
                        <span style="position: relative; left: -98px; top: 5px">To: direktor@butale.si</span>
                        <div class="zastava">
                            <i id="fas3open" class="fa-solid fa-flag flag-icon hidden" onclick="toggleFlagNoSpam(this)" style="color: red;" data-toggle="tooltip" title="Označi kot nesumljivo"></i>
                            <i id="far3open" class="fa-regular fa-flag regular-flag-icon" onclick="toggleFlagSpam(this)"data-toggle="tooltip" title="Označi kot sumljivo"></i>
                        </div>
                        <h5>Zadeva: Urgentni sestanek!</h5>
                    </div>
                    
                    <br>
                    <p>Spoštovani,
                    </p>
                    <p>
                        sporočam vam, da je prišlo do velikega števila odpovedi zaposlenih.
                        Kaj bi lahko bil vzrok še preiskujemo.
                    </p>
                    <p>
                        Predlagam izredni sestanek z upravnim odborom in kadrovsko službo.
                        
                        ps. V priponki je seznam vseh, ki so oddali odpoved.
                    <br>    
                        Lp.</p>
                        <a href="#">
                            <i class="fa-solid fa-file-word"></i> 
                            "seznam-odpovedi.docx"
                        </a>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <div class="from-div">
                        <h3 class="from-tag" style="display: inline-block;">P</h3>
                        <span style="position: relative; top: -10px">Prenosko</span>
                        <span style="position: relative; left: -71px; top: 5px">To: direktor@butale.si</span>
                        <div class="zastava">
                            <i id="fas4open" class="fa-solid fa-flag flag-icon hidden" onclick="toggleFlagNoSpam(this)" style="color: red;" data-toggle="tooltip" title="Označi kot nesumljivo"></i>
                            <i id="far4open" class="fa-regular fa-flag regular-flag-icon" onclick="toggleFlagSpam(this)"data-toggle="tooltip" title="Označi kot sumljivo"></i>
                        </div>
                        <h5>Zadeva: Neverjetno visoki popusti za podjetja!</h5>
                    </div>
                    <br>
                    <br>
                    <p>Pozdravljeni,</p>
                    <p>V našem podjetju ponujamo visoke popuste na večja naročila za podjetja.</p>
                    <p>Prosimo preverite zalogo na <a target="_blank" href="../../fakeSite/html/index.html">povezavi</a>, preden vse poidejo.</p>
            </div>
        </div>
    </div>
</div>

<div id="myModalfb" class="modal modalcorrect" >

    <!-- Modal content -->
    <div class="modal-content">
        <div class="closefb float-end" style="width:25px;">&times;</div>
        <div class="text-center">
            <div class="alert alert-success">
                <p style="margin:0;">Pravilno ste označili sumljivo sporočilo</p>
            </div>
            <p>Kljub temu, da je naslov zahteval takojšnjo pozornost, se splača podrobno pogledati ime in domeno pošiljateljevega naslova.
                Pozornost bi nam moralo pritegniti tudi dejstvo, da ne uporabljamo službenega računa za prijavo na socialna omrežja.
            </p>
        </div>
    </div>

</div>
<div id="myModalinc" class="modal modalincorrect" >

    <!-- Modal content -->
    <div class="modal-content">
        <div class="closeinc float-end" style="width:25px;">&times;</div>
        <div class="text-center">
            <div class="alert alert-danger">
                <p style="margin:0;">Napačno stee označili neškodljivo sporočilo</p>
            </div>
            <p>Domena pošiljateljevega naslova je domena vašega podjetja. Sporočilo ni bilo zlonamerno. V tem primeru je pomembnejša pravilna domena, saj zaposleni dobijo poštni naslov, ko so zaposleni v podjetju, zato zunanja oseba ne more imeti poštnega naslova z domeno podjetja.
            </p>
        </div>
    </div>

</div>
<div id="myModalnateg" class="modal modalnateg" >

    <!-- Modal content -->
    <div class="modal-content">
        <div class="closenateg float-end" style="width:25px;">&times;</div>
        <div class="text-center">
            <div class="alert alert-danger">
                <p style="margin:0;">NEVARNOST!</p>
            </div>
            <p>
                Poskušali ste prenesti priponko, ki je najverjetneje okužena. Bila je poslana z domene podobne domeni vašega podjetja.
            </p>
            <p>
                To bi lahko privedlo do kraje podatkov, vdor v sisteme in drugih kritičnih problemov.
            </p>
        </div>
    </div>

</div>
<div id="myModalfbopen" class="modal modalwarn" >

    <!-- Modal content -->
    <div class="modal-content">
        <div class="closefbopen float-end" style="width:25px;">&times;</div>
        <div class="text-center">
            <div class="alert alert-warning">
                <p>POZOR!<br>Pravilno ste označili sumljivo sporočilo, vendar bi ga lahko prepoznali že prej</p>
            </div>
            <p>Odločili ste se odpreti sporočilo in potem ste ugotovili da sporočilo izgleda sumljivo. 
                Branje sporočila vam je dalo še malo časa za razmislek, vendar to pomeni, da ste premalo natančno
                prebrali podatke o pošiljatelju in naslov sporočila.
            </p>
        </div>
    </div>
</div>

<div id="fbopenareyousure" class="modal modalwarn" >

    <!-- Modal content -->
    <div class="modal-content">
        <div class="text-center">
            <div class="alert alert-warning">
                <p>POZOR!<br>Prepričajte se, da ste dobro pregledali naslov pošiljatelja, predvsem njegovo domeno.</p>
            </div>
            <p>Ali želite nadaljevati z odpiranjem e-sporočila?
            </p>
            <br>
            <button id="myBtn" class="btn btn-success btn-lg" onclick="areYouSureYes('fbopenareyousure', 'overlay-fb', 'linkfb', 'home')">Da</button>
            <button id="incorrectBtn2" class="btn btn-danger btn-lg" onclick="areYouSureNo('fbopenareyousure')">Ne</button>
        </div>
    </div>
</div>

<div id="poopenareyousure" class="modal modalwarn" >

    <!-- Modal content -->
    <div class="modal-content">
        <div class="text-center">
            <div class="alert alert-warning">
                <p>POZOR!<br>Prepričajte se, da ste dobro pregledali naslov pošiljatelja, predvsem njegovo domeno.</p>
            </div>
            <p>Ali želite nadaljevati z odpiranjem e-sporočila?
            </p>
            <br>
            <button id="myBtn" class="btn btn-success btn-lg" onclick="areYouSureYes('poopenareyousure', 'overlay-po', 'link3', 'menu1')">Da</button>
            <button id="incorrectBtn2" class="btn btn-danger btn-lg" onclick="areYouSureNo('poopenareyousure')">Ne</button>
        </div>
    </div>
</div>

<div id="usopenareyousure" class="modal modalwarn" >

    <!-- Modal content -->
    <div class="modal-content">
        <div class="text-center">
            <div class="alert alert-warning">
                <p>POZOR!<br>Prepričajte se, da ste dobro pregledali naslov pošiljatelja, predvsem njegovo domeno.</p>
            </div>
            <p>Ali želite nadaljevati z odpiranjem e-sporočila?
            </p>
            <br>
            <button id="myBtn" class="btn btn-success btn-lg" onclick="areYouSureYes('usopenareyousure', 'overlay-us', 'linklgit', 'menu2')">Da</button>
            <button id="incorrectBtn2" class="btn btn-danger btn-lg" onclick="areYouSureNo('usopenareyousure')">Ne</button>
        </div>
    </div>
</div>

<div id="propenareyousure" class="modal modalwarn" >

    <!-- Modal content -->
    <div class="modal-content">
        <div class="text-center">
            <div class="alert alert-warning">
                <p>POZOR!<br>Prepričajte se, da ste dobro pregledali naslov pošiljatelja, predvsem njegovo domeno.</p>
            </div>
            <p>Ali želite nadaljevati z odpiranjem e-sporočila?
            </p>
            <br>
            <button id="myBtn" class="btn btn-success btn-lg" onclick="areYouSureYes('propenareyousure', 'overlay-pr', 'linkpr', 'menu3')">Da</button>
            <button id="incorrectBtn2" class="btn btn-danger btn-lg" onclick="areYouSureNo('propenareyousure')">Ne</button>
        </div>
    </div>
</div>
<script>
    //MODAL ZA USPESNO PREPOZNAN MAIL
    // Get the modal
    var modalfb = document.getElementById("myModalfb");

    // Get the <span> element that closes the modal
    var spanfb = document.getElementsByClassName("closefb")[0];

    // When the user clicks on <span> (x), close the modal
    spanfb.onclick = function() {
    modalfb.style.display = "none";
    }

    var flagfb = document.getElementById("far1");

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(eventfbopen) {
    if (eventfbopen.target == modalfbopen) {
        modalfbopen.style.display = "none";
    }
    }

    //MODAL ZA NATEG PREPOZNAN MAIL
    // Get the modal
    var modalnateg = document.getElementById("myModalnateg");

    // Get the <span> element that closes the modal
    var spannateg = document.getElementsByClassName("closenateg")[0];

    // When the user clicks on <span> (x), close the modal
    spannateg.onclick = function() {
    modalnateg.style.display = "none";
    }

   
    function modalFuncNateg() {
        modalnateg.style.display = "block";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(eventnategopen) {
    if (eventnategopen.target == modalnategopen) {
        modalnategopen.style.display = "none";
    }
    }

     //MODAL napacno oznako
    // Get the modal
    var modalinc = document.getElementById("myModalinc");

    // Get the <span> element that closes the modal
    var spaninc = document.getElementsByClassName("closeinc")[0];

    // When the user clicks on <span> (x), close the modal
    spaninc.onclick = function() {
    modalinc.style.display = "none";
    }

    var flaginc = document.getElementById("far3");

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(eventincopen) {
    if (eventincopen.target == modalincopen) {
        modaincbopen.style.display = "none";
    }
    }


    //MODAL ZA ODPRT MAIL
    // Get the modal
    var modalfbopen = document.getElementById("myModalfbopen");

    // Get the <span> element that closes the modal
    var spanfbopen = document.getElementsByClassName("closefbopen")[0];

    // When the user clicks on <span> (x), close the modal
    spanfbopen.onclick = function() {
    modalfbopen.style.display = "none";
    }

    var flagfbopen = document.getElementById("far1open");

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(eventfbopen) {
    if (eventfbopen.target == modalfbopen) {
        modalfbopen.style.display = "none";
    }
    }


    
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    function modalFunc() {
        modal.style.display = "block";
    };

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }

    function toggleFlagNoSpam(clickedIcon) {
    switch(clickedIcon.id){
        case "fas1": clickedIcon.classList.toggle("hidden");
                    var icon = document.querySelector('#far1');
                     icon.classList.toggle("hidden");
                    var mail = document.getElementById("linkfb");
                     mail.classList.toggle("disabled");
                    var icon = document.querySelector('#far1open');
                     icon.classList.toggle("hidden");
                    var icon = document.querySelector('#fas1open');
                    icon.classList.toggle("hidden");
                     break;
        case "fas1open": clickedIcon.classList.toggle("hidden");
                    var icon = document.querySelector('#far1open');
                     icon.classList.toggle("hidden");
                    var icon = document.querySelector('#fas1');
                    icon.classList.toggle("hidden");
                    var icon = document.querySelector('#far1');
                     icon.classList.toggle("hidden");
                    var mail = document.getElementById("linkfb");
                     mail.classList.toggle("disabled");
                     break;
        case "fas2": clickedIcon.classList.toggle("hidden");
                    var icon = document.querySelector('#far2');
                     icon.classList.toggle("hidden");
                    var mail = document.getElementById("link3");
                     mail.classList.toggle("disabled");
                    var icon = document.querySelector('#far2open');
                     icon.classList.toggle("hidden");
                    var icon = document.querySelector('#fas2open');
                    icon.classList.toggle("hidden");
                     break;
        case "fas3": clickedIcon.classList.toggle("hidden");
                    var icon = document.querySelector('#far3');
                     icon.classList.toggle("hidden");
                    var mail = document.getElementById("linklgit");
                     mail.classList.toggle("disabled");
                    var icon = document.querySelector('#far3open');
                     icon.classList.toggle("hidden");
                    var icon = document.querySelector('#fas3open');
                    icon.classList.toggle("hidden");
                     break;
        case "fas4": clickedIcon.classList.toggle("hidden");
                    var icon = document.querySelector('#far4');
                     icon.classList.toggle("hidden");
                    var mail = document.getElementById("linkpr");
                     mail.classList.toggle("disabled");
                    var icon = document.querySelector('#far4open');
                     icon.classList.toggle("hidden");
                    var icon = document.querySelector('#fas4open');
                    icon.classList.toggle("hidden");
                     break;
        case "fas4open": clickedIcon.classList.toggle("hidden");
                    var icon = document.querySelector('#far4open');
                     icon.classList.toggle("hidden");
                    var icon = document.querySelector('#fas4');
                    icon.classList.toggle("hidden");
                    var icon = document.querySelector('#far4');
                     icon.classList.toggle("hidden");
                    var mail = document.getElementById("linkpr");
                     mail.classList.toggle("disabled");
                     break;
        default: break;
    }
}

function toggleFlagSpam(clickedIcon, event) {
    switch(clickedIcon.id){
        case "far1": clickedIcon.classList.toggle("hidden");
                    var icon = document.querySelector('#fas1');
                    icon.classList.toggle("hidden");
                    var mail = document.getElementById("linkfb");
                     mail.classList.toggle("disabled");
                     modalfb.style.display = "block";
                     mail.classList.toggle("active");

                    var pozdravbtn = document.getElementById("pozdravbtn");
                    pozdravbtn.classList.toggle("active");
                    var pozdravcont = document.getElementById("hello");
                    pozdravcont.classList.toggle("active");
                    pozdravcont.classList.toggle("show");
                    var pozdravcont = document.getElementById("home");
                    if(pozdravcont.classList.contains("active")){
                        pozdravcont.classList.toggle("active");
                        pozdravcont.classList.toggle("show");
                    }
                     break;
        case "far1open": clickedIcon.classList.toggle("hidden");
                    var icon = document.querySelector('#fas1open');
                    icon.classList.toggle("hidden");
                    var icon = document.querySelector('#far1');
                     icon.classList.toggle("hidden");
                    var icon = document.querySelector('#fas1');
                    icon.classList.toggle("hidden");
                    var mail = document.getElementById("linkfb");
                     mail.classList.toggle("disabled");
                     mail.classList.toggle("active");

                    var pozdravbtn = document.getElementById("pozdravbtn");
                    pozdravbtn.classList.toggle("active");
                    var pozdravcont = document.getElementById("hello");
                    pozdravcont.classList.toggle("active");
                    pozdravcont.classList.toggle("show");
                    var pozdravcont = document.getElementById("home");
                    if(pozdravcont.classList.contains("active")){
                        pozdravcont.classList.toggle("active");
                        pozdravcont.classList.toggle("show");
                    }
                     modalfbopen.style.display = "block";
                     break;
        case "far2": clickedIcon.classList.toggle("hidden");
                    var icon = document.querySelector('#fas2');
                    icon.classList.toggle("hidden");
                    var mail = document.getElementById("link3");
                     mail.classList.toggle("disabled");
                     modalfb.style.display = "block";
                     mail.classList.toggle("active");

                    var pozdravbtn = document.getElementById("pozdravbtn");
                    pozdravbtn.classList.toggle("active");
                    var pozdravcont = document.getElementById("hello");
                    pozdravcont.classList.toggle("active");
                    pozdravcont.classList.toggle("show");
                    var pozdravcont = document.getElementById("home");
                    if(pozdravcont.classList.contains("active")){
                        pozdravcont.classList.toggle("active");
                        pozdravcont.classList.toggle("show");
                    }
                     break;
        case "far3": clickedIcon.classList.toggle("hidden");
                    var icon = document.querySelector('#fas3');
                    icon.classList.toggle("hidden");
                    var mail = document.getElementById("linklgit");
                     mail.classList.toggle("disabled");
                     modalinc.style.display = "block";
                     mail.classList.toggle("active");

                    var pozdravbtn = document.getElementById("pozdravbtn");
                    pozdravbtn.classList.toggle("active");
                    var pozdravcont = document.getElementById("hello");
                    pozdravcont.classList.toggle("active");
                    pozdravcont.classList.toggle("show");
                    var pozdravcont = document.getElementById("home");
                    if(pozdravcont.classList.contains("active")){
                        pozdravcont.classList.toggle("active");
                        pozdravcont.classList.toggle("show");
                    }
                     break;
        case "far4": clickedIcon.classList.toggle("hidden");
                    var icon = document.querySelector('#fas4');
                    icon.classList.toggle("hidden");
                    var mail = document.getElementById("linkpr");
                     mail.classList.toggle("disabled");
                     modalfb.style.display = "block";
                     mail.classList.toggle("active");

                    var pozdravbtn = document.getElementById("pozdravbtn");
                    pozdravbtn.classList.toggle("active");
                    var pozdravcont = document.getElementById("hello");
                    pozdravcont.classList.toggle("active");
                    pozdravcont.classList.toggle("show");
                    var pozdravcont = document.getElementById("menu3");
                    if(pozdravcont.classList.contains("active")){
                        pozdravcont.classList.toggle("active");
                        pozdravcont.classList.toggle("show");
                    }
                     break;
        case "far4open": clickedIcon.classList.toggle("hidden");
                    var icon = document.querySelector('#fas4open');
                    icon.classList.toggle("hidden");
                    var icon = document.querySelector('#far4');
                     icon.classList.toggle("hidden");
                    var icon = document.querySelector('#fas4');
                    icon.classList.toggle("hidden");
                    var mail = document.getElementById("linkpr");
                     mail.classList.toggle("disabled");
                     mail.classList.toggle("active");

                    var pozdravbtn = document.getElementById("pozdravbtn");
                    pozdravbtn.classList.toggle("active");
                    var pozdravcont = document.getElementById("hello");
                    pozdravcont.classList.toggle("active");
                    pozdravcont.classList.toggle("show");
                    var pozdravcont = document.getElementById("menu3");
                    if(pozdravcont.classList.contains("active")){
                        pozdravcont.classList.toggle("active");
                        pozdravcont.classList.toggle("show");
                    }
                     modalfbopen.style.display = "block";
                     break;
        default: break;
    }
    
}
</script>
</body>
</html>
