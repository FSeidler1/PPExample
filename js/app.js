//Login Controller
var loginApp = angular.module("loginApp", []);
var mainApp = angular.module("mainApp", []);


//Login Formular absenden und Benutzer prüfen
loginApp.controller('FormController',
    function FormController($scope, $http) {
        $scope.benutzer_login = "";
        $scope.passwort_login = "";
        $scope.submit = function() {
            //Datenübermittlung an Controller.php 
            var request = $http({
                method: 'post',
                url: './php/controller.php?class=user&action=login',
                data: {
                    benutzer_login: $scope.benutzer_login,
                    passwort_login: $scope.passwort_login
                },
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            });
            // Was kommt vom Controller.php zurück? Wenn passt, dann Login.
            request.success(function(meldung) {
                //Keine Rückmeldung von Server
                if (meldung === null) {
                    console.log("Fehlerhafte Rückmeldung von Server");
                } else {
                    //Password korrekt
                    if (meldung === 'true') {
                        //setzt zusäätzlich lokales Loginflag
                        localStorage.setItem("loggedIn", "true");
                        //Redirect auf Main weil Login korrekt
                        window.location.replace("./html/main.html");
                    } else {
                        //Feedback - Fehlerhafte Login-Daten
                        falseData();
                    }
                }
            });
        }
    }
);

//Zeigt roten Text an, welcher auf falsche Login-Daten hinweist
function falseData() {
    //Keine Anmeldung möglich
    var mydiv = document.getElementById("falseUserLogin");
    mydiv.style.display = "block";
}

//Logt den aktuell angemeldeten User aus
mainApp.controller('logoutController',
    function logoutController($scope, $http) {
        $scope.userLogOut = function() {
            $http.get('./../php/Controller.php?class=user&action=logout').success(
                function(data) {
                    localStorage.setItem("loggedIn", "false");
                    isloggedin = false;
                    //redirect to index
                    window.location.replace("./../index.html");
                }
            );
        }
    }
);

//Überprüfen ob User bereits eingeloggt ist
//Übergabeparameter ist die aktuelle Seite, von wo die Funktion aufgerufen wird
function isUserLoggedIn(actualPage) {
    var loggedIn = localStorage.getItem("loggedIn");
    switch (actualPage) {
        case "index":
            if (loggedIn === "true") {
                //load 'main' page
                window.location.replace("./html/main.html");
            } else {
                //redirect to index
                //allready in index - do nothing
            }
            break;
        case "main":
            if (loggedIn === "true") {
                //do nothing                
            } else {
                //redirect to index
                window.location.replace("./../index.html");
            }
            break;

        default:
            console.log("Login Case unbekannt - nicht implementiert");
            break;
    }
}