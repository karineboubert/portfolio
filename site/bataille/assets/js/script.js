var config = {
    apiKey: "AIzaSyCrlWomUNJQwLEtdwiKvUUW_OmjKOkZjjE",
    authDomain: "bataille-f42e3.firebaseapp.com",
    databaseURL: "https://bataille-f42e3.firebaseio.com",
    projectId: "bataille-f42e3",
    storageBucket: "bataille-f42e3.appspot.com",
    messagingSenderId: "914310491558"
};

firebase.initializeApp(config);

//Initialiser Cloud Firestore via Firebase
var db = firebase.firestore();

// Désactiver les fonctionnalités obsolètes
db.settings({
    timestampsInSnapshots: true
});

$(function() {

    //Variables prédéfinies
    let firstPlayer = "undefined"
    let docRef = db.collection("match").doc("jeuxDeCarte"); // Création d'une référence pour pointer un emplacement de votre base de données
    let cards = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'] // Tableau pour les cartes
    let turn = 0 // tour par partie
    let match = 0 // nombre de match
    let scorePlayer1 = '0' // récupérer les cartes en base de données de joueur 1
    let scorePlayer2 = '0' // récupérer les cartes en base de données de joueur 2
    let matchPlayer1 = '0' // Le score des match de player 1
    let matchPlayer2 = '0' // Le score des match de player 2
    let recoverTurn = 0 // Nombre de tour effectué dans un match


    //Cacher
    $(".column").hide()
    $(".displayCard").hide()
    $("#reset").hide()
    $("#totalMatch").hide()

    // Refresh
    docRef.update({ //
        player1 : '',
        player2 : '',
        cardPlayer1 : '',
        cardPlayer2 : '',
        scorePlayer1 : 0,
        scorePlayer2 : 0,
        play : 0,
        recoverTurn: 0,
        matchPlayer1 : 0,
        matchPlayer2 : 0,
    }).then(function () {
        console.log('remis a jour')
    })

    $('#reset').on("click", function(){
        turn = 0 // tour par partie
        scorePlayer1 = '0'
        scorePlayer2 = '0'
        recoverTurn = 0
        match += 1

        docRef.update({ //
            cardPlayer1 : '',
            cardPlayer2 : '',
            scorePlayer1 : 0,
            scorePlayer2 : 0,
            play : 0,
            resetTurn : 0,
            recoverTurn: 0
        })
        $('#displayWin').empty()
        $('#playerCard').empty()
        $('#playerCard2').empty()
        $("#reset").hide()
        console.log("Nombre de match :" + match)
    })

    // Joueur 1 choisit pawnBlack
    $('#pawnBlack').on( "click", function() {
        $(".displayCard").show()
        $(".column").show()
        $("#totalMatch").show()
        $("#question").html("Vous avez choisi : <i class='fas fa-user'></i>")

        firstPlayer = '1' // firstname va définir le premier joueur
        docRef.update({
            player1 : '1'
        }).then(function () {
            console.log('Joueur 1 a appuyé sur pawnBlack')
        })

        //changer l'ordre des pawn au dessus des carte
        $('#player1').append("<i class='fas fa-user fa-2x'></i> ") // PawnBlack
        $('#player2').append("<i class='far fa-user fa-2x'></i> ") // PawnWhite

    })

    // Joueur 1 choisit pawnWhite
    $('#pawnWhite').on( "click", function() {
        $(".displayCard").show()
        $(".column").show()
        $("#totalMatch").show()
        $("#question").html("Vous avez choisi : <i class='far fa-user'></i>")
        firstPlayer = '1' // firstname va définir le premier joueur
        docRef.update({ //Lors du clic, le champs Player1 de Firebase = à pawnWhite
            player1 : '2'
        }).then(function () {
            console.log('Joueur 1 a appuyé sur pawnWhite')
        })

        //changer l'ordre des pawn au dessus des carte
        $('#player1').append("<i class='far fa-user fa-2x'></i> ") // PawnWhite
        $('#player2').append("<i class='fas fa-user fa-2x'></i> ") // PawnBlack
    })

    // Définir l'îcone du deuxième joueur et récupérer sa valeur en base de données
    docRef.onSnapshot(function(doc) {
        if (firstPlayer == "undefined") {
            if (doc.data().player1 == "1") {
                docRef.update({
                    player2: '2'
                })
                $(".displayCard").show()
                $(".column").show()
                $("#totalMatch").show()

                // pawnWhite d'office
                $("#question").html("Vous avez choisi : <i class='far fa-user'></i>")

                //changer l'ordre des pawn au dessus des carte
                $("#player1").html(" <i class='fas fa-user fa-2x'></i> ") // PawnBlack
                $("#player2").html(" <i class='far fa-user fa-2x'></i> ") // PawnWhite
            }

            if (doc.data().player1 == "2") {
                docRef.update({
                    player2: '1'
                })
                $(".displayCard").show()
                $(".column").show()
                $("#totalMatch").show()

                // pawnBlack d'office
                $("#question").html("Vous avez choisi : <i class='fas fa-user'></i>")

                //changer l'ordre des pawn au dessus des carte
                $("#player1").html(" <i class='far fa-user fa-2x'></i> ") // PawnWhite
                $("#player2").html(" <i class='fas fa-user fa-2x'></i> ") // PawnBlack
            }
        }
    })

    //Lorsque joueur 1 appuie sur ses cartes
    $('#gamePlayer1').on("click", function () {
        if (firstPlayer == '1') { // Joueur 1
            if(match < 3){
                docRef.get().then(function (doc) {
                    let play = doc.data().play // joueur 1 équivaut à play = 0
                    if (play == 0) {
                        if (turn < 5) {
                            $('#playerCard').empty()
                            let rand = cards[Math.floor(Math.random() * (cards.length))] // valeur aléatoire
                            scorePlayer1 = parseInt(scorePlayer1) + parseInt(rand)

                            //afficher carte aléatoire et le récupérer en base de données pour joueur 1
                            $('#playerCard').append('<img src="assets/img/' + rand + '.png" alt="' + rand + '"/>')
                            console.log("Joueur 1 a tiré une carte qui équivaut à " + rand)
                            docRef.update({
                                cardPlayer1: rand,
                                scorePlayer1: scorePlayer1,
                                play: 1 // Quand joueur 1 a jouer le play = 1 et c'est à joueur 2 de jouer
                            })
                            turn += 1 //implémenter les tours
                            console.log(turn)
                        }
                    }
                })
            }
        }
    })

    //Lorsque joueur 2 appuie sur ses cartes
    $('#gamePlayer2').on("click", function(){
        if (firstPlayer == "undefined") { // Joueur 2
            if(match < 3){
                docRef.get().then(function (doc) {
                    let play = doc.data().play // Joueur 2 équivaut à 1
                    if (play == 1) {
                        if (turn < 5) {
                            let cardPlayer1 = doc.data().cardPlayer1
                            if (cardPlayer1 !== "") { // bloque le turn si le joueur 2 clique sur les cartes de joueur1
                                $('#playerCard2').empty()
                                let randPlayer2 = cards[Math.floor(Math.random() * (cards.length))]
                                scorePlayer2 = parseInt(scorePlayer2) + parseInt(randPlayer2)

                                $('#playerCard2').append('<img src="assets/img/' + randPlayer2 + '.png" alt="' + randPlayer2 + '"/>')
                                console.log('Joueur 2 a tiré une carte qui équivaut à ' + randPlayer2)
                                docRef.update({
                                    cardPlayer2: randPlayer2,
                                    scorePlayer2: scorePlayer2,
                                    play: 0, // Redéfini à 0 pour que le joueur 1 puisse jouer
                                    recoverTurn: turn
                                })
                            }
                        }
                        turn += 1
                        console.log('Tour numéro ' + turn), console.log('Nous somme au match ' + match)
                    }
                    // si la partie est finie
                    if (turn > 4) {

                        recoverTurn = turn // évite doublons pour le joueur 1
                        docRef.get().then(function (doc) {
                            let scoreP1 = doc.data().scorePlayer1
                            let scoreP2 = doc.data().scorePlayer2
                            matchPlayer1  = parseInt(matchPlayer1) + parseInt(scoreP1)
                            matchPlayer2  = parseInt(matchPlayer2) + parseInt(scoreP2)
                            docRef.update({
                                matchPlayer1: matchPlayer1,
                                matchPlayer2: matchPlayer2,
                                play: 2
                            })

                            $('#scorePlayer1').html( ' : ' + scoreP1 )
                            $('#scorePlayer2').html(' : ' + scoreP2 )
                            $('#matchTotalPlayer1').html( "<i class='fas fa-user'></i> : " + matchPlayer1 )
                            $('#matchTotalPlayer2').html( "<i class='far fa-user'></i> : " + matchPlayer2)

                            if (scoreP1 < scoreP2) {
                                $('#displayWin').html("Vous avez gagné ! Avec un score " + scoreP2 + " contre " + scoreP1 + " points à cette partie")
                            }
                            else if (scoreP1 > scoreP2) {
                                $('#displayWin').html("Joueur 1 à gagné ! Avec un score " + scoreP1 + " contre " + scoreP2 + " points à cette partie")
                            }
                            else {
                                $('#displayWin').html("Vous êtes à égalité avec un score de " + scoreP1)
                            }
                            $("#reset").show()
                        })
                    }

                })

            }
        }
    })


    //Afficher les cartes des autres joueurs
    docRef.onSnapshot(function(doc) {
        if (firstPlayer == "undefined") {
            if (doc.data().cardPlayer1 !== "") {
                $('#playerCard').empty()
                docRef.get().then(function (doc) {
                    let cardPlayer = doc.data().cardPlayer1
                    $('#playerCard').html('<img src="assets/img/' + cardPlayer + '.png" alt="' + cardPlayer + '"/>')
                })
            }
        }
        //afficher carte de joueur 2 sur l'écran de joueur 1
        if (firstPlayer == "1") {
            if (doc.data().cardPlayer2 !== ""){
                $('#playerCard2').empty()
                docRef.get().then(function (doc) {
                    let cardPlayer = doc.data().cardPlayer2
                    $('#playerCard2').html('<img src="assets/img/' + cardPlayer  + '.png" alt="' + cardPlayer  + '"/>')
                })
            }
        }
    })

    //Afficher le score de joueur1
    docRef.onSnapshot(function(doc) {
        let scoreP1 = doc.data().scorePlayer1
        let scoreP2 = doc.data().scorePlayer2
        let matchPlayer1 = doc.data().matchPlayer1
        let matchPlayer2 = doc.data().matchPlayer2

        $('#scorePlayer1').html( " : " + scoreP1)
        $('#scorePlayer2').html(" : " + scoreP2)
        $('#matchTotalPlayer1').html( "<i class='fas fa-user'></i> : " + matchPlayer1 )
        $('#matchTotalPlayer2').html( "<i class='far fa-user'></i> : " + matchPlayer2 )

        if (firstPlayer == "1") {
            if (doc.data().recoverTurn == 4) {
                $("#reset").show()

                if (scoreP1 < scoreP2) {
                    $('#displayWin').html("Joueur 2 a gagné ! Avec un score "+ scoreP2 + " contre " +scoreP1 + " points à cette partie")
                }
                else if (scoreP1 > scoreP2) {
                    $('#displayWin').html("Vous avez gagné ! Avec un score "+ scoreP1+ " contre " +scoreP2 + " points à cette partie")
                }
                else {
                    $('#displayWin').html("Vous êtes à égalité avec un score de " + scoreP1)
                }
            }
        }
    })
})


// problème pour afficher le gagnant finale
//if(match > 2 ){

    //if (matchPlayer1 < matchPlayer2) {
       // alert("Vous avez gagné le tournoi de bataille ! Avec un score " + matchPlayer2 + " contre " + matchPlayer1 + " points ")
   // }
    //else if (matchPlayer1 > matchPlayer2) {
     //   alert("Vous avez perdu ! Joueur 1 à gagné avec  " + matchPlayer1 + " contre " + matchPlayer2)
    //}
    //else {
      //  alert("Vous êtes à égalité avec un score de " + matchPlayer1)
   // }
//}
