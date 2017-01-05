//Login Controller
var loginApp = angular.module("loginApp", []);


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
                        window.location.replace("./assets/html/main.html");
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